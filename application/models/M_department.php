<?php

/**
 *
 */
class M_department extends CI_Model
{

  var $tb_staff = 'tb_staff';
  var $tb_department = 'tb_department';

//  ===============================================SETTER===============================================
  // daftar department baru
  /**
   * setter untuk membuat user baru, yang bisa diakses melalui
   * halaman register atau dibuat manual oleh admin/superadmin
   * @param array $data [berisi 8 data]
   */
  public function set_new_department($data){
    // echo "<pre>";
    // print_r($data);
    $createdAt = unix_to_human(now(), true, 'europe');
		$data = array(
		  "id"          => $data['add-id'],
		  "deptName"    => $data['add-deptName'],
      "createdAt"   => $createdAt,
      "isActive"    => '1',
      // "isDeleted"   => '0',
		);
		return $this->db->insert($this->tb_department, $data);
  }
  // update department by id
  public function set_update_department_by_id($id, $data){
    $data = array(
      "id"        => $data['edit-id'],
      "deptName"  => $data['edit-department'],
      "isActive"  => $data['edit-statusAktif'],
    );
    $this->db->where('id', $id);
		return $this->db->update($this->tb_department, $data);
  }
  // hapus department by id (set isDeleted = 1)
  public function set_active_department_by_id($id){
		$data = array(
		  "isActive"  => 0,
		);
    $this->db->where('id', $id);
		return $this->db->update($this->tb_department, $data);
  }



//  ===============================================GETTER===============================================
//  echo "<pre>";print_r();die();
  // get total
  public function get_total(){
    // get from tb_department
    $this->db->select('count(id) AS total');
    $this->db->from($this->tb_department);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }
  // get all department
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_all($select = '*'){
    // get from tb_department
    $this->db->select($select);
    $this->db->from($this->tb_department);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ( $query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
  // get 1 department berdasarkan id
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_department_by_id($id, $select = '*'){
    // get from tb_department
    $this->db->select($select);
    $this->db->from($this->tb_department);
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
