<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	function index(){
		
		$this->load->view('login');
		
		//$error ="";
	}

	function doLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$ceknum = $this->M_login->ceknum($username,md5($password))->num_rows();
		$key = $this->M_login->ceknum($username,md5($password))->row_array();
		
		if($ceknum > 0){
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('id_user',$key['id_user']);
			$this->session->set_userdata('role',$key['role']);
			$this->session->set_userdata('no_ktp',$key['no_ktp']);
			$data = array(
				'last_login' => date('Y-m-d H:i:s')
				);
			$this->M_login->last_login($this->session->userdata('id_user'), $data);
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Username atau Password salah!</div>');
			redirect('Auth');
		}
	}

	function logOut(){
		$this->session->unset_userdata('username');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('role');
			$this->session->unset_userdata('no_ktp');
		redirect('Auth');
	}
}