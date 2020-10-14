<?php

function email_set($key, $rt)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from rt where id_rt='$rt'")->row_array();

	return $q[$key];	
}

function get_ketua($rt)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from user u, profil p where u.no_ktp=p.no_ktp and p.rt='$rt' and u.role='Ketua'  and p.status='Aktif'");

	return $q;
}

function logo()
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT logo from setting")->row_array();

	return base_url('assets/upload/'.$q['logo']);
}

function file_logo()
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT logo from setting")->row_array();

	return $q['logo'];
}

function get_warga($rt)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from user u, profil p where u.no_ktp=p.no_ktp and p.rt='$rt' and u.role='warga'");

	return $q;
}
function get_pengurus_rt($rt,$role)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from user u, profil p where u.no_ktp=p.no_ktp and p.rt='$rt' and u.role='$role'");

	return $q;
}
function nama_ketua($rt,$show)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from user u, profil p where u.no_ktp=p.no_ktp and p.rt='$rt' and u.role='Ketua'  and p.status='Aktif'")->row_array();

	return $q[$show];
}
function no_akses()
	{
		$ci=& get_instance();
		if(!$ci->session->userdata('username')){
			redirect('Auth');
		}
	}

function akses_terbatas()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') =='warga' or $ci->session->userdata('role') =='rw')
	{
		redirect('Welcome');
	}
}

function akses_admin_rw()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !='admin' and $ci->session->userdata('role') !='rw')
	{
		redirect('Welcome');
	}
}

function akses_admin()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !='admin')
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}

function akses_rw()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !='rw')
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}

function get_range_age($a, $b, $rt)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT nama_lengkap, tgl_lahir, CURDATE(), sum(TIMESTAMPDIFF(YEAR,tgl_lahir,CURDATE()) BETWEEN $a and $b) AS age from profil where rt=$rt")->row_array();

	return ($q['age']);
}

function get_range_age_rw($a, $b)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT nama_lengkap, tgl_lahir, CURDATE(), sum(TIMESTAMPDIFF(YEAR,tgl_lahir,CURDATE()) BETWEEN $a and $b) AS age from profil")->row_array();

	return ($q['age']);
}

function rt_sekretaris()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !=='Ketua' and $ci->session->userdata('role') !=='Sekretaris')
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}

function rt_sekretaris_warga()
{
	$ci = &get_instance();
	if ($ci->session->userdata('role') !== 'Ketua' and $ci->session->userdata('role') !== 'Sekretaris'and $ci->session->userdata('role') !== 'warga') 
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}

function rt_bendahara()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !=='Ketua' and $ci->session->userdata('role') !=='Bendahara')
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}
function akses_ketua_rt()
{
	$ci=& get_instance();
	if($ci->session->userdata('role') !='Ketua')
	{
		$data = array(
			'content'	=> 'false.php'
		);
	}
}


function hitung_umur($tanggal_lahir) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}

function get_bulan()
{
	$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	return $bulan[date('n', mktime(0,0,0, date('m')))];
}


function get_tahun()
{
	if (date('F')== 'January')
	{
		$tahun = date('Y');

		return $tahun;
	}
	 else 
	 {
	 	$tahun = date('Y');

	 	return $tahun;
	 }
}

function jml_warga_by_sex($rt, $sex)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where rt='$rt' and sex='$sex' and status='Aktif'")->num_rows();

	return $q;
}

function jml_warga_by_sex_rw($sex)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where sex='$sex' and status='Aktif'")->num_rows();

	return $q;
}

function get_rt_by_ktp($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT rt from profil where no_ktp='$id' and status='Aktif'")->row_array();

	return $q['rt'];
}
function jml_warga_by_pen($rt, $pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where rt='$rt' and pendidikan='$pen' and status='Aktif'")->num_rows();

	return $q;
}
function jml_warga_by_pen_rw($pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where pendidikan='$pen' and status='Aktif'")->num_rows();

	return $q;
}
function jml_warga_by_agama($rt, $pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where rt='$rt' and agama='$pen' and status='Aktif'")->num_rows();

	return $q;
}
function jml_warga_by_status_tinggal($rt, $pen)
{
	$ci =& get_instance();
	$q = $ci->db->query("SELECT * from profil where rt='$rt' and status_tinggal='$pen' and status='Aktif'")->num_rows();

	return $q;
}

function jml_warga_by_agama_rw($pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where agama='$pen' and status='Aktif'")->num_rows();

	return $q;
}
function jml_warga_by_pekerjaan($rt, $pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil where rt='$rt' and pekerjaan='$pen' and status='Aktif'")->num_rows();

	return $q;
}

function jml_warga_by_pekerjaan_rw($pen)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT pekerjaan from profil where pekerjaan='$pen' and status='Aktif'")->num_rows();

	return $q;
}

function warna()
{
	$r = rand(0,255);
	$g = rand(0,255);
	$b = rand(0,255);

	return "rgba(".$r.",".$g.",".$b.",0.2)";
}
function warnaborder()
{
	$r = rand(0,255);
	$g = rand(0,255);
	$b = rand(0,255);

	return "rgba(".$r.",".$g.",".$b.",1)";
}

function get_setting($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from setting")->row_array();

	return $q[$id];
}

function bulan_romawi()
{
	  $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    $bulan = $array_bulan[date('n')];

    return $bulan;
}

function get_bulan_iuran($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from buat_iuran where tahun='$id'")->result();

	return $q;
}

function get_ktp_iuran($iuran)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from iuran i, profil p where i.no_ktp=p.no_ktp  and id_b_iuran='$iuran' and p.status='Aktif'")->result();

	return $q;
}


function cek_tagihan_current($iuran, $user)
{
	$ci = &get_instance();
	$q = $ci->db->query("SELECT * from buat_iuran b, iuran i, profil p where b.id_b_iuran=i.id_b_iuran and i.no_ktp=p.no_ktp and i.id_b_iuran='$iuran' and i.no_ktp='$user' and p.status='Aktif'")->result();

	return $q;
}

function confirmed()
{
	$ci = &get_instance();
	$q = $ci->db->query("select status from konfirmasi")->result();
}


function cek_ktp_iuran($iuran)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from iuran i, profil p where i.no_ktp=p.no_ktp  and id_b_iuran='$iuran' and p.status='Aktif'")->num_rows();

	return $q;
}



function get_ktp_belum_iuran($iuran)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from iuran i, profil p where i.no_ktp=p.no_ktp  and id_b_iuran='$iuran' and p.status='Aktif'")->result();

	return $q;
}

function rupiah($angka)
{
	$jadi 	= "Rp ".number_format($angka,0,',','.');
	return $jadi;	
}

function get_name($ktp, $show)
{
	$ci=& get_instance();
	$q 	= $ci->db->query("SELECT * from profil p, user u, rt r where p.no_ktp=u.no_ktp and p.rt=r.id_rt and p.no_ktp='$ktp' and p.status='Aktif'")->row_array();

	return $q[$show];
}

function email_warga($ktp)
{
	$ci=& get_instance();
	$q 	= $ci->db->query("SELECT * from profil where no_ktp='$ktp' and status='Aktif'")->row_array();

	return $q['email_warga'];
}

function get_laporan($awal, $akhir, $rt)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from keuangan where rt='$rt' and tgl BETWEEN '$awal' and '$akhir'")->result();

	return $q;
}

function get_jml_laporan($awal, $akhir, $rt, $ket)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT sum(nominal) AS total from keuangan where rt='$rt' and jenis='$ket' and tgl BETWEEN '$awal' and '$akhir'")->row_array();

	return $q['total'];
}


