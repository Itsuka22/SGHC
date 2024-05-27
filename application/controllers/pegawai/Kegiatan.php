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
		$data = [
			'title'    => "Data Kegiatan",
			'kegiatan' => $this->kegiatan->getKegiatan()
		]; 

    // $data['kegiatan'] = $this->kegiatan->get_kegiatan();
    $this->load->view('template_pegawai/header.php');
    $this->load->view('template_pegawai/sidebar');
    $this->load->view('pegawai/kegiatan_view.php' , $data);
    $this->load->view('template_pegawai/footer.php');
  }

  public function tambah_kegiatan() {
		// $data['title'] = "Tambah Data Pegawai";
		
    // $data['kegiatan'] = $this->kegiatan->get_kegiatan();
    $this->load->view('template_pegawai/header.php');
    $this->load->view('template_pegawai/sidebar');
    $this->load->view('pegawai/tambahkegiatan_view.php');
    $this->load->view('template_pegawai/footer.php');
  }

  public function upload_data() {

		$config['upload_path']		= './photo';
		$config['allowed_types']      = '*';
		$config['max_size']           = 6048; //max 2mb
		$this->load->library('upload', $config);

		// $this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('files')){
			$data1 		= $this->upload->data();
			$thumbnail	= $data1['file_name'];
		}else{
			$error1 = $this->upload->display_errors();
		}

		$id_pegawai = $this->session->userdata('id_pegawai');

		$data = [
			'id_pegawai' => $id_pegawai,
			'n_kegiatan'	=> $this->input->post('n_kegiatan', TRUE),
			'files'	=> $thumbnail,
			'tanggal'	=> date('Y-m-d H:i:s')
		];
		$this->db->insert('tb_activity', $data);

		// print_r($data);
		// exit();

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('pegawai/kegiatan');
		

}

public function delete_data($id) {
	$where = array('id_pegawai' => $id);
	$this->ModelPenggajian->delete_data($where, 'data_pegawai');
	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pegawai');
}

// fix delete button kegiata


}

?>