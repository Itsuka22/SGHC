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

		$id = $this->session->userdata('id_pegawai');
    $data['title'] = 'Daftar Kegiatan';
    $data['kegiatan'] = $this->kegiatan->getKegiatanById($id);

		
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
		$id_pegawai = $this->session->userdata('id_pegawai');

    // Load model if not already loaded
    $this->load->model('Kegiatan_model', 'kegiatan');

    // Check upload count for today
    $upload_count = $this->kegiatan->countUploadsToday($id_pegawai);

    if ($upload_count >= 2) {
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda sudah mencapai batas maksimal upload hari ini!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('pegawai/kegiatan');
        return;
    }

		$config['upload_path']		= './assets/upload/';
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

public function delete($id) {
	$where = array('id' => $id);
	$this->kegiatan->delete_data($where,'tb_activity');
	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('pegawai/kegiatan');
}

public function edit($id) {
	$where = array('id' => $id);
	$updt = $this->db->query("SELECT * FROM tb_activity WHERE id ='$id'")->result();
  // $data['kegiatan'] = $this->kegiatan->edit_data($where,'tb_activity')->result();
	$data = [
		'title'    => "Edit Data Kegiatan",
		'kegiatan' => $updt
	];

  $this->load->view('template_pegawai/header.php');
  $this->load->view('template_pegawai/sidebar');
  $this->load->view('pegawai/editkegiatan_view.php',$data);
  $this->load->view('template_pegawai/footer.php');
}

public function update() {

	$data = [
		'n_kegiatan'  => $this->input->post('n_kegiatan', TRUE)
	];

	$id = $this->input->post('id');

	$this->db->where('id', $id);
	$this->db->update('tb_activity', $data);
	$this->session->set_flashdata('message','
	<script>
	Swal.fire({
		title: "Video Berhasil di Update",
		text: "You clicked the button!",
		type: "success",
		});
	</script>
	');
	redirect('pegawai/kegiatan');


}




// fix delete button kegiata


}

?>