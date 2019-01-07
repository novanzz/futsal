<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model(array(
      'Model_Admin'=> 'admin',
      'Model_Book'=> 'book',
    ));

		if ($this->session->level != "admin") {
			redirect('AdminAuth/login');
		}
  }

  public function logout()
  {
    $this->session->sess_destroy();
    echo "<script>alert('Terima kasih sudah berkunjung'); location = '".site_url('AdminAuth/login')."'</script>";
  }

  public function listorder ($no){
		$data['title']="List Order";
		$data['data'] = $this->book->alljadwal($no);
    $tanggal_booking = $this->input->post('tanggal');
    if($tanggal_booking == null){
      $tanggal_booking = date('y-m-d');
    }
		$data['lapangan_book'] = $no;
		$data['tgl_book'] = $tanggal_booking;
	  $data['Booking'] = $this->book->GetBookingByLapangan($no,$tanggal_booking);
		$data['no_lap'] = $no;
		$data['page']= 'user/home/listorder';
		$this->load-> view ('user/home/listorder',$data);
	}

	public function updateBookByAdmin($id)
	{
	$status_booking = $this->input->post('status_booking');
			$data = array(
	      'status_booking'	=> 2,
	  );
		if ($this->book->updateStatusAdmin($id,$data)== "TRUE") {
        redirect('UserHome/index');
      }

	}


  //Punya Admin?
  public function index (){
    $this->load-> view ('dashboard');
  }
  public function grafic (){
    $this->load-> view ('grafic');
  }
  public function alert (){
    $this->load-> view ('alert');
  }

  public function tampil(){
    $tampil['tampil'] = $this->ultras->tampil();
  }

}