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

class Main extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->model( 'M_import_file' );
		// nama module
		$this->modules 		= 'admin';
		$this->controller = 'main';
  }

  /*
  | ----------------------------------------------------------------------
  |  I/II | VALIDATION
  | ----------------------------------------------------------------------
  | These are the methods in this section:
  |
  | 1. _mustLoginValidation()
  | 2. _adminPrivilegeValidation()
  |
  |
  | ----------------------------------------------------------------------
  */

  /** (1/2)
   * ============================== VALIDASI LOGIN ==================
   * validasi status login, bahwa hanya user yang untuk user yang
   * sudah berhasil login,selain itu redirect ke home.
   * @return location redirect ke home
   */
  private function _mustLoginValidation(){
    ($this->session->userdata('isLogin') == 1) ?
			: (redirect(base_url(), 'refresh'));
	}

  /** (2/2)
   * ============================== VALIDASI PRIVILEGE ==============
   * validasi hak akses atau privilege atau permissions, bahwa hanya
   * untuk 'adminUser', selain itu redirect ke home.
   * @return location redirect ke home
   */
	private function _adminRoleValidation(){
    ($this->session->userdata('role') == $this->modules) ?
			: (redirect(base_url(), 'refresh'));
	}


  /*
  | ----------------------------------------------------------------------
  |  II/II | EDIT HERE FO WHAT THIS SECTION GENERALLY DO
  | ----------------------------------------------------------------------
  | These are the methods in this section:
  |
  | 1. index()
  | 2. profile()
  | 3. inbox()
  | 4. settings()
	| 5. blank()
  |
  |
  | ----------------------------------------------------------------------
  */

	// ============================== DASHBOARD =========================
  public function index()
	{
		// load model
		// $this->load->model('M_department');
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Dashboard', // must have (page title)
			'mainTitle'				=> 'Dashboard',
			'contentViewFile'	=> "{$this->controller}/v_dashboard", // must have (file name for content)
			'sidebarActive'		=> 'dashboard', // must have (active status for leftnavbar)
			'chart'						=> 1,
			// dashboard card
			// row 1
			// 'siswa'						=> $this->M_siswa->get_total(),
			// 'dept'						=> $this->M_department->get_total(),
			// 'kelas'						=> $this->M_kelas->get_total(),
			// // row 2
			// 'staff'						=> $this->M_staff->get_total_staff(),
			// 'pengurus'				=> $this->M_staff->get_total_pengurus(),
			// 'pelatih'					=> $this->M_staff->get_total_pelatih(),
			// 'pengajar'				=> $this->M_staff->get_total_pengajar(),
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== PROFILE =========================
  public function profile()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Profile', // must have (page title)
			'contentViewFile'	=> "{$this->controller}/v_profile", // must have (file name for content)
			'sidebarActive'		=> 'profile', // must have (active status for leftnavbar)
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== INBOX =========================
  public function inbox()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Mail - Inbox', // must have (page title)
			'contentViewFile'	=> "{$this->controller}/v_inbox", // must have (file name for content)
			'sidebarActive'		=> 'inbox', // must have (active status for leftnavbar)
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== SETTINGS =========================
  public function settings()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Settings', // must have (page title)
			'contentViewFile'	=> "{$this->controller}/v_settings", // must have (file name for content)
			'sidebarActive'		=> 'settings', // must have (active status for leftnavbar)
		);
		$this->load->view('view_hub', $data);
	}

	// ============================== BLANK =========================
  public function blank()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Blank Page', // must have (page title)
			'contentViewFile'	=> "{$this->controller}/v_blank", // must have (file name for content)
			'sidebarActive'		=> 'blank', // must have (active status for leftnavbar)
		);
		$this->load->view('view_hub', $data);
	}

}
