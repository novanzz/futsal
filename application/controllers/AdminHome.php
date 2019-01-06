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

  //Punya Admin?
  public function index (){
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