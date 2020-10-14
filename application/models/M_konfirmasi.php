<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_konfirmasi extends CI_Model
{

    public function konf($k)
    {
        $k['status']       = $this->db->query("SELECT * from konfirmasi")->result();
    }

}
