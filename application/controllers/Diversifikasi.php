<<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Diversifikasi extends CI_Controller {
public function __construct()
{
    parent::__construct();
    $this->load->model('diversifikasi_model');
    $this->load->model('M_varietas');
    $this->load->model('M_leaflet');
    
}

public function index()
{
    $dataHeader['judul'] = "Virginia"; 
    $this->load->view('header', $dataHeader);
    $this->load->view('Diver/index');
    $this->load->view('footer',$this->counterPengunjung());
   
}
public function Asarko()
{
    $dataHeader['judul'] = "Asarko"; 
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $this->load->view('header', $dataHeader);
    $this->load->view('Diver/Asarko',$data);
    $this->load->view('footer',$this->counterPengunjung());
}

public function Parfum()
{
    $dataHeader['judul'] = "Parfum"; 
    $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    $this->load->view('header', $dataHeader);
    $this->load->view('Diver/Parfum',$data);
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

}

/* End of file Diversifikasi.php */

?>