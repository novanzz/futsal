<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserHome extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model(array(
      'Model_User'=> 'user',
      'ultras' => 'ultras',
      'Model_Book'=> 'book',
    ));

		if ($this->session->level != "user") {
			redirect('UserAuth/login');
		}
  }
  
  public function about()
	{
		$data['title']="About";
		$data['page']= 'user/home/about';
		$this->load->view('shared/layout',$data);
  }
  
  public function aboutAct(){
    $tanggal = $this->input->post('tanggal');
    echo '<script>console.log('.json_encode($tanggal).')</script>';
    $data = array(
      'tanggal' 	=> $tanggal,
    );
    $success = $this->user->addDate($data);
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
    $data['page']= 'user/home/index';
    $this->load->view('shared/layout',$data);
  }

  public function lapangan1()
  {
    
    // $data = array('booking' => $this->ultras->list());
    $data['title']="Lapangan 1";
    $data['data'] = $this->book->getAll();
    // $data['page']= 'user/home/lapangan1';
    // $this->load->view('shared/layout',$data);
  }

  public function lapangan2()
  {
    $data = array('booking' => $this->ultras->list());
    $data['title']="Lapangan 2";
    $data['page']= 'user/home/lapangan2';
    $this->load->view('shared/layout',$data);
  }

  public function lapangan3()
  {
    $data = array('lapangan3' => $this->ultras->list());
    $data['title']="Lapangan 3";
    $data['page']= 'user/home/lapangan3';
    $this->load->view('shared/layout',$data);
  }

  public function lapangan4(){
    $data = array('lapangan4' => $this->ultras->list());
    $data['title']="Lapangan 4";
    $data['page']= 'user/home/lapangan4';
    $this->load->view('shared/layout',$data);
  }

  public function lapangan5(){
    $data = array('lapangan5' => $this->ultras->list());
    $data['title']="Lapangan 5";
    $data['page']= 'user/home/lapangan5';
    $this->load->view('shared/layout',$data);
  }

  public function lapangan6(){
    $data = array('lapangan6' => $this->ultras->list());
    $data['title']="Lapangan 6";
    $data['page']= 'user/home/lapangan6';
    $this->load->view('shared/layout',$data);
  }

  public function pembayaran(){
    $data['title']="Pembayaran";
    $data['page']= 'user/home/pembayaran';
    $this->load->view('shared/layout',$data);
  }

  public function sop (){
    $data['title']="SOP";
    $data['page']= 'user/home/sop';
    $this->load->view('shared/layout',$data);
  }

  public function profil(){
    $data['title']="Profil";
    $data['page']= 'user/home/profil';
    $this->load->view('shared/layout',$data);
  }

  public function edit (){
    $data['title']="Edit Profil";
    $data['page']= 'user/home/edit';
    $this->load->view('shared/layout',$data);
  }

  public function bookings(){
    if($this->input->method()=='post') {
      $insert1 = $this->ultras->kwitansi(array(
        'id_user' => $this->input->post('id_user'),
        'id_status' => $this->input->post('id_status')
      ));
      $insert = $this->ultras->pesan(array(
        'id_kwitansi' => $insert1,
        // 'jam_mulai' => $this->input->post('jam_mulai'),
        // 'jam_selesai' => $this->input->post('jam_selesai'),
        // 'tanggal_main' => $this->input->post('tgl_main'),
        'nama_pemesan' => $this->input->post('nama_pemesan'),
        'nama_tim' =>$this->input->post('nama_tim'),
        // 'lapangan' => $this->input->post('lapangan'),
        'alamat' => $this->input->post('alamat'),
        'tlp' => $this->input->post('tlp')
      ));
      $insert = $this->ultras->pesan1(array(
        'id_kwitansi' => $insert1,
        'jam_mulai' => $this->input->post('jam_mulai'),
        'jam_slesai' => $this->input->post('jam_selesai'),
        'id_lapangan' => $this->input->post('id_lapangan'),
        'tanggal_main' => $this->input->post('tgl_main')
      ));
      $insert = $this->ultras->pembayaran(array(
        'id_kwitansi' => $insert1
      ));
      if($insert1 && $insert) {
      echo "sukses";
      redirect('user/pembayaran');
      }else{
        echo"Failed Add User";
      }
    }
  }

  //Punya Admin?
  public function dashboard (){
    $this->load-> view ('dashboard');
  }
  public function listorder (){
    $this->load-> view ('listorder');
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