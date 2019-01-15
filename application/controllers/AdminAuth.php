<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class AdminAuth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Model_Admin'=> 'admin'
        ));
    }

    public function index()
    {
		$data['title']="Login";
		$this->load->view('admin/auth/login',$data);

    }

	public function register()
    {
    	$config = array(
    		array(
    			'field'	=> 'username',
    			'label'	=> 'Username',
    			'rules'	=> 'trim|required|is_unique[admin.username]',
    			'errors' => array(
    				'required'		=> '%s harus diisi',
					'min_length[5]'	=> 'Panjang %s harus lebih dari 5',
					'is_unique'		=> '%s sudah digunakan'
    			)
    		),
    		array(
    			'field'	=> 'password',
    			'label'	=> 'Password',
    			'rules'	=> 'required',
                'errors' => array(
                    'required'      => '%s harus diisi',
                    'min_length[5]' => 'Panjang %s harus lebih dari 5'
                )
    		),
    		array(
    			'field'	=> 'repassword',
    			'label'	=> 'Re-Password',
				'rules'	=> 'required|matches[password]',
				'errors' => array(
                    'required'      => '%s harus diisi',
                    'matches' 		=> '%s tidak sama'
                )
			),
    	);
    	$this->form_validation->set_rules($config);

    	if($this->form_validation->run() == false){
            $data['title']="Registerasi";
            $this->load->view('admin/auth/register',$data);
    	}else{
			$username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $level      = "admin";
    		$data = array(
    			'username' 	=> $username,
    			'password' 	=> md5($password),
                'level'     => $level,
    		);
    		$admin_id = $this->admin->addAdmin($data);
    		if($admin_id > 0){
    			$sessionData = array(
    				'username' 	=> $this->input->post('username'),
    				'id'		=> $admin_id,
					'isLogin'	=> true,
					'level'     => $level
    			);
    			$this->session->set_userdata($sessionData);
                 echo "<script>alert('Registerasi berhasil.. Selamat Datang $username');location='".site_url('AdminHome/index')."'</script>";
    		}
    	}
        
    }

    public function login()
    {
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	if($this->form_validation->run() == false){

    		$data['title']="Login";
            $this->load->view('admin/auth/login',$data);

    	}else{
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$data = array(
	    		'username'	=> $username,
	    		'password'	=> md5($password)
	    	);
			$admin = $this->admin->getAdmin($data);
	    	if($admin == true){
	    		$sessionData = array(
						'username' 	=> $username,
						'id'	=> $admin->id,
						'isLogin'	=> true,
						'level'     => $admin->level
	    			);
	    		$this->session->set_userdata($sessionData);
                echo "<script>alert('selamat datang $username');location='".site_url('AdminHome/index')."'</script>";
	    	}else{
	    		$this->session->set_flashdata('failLogin', 'Username atau Password salah');
	    		redirect('AdminAuth/login');
	    	}
    	}
    }

}