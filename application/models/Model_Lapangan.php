<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Lapangan extends CI_Model {
	public function addLap($data)
	{
		$this->db->insert('tbl_lapangan',$data);
		$id = $this->db->insert_id();
		// echo '<script>console.log('.json_encode($id).')</script>';
		return $id;
	}

	public function getLap($id){
        $this->db->where('id_lapangan', $id);
		$query = $this->db->get('tbl_lapangan');
		return $query->row();
    }
    public function getLap1($where){
        $query = $this->db->get_where('tbl_lapangan',$where);
		return $query->row();
    }
    public function getAll(){
        $this->db->select('*');
        $this->db->from('tbl_lapangan');
        return $this->db->get()->result();
    }
    
    public function delLap($id){
        $this->db->where('id_lapangan', $id);
        $this->db->delete('tbl_lapangan');
        if($this->db->affected_rows() >=0){
          return true; 
        }else{
          return false; 
        }
    }

    public function updateLap($id,$data){
        $this->db->where('id_lapangan', $id);
        $this->db->update('tbl_lapangan',$data);
        if($this->db->affected_rows() >=0){
          return true; 
        }else{
          return false; 
        }
    }

}