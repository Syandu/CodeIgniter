<?php
class usermodel extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}

	function insert_user($data){
		$this->db->insert('user', $data);
	}

	function get_all_user(){
		$this->db->select('*');
		$this->db->from('user');
		//$this->db->order_by('date_modified', 'desc');
		
		return $this->db->get();
	}

	function get_user_by_id($id_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		
		return $this->db->get();
	}

	function update_user($id_user, $data){
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	function delete_user($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	// function yang digunakan oleh paginationsample
	function get_all_user_paging($limit=array()){
		$this->db->select('*');
		$this->db->from('user');
		//$this->db->order_by('date_modified', 'desc');
	
		if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);

		return $this->db->get();
	}
	
	// function yang digunakan oleh ajaxsample : proses_cari_user
	function get_user_by_username($username){
		$this->db->select('*');
		$this->db->from('user_view');
		$this->db->where('username', $username);
		
		return $this->db->get();
	}

}
?>