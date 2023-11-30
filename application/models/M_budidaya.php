<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_budidaya extends CI_Model {
    
        public function getData($sampai, $dari, $w=null)
        {
            $this->db->where($w);
            return $this->db->get('budidaya', $sampai, $dari)->result();
        }

        public function getJumlah($kota)
        {
            $this->db->where('kota', $kota);
            $query = $this->db->get('budidaya');
            return $query->num_rows();
        }

        public function getDataW($w=null)
        {
            $this->db->where('id_budidaya',$w);
            return $this->db->get('budidaya')->result();
        }

        public function caribudidaya($cari)
		{		
			$this->db->like('nama_budidaya', $cari, 'both');
			$this->db->or_like('jenis_tembakau', $cari, 'both');
			$this->db->or_like('file_SK', $cari, 'both');
			$this->db->or_like('kota', $cari, 'both');
			return $this->db->get('budidaya')->result();
		}

		public function cariPenyakit($cari)
		{		
			$this->db->like('judul', $cari, 'both');
			$this->db->or_like('jenis_tembakau', $cari, 'both');
			$this->db->or_like('deskripsi', $cari, 'both');
			$this->db->or_like('kota', $cari, 'both');
			$this->db->or_like('file_SK', $cari, 'both');
			$this->db->or_like('file_gambar', $cari, 'both');
			return $this->db->get('varietas')->result();
		}

		public function cariVarietas($cari)
		{		
			$this->db->like('nama_varietas', $cari, 'both');
			$this->db->or_like('jenis_tembakau', $cari, 'both');
			$this->db->or_like('file_SK', $cari, 'both');
			$this->db->or_like('kota', $cari, 'both');
			return $this->db->get('varietas')->result();
		}
    }

    /* End of file M_budidaya.php */
    

?>