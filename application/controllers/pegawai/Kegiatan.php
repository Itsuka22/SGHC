<?php

class Kegiatan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Kegiatan_model', 'kegiatan');
  }

  public function index() {
    // $data['kegiatan'] = $this->kegiatan->get_kegiatan();
    $this->load->view('template_pegawai/header.php');
    $this->load->view('template_pegawai/sidebar');
    $this->load->view('pegawai/kegiatan_view.php');
    $this->load->view('template_pegawai/footer.php');
  }

  public function upload(){

  }

}

?>