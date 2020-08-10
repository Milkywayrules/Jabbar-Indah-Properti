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

class Department extends CI_Controller {

	function __construct(){
    parent::__construct();
		// nama module
		$this->modules 		= 'superadmin';
		$this->controller = 'manage/department';
		$this->sidebarActive ='kelolaDepartment';
		// load model
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
		$user = $this->M_department->get_department_by_id($segment);
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
			'tabTitle'				=> 'List all department', // must have (page title)
			'subTitle'				=> 'List semua department yang terdaftar', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_all_department", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'dataTables'			=> 1,
			'totDepartment'		=> $this->M_department->get_all(),
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== TAMBAH =========================
  public function tambah()
	{
		// set form rules
		$this->form_validation->set_rules('add-id', 'id', 										'required|trim|min_length[5]|max_length[7]|is_unique[tb_department.id]');
		$this->form_validation->set_rules('add-deptName', 'nama department',	'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_error_delimiters('<sub class="form-text text-danger text-nowrap">', '</sub>');
		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Tambah department', // must have (page title)
				'subTitle'				=> 'Tambah department', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_add_department", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'dataTables'			=> 1,
				'totDepartment'		=> $this->M_department->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			$query = $this->M_department->set_new_department($post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Penambahan department sukses!");
				$this->session->set_flashdata('text', 'Department baru telah terdaftar dalam sistem !');
				redirect(current_url());

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Penambahan department gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data department');
				redirect(current_url());
			} // end if($query): success or failed
		} // end form_validation->run()
	} // end method

	// ============================== EDIT =========================
	public function edit($id = NULL)
	{
		// set form rules
		$this->form_validation->set_rules('edit-id', 'id', 											'required|trim|min_length[5]|max_length[7]');
		$this->form_validation->set_rules('edit-department', 'nama department',	'required|trim|min_length[3]|max_length[50]');
		// run the form validation
		if ($this->form_validation->run() == FALSE) {
			$user = $this->_segmentValidation($id);
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Edit data department', // must have (page title)
				'subTitle'				=> 'Edit data department ', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_edit_department", // must have (file name for content)
				'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
				'user'						=> $user,
				'department'			=> $this->M_department->get_all(),
			);
			$this->load->view('view_hub', $data);

		}else {
			// insert data to db
			$post = $this->input->post();
			$query = $this->M_department->set_update_department_by_id($post['ori-id'], $post);

			if ($query) {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Ubah data department sukses!");
				$this->session->set_flashdata('text', 'Data department telah terbarukan !');
				redirect(base_url("{$this->modules}/{$this->controller}/detail/{$id}"));

			}else {
				// flashdata untuk sweetalert
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Ubah data department gagal!");
				$this->session->set_flashdata('text', 'Mohon cek kembali data department');
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
			'tabTitle'				=> 'Detail department', // must have (page title)
			'subTitle'				=> 'Detail department', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_detail_department", // must have (file name for content)
			'sidebarActive'		=> $this->sidebarActive, // must have (active status for leftnavbar)
			'user'						=> $user,
			'department'			=> $this->M_department->get_department_by_id($id, 'deptName'),
		);
		$this->load->view('view_hub', $data);
	} // end method

	// ============================== DETAL =========================
  public function hapus($id = NULL)
	{
		// jika POST atau pun bukan, akan redirect ke 'modules/controller'
		if ($this->input->method(TRUE) == 'POST') {
			$user = $this->M_department->set_active_department_by_id($id);
			if ($user) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Non-aktif department sukses !');
				$this->session->set_flashdata('text', 'Department telah berhasil dinon-aktifkan !');
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Non-aktif department gagal !');
				$this->session->set_flashdata('text', 'Mohon hubungi admin website jika masih berlanjut !');
			}
		}
		redirect("{$this->modules}/{$this->controller}");
	} // end method

}
