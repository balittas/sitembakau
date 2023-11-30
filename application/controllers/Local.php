<?php 	
    defined('BASEPATH') OR exit('No direct script access allowed');

	class Local extends CI_Controller{
    function __construct() {
		parent::__construct();
        $this->CI = & get_instance();
        $this->load->library('pagination');
        $this->load->model('M_leaflet');
        $this->load->model('m_varietas');
        $this->load->model('M_budidaya');
        $this->load->model('M_penyakit');
        $this->load->model('M_Pasca');
        $this->load->model('m_agribisnis');
	}
    public function index()
    {
        $dataHeader['judul'] = "Local"; 
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $this->load->view('header', $dataHeader);
        $this->load->view('local/index', $data);
        $this->load->view('footer',$this->counterPengunjung());
       
    }
    public function counterPengunjung() {
        date_default_timezone_set('Asia/Jakarta');
        $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
        $tanggal = date("Y-m-d");
        $bulanIni = date("m");
        $waktu   = date('H:i');
        $this->load->model("m_tembakau");
        if(empty($this->session->userdata('pengunjung'))){
           $this->m_tembakau->addUser($ip,$tanggal,$waktu);
           $this->session->set_userdata('pengunjung','aktif');                  
        }
        
        $counter['pengunjungTotal'] = $this->m_tembakau->getTotalVisitor();
        $counter['pengunjungHariIni'] = $this->m_tembakau->getTotalToday($tanggal); 
        $counter['pengunjungBulanIni'] = $this->m_tembakau->getTotalByMonth($bulanIni);
        return $counter;
    }
    public function jenistembakau($kategori) {
        $dataHeader['judul'] = "Jenis Tembakau";
        $jenis = ""; $namaAtribut = "";

         if ($kategori == "asalusul") {
             $jenis = "Asal-usul";
             $namaAtribut = "Asal";
         } else if ($kategori == "kegunaan") {
             $jenis = "Kegunaan";
             $data['jenistembakau'] = $this->m_varietas->selectJenisTembakau();
         } else if (substr($kategori, 0, 10) == "waktutanam") {
             $jenis = "Waktu Tanam";
             $data['waktutanam'] = $this->m_varietas->selectWaktuTanam();
             if (strlen($kategori) == 10) {
                 $data['value'] = "";	
             } else {
                 $data['value'] = substr($kategori, 13, (strlen($kategori)-1));
             }
         } else if ($kategori == "daerahpengembangan") {
             $jenis = "Daerah Pengembangan Varietas Tembakau";
             $namaAtribut = "Daerah pengembangan";
         } else if ($kategori == "daerahpenanaman") {
             $jenis = "Sentra Penanaman Jenis Tembakau";
             $data['jenistembakau'] = $this->m_varietas->selectJenisTembakau();
         }

         if (!empty($namaAtribut)) {
            $jumlah = $this->m_varietas->getJumlahVarietasBy($namaAtribut);
            $config['base_url'] = base_url()."index.php/varietas/jenistembakau/$kategori/";

            $config['total_rows'] = $jumlah;
            $config['per_page'] = 16;
            $config['num_links'] = $jumlah;
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
            $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

            $this->pagination->initialize($config);	           
            $dari = $this->uri->segment('4');
             $data['dataJenisTembakau'] = $this->m_varietas->selectVarietasByPagination($namaAtribut, $config['per_page'], $dari);

            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links);
         }

         $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
         $data['url'] = $kategori;
         $data['kategori'] = $jenis;

        $this->load->view('header', $dataHeader);
        $this->load->view('HalamanJenisTembakau', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian varietas Madura
    public function VarietasMadura(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Varietas Madura";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'madura','jenis_tembakau' => 'local']);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Madura/VarietasMadura', $data);
        $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Madura
public function BudidayaMadura(){
    $jumlah = $this->M_budidaya->getJumlah('madura');
    $config['base_url'] = base_url()."index.php/Local/BudidayaMadura/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Madura";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'madura', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('madura');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Madura/BudidayaMadura', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Madura
public function PenyakitMadura(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Madura";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'madura', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('madura');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Madura/PenyakitMadura', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

 //bagian pascapanen Madura
 public function PascaPanenMadura(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Madura";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'madura', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Madura/PascaPanenMadura', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Madura
public function AgribisnisMadura(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Madura";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Kasturi
public function VarietasKasturi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Kasturi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'kasturi','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );

    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Kasturi/VarietasKasturi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian BUDIDAYA Kasturi
public function BudidayaKasturi(){
    $jumlah = $this->M_budidaya->getJumlah('kasturi');
    $config['base_url'] = base_url()."index.php/Local/BudidayaKasturi/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Kasturi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'kasturi', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('kasturi');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Kasturi/BudidayaKasturi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian PENYAKIT Kasturi
public function PenyakitKasturi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Kasturi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'kasturi', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('kasturi');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Kasturi/PenyakitKasturi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Pasca Panen Kasturi
public function PascaPanenKasturi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Kasturi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'kasturi', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Kasturi/PascaPanenKasturi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Agribisnis Kasturi
public function AgribisnisKasturi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Kasturi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Paiton
public function VarietasPaiton(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Paiton";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'paiton','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Paiton/VarietasPaiton', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Paiton
public function BudidayaPaiton(){
    $jumlah = $this->M_budidaya->getJumlah('paiton');
    $config['base_url'] = base_url()."index.php/Local/BudidayaPaiton/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Paiton";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'paiton', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('paiton');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Paiton/BudidayaPaiton', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Paiton
public function PenyakitPaiton(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Paiton";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'paiton', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('paiton');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Paiton/PenyakitPaiton', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Paiton
public function PascaPanenPaiton(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Paiton";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'paiton', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Paiton/PascaPanenPaiton', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Paiton
public function AgribisnisPaiton(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Paiton";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Jombang
public function VarietasJombang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Jombang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'jombang','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Jombang/VarietasJombang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Jombang
public function BudidayaJombang(){
    $jumlah = $this->M_budidaya->getJumlah('jombang');
    $config['base_url'] = base_url()."index.php/Local/BudidayaJombang/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Jombang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'jombang', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('jombang');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Jombang/BudidayaJombang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Jombang
public function PenyakitJombang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Jombang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'jombang', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('jombang');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Jombang/PenyakitJombang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Jombang
public function PascaPanenJombang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Jombang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'jombang', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );

    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Jombang/PascaPanenJombang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Jombang
public function AgribisnisJombang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Jombang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Bondowoso
public function VarietasBondowoso(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Bondowoso";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'bondowoso','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Bondowoso/VarietasBondowoso', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Bondowoso
public function BudidayaBondowoso(){
    $jumlah = $this->M_budidaya->getJumlah('bondowoso');
    $config['base_url'] = base_url()."index.php/Local/BudidayaBondowoso/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Bondowoso";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'bondowoso', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('bondowoso');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Bondowoso/BudidayaBondowoso', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Bondowoso
public function PenyakitBondowoso(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Bondowoso";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'bondowoso', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('bondowoso');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Bondowoso/PenyakitBondowoso', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Bondowoso
public function PascaPanenBondowoso(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Bondowoso";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'bondowoso', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Bondowoso/PascaPanenBondowoso', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Bondowoso
public function AgribisnisBondowoso(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Bondowoso";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

 //bagian varietas Banyuwangi
 public function VarietasBanyuwangi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Banyuwangi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'banyuwangi','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Banyuwangi/VarietasBanyuwangi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Banyuwangi
public function BudidayaBanyuwangi(){
    $jumlah = $this->M_budidaya->getJumlah('banyuwangi');
    $config['base_url'] = base_url()."index.php/Local/BudidayaBanyuwangi/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Banyuwangi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'banyuwangi', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('banyuwangi');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Banyuwangi/BudidayaBanyuwangi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Banyuwangi
public function PenyakitBanyuwangi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Banyuwangi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'banyuwangi', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('banyuwangi');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Banyuwangi/PenyakitBanyuwangi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Banyuwangi
public function PascaPanenBanyuwangi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Banyuwangi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'banyuwangi', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Banyuwangi/PascaPanenBanyuwangi', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Banyuwangi
public function AgribisnisBanyuwangi(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Banyuwangi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Tulungagung
public function VarietasTulungagung(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Tulungagung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'tulungagung','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Tulungagung/VarietasTulungagung', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Tulungagung
public function BudidayaTulungagung(){
    $jumlah = $this->M_budidaya->getJumlah('tulungagung');
    $config['base_url'] = base_url()."index.php/Local/BudidayaTulungagung/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Tulungagung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'tulungagung', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('tulungagung');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Tulungagung/BudidayaTulungagung', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Tulungagung
public function PenyakitTulungagung(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Tulungagung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'tulungagung', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('tulungagung');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Tulungagung/PenyakitTulungagung', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Tulungagung
public function PascaPanenTulungagung(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Tulungagung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'tulungagung', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Tulungagung/PascaPanenTulungagung', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Tulungagung
public function AgribisnisTulungagung(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Tulungagung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian varietas Magetan
public function VarietasMagetan(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Varietas Magetan";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'magetan','jenis_tembakau' => 'local']);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Magetan/VarietasMagetan', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian budidaya Magetan
public function BudidayaMagetan(){
    $jumlah = $this->M_budidaya->getJumlah('magetan');
    $config['base_url'] = base_url()."index.php/Local/BudidayaMagetan/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Magetan";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'magetan', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('magetan');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Magetan/BudidayaMagetan', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian penyakit Magetan
public function PenyakitMagetan(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Magetan";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'magetan', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('magetan');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Magetan/PenyakitMagetan', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian pascapanen Magetan
public function PascaPanenMagetan(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Magetan";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'magetan', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Magetan/PascaPanenMagetan', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian agribisnis Magetan
public function AgribisnisMagetan(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Magetan";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

    //bagian VARIETAS Temanggung
    public function VarietasTemanggung(){
            $config['per_page'] = 9;
            $dari = $this->uri->segment('3');

            $dataHeader['judul'] = "Detail Varietas Temanggung";
            $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
            $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'temanggung','jenis_tembakau' => 'local']);
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );

            $this->load->view('header', $dataHeader);
			$this->load->view('Local/Temanggung/VarietasTemanggung', $data);
			$this->load->view('footer',$this->counterPengunjung());
    }


    //bagian BUDIDAYA Temanggung
    public function BudidayaTemanggung(){
        $jumlah = $this->M_budidaya->getJumlah('temanggung');
    $config['base_url'] = base_url()."index.php/Local/BudidayaTemanggung/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Temanggung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'temanggung', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('temanggung');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Temanggung/BudidayaTemanggung', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

    //bagian PENYAKIT Temanggung
    public function PenyakitTemanggung(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');
    
        $dataHeader['judul'] = "Detail Penyakit Temanggung";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $w = array('kota' => 'temanggung', );
        $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
        $data['penyakit'] = $this->M_penyakit->getDataP($w);
        $data['jumlah'] = $this->M_penyakit->getJumlah('temanggung');   
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Temanggung/PenyakitTemanggung', $data);
        $this->load->view('footer',$this->counterPengunjung());
 }

    //bagian Pasca Panen Temanggung
    public function PascaPanenTemanggung(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Temanggung";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'temanggung', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Temanggung/PascaPanenTemanggung', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian Agribisnis Temanggung
    public function AgribisnisTemanggung(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Agribisnis Temanggung";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
        $str_links = $this->pagination->create_links();
        $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
        
        $this->load->view('header', $dataHeader);
        $this->load->view('HalamanAgribisnis', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    
    //bagian Varietas Asepan Boyolali
    public function VarietasAsepanBoyolali(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Varietas Asepan Boyolali";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'asepan boyolali','jenis_tembakau' => 'local']);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/AsepanBoyolali/VarietasAsepanBoyolali', $data);
        $this->load->view('footer',$this->counterPengunjung());
}

    //bagian budidaya AsepanBoyolali
    public function BudidayaAsepanBoyolali(){
        $jumlah = $this->M_budidaya->getJumlah('boyolali');
    $config['base_url'] = base_url()."index.php/Local/BudidayaAsepanBoyolali/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Asepan Boyolali";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'asepan boyolali', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('asepan boyolali');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/AsepanBoyolali/BudidayaAsepanBoyolali', $data);
    $this->load->view('footer',$this->counterPengunjung());
}
    //bagian penyakit AsepanBoyolali
    public function PenyakitAsepanBoyolali(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Penyakit Asepan Boyolali";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $w = array('kota' => 'asepan boyolali', );
        $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
        $data['penyakit'] = $this->M_penyakit->getDataP($w);
        $data['jumlah'] = $this->M_penyakit->getJumlah('asepan boyolali');   
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/AsepanBoyolali/PenyakitAsepanBoyolali', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

     //bagian pascapanen AsepanBoyolali
     public function PascaPanenAsepanBoyolali(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Pasca Panen Asepan Boyolali";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'asepan boyolali', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/AsepanBoyolali/PascaPanenAsepanBoyolali', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian agribisnis AsepanBoyolali
    public function AgribisnisAsepanBoyolali(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Agribisnis Asepan Boyolali";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
        
        $this->load->view('header', $dataHeader);
        $this->load->view('HalamanAgribisnis', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }


        //bagian VARIETAS Purwodadi
        public function VarietasPurwodadi(){
            $config['per_page'] = 9;
            $dari = $this->uri->segment('3');

            $dataHeader['judul'] = "Detail Varietas Purwodadi";
            $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
            $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );

            $this->load->view('header', $dataHeader);
			$this->load->view('Local/Purwodadi/VarietasPurwodadi', $data);
			$this->load->view('footer',$this->counterPengunjung());
    }


    //bagian BUDIDAYA Purwodadi
    public function BudidayaPurwodadi(){
        $jumlah = $this->M_budidaya->getJumlah('purwodadi');
        $config['base_url'] = base_url()."index.php/Local/BudidayaPurwodadi/";

        $config['total_rows'] = $jumlah;
        if($jumlah < 4 ){
            $config['per_page'] = $jumlah; 
        } else{
            $config['per_page'] = 4;
        }
        
        $config['num_links'] = $jumlah;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
        $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

        $this->pagination->initialize($config);
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Budidaya Purwodadi";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $w = array('kota' => 'purwodadi', );
        $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
        $data['jumlah'] = $this->M_budidaya->getJumlah('purwodadi');
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Purwodadi/BudidayaPurwodadi', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }
    
        //bagian PENYAKIT Purwodadi
        public function PenyakitPurwodadi(){
            $config['per_page'] = 9;
            $dari = $this->uri->segment('3');

            $dataHeader['judul'] = "Detail Penyakit Purwodadi";
            $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
            $w = array('kota' => 'purwodadi', );
            $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
            $data['penyakit'] = $this->M_penyakit->getDataP($w);
            $data['jumlah'] = $this->M_penyakit->getJumlah('purwodadi');   
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );
            
            $this->load->view('header', $dataHeader);
            $this->load->view('Local/Purwodadi/PenyakitPurwodadi', $data);
            $this->load->view('footer',$this->counterPengunjung());
     }

    //bagian Pasca Panen Purwodadi
    public function PascaPanenPurwodadi(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Pasca Panen Purwodadi";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'purwodadi', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Purwodadi/PascaPanenPurwodadi', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian Agribisnis Purwodadi
    public function AgribisnisPurwodadi(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');
    
        $dataHeader['judul'] = "Detail Agribisnis Purwodadi";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
        
        $this->load->view('header', $dataHeader);
        $this->load->view('HalamanAgribisnis', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian VARIETAS Garut
    public function VarietasGarut(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Varietas Garut";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'garut','jenis_tembakau' => 'local']);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );

        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Garut/VarietasGarut', $data);
        $this->load->view('footer',$this->counterPengunjung());
}


//bagian BUDIDAYA Garut
public function BudidayaGarut(){
    $jumlah = $this->M_budidaya->getJumlah('garut');
    $config['base_url'] = base_url()."index.php/Local/BudidayaGarut/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Garut";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'garut', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('garut');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Garut/BudidayaGarut', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian PENYAKIT Garut
public function PenyakitGarut(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Garut";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'garut', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('garut');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Garut/PenyakitGarut', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Pasca Panen Garut
public function PascaPanenGarut(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Garut";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'garut', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Garut/PascaPanenGarut', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Agribisnis Garut
public function AgribisnisGarut(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Garut";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

    
    //bagian VARIETAS Sumedang
    public function VarietasSumedang(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Varietas Sumedang";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'sumedang','jenis_tembakau' => 'local']);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );

        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Sumedang/VarietasSumedang', $data);
        $this->load->view('footer',$this->counterPengunjung());
}


//bagian BUDIDAYA Sumedang
public function BudidayaSumedang(){
    $jumlah = $this->M_budidaya->getJumlah('sumedang');
    $config['base_url'] = base_url()."index.php/Local/BudidayaSumedang/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Sumedang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sumedang', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('sumedang');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sumedang/BudidayaSumedang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian PENYAKIT Sumedang
public function PenyakitSumedang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Sumedang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sumedang', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('sumedang');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sumedang/PenyakitSumedang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Pasca Panen Sumedang
public function PascaPanenSumedang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Sumedang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sumedang', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );

    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sumedang/PascaPanenSumedang', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Agribisnis Sumedang
public function AgribisnisSumedang(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Sumedang";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}


        //bagian VARIETAS Majalengka
        public function VarietasMajalengka(){
            $config['per_page'] = 9;
            $dari = $this->uri->segment('3');
    
            $dataHeader['judul'] = "Detail Varietas Majalengka";
            $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
            $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'majalengka','jenis_tembakau' => 'local']);
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );
    
            $this->load->view('header', $dataHeader);
            $this->load->view('Local/Majalengka/VarietasMajalengka', $data);
            $this->load->view('footer',$this->counterPengunjung());
    }
    
    
    //bagian BUDIDAYA Majalengka
    public function BudidayaMajalengka(){
        $jumlah = $this->M_budidaya->getJumlah('majalengka');
    $config['base_url'] = base_url()."index.php/Local/BudidayaMajalengka/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Majalengka";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'majalengka', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('majalengka');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Majalengka/BudidayaMajalengka', $data);
    $this->load->view('footer',$this->counterPengunjung());
    }
    
    //bagian PENYAKIT Majalengka
    public function PenyakitMajalengka(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Penyakit Majalengka";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $w = array('kota' => 'majalengka', );
        $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
        $data['penyakit'] = $this->M_penyakit->getDataP($w);
        $data['jumlah'] = $this->M_penyakit->getJumlah('majalengka');   
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Majalengka/PenyakitMajalengka', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }
    
    //bagian Pasca Panen Majalengka
    public function PascaPanenMajalengka(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');
    
        $dataHeader['judul'] = "Detail Pasca Panen Majalengka";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'majalengka', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
        
        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Majalengka/PascaPanenMajalengka', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }
    
    //bagian Agribisnis Majalengka
    public function AgribisnisMajalengka(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');
    
        $dataHeader['judul'] = "Detail Agribisnis Majalengka";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
        
        $this->load->view('header', $dataHeader);
        $this->load->view('HalamanAgribisnis', $data);
        $this->load->view('footer',$this->counterPengunjung());
    }

    //bagian VARIETAS Sleman
    public function VarietasSleman(){
        $config['per_page'] = 9;
        $dari = $this->uri->segment('3');

        $dataHeader['judul'] = "Detail Varietas Sleman";
        $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
        $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari, ['kota' => 'sleman','jenis_tembakau' => 'local']);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );

        $this->load->view('header', $dataHeader);
        $this->load->view('Local/Sleman/VarietasSleman', $data);
        $this->load->view('footer',$this->counterPengunjung());
}


//bagian BUDIDAYA Sleman
public function BudidayaSleman(){
    $jumlah = $this->M_budidaya->getJumlah('sleman');
    $config['base_url'] = base_url()."index.php/Local/BudidayaSleman/";

    $config['total_rows'] = $jumlah;
    if($jumlah < 4 ){
        $config['per_page'] = $jumlah; 
    } else{
        $config['per_page'] = 4;
    }
    
    $config['num_links'] = $jumlah;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
    $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

    $this->pagination->initialize($config);
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Budidaya Sleman";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sleman', );
    $data['varietas'] = $this->M_budidaya->getData($config['per_page'],$dari, $w);
    $data['jumlah'] = $this->M_budidaya->getJumlah('sleman');
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sleman/BudidayaSleman', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian PENYAKIT Sleman
public function PenyakitSleman(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Penyakit Sleman";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sleman', );
    $data['varietas'] = $this->M_penyakit->getData($config['per_page'],$dari, $w);
    $data['penyakit'] = $this->M_penyakit->getDataP($w);
    $data['jumlah'] = $this->M_penyakit->getJumlah('sleman');   
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sleman/PenyakitSleman', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Pasca Panen Sleman
public function PascaPanenSleman(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Pasca Panen Sleman";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $w = array('kota' => 'sleman', );
    $data['varietas'] = $this->M_Pasca->getData($config['per_page'],$dari, $w);
    $data['pascapanen'] = $this->M_Pasca->getDataP($w);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    
    $this->load->view('header', $dataHeader);
    $this->load->view('Local/Sleman/PascaPanenSleman', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

//bagian Agribisnis Sleman
public function AgribisnisSleman(){
    $config['per_page'] = 9;
    $dari = $this->uri->segment('3');

    $dataHeader['judul'] = "Detail Agribisnis Sleman";
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
    $str_links = $this->pagination->create_links();
    $data['links'] = explode('&nbsp;',$str_links );
    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
    
    $this->load->view('header', $dataHeader);
    $this->load->view('HalamanAgribisnis', $data);
    $this->load->view('footer',$this->counterPengunjung());
}

    
}