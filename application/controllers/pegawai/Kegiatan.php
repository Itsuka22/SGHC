<?php

class Kegiatan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Kegiatan_model', 'kegiatan');

    if($this->session->userdata('hak_akses') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
		}
  }

  public function index() {
		$data['title'] = "Data Kegiatan";
		$data['kegiatan'] = $this->kegiatan->getKegiatan();

    // $data['kegiatan'] = $this->kegiatan->get_kegiatan();
    $this->load->view('template_pegawai/header.php');
    $this->load->view('template_pegawai/sidebar');
    $this->load->view('pegawai/kegiatan_view.php' , $data);
    $this->load->view('template_pegawai/footer.php');
  }

  public function tambah_kegiatan() {


    // $data['kegiatan'] = $this->kegiatan->get_kegiatan();
    $this->load->view('template_pegawai/header.php');
    $this->load->view('template_pegawai/sidebar');
    $this->load->view('pegawai/tambahkegiatan_view.php');
    $this->load->view('template_pegawai/footer.php');
  }

  public function upload() {
    // Load form validation library and set rules for form inputs
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->tambah_kegiatan();
		} else {
			$nkegiatan			= $this->input->post('n_kegiatan');
			$tanggal	= $this->input->post('tanggal');
			$gambar		= $_FILES['photo']['name'];
			if($gambar=''){}else{
				$config['upload_path'] 		= './photo';
				$config['allowed_types'] 	= 'jpg|jpeg|png|tiff|heif';
				$config['max_size']			= 	6048;
				$config['file_name']		= 	'pegawai-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('photo')){
					echo "Photo Gagal Diupload !";
				}else{
					$gambar=$this->upload->data('file_name');
				}
			}

      // Masih tahap modifikasi
      // Belum ada penambahan logika untuk max upload 1 hari 1 kegiatan

			$data = array(
				'nik' 			=> $nik,
				'files' 		=> $gambar,
			);

			$this->ModelPenggajian->insert_data($data, 'data_pegawai');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_pegawai');
		}

    // Load the view with the notification data
    $this->load->view('upload_result', $data);
}

public function _rules() {
  $this->form_validation->set_rules('n_kegiatan','Nama Kegiatan','required');
  $this->form_validation->set_rules('tanggal','Tanggal','required');
}

}

?>