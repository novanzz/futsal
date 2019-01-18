<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserHome extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model(array(
      'Model_User'=> 'user',
      'Model_Book'=> 'book',
      'Model_Lapangan'=> 'lapangan',
    ));

		if ($this->session->level != "user") {
			redirect('UserAuth/login');
		}
  }
  
  public function about()
	{
		$data['title']="About";
		$data['page']= 'user/home/about';
		$this->load->view('shared/user/layout',$data);
  }
  
  //dummy
  public function aboutAct(){
    $tanggal = $this->input->post('tanggal');
    echo '<script>console.log('.json_encode($tanggal).')</script>';
    $data = array(
      'tanggal' 	=> $tanggal,
    );
    $success = $this->user->addDate($data);
  }

  //dummy view booking
  public function viewBooking($no){
    $data['title']="Booking Lapangan";
    $data['no_lap']=$no;
    $data['page']= 'user/home/postBook';
    $this->load->view('shared/user/layout',$data);
  }

  //dummy action booking
  public function postBooking(){
    $id_lapangan    = $this->input->post('id_lapangan');
    $id_user        = $this->input->post('id_user');
    $status_booking = 0 ;
    $tanggal_booking = $this->input->post('tanggal');
    $id_jadwal       = $this->input->post('id_jadwal');
    $id_jadwal1       = $this->input->post('id_jadwal1');
    $id_jadwal2      = $this->input->post('id_jadwal2');
    $waktu_expired  = $this->input->post('exp');
      $data = array(
        'id_lapangan'	=> $id_lapangan,
        'id_user'	    => $id_user,
        'status_booking'	=> $status_booking,
        'tanggal_booking'	=> $tanggal_booking,
        'id_jadwal'	=> $id_jadwal,
        'id_jadwal1'	=> $id_jadwal1,
        'id_jadwal2'	=> $id_jadwal2,
        'waktu_expired' => $waktu_expired,
      );
  
      $dataMatch = array(
        'id_lapangan'	=> $id_lapangan,
        'tanggal_booking'	=> $tanggal_booking,
      );
      
        $booking= $this->book->getAllBooking($dataMatch);
        if ($booking == true){
        foreach($booking as $book){
          // echo '<script>console.log('.json_encode($book).')</script>';
            if(($id_jadwal == $book->id_jadwal1)||($id_jadwal == $book->id_jadwal2)||($id_jadwal==$book->id_jadwal)){
              $agree = true;
              echo "<script>alert('Tanggal dan Jam Main Sudah di Booking');location='"
              .site_url('UserHome/viewBooking/'.$id_lapangan)."'</script>";
            }else if(($id_jadwal1 == $book->id_jadwal1)||($id_jadwal1 == $book->id_jadwal2)||($id_jadwal1==$book->id_jadwal)){
              $agree = true;
              echo "<script>alert('Tanggal dan Jam Main Sudah di Booking');location='"
              .site_url('UserHome/viewBooking/'.$id_lapangan)."'</script>";
            }else if(($id_jadwal2 == $book->id_jadwal2)||($id_jadwal2 == $book->id_jadwal1)||($id_jadwal2==$book->id_jadwal)){
              $agree = true;
              echo "<script>alert('Tanggal dan Jam Main Sudah di Booking');location='"
              .site_url('UserHome/viewBooking/'.$id_lapangan)."'</script>";
            }
          }
          if ($agree != true){
            echo "<script>alert('Booking Sukses');location='".site_url('UserHome/index')."'</script>";
            $this->book->addBook($data);
          }else{
            echo "<script>alert('Tanggal dan Jam Main Sudah di Booking');location='"
              .site_url('UserHome/viewBooking/'.$id_lapangan)."'</script>";
          }
        }else{
          $post = $this->book->addBook($data);
          echo "<script>alert('Booking Sukses');location='".site_url('UserHome/index')."'</script>";
        }
  }

  public function deleteBook($id_booking){
    $id =  $id_booking;
    if ($this->book->deleteBooking($id)== "TRUE") {
      redirect('UserHome/getBookingUser');
    }
  }

  //dummyGet Booking peruser
  public function getBookingUser(){
    $data['title']="Booking";
    $id= $this->session->id_user;
    $data['db_book']=$this->book->getBookUser($id);
    $data['db_book1']=$this->book->getBookUser1($id);
    $data['db_book2']=$this->book->getBookUser2($id);
    $data['page']= 'user/home/pembayaran';
    $this->load->view('shared/user/layout',$data);
  }

  //dummy
  public function selectBookbyId($id){
    // echo '<script>console.log('.json_encode($id).')</script>';
    
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg'; 

    $ko=$this->load->library('upload', $config);

    if(!$this->upload->do_upload('gambar')){
      echo "<script>alert('File Harus Gambar');location='".site_url()."/UserHome/getBookingUser'</script>";
    }else{
      $data = array(
        'status_booking'=> 1,
        'waktu_expired'=> 0,
        'bukti_bayar' => $this->upload->data('file_name'),
      );
      if ($this->book->updateStatus($id,$data)== "TRUE") {
        redirect('UserHome/getBookingUser');
      }
    }
    // $data['db_book']=$this->book->getBookUser($id);
    // $data['page']= 'user/home/dummyGetBook';
    // $this->load->view('shared/user/layout',$data);
  }

	public function logout()
  {
    $this->session->sess_destroy();
    echo "<script>alert('Terima kasih sudah berkunjung'); location = '".site_url('UserAuth/login')."'</script>";
  }

	public function index()
  {
    // $this->load->view('index');
    $data['title']="Home";
    $data['data'] = $this->lapangan->getAll();
    $data['page']= 'user/home/index';
    $this->load->view('shared/user/layout',$data);
  }

  //Berubah
  public function lapangan($no) 
  { 
    $data['title']="Lapangan"; 
    $tanggal_booking = $this->input->post('tanggal');
    if($tanggal_booking == null){
      date_default_timezone_set('Asia/Bangkok');
      $tanggal_booking = date('y-m-d');
    }
    // echo '<script>console.log('.json_encode($tanggal_booking).')</script>';
    $data['tgl_book'] =$tanggal_booking;
    // $data['data'] = $this->book->lap1($no);
    $data['lapangan_book'] = $no; 
    $data['data'] = $this->book->alljadwal($no);
		$data['Booking'] = $this->book->GetBookingByLapangan($no,$tanggal_booking);
    $data['no_lap'] = $no;
    $data['page']= 'user/home/lapangan1'; 
    $this->load->view('shared/user/layout',$data); 
  }

  public function sop (){
    $data['title']="SOP";
    $data['page']= 'user/home/sop';
    $this->load->view('shared/user/layout',$data);
  }

  public function profil(){
    $data['title']="Profil";
    $data['page']= 'user/home/profil';
    $this->load->view('shared/user/layout',$data);
  }
}