<?php 
	class admin extends CI_Controller{
		// $username, $password, $idVarietas;
		public function index(){
			$data['judul'] = "Masuk - Balai Penelitian Tanaman Pemanis dan Serat";
			$this->load->view('login', $data);
		}
		public function login(){			
			$username = $this->input->post('username'); 
			$password = $this->input->post('password');			
			if ($username == "balittas" && $password == "admin") {				
				$this->session->set_userdata(array('akunAktif'=>"Administrator"),true);
				redirect(site_url('admin/home'));
			}if($username == "balittas" && $password == "benih"){
				$this->session->set_userdata(array('akunAktifBenih'=>"AdministratorBenih"),true);
				redirect(site_url('admin/adminBenih'));
			}else{
				$data['coba'] = "salah";
				$data['judul'] = "Admin - Balai Penelitian Tanaman Pemanis dan Serat";
				// redirect(base_url('admin'), 'refresh');
				$this->load->view('login', $data);
			}			
		}		
		public function logout() {			
			$this->session->unset_userdata('akunAktif');
			redirect(site_url('admin'));
		}
		public function logoutBenih() {
			$this->session->unset_userdata('akunAktifBenih');
			// echo "masuk";
			redirect(site_url('admin'));
		}
		public function home(){		
			$this->load->model("m_tembakau");		
			$data['varietas_tembakau'] = $this->m_tembakau->get_varietas();
			$data['tekno'] = $this->m_tembakau->getData();
			$data['detail_varietas'] = $this->m_tembakau->get_all_detail_varietas();
			$data['listAtribut'] = $this->m_tembakau->getAtribut();
			$data['leaflet'] = $this->m_tembakau->get_leaflet();
			$data['gambarleaflet'] = $this->m_tembakau->get_leaflet_img();		
			$data['benih'] = $this->m_tembakau->get_benih();
			$data['distribusiBenih'] = $this->m_tembakau->getPasca();
			$data['ListNamaBenih'] = $this->m_tembakau->get_nama_benih();
			$data['teknologi'] = $this->m_tembakau->get_tekbud();
			$data['agribisnis'] = $this->m_tembakau->get_agri();
			$dataHeader['judul'] = "Admin";
			$this->load->view("headerAdmin",$dataHeader);
			$this->load->view("v_admin_tembakau", $data);
		}
		public function adminBenih(){
			$this->load->model("m_tembakau");
			$dataHeader['judul'] = "Admin";
			$this->load->view("headerAdminBenih",$dataHeader);		
			$data['benih'] = $this->m_tembakau->get_benih();
			$data['distribusiBenih'] = $this->m_tembakau->getPasca();
			$this->load->view("v_admin_benih", $data);
		}
	//========================================VARIETAS========================================
		public function deleteVarietas($id){			
			$this->load->model("m_tembakau");
			$datagambardansk = $this->m_tembakau->get_imgsk_varietas_byId($id);
			if ($datagambardansk[0]->file_gambar != "default.jpg") {
				unlink('assets/varietas/'.$datagambardansk[0]->file_gambar);
			}
			unlink('assets/SK/'.$datagambardansk[0]->file_SK);
			$this->m_tembakau->delete_varietas($id);
			redirect(site_url('admin/home#tabelVarietas'));
		}		
		public function tambahVarietas(){
			$this->load->model("m_tembakau");

			date_default_timezone_set('Asia/Jakarta');
	        $tgl = date('Y-m-d'); 
	        $wkt = date('H:i:s');		

			$namaVarietas = $this->input->post('namaVarietas');		
			$deskripsi = $this->input->post('deskripsi');
			$tglPelepasan = $this->input->post('tanggalPelepasan');
			$jenistembakau = $this->input->post('jtembakau');

			$targetpathgmbr = "assets/varietas/";
			$targetpathsk = "assets/SK/";
			$targetpathgmbr = $targetpathgmbr.basename($_FILES['gambar']['name']);
			$targetpathsk = $targetpathsk.basename($_FILES['sk']['name']);

			$gambarVarietas = "";
			if (empty($_FILES['sk']['name']) || empty($_FILES['gambar']['name'])) {
				$gambarVarietas = "default.JPG";
			} else {
				$gambarVarietas = $_FILES['gambar']['name'];
			}
			$this->m_tembakau->add_varietas($namaVarietas,$jenistembakau,$tglPelepasan,$tgl,$wkt,$_FILES['sk']['name'],$gambarVarietas);			
			$this->m_tembakau->add_deskripsi_varietas($deskripsi);			
			for ($i=0; $i < $this->input->post('temp') ; $i++) { 
				$tesAtribut = $this->input->post('atribut'."$i");
				if (!is_null($tesAtribut)) {
					$idAtribut = $this->m_tembakau->getIdAtribut($this->input->post('atribut'."$i"));
					if (!empty($idAtribut)) {
						$this->m_tembakau->add_detail_deskripsi($idAtribut,$this->input->post('value'."$i"));					
					} else {
						$this->m_tembakau->addAtribut($this->input->post('atribut'."$i"));
						$idAtribut = $this->m_tembakau->getIdAtribut($this->input->post('atribut'."$i"));
						$this->m_tembakau->add_detail_deskripsi($idAtribut,$this->input->post('value'."$i"));
					}
				}
			}
			move_uploaded_file($_FILES['gambar']['tmp_name'],$targetpathgmbr);
			move_uploaded_file($_FILES['sk']['tmp_name'],$targetpathsk);				
			redirect(site_url('admin/home#tabelVarietas'));	
		}
		public function editVarietas(){
			$this->load->model("m_tembakau");

			$idVar = $this->input->post('idVarietas');
			$namaVarietas = $this->input->post('namaVarietas');
			$tgl = $this->input->post('tanggalPelepasan');					
			$jns = $this->input->post('jtembakau');					
			

			$targetpathgmbrpath = "assets/varietas/";
			$targetpathskpath = "assets/SK/";
			$targetpathgmbr = $targetpathgmbrpath.basename($_FILES['gambar']['name']);
			$targetpathsk = $targetpathskpath.basename($_FILES['sk']['name']);

			$datagambardansk = $this->m_tembakau->get_imgsk_varietas_byId($idVar);
			
			if (!empty($_FILES['gambar']['name'])&&!empty($_FILES['sk']['name'])) {
				unlink($targetpathgmbrpath.$datagambardansk[0]->file_gambar);
				unlink($targetpathskpath.$datagambardansk[0]->file_SK);
				move_uploaded_file($_FILES['gambar']['tmp_name'],$targetpathgmbr);
				move_uploaded_file($_FILES['sk']['tmp_name'],$targetpathsk);			
				$this->m_tembakau->updateVarietas($idVar,$namaVarietas,$jns,$tgl,$_FILES['sk']['name'],$_FILES['gambar']['name']);
			}elseif (empty($_FILES['gambar']['name'])&&empty($_FILES['sk']['name'])) {
				$this->m_tembakau->updateVarietasTanpaFile($idVar,$namaVarietas,$jns,$tgl);
			}elseif (empty($_FILES['sk']['name'])) {
				unlink($targetpathgmbrpath.$datagambardansk[0]->file_gambar);
				move_uploaded_file($_FILES['gambar']['tmp_name'],$targetpathgmbr);
				$this->m_tembakau->updateVarietasKecSK($idVar,$namaVarietas,$jns,$tgl,$_FILES['gambar']['name']);
			}elseif (empty($_FILES['gambar']['name'])) {
				unlink($targetpathskpath.$datagambardansk[0]->file_SK);
				move_uploaded_file($_FILES['sk']['tmp_name'],$targetpathsk);
				$this->m_tembakau->updateVarietasKecGmbr($idVar,$namaVarietas,$jns,$tgl,$_FILES['sk']['name']);
			}
			redirect(site_url('admin/home#tabelVarietas'));
		}
		public function editDesVarietas(){
			$this->load->model("m_tembakau");

			$idSpe = $this->input->post('idSpesifikasi');
			$idDes = $this->input->post('idDeskripsi');		
			$deskripsi = $this->input->post('deskripsi');

			$this->m_tembakau->updateDesvarietas($idSpe,$deskripsi);
			// echo "jumlah atribut : ".$this->input->post('jumlahAtr');
			// echo "bismillah";
			for ($i=0; $i < $this->input->post('jumlahAtr') ; $i++) { 
				// $namaAtribut = $this->input->post('atribut0');
				// echo $namaAtribut;
				// echo "<br>";

				// if ($namaAtribut == " Asal") {
					$idAtribut = $this->m_tembakau->getIdAtribut(substr($this->input->post('atribut'."$i"), 1));
					// echo $idAtribut."<br>";
				// }
				// $idAtribut = $this->m_tembakau->getIdAtribut("asal");
				$this->m_tembakau->updateDetailDeskripsi($idDes, $idAtribut, $this->input->post('value'."$i"));
			}
			redirect(site_url('admin/home#tabelVarietas'));
		}

	//========================================LEAFLET========================================
		public function tambahLeaflet(){
			$this->load->model("m_tembakau");

			$nama = $this->input->post('namaLeaflet');					
			$this->m_tembakau->add_leaflet_name($nama);	

			$targetpathleaflet = "assets/leaflet/";		
			$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['gambar1']['name']);
			move_uploaded_file($_FILES['gambar1']['tmp_name'],$targetpathleaflet1);
			$this->m_tembakau->add_leaflet_img($_FILES['gambar1']['name']);	
				
			$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['gambar2']['name']);
			move_uploaded_file($_FILES['gambar2']['tmp_name'],$targetpathleaflet2);
			$this->m_tembakau->add_leaflet_img($_FILES['gambar2']['name']);

			redirect(site_url('admin/home#tabelLeaflet'));
		}
		public function editLeaflet(){
			$this->load->model("m_tembakau");

			$idleaflet = $this->input->post('idleaflet');
			$idgmbr1 = $this->input->post('idimg1');		
			$idgmbr2 = $this->input->post('idimg2');	
			$nama = $this->input->post('namaLeaflet');							

			$dataleaflet1 = $this->m_tembakau->get_leaflet_img_byId($idgmbr1);
			$dataleaflet2 = $this->m_tembakau->get_leaflet_img_byId($idgmbr2);

			$targetpathleaflet = "assets/leaflet/";

			$this->m_tembakau->updateLeafletName($idleaflet,$nama);	
			
			if (!empty($_FILES['leaflet1']['name'])&&!empty($_FILES['leaflet2']['name'])) {
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leaflet1']['name']);
				move_uploaded_file($_FILES['leaflet1']['tmp_name'],$targetpathleaflet1);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leaflet2']['name']);
				move_uploaded_file($_FILES['leaflet2']['tmp_name'],$targetpathleaflet2);
				$this->m_tembakau->updateLeafletImg($idgmbr1,$_FILES['leaflet1']['name']);
				$this->m_tembakau->updateLeafletImg($idgmbr2,$_FILES['leaflet2']['name']);			
			}elseif (!empty($_FILES['leaflet1']['name'])) {
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leaflet1']['name']);
				move_uploaded_file($_FILES['leaflet1']['tmp_name'],$targetpathleaflet1);
				$this->m_tembakau->updateLeafletImg($idgmbr1,$_FILES['leaflet1']['name']);
			}elseif (!empty($_FILES['leaflet2']['name'])) {
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leaflet2']['name']);
				move_uploaded_file($_FILES['leaflet2']['tmp_name'],$targetpathleaflet2);
				$this->m_tembakau->updateLeafletImg($idgmbr2,$_FILES['leaflet2']['name']);
			}

			redirect(site_url('admin/home#tabelLeaflet'));
		}
		public function deleteLeaflet($id){			
			$this->load->model("m_tembakau");
			$dataleaflet = $this->m_tembakau->get_leaflet_byId($id);
			$targetpathleaflet = "assets/leaflet/";
			unlink($targetpathleaflet.$dataleaflet[0]->file);
			unlink($targetpathleaflet.$dataleaflet[1]->file);
			$this->m_tembakau->delete_leaflet($id);
			redirect(site_url('admin/home#tabelLeaflet'));
		}

	//==========================================PRODUK=========================================
		// PRODUK BENIH
		public function tambahBenih(){
			$this->load->model("m_tembakau");

			$namapenyakit = $this->input->post('editnamapenyakit');		
			$jenistembakau	 = $this->input->post('editjenistembakau');
			$kota = $this->input->post('editkota');
			$deskripsi = $this->input->post('editdeskripsi');
			
			$config['upload_path'] = './assets/filePenyakit/';
			$config['allowed_types'] = 'pdf';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('editfile')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$this->m_tembakau->add_benih($namapenyakit,$jenistembakau,$kota,$deskripsi,$this->upload->data('file_name'));

				// echo "success";
			}
			
			redirect(site_url('admin/home#tabelPenyakit'));
		}
		public function editBenih(){
			$this->load->model("m_tembakau");	

			$id = $this->input->post('idpenyakit');
			$namapenyakit = $this->input->post('editnamapenyakit');		
			$jenistembakau	 = $this->input->post('editjenistembakau');
			$kota = $this->input->post('editkota');
			$deskripsi = $this->input->post('editdeskripsi');

			$config['upload_path'] = './assets/filePenyakit/';
			$config['allowed_types'] = 'pdf';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('editfile')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$this->m_tembakau->update_benih($id,$namapenyakit,$jenistembakau,$kota,$deskripsi,$this->upload->data('file_name'));
			}

			redirect(site_url('admin/home#tabelPenyakit'));			
		}
		public function deleteBenih($id){			
			$this->load->model("m_tembakau");
			
			$this->m_tembakau->delete_benih($id);			
			
			redirect(site_url('admin/home#tabelBenih'));
			
		}

		// PRODUK DISTRIBUSI BENIH
		public function tambahDistribusiBenih(){
			$this->load->model("m_tembakau");
			date_default_timezone_set('Asia/Jakarta');
	        $tglsekarang = date('Y-m-d'); 
	        $waktu = date('H:i:s'); 
			
			$targetpathagrigmbr = "assets/Gambar/";
			$targetpathagrifile = "assets/SK/";	

			
			if (empty($_FILES['fg']['name']) || empty($_FILES['fsk']['name'])) {
				
				$data = array(
					'judul' => $this->input->post('judul'), 
					'kota' => $this->input->post('kota'), 
					'deskripsi' => $this->input->post('deskripsi'), 					
					'tanggal_pelepasan' => $tglsekarang, 
					'tanggal_upload' =>  $tglsekarang, 
					'waktu_upload' =>  $waktu, 
				);
				$this->m_tembakau->addPasca($data);
			}else{
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['fg']['name']);
				move_uploaded_file($_FILES['fg']['tmp_name'],$targetpathagribisnisgmbr);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['fsk']['name']);
				move_uploaded_file($_FILES['fsk']['tmp_name'],$targetpathagribisnisfile);
				$data = array(
					'judul' => $this->input->post('judul'), 
					'kota' => $this->input->post('kota'), 
					'deskripsi' => $this->input->post('deskripsi'), 
					'file_gambar' => $_FILES['fg']['name'], 
					'file_SK' => $_FILES['fsk']['name'], 
					'tanggal_pelepasan' => $tglsekarang, 
					'tanggal_upload' =>  $tglsekarang, 
					'waktu_upload' =>  $waktu, 
				);
				$this->m_tembakau->addPasca($data);
			}
		
			redirect(base_url('index.php/admin/home#tabelPasca'));
		}
		public function editDistribusiBenih(){
			$this->load->model("m_tembakau");	
			date_default_timezone_set('Asia/Jakarta');
	        $tglsekarang = date('Y-m-d'); 

			$targetpathagrigmbr = "assets/Gambar/";
			$targetpathagrifile = "assets/SK/";		
			$datapasca = $this->m_tembakau->getPasca_byId($this->input->post('idpanen'));		

			if (!empty($_FILES['editgmbrpasca']['name'])&&!empty($_FILES['editpdfpasca']['name'])) {
				unlink($targetpathagrifile.$datapasca->file_SK);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['editpdfpasca']['name']);
				move_uploaded_file($_FILES['editpdfpasca']['tmp_name'],$targetpathagribisnisfile);			
				
				unlink($targetpathagrigmbr.$datapasca->file_gambar);
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['editgmbrpasca']['name']);
				move_uploaded_file($_FILES['editgmbrpasca']['tmp_name'],$targetpathagribisnisgmbr);

				$data = array(
					'judul' => $this->input->post('juduledt'), 
					'kota' => $this->input->post('kotaedt'), 
					'deskripsi' => $this->input->post('desedt'), 					
					'tanggal_pelepasan' => $tglsekarang, 
					'file_gambar' => $_FILES['editgmbrpasca']['name'], 
					'file_SK' => $_FILES['editpdfpasca']['name'], 				
				);
				$w = array('id_panen' => $this->input->post('idpanen'), );
				$this->m_tembakau->updPasca($data,$w);

			}else if(empty($_FILES['editgmbrpasca']['name']) && empty($_FILES['editpdfpasca']['name'])){
				$data = array(
					'judul' => $this->input->post('juduledt'), 
					'kota' => $this->input->post('kotaedt'), 
					'deskripsi' => $this->input->post('desedt'), 					
					'tanggal_pelepasan' => $tglsekarang, 
				);
				$w = array('id_panen' => $this->input->post('idpanen'), );
				$this->m_tembakau->updPasca($data,$w);
			}else if(empty($_FILES['editpdfpasca']['name'])){
				unlink($targetpathagrigmbr.$datapasca[0]->file_gambar);
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['editgmbrpasca']['name']);
				move_uploaded_file($_FILES['editgmbrpasca']['tmp_name'],$targetpathagribisnisgmbr);

				$data = array(
					'judul' => $this->input->post('juduledt'), 
					'kota' => $this->input->post('kotaedt'), 
					'deskripsi' => $this->input->post('desedt'), 					
					'tanggal_pelepasan' => $tglsekarang, 
					'file_gambar' => $_FILES['editgmbrpasca']['name'], 
				);
				$w = array('id_panen' => $this->input->post('idpanen'), );
				$this->m_tembakau->updPasca($data,$w);

			}else {
				unlink($targetpathagrifile.$datapasca[0]->file_SK);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['editpdfpasca']['name']);
				move_uploaded_file($_FILES['editpdfpasca']['tmp_name'],$targetpathagribisnisfile);	

				$data = array(
					'judul' => $this->input->post('juduledt'), 
					'kota' => $this->input->post('kotaedt'), 
					'deskripsi' => $this->input->post('desedt'), 					
					'tanggal_pelepasan' => $tglsekarang, 
					'file_SK' => $_FILES['editpdfpasca']['name'], 				
				);
				$w = array('id_panen' => $this->input->post('idpanen'), );
				$this->m_tembakau->updPasca($data,$w);

			}
			redirect(base_url('index.php/admin/home#tabelPasca'));
		}
		public function deleteDistribusiBenih($id){			
			$this->load->model("m_tembakau");
			$identity = explode('-', $id);		
			$this->m_tembakau->delPasca($identity[1]);
			
			redirect(base_url('index.php/admin/home#tabelPasca'));
		}

	//========================================TEKNOLOGI========================================
		public function tambahMonografTeknologi(){
			$this->load->model("m_tembakau");


			$id = $this->input->post('jenisteknologi');
			$nama = $this->input->post('namamonograf');	
			$jns = $this->input->post('jenistembakau');	
			$des ="";
			for ($i=0; $i < $this->input->post('tempTekno') ; $i++) { 					
				$des .= $this->input->post('destekno'."$i")."</p>";
			}		

			// echo "$des";
			// echo $this->input->post('tempTekno');

			$targetpathtekno = "assets/fileTBD/";		
			
			$targetpathteknologi = $targetpathtekno.basename($_FILES['pdf']['name']);
			move_uploaded_file($_FILES['pdf']['tmp_name'],$targetpathteknologi);
			$this->m_tembakau->add_teknologi($id,$nama,$jns,$des,$_FILES['pdf']['name']);
			
			redirect(site_url('admin/home#tabelTeknologi'));
		}
		public function editMonografTeknologi(){
			$this->load->model("m_tembakau");

			$id = $this->input->post('idtekno');
			$jenis = $this->input->post('jenis');		
			$nama = $this->input->post('editnamamonograf');
			$des = $this->input->post('editdestekno');								
			
			$targetpathtekno = "assets/fileTBD/";	
			$datatekno = $this->m_tembakau->get_tekbud_byId($id);
			
			if (empty($_FILES['editpdf']['name'])) {
				$this->m_tembakau->update_tekbud_nofile($id,$nama,$jenis,$des);
			}else{
				unlink($targetpathtekno.$datatekno[0]->file);
				$targetpathteknologi = $targetpathtekno.basename($_FILES['editpdf']['name']);
				move_uploaded_file($_FILES['editpdf']['tmp_name'],$targetpathteknologi);
				$this->m_tembakau->update_tekbud($id,$nama,$jenis,$des,$_FILES['editpdf']['name']);
			}

			redirect(site_url('admin/home#tabelTeknologi'));
			
		}
		public function deleteMonografTeknologi($id){						
			$this->load->model("m_tembakau");
			$targetpathtekno = "assets/fileTBD/";
			$datatekno = $this->m_tembakau->get_tekbud_byId($id);

			unlink($targetpathtekno.$datatekno[0]->file);
			$this->m_tembakau->delete_tekbud($id);

			redirect(site_url('admin/home#tabelTeknologi'));
		}

	//========================================AGRIBISNIS========================================
		public function tambahAgribisnis(){
			$this->load->model("m_tembakau");

			$jenis = $this->input->post('jenisagri');		
			// $des = $this->input->post('desagri');		
			
			$des ="";
			for ($i=0; $i < $this->input->post('tempAgri') ; $i++) { 					
				$des .=$this->input->post('desagri'."$i")."</p>";
			}	

			$targetpathagrigmbr = "assets/gambarAgribisnis/";
			$targetpathagrifile = "assets/fileAgribisnis/";	

			
			if (empty($_FILES['gambaragri']['name'])) {
				$gambaragri = "default.JPG";
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['pdfagri']['name']);
				move_uploaded_file($_FILES['pdfagri']['tmp_name'],$targetpathagribisnisfile);
				$this->m_tembakau->add_agribisnis($jenis,$des,$_FILES['pdfagri']['name'],$gambaragri);
			}else{
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['gambaragri']['name']);
				move_uploaded_file($_FILES['gambaragri']['tmp_name'],$targetpathagribisnisgmbr);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['pdfagri']['name']);
				move_uploaded_file($_FILES['pdfagri']['tmp_name'],$targetpathagribisnisfile);
				$this->m_tembakau->add_agribisnis($jenis,$des,$_FILES['pdfagri']['name'],$_FILES['gambaragri']['name']);
			}
			redirect(site_url('admin/home#tabelAgribisnis'));
		}
		public function editAgribisnis(){
			$this->load->model("m_tembakau");

			$id = $this->input->post('idagri');
			$jenis = $this->input->post('editjenisagri');		
			$des = $this->input->post('editdesagri');		
			
			$targetpathagrifile = "assets/fileAgribisnis/";		
			$targetpathagrigmbr = "assets/gambarAgribisnis/";
			$dataagri = $this->m_tembakau->get_agri_byId($id);

			if (!empty($_FILES['editgambaragri']['name'])&&!empty($_FILES['editpdfagri']['name'])) {
				unlink($targetpathagrifile.$dataagri[0]->file);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['editpdfagri']['name']);
				move_uploaded_file($_FILES['editpdfagri']['tmp_name'],$targetpathagribisnisfile);			
				unlink($targetpathagrigmbr.$dataagri[0]->gambar_agribisnis);
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['editgambaragri']['name']);
				move_uploaded_file($_FILES['editgambaragri']['tmp_name'],$targetpathagribisnisgmbr);
				$this->m_tembakau->update_agribisnis($id,$jenis,$des,$_FILES['editpdfagri']['name'],$_FILES['editgambaragri']['name']);
			}elseif(empty($_FILES['editgambaragri']['name'])&&empty($_FILES['editpdfagri']['name'])){				
				$this->m_tembakau->update_agribisnis_noimgpdf($id,$jenis,$des);
			}elseif (empty($_FILES['editpdfagri']['name'])) {
				unlink($targetpathagrigmbr.$dataagri[0]->gambar_agribisnis);
				$targetpathagribisnisgmbr = $targetpathagrigmbr.basename($_FILES['editgambaragri']['name']);
				move_uploaded_file($_FILES['editgambaragri']['tmp_name'],$targetpathagribisnisgmbr);
				$this->m_tembakau->update_agribisnis_nofile($id,$jenis,$des,$_FILES['editgambaragri']['name']);
			}elseif (empty($_FILES['editgambaragri']['name'])) {
				unlink($targetpathagrifile.$dataagri[0]->file);
				$targetpathagribisnisfile = $targetpathagrifile.basename($_FILES['editpdfagri']['name']);
				move_uploaded_file($_FILES['editpdfagri']['tmp_name'],$targetpathagribisnisfile);			
				$this->m_tembakau->update_agribisnis_noimg($id,$jenis,$des,$_FILES['editpdfagri']['name']);
			}		
			redirect(site_url('admin/home#tabelAgribisnis'));
		}
		public function deleteAgribisnis($id){			
			$this->load->model("m_tembakau");
			$targetpathagrigmbr = "assets/gambarAgribisnis/";
			$targetpathagrifile = "assets/fileAgribisnis/";
			$dataagri = $this->m_tembakau->get_agri_byId($id);
			if ($dataagri[0]->gambar_agribisnis != "default.JPG") {				
				unlink($targetpathagrigmbr.$dataagri[0]->gambar_agribisnis);
			}
			unlink($targetpathagrifile.$dataagri[0]->file);
			$this->m_tembakau->delete_agribisnis($id);
			redirect(site_url('admin/home#tabelAgribisnis'));
		}
	}
