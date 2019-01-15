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
		$data['page']= 'admin/home/listorder';
    $this->load-> view ('shared/admin/layout',$data);
  }
  
  public function verifikasi()
	{
		$data['title']="Verifikasi";
		$id_status = 1;
    $data['Booking'] = $this->book->GetBookingByLapanganAdmin($id_status);
    $data['Booking1'] = $this->book->GetBookingByLapanganAdmin1($id_status);
    $data['Booking2'] = $this->book->GetBookingByLapanganAdmin2($id_status);
    $data['page']= 'admin/home/verifikasi';
    $this->load->view('shared/admin/layout',$data);
  }
  
	public function updateBookByAdmin($id)
	{
	$status_booking = $this->input->post('status_booking');
			$data = array(
	      'status_booking'	=> 2,
	  );
		if ($this->book->updateStatusAdmin($id,$data)== "TRUE") {
        redirect('AdminHome/verifikasi');
      }

	}

  public function index (){
    $data['title']="dashboard";
    $data['page']= 'admin/home/dashboard';
    $this->load-> view ('shared/admin/layout',$data);
  }

}