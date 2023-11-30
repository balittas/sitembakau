<?php 
	class m_agribisnis extends CI_Model
	{

		public function selectAgribisnis() {
			$query = $this->db->get('agribisnis');
	        return $query->result();
		}

		public function selectAgribisnisTop3() {
			$query = $this->db->select("*");
	        $query = $this->db->from("agribisnis");
			$query = $this->db->limit(3);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectAgribisnisById($idAgribisnis) {
			$query = $this->db->select('*');
			$query = $this->db->from('agribisnis');
			$query = $this->db->where('id_agribisnis', $idAgribisnis);
			$query = $this->db->get();
			return $query->result();
		}

		public function selectIdAgribisnisByJenis($jenis) {
			$query = $this->db->select('id_agribisnis');
			$query = $this->db->from('agribisnis');
			$query = $this->db->where('jenis_agribisnis', $jenis);
			$query = $this->db->get();
			$hasil = $query->result();
			return $hasil[0]->id_agribisnis;
		}

		public function pencarianAgribisnis($cari){
			if ($cari == "#agribisnis") {
				$cari = "";
			}
			$query = $this->db->select('*');
            $query = $this->db->from('agribisnis');
			$query = $this->db->like('jenis_agribisnis', "$cari", 'both')
			->or_like('deskripsi_agribisnis', "$cari", 'both')
			->or_like('jenis_tembakau', "$cari", 'both')
			->or_like('id_agribisnis', "$cari", 'both');
            $query = $this->db->get();
            return $query->result();
		}
		public function cariagri($cari)
		{
			$this->db->like('judul', $cari, 'both');
			$this->db->or_like('jenis_tembakau', $cari, 'both');
			$this->db->or_like('deskripsi', $cari, 'both');
			$this->db->or_like('kota', $cari, 'both');
			return $this->db->get('penyakit')->result();
		}
	} 
?>