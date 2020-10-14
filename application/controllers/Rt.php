<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Rt extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
		akses_admin();
	}

	function index()
	{
		$data 	= array(
			'content'	=> 'warga/rt.php',
			'rt'		=> $this->db->get('rt')->result()
		);

		$this->load->view('template', $data);
	}

	function tambah()
	{
		$data = array(
			'nama_rt'	=> $this->input->post('rt')
		);

		$this->db->insert('rt', $data);
		redirect('Rt');
	}
}