<?php

/**
 *
 */
class M_kelas extends CI_Model
{

  var $tb_staff = 'tb_staff';
  var $tb_kelas = 'tb_kelas';

//  ===============================================SETTER===============================================
  // daftar kelas baru
  /**
   * setter untuk membuat user baru, yang bisa diakses melalui
   * halaman register atau dibuat manual oleh admin/superadmin
   * @param array $data [berisi 8 data]
   */
  public function set_new_kelas($data){
    // echo "<pre>";
    // print_r($data);
    $createdAt = unix_to_human(now(), true, 'europe');
		$data = array(
		  "id"          => $data['add-id'],
		  "className"   => $data['add-className'],
      "createdAt"   => $createdAt,
      "isActive"    => '1',
		  "nip"         => $data['add-nip'],
		);
		return $this->db->insert($this->tb_kelas, $data);
  }
  // update kelas by id
  public function set_update_kelas_by_id($id, $data){
    $data = array(
      "id"        => $data['edit-id'],
      "className"  => $data['edit-kelas'],
      "isActive"  => $data['edit-statusAktif'],
    );
    $this->db->where('id', $id);
		return $this->db->update($this->tb_kelas, $data);
  }
  // hapus kelas by id (set isDeleted = 1)
  public function set_active_kelas_by_id($id){
		$data = array(
		  "isActive"  => 0,
		);
    $this->db->where('id', $id);
		return $this->db->update($this->tb_kelas, $data);
  }



//  ===============================================GETTER===============================================
//  echo "<pre>";print_r();die();
  // get total
  public function get_total(){
    // get from tb_department
    $this->db->select('count(id) AS total');
    $this->db->from($this->tb_kelas);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }
  // get all kelas
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_all($select = '*'){
    // get from tb_kelas
    $this->db->select($select);
    $this->db->from($this->tb_kelas);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ( $query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
  // get 1 kelas berdasarkan id
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_kelas_by_id($id, $select = '*'){
    // get from tb_kelas
    $this->db->select($select);
    $this->db->from($this->tb_kelas);
    $this->db->where('id', $id);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
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
