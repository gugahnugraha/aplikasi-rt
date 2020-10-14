<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ceknum($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

	function last_login($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		redirect('Welcome');
	}

}