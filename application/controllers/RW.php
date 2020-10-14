<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class RW extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
		
	}

	function index()
	{
		akses_rw();
		$data = array(
			'content'	=> 'rw/index.php'
		);

		$this->load->view('template', $data);
	}

	function cari()
	{
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil")->row_array();
		$rt 		= $get_rt['rt'];

		$keyword 	= $this->input->get('cari');
		$this->db->like('nama_lengkap', $keyword);
		$this->db->or_like('no_ktp', $keyword);
		$this->db->select('*');
		$this->db->from('profil');
		//$this->db->where('rt', $rt);
		$q 			= $this->db->get();
		$s			= $this->db->count_all_results();
		
		$data 		= array(
			'content'	=> 'rw/hasil-cari.php',
			'hasil'		=> $q->result(),
			'kata'		=> $keyword
		);	

		$this->load->view('template', $data);
	}

	function keuangan()
	{
		akses_rw();
		$data 		= array(
			'content'	=> 'rw/keuangan.php'
		);

		$this->load->view('temp_data', $data);
	}

	function pendapatan()
	{
		akses_rw();
		$data = array(
			'content'	=> 'rw/pendapatan.php',
			'k'				=> $this->db->query("SELECT * from keuangan where peruntukan='Iuran RW' or jenis='pendapatan RW'")->result(),
			'sum'			=> $this->db->query("SELECT sum(nominal) AS total from keuangan where peruntukan='Iuran RW' or jenis='pendapatan RW'")->row_array()
		);

		$this->load->view('temp_data', $data);
	}

	function tambah_pendapatan()
	{
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'nama_item'	=> strip_tags($this->input->post('nama_item')),
			'rt' 		=> 'rw',
			'nominal'	=> $this->input->post('nominal'),
			'via'		=> $this->input->post('via'),
			'jenis'		=> 'pendapatan RW',
			'tgl'		=> date('Y-m-d', strtotime($this->input->post('tgl')))
		);

		$this->db->insert('keuangan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('RW/pendapatan/');
	}

	function pengeluaran()
	{
		akses_rw();
		$data = array(
			'content'	=> 'rw/pengeluaran.php',
			'k'				=> $this->db->query("SELECT * from keuangan where jenis='pengeluaran RW'")->result(),
			'sum'			=> $this->db->query("SELECT sum(nominal) AS total from keuangan where jenis='pengeluaran RW'")->row_array()
		);

		$this->load->view('temp_data', $data);	
	}

	function tambah_pengeluaran()
	{
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'nama_item'	=> strip_tags($this->input->post('nama_item')),
			'rt' 		=> 'rw',
			'nominal'	=> $this->input->post('nominal'),
			'via'		=> $this->input->post('via'),
			'jenis'		=> 'pengeluaran RW',
			//'peruntukan'=> $this->input->post('peruntukan'),
			'tgl'		=> date('Y-m-d H:i:s', strtotime($this->input->post('tgl')))
		);

		$this->db->insert('keuangan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('RW/pengeluaran/');
	}

	function laporan_keuangan()
	{
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'content'	=> 'rw/laporan.php',
			'k'			=> $this->db->query("SELECT * from laporan where rt='rw'")->result()
		);

		$this->load->view('temp_data', $data);
	}

	function tambah_laporan()
	{
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data = array(
			'rt'			=> 'rw',
			'nama_laporan'	=> strip_tags($this->input->post('nama_laporan')),
			'dari'			=> date('Y-m-d', strtotime($this->input->post('dari'))),
			'ke'			=> date('Y-m-d', strtotime($this->input->post('ke')))
		);

		$this->db->insert('laporan', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect('RW/laporan_keuangan');
	}

	function detail($id)
	{
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		//$cek 	= $this->db->query("SELECT * from laporan where rt='$rt'")->row_array();
		
		//$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data 	= array(
			'content'	=> 'rw/detail.php',
			'k'			=> $this->db->query("SELECT * from laporan where rt='rw' and id_laporan='$id'")->row_array(),
			'rt'		=> 'rw'
		);
	

		$this->load->view('temp_data', $data);
	}

	function statistik()
	{
		akses_rw();
		$agama 		= $this->db->query("SELECT agama from profil group by agama");
		$data = array(
			'content'	=> 'rw/statistik.php',
			//'rt'		=> $this->db->query("SELECT * from rt where id_rt='$id'")->row_array(),
				'w'			=> jml_warga_by_sex_rw('Wanita'),
				'p'			=> jml_warga_by_sex_rw('Pria'),
				//'id'		=> $id,
				'jml'		=> $this->db->query("SELECT * from profil ")->num_rows(),
				'jmlp'		=> $this->db->query("SELECT pendidikan from profil group by pendidikan")->num_rows(),
				'pn'		=> $this->db->query("SELECT pendidikan from profil group by pendidikan")->result(),
				'ag'		=> $agama->result(),
				'pk'		=> $this->db->query("SELECT pekerjaan from profil group by pekerjaan")->result()
		);

		$this->load->view('template', $data);
	}

	function pilih_rt()
	{
		akses_rw();
		$data = array(
			'content'	=> 'rw/pilihrt.php',
			'rt'		=> $this->db->get('rt')->result()
		);

		$this->load->view('template', $data);
	}

	function jadi_warga($id)
	{
		$data['role']	= 'warga';

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		redirect('RW/pilih_rt');
	}

	function jadi_ketua($id)
	{
		$data['role']	= 'Ketua';

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		redirect('RW/pilih_rt');
	}
}