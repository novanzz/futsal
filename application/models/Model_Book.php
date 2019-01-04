<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_book extends CI_Model {
    
	public function getAll()
	{
        $this->db->select('user.*,tb.*');
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

    public function getAllBooking($data){
        $query = $this->db->get_where('tbl_booking',$data);
		return $query->row();
    }

    public function addBook($data){
        $this->db->insert('tbl_booking',$data);
        return $this->db->affected_rows();

    }

    public function alljadwal($no)
     {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        // $hasil = $this->db->get()->result();
        // echo '<script>console.log('.json_encode($hasil).')</script>';
        return $this->db->get()->result();
    }

    //berubah
    public function GetBookingByLapangan($no,$tanggal_booking)
     {
        $this->db->select('user.*,tb.*');
        $this->db->from('tbl_booking as tb');
        $this->db->join('user as user',' user.id_user = tb.id_user','inner');
        $this->db->where('tb.id_lapangan',$no);
        $this->db->where('tb.tanggal_booking',$tanggal_booking);
        // $hasil = $this->db->get()->result();
        // echo '<script>console.log('.json_encode($hasil).')</script>';
        return $this->db->get()->result();
    }


    //berubah
    public function lap1($no) 
     { 
        $this->db->select('user.*,tb.*'); 
        $this->db->from('tbl_booking as tb'); 
        $this->db->join('user as user',' user.id_user = tb.id_user','inner'); 
        $this->db->where('tb.id_lapangan',$no); 
        // $hasil = $this->db->get()->result(); 
        // echo '<script>console.log('.json_encode($hasil).')</script>'; 
        return $this->db->get()->result(); 
    }

    //get book user
    public function getBookUser($id){
        $this->db->select('user.*,tb.*'); 
        $this->db->from('tbl_booking as tb'); 
        $this->db->join('user as user',' user.id_user = tb.id_user','inner'); 
        $this->db->where('user.id_user',$id); 
        // $hasil = $this->db->get()->result(); 
        // echo '<script>console.log('.json_encode($hasil).')</script>'; 
        return $this->db->get()->result(); 
    }
}
