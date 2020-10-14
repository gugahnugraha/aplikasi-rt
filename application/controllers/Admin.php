<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
		
	}

	function index()
	{
		akses_admin();
		$data = array(
			'content'	=> 'admin/index.php'
		);

		$this->load->view('template', $data);
	}

	function setting()
	{
		akses_admin();
		$data = array(
			'content'	=> 'admin/setting.php'
		);

		$this->load->view('template', $data);
	}

	function update_setting()
	{
		$data = array(
			'komplek'	=> strip_tags($this->input->post('komplek')),
			'rw'		=> strip_tags($this->input->post('rw')),
			'kelurahan'	=> strip_tags($this->input->post('kelurahan')),
			'kecamatan'	=> strip_tags($this->input->post('kecamatan')),
			'kota'		=> strip_tags($this->input->post('kota')),
			'kode_pos'	=> strip_tags($this->input->post('kode_pos')),
			'provinsi'	=> strip_tags($this->input->post('provinsi'))
		);

		$this->db->where('id_set', 1);
		$this->db->update('setting', $data);
		$this->session->set_flashdata('sukses', 'Berhasil di Update');
		redirect('Admin/setting');
	}

	function logo()
	{
		$data = array(
			'content'	=> 'admin/logo.php',
			'l'			=> $this->db->query('SELECT * from setting')->row_array()
		);

		$this->load->view('template', $data);
	}

	function upload_logo()
	{
		$logo = $this->input->post('logo');
		$config['upload_path']		= './assets/upload/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']			= '5000';
			$config['file_name']		= 'logo';
			$this->load->library('upload',$config);

			$this->upload->do_upload('logo');
			$upload_data 				= array('uploads' => $this->upload->data());
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);

			$data = array(
				'logo'	=> $upload_data['uploads']['file_name']
			);

			$this->db->where('id_set', 1);
			$this->db->update('setting', $data);
			$this->session->set_flashdata('sukses','Upload Logo Berhasil');
			redirect('Admin/logo');
	}

	function user()
	{
		akses_admin();
		$q 		= $this->db->query("SELECT * from profil p, user u, rt r where p.no_ktp=u.no_ktp and p.rt=r.id_rt");
		$t 		= $this->db->query("SELECT * from profil p, user u, rt r where p.no_ktp=u.no_ktp and p.rt=r.id_rt and u.role='rw'");
		$data = array(
			'content'	=> 'admin/user.php',
			'w'			=> $q->result(),
			'rw'		=> $t->num_rows(),
			't'			=> $t->row_array()
		);

		$this->load->view('template', $data);
	}

	function jadikan_warga($id)
	{
		$data['role']	= 'warga';
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);

		redirect('Admin/user');
	}
	function jadikan_rw($id)
	{
		$data['role']	= 'rw';
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);

		redirect('Admin/user');
	}

	function warga()
	{
		akses_admin_rw();
		$data = array(
			'content' 		=> 'admin/warga.php',
			'r'				=> $this->db->get('rt')->result()
		);

		$this->load->view('temp_data', $data);
	}

	function tambah_warga()
	{
		$v 			= $this->input;
		$username	= strip_tags($v->post('username'));
		$id 		= $v->post('rt');
		$ktp 		= strip_tags($v->post('no_ktp'));
		$cek_user	= $this->db->query("SELECT username from user where no_ktp='$ktp'")->num_rows();

		if($cek_user > 0)
		{
			$this->session->set_flashdata('error', 'Nomor KTP sudah ada yang pakai, ganti dengan user lain!');
			redirect('Admin/warga');
		} else 
		{
		$data = array(
			'rt'			=> strip_tags($v->post('rt')),
			'no_ktp'		=> strip_tags($v->post('no_ktp')),
			'sex'			=> $v->post('sex'),
			'no_kontak'		=> strip_tags($v->post('no_kontak')),
			'nama_lengkap'	=> strip_tags($v->post('nama_lengkap')),
			'tgl_lahir'		=> date('Y-m-d', strtotime($v->post('tgl_lahir'))),
			'pendidikan'	=> $v->post('pendidikan'),
			'agama'			=> $v->post('agama'),
			'pekerjaan'		=> $v->post('pekerjaan'),
			'no_rumah'		=> strip_tags($v->post('no_rumah')),
			'hubungan'		=>'Kepala Keluarga',
			//'foto'			=> $upload_data['uploads']['file_name']
		);

		$user = array(
			'no_ktp'		=> strip_tags($v->post('no_ktp')),
			'username'		=> strip_tags($v->post('no_ktp')),
			'password'		=> md5($v->post('password')),
			'role'			=> 'warga',
			'status'		=> 1
		);

		$dokumen = array(
			'no_ktp' => $ktp
		);

		mkdir('./assets/upload/'.$ktp, 0755, true);

		$this->db->insert('profil', $data);
		$this->db->insert('user', $user);
		$this->db->insert('dokumen', $dokumen);
		$this->session->set_flashdata('sukses', 'Data Berhasil disimpan!');
		redirect('Admin/warga');
	}
	}
}