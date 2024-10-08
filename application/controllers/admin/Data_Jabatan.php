<?php

class Data_Jabatan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("ModelJabatan","ModelJabatan");

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
		$data['title'] = "Data Kegiatan";
		$data['jns_kegiatan'] = $this->ModelPenggajian->get_data('tb_jns_kegiatan')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/data_jabatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data() 
	{
		// $data['jns_kegiatan'] = $this->ModelPenggajian->get_data('tb_jns_kegiatan')->result_array();
		$data['title'] = "Tambah Jenis Kegiatan";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/tambah_dataJabatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data_aksi() {
		$this->_rules();

		// if($this->form_validation->run() == FALSE) {
		// 	$this->tambah_data();
		// } else {
			$nama_jabatan	= $this->input->post('jns_kegiatan');
			$status		= $this->input->post('status');
			$tj_transport	= $this->input->post('tj_transport');
			$uang_makan		= $this->input->post('uang_makan');

			$data = array(
				'nm_kegiatan' 	=> $nama_jabatan,
				'status' 	=> $status,
			);

			$this->ModelPenggajian->insert_data($data, 'tb_jns_kegiatan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_jabatan');
		// }
	}

	public function update_data($id) 
	{
		$where = array('id_kegiatan' => $id);
		$data['jns_kegiatan'] = $this->db->query("SELECT * FROM tb_jns_kegiatan WHERE id_kegiatan= '$id'")->result();
		$data['title'] = "Update Data Kegiatan";

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/update_dataJabatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data_aksi() {
		$this->_rules();
		// if($this->form_validation->run() == FALSE) {
		// 	$this->update_data();
		// } else {
			$id				= $this->input->post('id_kegiatan');
			$jns_kegiatan	= $this->input->post('jns_kegiatan');
			$status		= $this->input->post('status');
	

			$data = array(
				'nm_kegiatan' 	=> $jns_kegiatan,
				'status' 	=> $status,
			);

			$where = array(
				'id_kegiatan' => $id
			);

			$this->ModelPenggajian->update_data('tb_jns_kegiatan', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_jabatan');
		// }
	}

	public function _rules() {
		$this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required');
		$this->form_validation->set_rules('gaji_pokok','Gaji Pokok','required');
		$this->form_validation->set_rules('tj_transport','Tunjangan Transport','required');
		$this->form_validation->set_rules('uang_makan','Uang Makan','required');
	}

	public function delete_data($id) {
		$where = array('id_kegiatan' => $id);
		$this->ModelPenggajian->delete_data($where, 'tb_jns_kegiatan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_jabatan');
	}
}

?>