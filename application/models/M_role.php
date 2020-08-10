<?php

/**
 *
 */
class M_role extends CI_Model
{

  var $table = 'tb_role';

//  ===============================================SETTER===============================================
  // daftar user baru
  /**
   * setter untuk membuat role baru, yang dibuat manual oleh admin/superadmin
   * @param array $data [berisi 12 data]
   */
  public function set_new_role($data){
    // echo "<pre>";
    // print_r($data);
    $createdAt = unix_to_human(now(), true, 'europe');
		$data = array(
		  "username"    => $data['add-username'],
		  "email"       => $data['add-email'],
      "password"    => $this->bcrypt->hash_password($data['add-password']),
      "firstName"   => $data['add-firstName'],
      "lastName"    => $data['add-lastName'],
      "phone"       => $data['add-phone'],
      "gender"      => $data['add-gender'],
      "address"     => $data['add-address'],
      "avatar"      => 'avatar-'.mt_rand(0,6).'.png',
      "roleId"      => $data['add-roleId'],
      "createdAt"   => $createdAt,
      "isDeleted"   => '0',
		);
		return $this->db->insert($this->table, $data);
  }
  // update user by id
  public function set_update_user_by_id($id, $data){
    $data = array(
      "username"    => $data['edit-username'],
      "email"       => $data['edit-email'],
      "firstName"   => $data['edit-firstName'],
      "lastName"    => $data['edit-lastName'],
      "phone"       => $data['edit-phone'],
      "gender"      => $data['edit-gender'],
      "address"     => $data['edit-address'],
      "roleId"      => $data['edit-roleId'],
      "isDeleted"   => $data['edit-statusAktif'],
    );
    $this->db->where('id', $id);
		return $this->db->update($this->table, $data);
  }
  // hapus users by id (set isDeleted = 1)
  public function set_delete_user_by_id($id){
		$data = array(
		  "isDeleted"  => 1,
		);
    $this->db->where('id', $id);
		return $this->db->update($this->table, $data);
  }
  // aktifasi users by id (set isDeleted = 1)
  public function set_aktifasi_user_by_id($id){
		$data = array(
		  "isDeleted"  => 0,
		);
    $this->db->where('id', $id);
		return $this->db->update($this->table, $data);
  }


//  ===============================================GETTER===============================================
//  echo "<pre>";print_r();die();
  // get total user
  public function get_total_role(){
    // get from tb_department
    $this->db->select('count(id) AS total');
    $this->db->from($this->table);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }
  // get all user
  // masukkan parameter sebagai nama kolom pada database, untuk select kolom
  public function get_all($select = '*'){
    // get from tb_users
    $this->db->select($select);
    $this->db->from($this->table);
    $this->db->order_by('id', 'ASC');
    $this->db->where('isDeleted =', 0);
    $query = $this->db->get();
    if ( $query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
  // get 1 users berdasarkan id
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_role_by_id($id, $select = '*'){
    // get from tb_users
    $this->db->select($select);
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $this->db->where('isDeleted =', 0);
    $query = $this->db->get();
    if ( $query->num_rows() == 1) {
      return $query->row();
    }
    return FALSE;
  }










  // get 1 department berdasarkan id
  // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
  public function get_department_by_nip($nip, $select = '*'){
    // get from tb_department
    $this->db->select($select);
    $this->db->from($this->tb_users);
    $this->db->join($this->tb_department, "{$this->tb_department}.id={$this->tb_users}.deptId");
    $this->db->where('tb_users.nip', $nip);
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
