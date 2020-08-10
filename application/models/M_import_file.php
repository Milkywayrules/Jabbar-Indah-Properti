<?php

  /**
   *
   */
  class M_import_file extends CI_Model
  {

//  ===============================================SETTER===============================================
    // Import file excel ke database
    /**
     * Method untuk upload file excel ke database (import)
     * @param  string $table  [Nama tabel]
     * @param  array $data    [Data key dan value]
     * @return bool           [success / not]
     */
    public function import_excel_to_table($table = NULL, $data = NULL){
      if ($table == NULL OR $data == NULL) {
        echo "Nama tabel harus terisi dan data harus terisi";
        header( "Refresh:3; url=".base_url(), true, 303);
        exit();
      }
  		return $this->db->insert($table, $data);
    }

  }

  // $this->db->trans_start();
  // $this->db->query('AN SQL QUERY...');
  // $this->db->query('ANOTHER QUERY...');
  // $this->db->trans_complete();
  //
  // if ($this->db->trans_status() === FALSE)
  // {
  //         // generate an error... or use the log_message() function to log your error
  // }

 ?>
