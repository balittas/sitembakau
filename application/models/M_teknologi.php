<?php 
	class m_teknologi extends CI_Model
	{

		public function selectTeknologi() {
			$query = $this->db->get('teknologi_budidaya');
   			return $query->result();
		}

		public function selectTeknologiById($idTeknologi) {
			$query = $this->db->select('*');
			$query = $this->db->from('teknologi_budidaya');
			$query = $this->db->where('id_teknologi_budidaya', $idTeknologi);
			$query = $this->db->get();
			return $query->result();
		}

		public function selectFileByIdTeknologi($idTeknologi) {
			$query = $this->db->select('*');
			$query = $this->db->from('file_teknologi');
			$query = $this->db->where('id_teknologi_budidaya', $idTeknologi);
			$query = $this->db->get();
			return $query->result();
		}

		public function selectIdTeknologiByJenis($jenis) {
			$query = $this->db->select('id_teknologi_budidaya');
			$query = $this->db->from('teknologi_budidaya');
			$query = $this->db->where('jenis_teknologi_budidaya', $jenis);
			$query = $this->db->get();
			$hasil = $query->result();
			return $hasil[0]->id_teknologi_budidaya;
		}

		public function pencarianTeknologi($cari){
			if ($cari == "#teknologibudidaya") {
				$cari = "";
			}
			$query = $this->db->distinct();
			$query = $this->db->select('t.id_teknologi_budidaya,t.jenis_teknologi_budidaya, t.deskripsi');
            $query = $this->db->from('file_teknologi f');
            $query = $this->db->join("teknologi_budidaya t", "f.id_teknologi_budidaya = t.id_teknologi_budidaya");
			$query = $this->db->group_start()
			->like('t.jenis_teknologi_budidaya', "$cari", "both")
			->or_like('t.deskripsi', "$cari", "both")
			->or_like('f.nama_file', "$cari", "both")
			->or_like('f.deskripsi_file', "$cari", "both")
			->group_end();
            $query = $this->db->get();
            return $query->result();
		}

	} 
?>