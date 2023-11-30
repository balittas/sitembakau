<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_Model
{
	public function caripenyakit($cari)
	{
		$this->db->like('judul', $cari, 'both');
		$this->db->or_like('jenis_tembakau', $cari, 'both');
		$this->db->or_like('deskripsi', $cari, 'both');
		$this->db->or_like('kota', $cari, 'both');
		return $this->db->get('penyakit')->result();
	}

	public function getW($id)
	{
		$this->db->where('id_penyakit', $id);
		return $this->db->get('penyakit')->result();		
	}

    public function getData($sampai, $dari, $w=null)
    {
        $this->db->where($w);
        return $this->db->get('penyakit', $sampai, $dari)->result();
    }

    public function getDataP($w=null)
    {
        $this->db->where($w);
        return $this->db->get('penyakit')->row();
    }

    public function getJumlah($kota)
    {
        $this->db->where('kota', $kota);
        $query = $this->db->get('penyakit');
        return $query->num_rows();
    }
}
	

/* End of file M_Penyakit.php */