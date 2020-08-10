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

class Kelas extends CI_Controller {

	function __construct(){
    parent::__construct();
		// nama module
		$this->modules 		= 'superadmin';
		$this->controller = 'manage/kelas';
		$this->sidebarActive ='kelolaKelas';
		// load model
		$this->load->model( 'M_kelas' );
		$this->load->model( "M_staff" );
		$this->load->model( "M_department" );
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
	private function _adminPrivilegeValidation(){
    ($this->session->userdata('privilege') == $this->modules) ?
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
		$user = $this->M_kelas->get_kelas_by_id($segment);
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
			'tabTitle'				=> 'List all kelas', // must have (page title)
			'subTitle'				=> 'List semua kelas yang terdaftar', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_all_kelas", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'dataTables'			=> 1,
			'totKelas'		=> $this->M_kelas->get_all(),
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== TAMBAH =========================
  public function tambah()
	{
		// set form rules
		$this->form_validation->set_rules('add-id', 'id', 								'required|trim|min_length[5]|max_length[7]|is_unique[tb_kelas.id]');
		$this->form_validation->set_rules('add-className', 'nama kelas',	'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('add-nip', 'nip',								'required');
		$this->form_validation->set_error_delimiters('<sub class="form-text text-danger text-nowrap">', '</sub>');
		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Tambah kelas', // must have (page title)
				'subTitle'				=> 'Tambah kelas', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_add_kelas", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'dataTables'			=> 1,
				'totKelas'				=> $this->M_kelas->get_all(),
				'staffs'					=> $this->M_staff->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			$query = $this->M_kelas->set_new_kelas($post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Penambahan kelas sukses!");
				$this->session->set_flashdata('text', 'Kelas baru telah terdaftar dalam sistem !');
				redirect(current_url());

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Penambahan kelas gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data kelas');
				redirect(current_url());
			} // end if($query): success or failed
		} // end form_validation->run()
	} // end method

	// ============================== EDIT =========================
	public function edit($id = NULL)
	{
		// set form rules
		$this->form_validation->set_rules('edit-id', 'id', 											'required|trim|min_length[5]|max_length[7]');
		$this->form_validation->set_rules('edit-kelas', 'nama kelas',	'required|trim|min_length[3]|max_length[50]');
		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			$user = $this->_segmentValidation($id);
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Edit data kelas', // must have (page title)
				'subTitle'				=> 'Edit data kelas ', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_edit_kelas", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'user'						=> $user,
				'kelas'			=> $this->M_kelas->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			$query = $this->M_kelas->set_update_kelas_by_id($post['ori-id'], $post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Ubah data kelas sukses!");
				$this->session->set_flashdata('text', 'Data kelas telah terbarukan !');
				redirect(base_url("{$this->modules}/{$this->controller}/detail/{$id}"));

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Ubah data kelas gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data kelas');
				redirect(current_url());
			} // end if($query): success or failed
		} // end form_validation->run()
	} // end method

	// ============================== DETAL =========================
  public function detail($id = NULL)
	{
		$user = $this->_segmentValidation($id);
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Detail kelas', // must have (page title)
			'subTitle'				=> 'Detail kelas', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_detail_kelas", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'user'						=> $user,
			'kelas'			=> $this->M_kelas->get_kelas_by_id($id, 'className'),
		);
		$this->load->view('view_hub', $data);
	} // end method

	// ============================== DETAL =========================
  public function hapus($id = NULL)
	{
		// jika POST atau pun bukan, akan redirect ke 'modules/controller'
		if ($this->input->method(TRUE) == 'POST') {
			$user = $this->M_kelas->set_active_kelas_by_id($id);
			if ($user) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Non-aktif kelas sukses !');
				$this->session->set_flashdata('text', 'Kelas telah berhasil dinon-aktifkan !');
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Non-aktif kelas gagal !');
				$this->session->set_flashdata('text', 'Mohon hubungi admin website jika masih berlanjut !');
			}
		}
		redirect("{$this->modules}/{$this->controller}");
	} // end method

}
