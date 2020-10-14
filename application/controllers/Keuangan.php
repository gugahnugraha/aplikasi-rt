<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Keuangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();

	}

	function index()
	{
		rt_bendahara();
		$data = array(
			'content'	=> 'keuangan/index.php'
		);

		$this->load->view('template', $data);
	}

	function pendapatan()
	{
		rt_bendahara();
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));

		$data 	= array(
			'content'		=> 'keuangan/pendapatan.php',
			'k'				=> $this->db->query("SELECT * from keuangan where jenis='pendapatan'")->result(),
			'sum'			=> $this->db->query("SELECT sum(nominal) AS total from keuangan where jenis='pendapatan' and rt='$rt'")->row_array()
		);

		$this->load->view('temp_data', $data);
	}

	function pengeluaran()
	{
		rt_bendahara();
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));

		$data 	= array(
			'content'		=> 'keuangan/pengeluaran.php',
			'k'				=> $this->db->query("SELECT * from keuangan where jenis='pengeluaran'")->result(),
			'sum'			=> $this->db->query("SELECT sum(nominal) AS total from keuangan where jenis='pengeluaran' and rt='$rt'")->row_array()
		);

		$this->load->view('temp_data', $data);
	}
	function tambah_pendapatan()
	{
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'nama_item'	=> strip_tags($this->input->post('nama_item')),
			'rt' 		=> $rt,
			'nominal'	=> $this->input->post('nominal'),
			'via'		=> $this->input->post('via'),
			'jenis'		=> 'pendapatan',
			'tgl'		=> date('Y-m-d H:i:s', strtotime($this->input->post('tgl')))
		);

		$this->db->insert('keuangan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('Keuangan/pendapatan/');
	}

	function tambah_pengeluaran()
	{
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'nama_item'	=> strip_tags($this->input->post('nama_item')),
			'rt' 		=> $rt,
			'nominal'	=> $this->input->post('nominal'),
			'via'		=> $this->input->post('via'),
			'jenis'		=> 'pengeluaran',
			'peruntukan'=> strip_tags($this->input->post('peruntukan')),
			'tgl'		=> date('Y-m-d H:i:s', strtotime($this->input->post('tgl')))
		);

		$this->db->insert('keuangan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('Keuangan/pengeluaran/');
	}

	function laporan()
	{
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'content'	=> 'keuangan/laporan.php',
			'k'			=> $this->db->query("SELECT * from laporan where rt='$rt'")->result()
		);

		$this->load->view('temp_data', $data);
	}

	function tambah_laporan()
	{
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'rt'			=> $rt,
			'nama_laporan'	=> strip_tags($this->input->post('nama_laporan')),
			'dari'			=> date('Y-m-d', strtotime($this->input->post('dari'))),
			'ke'			=> date('Y-m-d', strtotime($this->input->post('ke')))
		);

		$this->db->insert('laporan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('Keuangan/laporan');	
	}

	function detail($id)
	{
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$cek 	= $this->db->query("SELECT * from laporan where rt='$rt'")->row_array();
		
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data 	= array(
			'content'	=> 'keuangan/detail.php',
			'k'			=> $this->db->query("SELECT * from laporan where rt='$rt' and id_laporan='$id'")->row_array(),
			'rt'		=> $rt
		);
	

		$this->load->view('temp_data', $data);
	}
}