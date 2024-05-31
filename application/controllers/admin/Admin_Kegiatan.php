<?php

class Admin_Kegiatan extends CI_Controller {

  public function __construct(){
		parent::__construct();
    $this->load->model('Kegiatan_model', 'kegiatan');

		if($this->session->userdata('hak_akses') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
		}
	}


	public function index() 
	{
    // $sql = "UPDATE "

		$data = [
      'title' => "Data Kegiatan",
      'jabatan' => $this->kegiatan->getListKegiatan()
    ]; 

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/list_kegiatan', $data);
		$this->load->view('template_admin/footer');
	}

};

?>