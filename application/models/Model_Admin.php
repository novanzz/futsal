<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {
	public function addAdmin($data)
	{
		$this->db->insert('admin',$data);
		$id = $this->db->insert_id();
		echo '<script>console.log('.json_encode($id).')</script>';
		return $id;
	}

	public function getAdmin($where){
		$query = $this->db->get_where('admin',$where);
		return $query->row();
    }
    
}
