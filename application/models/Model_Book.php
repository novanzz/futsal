<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_book extends CI_Model {
    
	public function getAll()
	{
        $this->db->select('user.*,tb.id_booking');
        $this->db->from('tbl_booking as tb');
        $this->db->join('user as user',' user.id_user = tb.id_user','inner');
        // $this->db->where($username);
        $hasil = $this->db->get()->result();
        echo '<script>console.log('.json_encode($hasil).')</script>';
		// return $this->db->get()->result();
    }
    
    public function getBookingUser()
	{
        $this->db->select('user.username, tb.*');
        $this->db->from('tbl_booking as tb');
        $this->db->join('user as user',' user.id_user = tb.id_user','inner');
        // $this->db->where('tb.id_user', 1);
        $hasil = $this->db->get()->result();
        echo '<script>console.log('.json_encode($hasil).')</script>';
		// return $this->db->get()->result();
    }
}
