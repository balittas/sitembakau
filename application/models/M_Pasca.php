<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pasca extends CI_Model {

	public function caripasca($cari)
	{
		$this->db->like('judul', $cari, 'both');
		$this->db->or_like('deskripsi', $cari, 'both');
		$this->db->or_like('kota', $cari, 'both');
		return $this->db->get('pascapanen')->result();
	}

	public function getDataW($w)
	{
		$this->db->where('id_panen', $w);
		return $this->db->get('pascapanen')->result();				
	}

    public function getDataP($w=null)
    {
        $this->db->where($w);
        return $this->db->get('pascapanen')->row();
    }
    
    public function getData($sampai, $dari, $w=null)
    {
        $this->db->where($w);
        return $this->db->get('pascapanen', $sampai, $dari)->result();
    }
}

/* End of file M_Pasca.php */

?>