<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @chocobabana
 *
 * Semua view akan menuju ke 'view_hub' sebagai terminal selanjutnya,
 * setelahnya akan load file view yang akan menyesuaikan dengan module
 * yang sesuai untuk load file viewnya.
 *
 * Alur :
 * controller -> view_hub -> v_view
 *
 */

class Users extends CI_Controller {

	function __construct(){
    parent::__construct();
		// nama module
		$this->modules 		= 'admin';
		$this->controller = 'manage/users';
		$this->sidebarActive ='kelolaUser';
		// load model
		// $this->load->model( "{$this->modules}/{$this->controller}_M" );
		$this->load->model( "M_users" );
		$this->load->model( "M_role" );
  }

  /*
  | ----------------------------------------------------------------------
  |  I/II | VALIDATION
  | ----------------------------------------------------------------------
  | These are the methods in this section:
  |
  | 1. _mustLoginValidation()
  | 2. _adminPrivilegeValidation()
	| 3. _segmentValidation($segment)
  |
  |
  | ----------------------------------------------------------------------
  */

  /** (1/3)
   * ============================== VALIDASI LOGIN ==================
   * validasi status login, bahwa hanya user yang untuk user yang
   * sudah berhasil login,selain itu redirect ke home.
   * @return location redirect ke home
   */
  private function _mustLoginValidation(){
    ($this->session->userdata('isLogin') == 1) ?
			: (redirect(base_url(), 'refresh'));
	}

  /** (2/3)
   * ============================== VALIDASI PRIVILEGE ==============
   * validasi hak akses atau privilege atau permissions, bahwa hanya
   * untuk 'adminUser', selain itu redirect ke home.
   * @return location redirect ke home
   */
	private function _adminRoleValidation(){
    ($this->session->userdata('role') == $this->modules) ?
			: (redirect(base_url(), 'refresh'));
	}

  /** (3/3)
   * ============================== VALIDASI SEGMENT ==============
   * validasi segment sebagai param data, cek apakah param ada
   * dan cek apakah param memiliki data pada db. Jika dua2nya
   * terpenuhi data akan tampil, jika tidak makan akan redirect
   * @return location redirect ke halaman list
   */
	private function _segmentValidation($segment){
		$user = $this->M_users->get_active_user_by_id($segment);
		if (($segment == NULL) OR ($user == FALSE)) {
			redirect(base_url("{$this->modules}/{$this->controller}"));
		}else {
			return $user;
		}
	}


  /*
  | ----------------------------------------------------------------------
  |  II/II | EDIT HERE FO WHAT THIS SECTION GENERALLY DO
  | ----------------------------------------------------------------------
  | These are the methods in this section:
  |
  | 1. index()
	| 2. tambah()
  | 3. detail()
  | 4. edit()
  | 5. hapus()
  |
  | ----------------------------------------------------------------------
  */

	// ============================== LIST ALL DATA =========================
  public function index()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'List semua user', // must have (page title)
			'subTitle'				=> 'List semua user yang terdaftar', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_all_user", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'dataTables'			=> 1,
			'totUser'					=> $this->M_users->get_all(),
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== TAMBAH =========================
  public function tambah()
	{
		// set form rules
		$this->form_validation->set_rules('add-username', 'username', 					'required|trim|min_length[5]|max_length[15]|is_unique[tb_users.username]');
		$this->form_validation->set_rules('add-firstName', 'nama depan', 				'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('add-lastName', 'nama belakang', 			'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('add-phone', 'no telepon', 						'required|trim|min_length[10]|max_length[15]|is_unique[tb_users.phone]');
		$this->form_validation->set_rules('add-gender', 'gender', 							'required');
		$this->form_validation->set_rules('add-roleName', 'roleName', 					'required');
		$this->form_validation->set_rules('add-email', 'email', 								'required|trim|valid_email|min_length[5]|max_length[150]|is_unique[tb_users.email]');
		$this->form_validation->set_rules('add-password', 'password', 					'required|min_length[5]|max_length[250]');
		$this->form_validation->set_rules('add-verPassword', 'ulangi password', 'required|matches[add-password]');
		$this->form_validation->set_error_delimiters('<sub class="form-text text-danger text-nowrap">', '</sub>');
		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Tambah user', // must have (page title)
				'subTitle'				=> 'Tambah user', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_add_user", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'roles'						=> $this->M_role->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			$query = $this->M_users->set_new_user($post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Penambahan user sukses!");
				$this->session->set_flashdata('text', 'user baru telah terdaftar dalam sistem !');
				redirect(current_url());

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Penambahan user gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data diri user');
				redirect(current_url());
			} // end if($query): success or failed
		} // end form_validation->run()
	} // end method

	// ============================== EDIT =========================
	public function edit($id = NULL)
	{
		// set form rules
		$this->form_validation->set_rules('edit-username', 'username', 				'required|trim|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('edit-firstName', 'nama depan', 		'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('edit-lastName', 'nama belakang',		'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('edit-email', 'email', 							'required|trim|valid_email|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('edit-phone', 'no telepon', 				'required|trim|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('edit-address','address', 					'required|trim|min_length[3]|max_length[300]');
		$this->form_validation->set_rules('edit-gender', 'gender', 						'required');
		$this->form_validation->set_rules('edit-roleName', 'roleName', 				'required');

		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			$user = $this->_segmentValidation($id);
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Edit data user', // must have (page title)
				'subTitle'				=> 'Edit data user ', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_edit_user", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'user'						=> $user,
				'roles'						=> $this->M_role->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			// echo "<pre>";print_r($post);die();
			$query = $this->M_users->set_update_user_by_id($post['edit-id'], $post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Ubah data user sukses!");
				$this->session->set_flashdata('text', 'Data user telah terbarukan !');
				redirect(base_url("{$this->modules}/{$this->controller}/detail/{$nip}"));

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Ubah data user gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data diri user');
				redirect(current_url());
			} // end if($query): success or failed
		} // end form_validation->run()
	} // end method

	// ============================== DETAIL =========================
  public function detail($id = NULL)
	{
		$user = $this->_segmentValidation($id);
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Detail user', // must have (page title)
			'subTitle'				=> 'Detail user', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_detail_user", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'user'						=> $user,
			'roles'						=> $this->M_role->get_all(),
		);
		$this->load->view('view_hub', $data);
	} // end method

	// ============================== HAPUS =========================
  public function hapus($id = NULL)
	{
		// jika POST akan hapus data dan set SA
		if ($this->input->method(TRUE) == 'POST') {
			// hapus data melalui model
			$user = $this->M_users->set_delete_user_by_id($id);
			if ($user) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Hapus user sukses !');
				$this->session->set_flashdata('text', 'User telah berhasil dihapus !');
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Hapus user gagal !');
				$this->session->set_flashdata('text', 'Mohon hubungi admin sistem jika masih berlanjut !');
			}
		}
		// jika POST atau pun bukan, akan redirect ke 'modules/controller'
		redirect("{$this->modules}/{$this->controller}");
	} // end method

	// ============================== HAPUS =========================
  public function aktifkan($id = NULL)
	{
		// jika POST akan hapus data dan set SA
		if ($this->input->method(TRUE) == 'POST') {
			// hapus data melalui model
			$user = $this->M_users->set_aktif_user_by_id($id);
			if ($user) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Aktifasi user sukses !');
				$this->session->set_flashdata('text', 'User telah berhasil diaktifkan !');
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Aktifasi user gagal !');
				$this->session->set_flashdata('text', 'Mohon hubungi admin sistem jika masih berlanjut !');
			}
		}
		// jika POST atau pun bukan, akan redirect ke 'modules/controller'
		redirect("{$this->modules}/{$this->controller}");
	} // end method

}
