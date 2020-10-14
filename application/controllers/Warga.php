<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Warga extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
	}

	function index()
	{
		//akses_terbatas();
		$profil 	= $this->db->get('profil')->row_array();
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil where no_ktp='$ktp'")->row_array();


		
			$data = array(
				'profil'	=> $get_rt,
				'content'	=> 'warga/index.php',
				'rt'		=> $this->db->query("SELECT * from rt where id_rt='5'")->row_array(),
				'w'			=> $this->db->query("SELECT * from profil p, user u where p.no_ktp=u.no_ktp and p.rt='5' and p.status='Aktif' order by no_rumah asc")->result(),
				// 'id'		=> $id,
				'jml'		=> $this->db->query("SELECT * from profil where rt='5' and status='Aktif'")->num_rows()
			);

			$this->load->view('temp_data', $data);
		
		// } else {
		// 	$data = array(
		// 		'content'	=> 'false.php'
		// 	);
		// 	$this->load->view('template', $data);
		// }
		
		// $data = array(
		// 	'content' 		=> 'warga/index.php'
		// );

		// $this->load->view('template', $data);
	}

	function kepalakeluarga()
	{
		//akses_terbatas();
		$profil 	= $this->db->get('profil')->row_array();
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil where no_ktp='$ktp'")->row_array();



		$data = array(
			'profil'	=> $get_rt,
			'content'	=> 'warga/kepalakeluarga.php',
			'rt'		=> $this->db->query("SELECT * from rt where id_rt='5'")->row_array(),
			'w'			=> $this->db->query("SELECT * from profil p, user u where p.hubungan='Kepala Keluarga' and p.no_ktp=u.no_ktp and p.rt='5' and p.status='Aktif' order by no_rumah asc")->result(),
			// 'id'		=> $id,
			'jml'		=> $this->db->query("SELECT * from profil where rt='5' and hubungan='Kepala Keluarga' and rt='5' and status='Aktif'")->num_rows()
		);

		$this->load->view('temp_data', $data);

		// } else {
		// 	$data = array(
		// 		'content'	=> 'false.php'
		// 	);
		// 	$this->load->view('template', $data);
		// }

		// $data = array(
		// 	'content' 		=> 'warga/index.php'
		// );

		// $this->load->view('template', $data);
	}

	function tambah()
	{

	}

	function cari()
	{
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil where no_ktp='$ktp' and status = 'Aktif'")->row_array();
		$rt 		= $get_rt['rt'];

		$keyword 	= $this->input->get('cari');
		$this->db->like('nama_lengkap', $keyword);
		$this->db->or_like('no_ktp', $keyword);
		$this->db->or_like('no_rumah', $keyword);
		$this->db->select('*');
		$this->db->from('profil');
		//$this->db->where('rt', $rt);
		$q 			= $this->db->get();
		$s			= $this->db->count_all_results();

		$data 		= array(
			'content'	=> 'panel/hasil-cari.php',
			'hasil'		=> $q->result(),
			'kata'		=> $keyword
		);

		$this->load->view('template', $data);
	}

	

	function rt($id)
	{
		akses_ketua_rt();
		$profil 	= $this->db->get('profil')->row_array();
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil where no_ktp='$ktp'")->row_array();

		if($id == $get_rt['rt'])
		{
			$data = array(
				'profil'	=> $get_rt,
				'content'	=> 'warga/daftar_warga.php',
				'rt'		=> $this->db->query("SELECT * from rt where id_rt='$id'")->row_array()
			);

			$this->load->view('temp_data', $data);
		} else {
			$data = array(
				'content'	=> 'false.php'
			);
			$this->load->view('template', $data);
		}
	}

	function profil($id)
	{
		$get_ktp		= $this->db->query("SELECT no_ktp from profil")->row_array();
		$nokk 			= $this->db->query("SELECT nokk from profil where no_ktp='$id'")->row_array();
		$get_no			= $nokk['nokk'];
		$hubungan 		= $this->db->query("SELECT no_parent from hubungan where no_child='$id'")->row_array();
		$parent 		= $this->session->userdata('nokk');

		if($this->session->userdata('no_ktp') === $id)
		{
			$data = array(
			'content' 	=> 'warga/profil.php',
			'p'			=> $this->db->query("SELECT * from profil where no_ktp='$id'")->row_array(),
			'hub'		=> $this->db->query("SELECT * from profil where nokk='$get_no' and not (no_ktp='$id')")->result(),
			'dok'		=> $this->db->query("SELECT * from dokumen where no_ktp='$id'")->row_array()
		);

		$this->load->view('temp_data', $data);
	} else if($this->session->userdata('role')==='Ketua' or $this->session->userdata('role')==='Sekretaris' or $this->session->userdata('role')==='rw' or $this->session->userdata('role')==='admin')
	{
		$data = array(
			'content' 	=> 'warga/profil.php',
			'p'			=> $this->db->query("SELECT * from profil where no_ktp='$id'")->row_array(),
			'hub'		=> $this->db->query("SELECT * from profil where nokk='$get_no' and not (no_ktp='$id')")->result(),
			'dok'		=> $this->db->query("SELECT * from dokumen where no_ktp='$id'")->row_array()
		);

		$this->load->view('temp_data', $data);
	} 
	else
	{
		$data = array(
				'content'	=> 'false.php'
			);
			$this->load->view('temp_data', $data);
	}
		
	}

	function upload_ktp()
	{
		$ktp = $this->input->post('no_ktp');
			$config['upload_path']		= './assets/upload/'.$ktp.'/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']			= '5000';
			$config['file_name']		= $ktp.'_ktp';
			$this->load->library('upload',$config);

			$this->upload->do_upload('ktp');
			$upload_data 				= array('uploads' => $this->upload->data());
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/'.$ktp.'/'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);

			$data = array(
				'foto_ktp'	=> $upload_data['uploads']['file_name']
			);

			$this->db->where('no_ktp', $ktp);
			$this->db->update('dokumen', $data);
			$this->session->set_flashdata('sukses','Upload KTP Berhasil');

			redirect('Warga/profil/'.$ktp);
	}

	function upload_kk()
	{
		$ktp = $this->input->post('no_ktp');
			$config['upload_path']		= './assets/upload/'.$ktp.'/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']			= '5000';
			$config['file_name']		= $ktp.'_kk';
			$this->load->library('upload',$config);

			$this->upload->do_upload('kk');
			$upload_data 				= array('uploads' => $this->upload->data());
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/'.$ktp.'/'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);

			$data = array(
				'foto_kk'	=> $upload_data['uploads']['file_name']
			);

			$this->db->where('no_ktp', $ktp);
			$this->db->update('dokumen', $data);
			$this->session->set_flashdata('sukses','Upload KK Berhasil');

			redirect('Warga/profil/'.$ktp);
	}

	function tambah_keluarga()
	{
		$v 		= $this->input;
		$ktp 	= $v->post('no_parent');
		$child 	= $v->post('no_ktp');
		$ck_ktp = $this->db->query("SELECT no_ktp from profil where no_ktp='$child'")->num_rows();
		if($ck_ktp > 0)
		{
			$this->session->set_flashdata('error','NIK sudah terdaftar');
			redirect('Warga/profil/'.$ktp);
		} 
		else {
		$profil = array(
			'rt'				=> strip_tags($v->post('rt')),
			'no_ktp'			=> strip_tags($v->post('no_ktp')),
			'sex'				=> $v->post('sex'),
			'no_kontak'			=> strip_tags($v->post('no_kontak')),
			'tempat_lahir'		=> strip_tags($v->post('tempat_lahir')),
			'nama_lengkap'		=> strip_tags($v->post('nama_lengkap')),
			'tgl_lahir'			=> date('Y-m-d', strtotime($v->post('tgl_lahir'))),
			'pendidikan'		=> $v->post('pendidikan'),
			'marital'			=> $v->post('marital'),
			'nokk'				=> $v->post('nokk'),
			'agama'				=> $v->post('agama'),
			'pekerjaan'			=> $v->post('pekerjaan'),
			'email_warga'		=> $v->post('email_warga'),
			'no_rumah'			=> strip_tags($v->post('no_rumah')),
			'status_tinggal'	=> $v->post('status_tinggal'),
			'status'			=> $v->post('status'),
			'hubungan'			=> $v->post('hubungan')
		);

		$user = array(
			'username'			=> strip_tags($v->post('no_ktp')),
			'password'		=> md5(strip_tags($v->post('no_ktp'))),
			'no_ktp'		=> strip_tags($v->post('no_ktp')),
			'role'			=> 'warga',
			'status'		=> 1
		);

		$hubungan = array(
			'no_parent'	=> $v->post('no_parent'),
			'no_child'	=> strip_tags($v->post('no_ktp'))
			
		);

		$dokumen = array(
			'no_ktp'	=> $child
		);

		$this->db->insert('profil', $profil);
		$this->db->insert('hubungan', $hubungan);
		$this->db->insert('dokumen', $dokumen);
		$this->db->insert('user', $user);
		
			mkdir('./assets/upload/'.$child, 0755, true);
		
		$this->session->set_flashdata('sukses','Data Berhasil Disimpan');
		redirect('Warga/profil/'.$ktp);
	}
	}

	function edit($id)
	{
		$get_ktp		= $this->db->query("SELECT no_ktp from profil")->row_array();
		$no_rumah 		= $this->db->query("SELECT no_rumah from profil where no_ktp='$id'")->row_array();
		$nokk 			= $this->db->query("SELECT nokk from profil where no_ktp='$id'")->row_array();
		$get_no			= $no_rumah['no_rumah'];
		$get_nokk		= $nokk['nokk'];
		$hubungan 		= $this->db->query("SELECT no_parent from hubungan where no_child='$id'")->row_array();
		$parent 		= $this->session->userdata('no_ktp');

		if($parent === $id or $this->session->userdata('role')==='Ketua' or $this->session->userdata('role')==='Sekretaris' or $hubungan['no_parent'] === $parent or $this->session->userdata('role')=='admin')
		{
			$data = array(
			'content' 	=> 'warga/edit_data.php',
			'p'			=> $this->db->query("SELECT * from profil where no_ktp='$id'")->row_array(),
			'hub'		=> $this->db->query("SELECT * from profil where nokk='$get_nokk' and not (no_ktp='$id')")->result(),
			'rt'		=> $this->db->get('rt')->result()
		);

		$this->load->view('temp_data', $data);
	} else
	{
		$data = array(
				'content'	=> 'false.php'
			);
			$this->load->view('template', $data);
	}
	}

	function ganti_rt($id)
	{
		$get_ktp		= $this->db->query("SELECT no_ktp from profil")->row_array();
		$no_rumah 		= $this->db->query("SELECT no_rumah from profil where no_ktp='$id'")->row_array();
		$nokk 			= $this->db->query("SELECT nokk from profil where no_ktp='$id'")->row_array();
		$get_nokk		= $nokk['nokk'];
		$hubungan 		= $this->db->query("SELECT no_parent from hubungan where no_child='$id'")->row_array();
		$parent 		= $this->session->userdata('no_ktp');

		if($this->session->userdata('role')=='admin' or $this->session->userdata('role')=='rw')
		{
			$data = array(
			'content' 	=> 'warga/ganti_rt.php',
			'p'			=> $this->db->query("SELECT * from profil where no_ktp='$id'")->row_array(),
			'hub'		=> $this->db->query("SELECT * from profil where nokk='$get_nokk' and not (no_ktp='$id')")->result(),
			'rt'		=> $this->db->get('rt')->result()
		);

		$this->load->view('temp_data', $data);
	} else
	{
		$data = array(
				'content'	=> 'false.php'
			);
			$this->load->view('template', $data);
	}
	}

	function update_rt()
	{
		$no_ktp = $this->input->post('no_ktp');
		$data['rt'] = $this->input->post('rtnya');

		$this->db->where('no_ktp', $no_ktp);
		$this->db->update('profil', $data);

		$this->session->set_flashdata('sukses', 'Ganti RT Berhasil');
		redirect('Warga/profil/'.$no_ktp);
	}

	function update()
	{
		$v 		= $this->input;
		$ktp 	= $v->post('no_parent');
		$profil = array(
			
			'no_ktp'			=> strip_tags($v->post('no_ktp')),
			'sex'				=> $v->post('sex'),
			'no_kontak'			=> strip_tags($v->post('no_kontak')),
			'nama_lengkap'		=> strip_tags($v->post('nama_lengkap')),
			'tempat_lahir'		=> strip_tags($v->post('tempat_lahir')),
			'tgl_lahir'			=> date('Y-m-d', strtotime($v->post('tgl_lahir'))),
			'pendidikan'		=> $v->post('pendidikan'),
			'agama'				=> $v->post('agama'),
			'pekerjaan'			=> $v->post('pekerjaan'),
			'email_warga'		=> $v->post('email_warga'),
			'marital'			=> $v->post('marital'),
			'nokk'				=> $v->post('nokk'),
			'hubungan'			=> $v->post('hubungan'),
			'status_tinggal'	=> $v->post('status_tinggal'),
			'status'			=> $v->post('status'),
			'no_rumah'			=> strip_tags($v->post('no_rumah'))
		);

		$this->db->where('no_ktp', $ktp);
		$this->db->update('profil', $profil);
		$this->session->set_flashdata('sukses', 'Data Berhasil di Update');
		redirect('Warga/edit/'.$ktp);		
	}

	function wargaa($id)
	{
		
	}
}