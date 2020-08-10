<?php

/**
 *
 */
class M_siswa extends CI_Model
{

  var $tb_siswa = 'tb_siswa';
  var $tb_kelas = 'tb_kelas';

//  ===============================================SETTER===============================================



//  ===============================================GETTER===============================================
//  echo "<pre>";print_r();die();
  // get total
  public function get_total(){
    // get from tb_department
    $this->db->select('count(id) AS total');
    $this->db->from($this->tb_siswa);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }
  // get all siswa
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_all($select = '*'){
    // get from tb_siswa
    $this->db->select($select);
    $this->db->from($this->tb_siswa);
    $this->db->where('isDeleted =', 0);
    $query = $this->db->get();
    if ( $query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
  // get all siswa
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_all_kelas($select = '*'){
    // get from tb_siswa
    $this->db->select($select);
    $this->db->from($this->tb_kelas);
    $this->db->where('isActive =', 1);
    $query = $this->db->get();
    if ( $query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
  // get 1 user berdasarkan username / email
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_siswa_by_nis($nis, $select = '*'){
    // insert data register ke db
    $this->db->select($select);
    $this->db->from($this->tb_siswa);
    $this->db->where('nis', $nis);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }
  // get 1 user berdasarkan username / email
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_kelas_by_nis($nis, $select = '*'){
    // insert data register ke db
    $this->db->select($select);
    $this->db->from($this->tb_kelas);
    $this->db->join("{$this->tb_siswa}", "{$this->tb_siswa}.deptId={$this->tb_kelas}.id");
    $this->db->where('nis', $nis);
    $query = $this->db->get();
    // echo "<pre>";print_r($query->row());die();
    if ( $query->num_rows() == 1) {
      return $query;
    }
    return FALSE;
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
