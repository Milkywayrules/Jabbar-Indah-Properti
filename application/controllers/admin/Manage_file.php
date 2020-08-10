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

class Manage_file extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->model( 'M_import_file' );
		// nama module
		$this->modules 		= 'admin';
		$this->controller = 'manage_file';
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
	private function _adminPrivilegeValidation(){
    ($this->session->userdata('privilege') == $this->modules) ?
			: (redirect(base_url(), 'refresh'));
	}


  /*
  | ----------------------------------------------------------------------
  |  II/II | EDIT HERE FO WHAT THIS SECTION GENERALLY DO
  | ----------------------------------------------------------------------
  | These are the methods in this section:
  |
  | 1. hub()
  | 2. excel()
  |
  |
  | ----------------------------------------------------------------------
  */

	// ============================== UPLOAD FILE HUB =========================
  public function hub()
	{
		// set data untuk digunakan pada view
		$data['view_hub'] = (object)array(
			'modules' 				=> $this->modules, // must have (modules/folder name)
			'tabTitle'				=> 'Manage File Hub', // must have (page title)
			'subTitle'				=> 'Select file modules', // must have (sub title)
			'contentViewFile'	=> "{$this->controller}/v_manage_file_hub", // must have (file name for content)
			'sidebarActive'		=> 'manageFile', // must have (active status for leftnavbar)
		);
		$this->load->view('view_hub', $data);
	}

// ========================== IMPORT EXCEL ==========================
	public function excel()
	{
		// syarat form
		$this->form_validation->set_rules('table-name', 'table name', 'trim|required');
		if (empty($_FILES['excelFile']['name'])){
			$this->form_validation->set_rules('excelFile', 'Document', 'required');
		}
		$this->form_validation->set_error_delimiters("<span style='color:red;'>", '</span>');

		if ( $this->form_validation->run() == FALSE) {
			// set data untuk digunakan pada view
			$data['view_hub'] = (object)array(
				'modules' 				=> $this->modules, // must have (modules/folder name)
				'tabTitle'				=> 'Import excel to database', // must have (page title)
				'subTitle'				=> 'Import to specific table', // must have (sub title)
				'contentViewFile'	=> "{$this->controller}/v_import_excel", // must have (file name for content)
				'sidebarActive'		=> 'uploadFile', // must have (active status for leftnavbar)
				'databaseName'		=> $this->db->database, // must have (active status for leftnavbar)
			);
			$this->load->view('view_hub', $data);

		}else {
	    // Load plugin PHPExcel
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			if (isset($_FILES['excelFile']) && !empty($_FILES['excelFile'] ['tmp_name'])) {
				# code...
				$tableName 			= $this->input->post('table-name');
				$excelObject 		= PHPExcel_IOFactory::load($_FILES['excelFile'] ['tmp_name']);
				$import_data 		= $excelObject -> getActiveSHeet() -> toArray(null);
				// key data ke berapa
				$dataNo = 1;
				// key data eror ke berapa
				$errorNo = 1;
				$error = 0;
				// pointer
				$pointer = 1;
				// ambil headTitle
				$headTitle = $import_data[0];
				// array ke X untuk diskip tidak dibaca
				$skipped = array('0');
				foreach ($import_data as $key => $value){
					// start: proses
					// skip headTitle pada file excel
			    if(in_array($key, $skipped)){
			        continue;
			    }
					// ambil jumlah kolom aktif
					$totalColumns = count($value);
					// iterasi untuk set data sesuai dengan nama kolom
					for ($i=0; $i<$totalColumns; $i++) {
						$rowKey = $headTitle[$i];
						$rowData[$rowKey] = $value[$i];
					}
					// 																								-nama tabel  -data
					$row = $this->M_import_file->import_excel_to_table($tableName, $rowData);
					if ($row === TRUE) {
						echo "data ke {$dataNo} sukses <br>";
					}else {
						echo "ERROR: data ke {$dataNo}, iterasi ke {$pointer} <br>";
						$error = 1;
					}
					// end: proses
					$dataNo++;
					$pointer++;
				} //end foreach

				if ($error == 1) {
					echo "<hr>";
					echo "Terdapat error pada salah satu data, silakan cek keterangan diatas";
					echo "<br>";
					echo "<a href=".base_url().">Back home</a>";
				}else {
					echo "Seluruh data berhasil diinput, silakan cek pada db. Redirect ke import page dalam 3 detik";
					header( "Refresh:3; url=".base_url("{$this->modules}/import-file/excel"), true, 303);
					exit();
				} // endif
			} //end excelFile isset
		} // end form_validation->run()
	} // end method

// ========================== PDF ==========================
	public function pdf()
	{
		echo "belom ada hehe";
	}



}
