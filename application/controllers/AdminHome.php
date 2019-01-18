<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model(array(
      'Model_Admin'=> 'admin',
      'Model_Book'=> 'book',
      'Model_Lapangan'=> 'lapangan',
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
    $data['header'] = $this->lapangan->getAll();

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
    $data['header'] = $this->lapangan->getAll();

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

  public function index(){
    $data['header'] = $this->lapangan->getAll();

    $data['title']="Tambah Lapangan";
    $data['data'] = $this->lapangan->getAll();
    $data['header'] = $this->lapangan->getAll();
    $data['page']= 'admin/home/lapangan';
    $this->load-> view ('shared/admin/layout',$data);
  }

  public function tambahLapangan (){
    $data['header'] = $this->lapangan->getAll();

    $data['title']="Tambah Lapangan";
    $data['page']= 'admin/home/addLap';
    $this->load-> view ('shared/admin/layout',$data);
  }

  public function postLap (){
    $config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('url')){
			echo "<script>alert('File gambar bermasalah');location='".site_url()."AdminHome/tambahLapangan'</script>";
		}else{
      $data = array(
        'nama_lapangan'	=>$this->input->post('nama_lapangan'),
        'url'	    => $this->upload->data('file_name'),
      );
      $dataMatch = array(
        'nama_lapangan'	=>$this->input->post('nama_lapangan'),
      );
      $add= $this->lapangan->getLap1($dataMatch);
      if ($add == true){
        echo "<script>alert('Lapangan sudah ada');location='"
        .site_url('AdminHome/tambahLapangan')."'</script>";
      }else{
        $post = $this->lapangan->addLap($data);
        echo "<script>alert('Berhasil tambah lapangan');location='".site_url('AdminHome/index')."'</script>";
      }
	  }
  }

  public function updateLap ($id){
    $data['header'] = $this->lapangan->getAll();

    $data['title']="Update Lapangan";
    $data['id']=$id;
    $data['data']=$this->lapangan->getLap($id);
    $data['page']= 'admin/home/updateLap';
    $this->load-> view ('shared/admin/layout',$data);
  }

  public function editLap ($id){
    $config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('url')){
			echo "<script>alert('File gambar bermasalah');location='".site_url()."AdminHome/index/'</script>";
		}else{
      $data = array(
        'nama_lapangan'	=>$this->input->post('nama_lapangan'),
        'url'	    => $this->upload->data('file_name'),
      );
      if ($this->lapangan->updateLap($id,$data)== "TRUE") {
        redirect('AdminHome/index');
      }
    }
	}

  public function delLap ($id){
    $_id =  $id;
    if ($this->lapangan->delLap($_id)== "TRUE") {
      redirect('AdminHome/index');
    }
  }
}