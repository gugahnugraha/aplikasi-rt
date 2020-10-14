<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
	}

	function index()
	{	
		$get_rt = get_rt_by_ktp($this->session->userdata('no_ktp'));
		$data 			= array(
			'content'	=> 'dashboard/index.php',
			'test'		=> $this->db->query("SELECT no_urut from surat where rt='$get_rt' ORDER BY no_urut DESC LIMIT 1")->row_array()
		);

		$this->load->view('template', $data);
	}

	function ajukan_surat()
	{
		
		$get_rt = get_rt_by_ktp($this->session->userdata('no_ktp'));
		$user 	= $this->session->userdata('no_ktp');
		$no_urut = $this->db->query("SELECT no_urut from surat where rt='$get_rt' ORDER BY no_urut DESC LIMIT 0")->row_array();
		$data = array(
			'rt'			=> $get_rt,
			'dari'			=> $this->session->userdata('no_ktp'),
			'perihal'		=> $this->input->post('perihal'),
			'tgl_pengajuan'	=> date('Y-m-d'),
			//'no_urut'		=> $this->input->post('no_urut'),
			'keperluan'		=> strip_tags($this->input->post('keperluan'))
		);

				  $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = email_set('email',$get_rt);
        $config['smtp_pass'] = email_set('pass_email',$get_rt);
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
		   //  //memanggil library email dan set konfigurasi untuk pengiriman email
		   
		    $this->email->initialize($config);
		    //konfigurasi pengiriman
		    $list = array(email_warga($user),email_set('email',$get_rt));
		    $this->email->from(email_set('email',$get_rt),'Sistem Pengajuan Surat RT'.$get_rt);
		    $this->email->to($list);
		    $this->email->subject("Pengajuan Surat Baru dari ".get_name($this->session->userdata('no_ktp'),'nama_lengkap'));
		    $this->email->message(
		     "<center>Pengajuan Surat Baru dari<br>
		     
		     Nama : ".get_name($this->session->userdata('no_ktp'),'nama_lengkap')."<br>
		     Perihal : ".$this->input->post('perihal')."</center>"
		    );
		       if($this->email->send())
		    {
		      

		$this->session->set_flashdata('sukses','Pengajuan anda telah kami terima, harap menunggu dan cek selalu status surat anda!');
		$this->db->insert('surat', $data);
		redirect('Home');
	} else {
		$this->session->set_flashdata('error','Pengajuan surat anda berhasil di kirim, tapi pengiriman notifikasi ke email gagal');
		$this->db->insert('surat', $data);
		redirect('Home');
	}
	}

	function status_pengajuan()
	{
		$get_rt = get_rt_by_ktp($this->session->userdata('no_ktp'));
		$dari 	= $this->session->userdata('no_ktp');
		$data = array(
			'content'	=> 'dashboard/surat.php',
			's'			=> $this->db->query("SELECT * from surat where rt='$get_rt' and dari='$dari'")->result()
		);

		$this->load->view('template', $data);
	}

	function iuran()
	{
		$this->load->model('M_konfirmasi');
		
		$get_rt = get_rt_by_ktp($this->session->userdata('no_ktp'));
		 
		$data = array(
			'content'	=> 'dashboard/iuran.php',
			'i'			=> $this->db->query("SELECT * from buat_iuran")->result(),
			
			'ktp'		=> $this->session->userdata('no_ktp')
		);

		$this->load->view('template', $data);
	}

	function bayar_iuran($id)
	{
		$data = array(
			'content' 	=> 'dashboard/bayar_iuran.php',
			'i'			=> $this->db->query("SELECT * from buat_iuran where id_b_iuran='$id'")->row_array(),
			'id'		=> $id
		);

		$this->load->view('template', $data);
	}

	function bayarkan()
	{
		$ktp 	= $this->session->userdata('no_ktp');
		$id 	= $this->input->post('id');
		$rt 	= get_rt_by_ktp($this->session->userdata('no_ktp'));
		$config['upload_path']		= './assets/upload/'.$ktp.'/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']			= '5000';
			$config['file_name']		= $ktp.'_buktiIuran';
			$this->load->library('upload',$config);

			$this->upload->do_upload('bukti');
			$upload_data 				= array('uploads' => $this->upload->data());
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/'.$ktp.'/'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);
		$data = array(
			'id_b_iuran' 	=> $this->input->post('id_b_iuran'),
			'no_ktp'		=> $this->session->userdata('no_ktp'),
			'besaran'		=> $this->input->post('besaran'),
			'via'			=> $this->input->post('via'),
			'tgl_bayar'		=> date('Y-m-d H:i:s'),
			'status'		=> $this->input->post('status'),
			'bukti'		=> $upload_data['uploads']['file_name']
		);

		$pendapatan = array(
			'rt'		=> $rt,
			'nama_item'	=> 'Iuran Bulanan dari '.$this->session->userdata('no_ktp'),
			'nominal'	=> $this->input->post('besaran'),
			'jenis'		=> 'pendapatan',
			'via'		=> $this->input->post('via'),
			'tgl'		=> date('Y-m-d'),
			//'bukti'		=> $upload_data['uploads']['file_name']
		);

		$this->db->insert('keuangan', $pendapatan);
		$this->db->where('id_b_iuran', $id);
		$this->db->insert('iuran', $data);
		$this->session->set_flashdata('sukses','Iuran berhasil dibayarkan');
		redirect('Home/iuran/');
	}

	function update_password()
	{
		$data = array(
			'content'	=> 'dashboard/gantipass.php'
		);

		$this->load->view('template', $data);
	}

	function updatePass()
	{
		$id 				 = $this->session->userdata('id_user');
		$data['password']	 = md5($this->input->post('password'));

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('sukses','Password berhasil di update');
		redirect('Home/update_password');
	}

	function statistik($id)
	{
		// rt_sekretaris_warga();
		$profil 	= $this->db->get('profil')->row_array();
		$ktp		= $this->session->userdata('no_ktp');
		$get_rt 	= $this->db->query("SELECT * from profil where no_ktp='$ktp' and status='Aktif'")->row_array();
		//$agama 		= $this->db->query("SELECT agama from profil where rt='$id' group by agama");
		$status_tinggal 		= $this->db->query("SELECT status_tinggal from profil where rt='$id' group by status_tinggal");


		if ($id == $get_rt['rt']) {
			$data = array(
				'profil'	=> $get_rt,
				'content'	=> 'panel/statistik.php',
				'rt'		=> $this->db->query("SELECT * from rt where id_rt='$id' ")->row_array(),
				'w'			=> jml_warga_by_sex($get_rt['rt'], 'Perempuan'),
				'p'			=> jml_warga_by_sex($get_rt['rt'], 'Laki-laki'),
				'id'		=> $id,
				'jml'		=> $this->db->query("SELECT * from profil where rt='$id' and status='Aktif'")->num_rows(),
				'kepk'		=> $this->db->query("SELECT * from profil where rt='$id' and hubungan='Kepala Keluarga' and status='Aktif'")->num_rows(),
				'jmlp'		=> $this->db->query("SELECT pendidikan from profil where rt='$id' and status='Aktif' group by pendidikan")->num_rows(),
				'pn'		=> $this->db->query("SELECT pendidikan from profil where rt='$id' and status='Aktif' group by pendidikan")->result(),

				'status_tinggal'		=> $status_tinggal->result(),
				'pk'		=> $this->db->query("SELECT pekerjaan from profil where rt='$id' and status='Aktif' group by pekerjaan")->result(),
			);

			$this->load->view('template', $data);
		} else {
			$data = array(
				'content'	=> 'false.php'
			);
			$this->load->view('template', $data);
		}
	}
}