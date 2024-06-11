<?php
class Appactivity extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPotongan_Gaji');
        $this->load->model('ModelPenggajian');
        $this->load->model('ModelActivity');
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
	function index()
	{
        $data['title'] = "";

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/appactivity/list_appactivity', $data);
        $this->load->view('template_admin/footer');
    }

    function TampilAppActivity()
    {
        $data['data']=$this->ModelActivity->get_data()->result_object();
        $this->load->view('admin/appactivity/data_appactivity',$data);
    }

    function tambah_activity()
    {
        // $aksi=$this->input->post('aksi');
        $data['data']=$this->ModelPenggajian->get_data('tb_jns_kegiatan')->result_array();
        $data['listKaryawan']=$this->ModelPenggajian->get_data('data_pegawai')->result_array();

        $this->load->view('admin/activity/tambah_activity',$data);
    }

    function do_edit_activity(){
        $response=array();
        $idActivity     =$this->input->post('idActivity');
        $id_pegawai     =$this->input->post('karyawan');
        $id_kegiatan    =$this->input->post('jns_kegiatan');
        $durasi         =$this->input->post('timeInput');
        $tanggal        =date('Y-m-d');
        $status         =0;
        // $_FILES['file']['name']=="" OR $_FILES['file']['name'] ==null
        if(empty($_FILES['file']['name'])){
            //sudah aman tidak terbaca jika kosong
            //jika kosong cukup update data kecuali path foto
            $data=array(
                'id_pegawai'=>$id_pegawai,
                'id_kegiatan'=>$id_kegiatan,
                'durasiAct'=>$durasi,
                'tanggalAct'=>$tanggal,
                'statusAct'=>$status
            );
            $this->db->where('id_activity', $idActivity);
            $this->db->update('tb_activity', $data);
            $response['status'] = 'success';
            $response['message'] = 'File successfully udpate';
            
        }else{
            //jika tidak kosong
            $photo='activity-'.$id_pegawai.$_FILES['file']['name'];
            $pathFileBaru='./photo/'.$photo;
            if(file_exists($pathFileBaru)){

                //gambar sama tidak berubah maka cukup update table
                $data=array(
                    'id_pegawai'=>$id_pegawai,
                    'id_kegiatan'=>$id_kegiatan,
                    'durasiAct'=>$durasi,
                    'tanggalAct'=>$tanggal,
                    'statusAct'=>$status
                );
                $this->db->where('id_activity', $idActivity);
                $this->db->update('tb_activity', $data);

                $response['status'] = 'success';
                $response['message'] = 'File successfully udpate';
                
            }else{
                //jika gambar berbeda maka unlink/delete gambar lama ganti gambar baru
                $where=" where id_activity='$idActivity'";
                $getPathOld=$this->ModelActivity->get_where_join($where)->result_array();
                $pathFileLama='./photo/'.$getPathOld[0]['photoAct'];
                if (unlink($pathFileLama)) {
                    $config['upload_path'] 		= './photo';
                    $config['allowed_types'] 	= 'jpg|jpeg|png|tiff|heic';
                    $config['max_size']			= 	2048;
                    $config['file_name']		= 	'activity-'.$id_pegawai.$photo;
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('file')){
                        echo "Photo Gagal Diupload !";
                    }else{
                        $photo=$this->upload->data('file_name');
                    }
                    $data=array(
                        'id_pegawai'=>$id_pegawai,
                        'id_kegiatan'=>$id_kegiatan,
                        'durasiAct'=>$durasi,
                        'tanggalAct'=>$tanggal,
                        'statusAct'=>$status,
                        'photoAct'=>$photo
                    );

                    $this->db->where('id_activity', $idActivity);
                    $this->db->update('tb_activity', $data);
                    $response['status'] = 'Success';
                    $response['message'] = 'File successfully udpate';

                } else {

                    $config['upload_path'] 		= './photo';
                    $config['allowed_types'] 	= 'jpg|jpeg|png|tiff|heic';
                    $config['max_size']			= 	2048;
                    $config['file_name']		= 	$photo;
                    // print_r($config);
                    // exit();
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('file')){
                        echo "Photo Gagal Diupload !";
                    }else{
                        $photo=$this->upload->data('file_name');
                    }
                    $data=array(
                        'id_pegawai'=>$id_pegawai,
                        'id_kegiatan'=>$id_kegiatan,
                        'durasiAct'=>$durasi,
                        'tanggalAct'=>$tanggal,
                        'statusAct'=>$status,
                        'photoAct'=>$photo
                    );
                    
                    $this->db->where('id_activity', $idActivity);
                    $this->db->update('tb_activity', $data);

                    $response['status'] = 'Success';
                    $response['message'] = 'File successfully udpate';
                } 
            }
            
        }

        
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    function simpanActivity()
    {
        // print_r($this->input->post());
        // print_r($_FILES['file']);
        $id_pegawai     =$this->input->post('karyawan');
        $id_kegiatan    =$this->input->post('jns_kegiatan');
        $durasi         =$this->input->post('timeInput');
        $tanggal        =date('Y-m-d');
        $status         =0;
        $photo          =$_FILES['file']['name'];

        if($photo=''){}else{
            $config['upload_path'] 		= './photo';
            $config['allowed_types'] 	= 'jpg|jpeg|png|tiff|heic';
            $config['max_size']			= 	2048;
            $config['file_name']		= 	'activity-'.$id_pegawai.$photo;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Photo Gagal Diupload !";
            }else{
                $photo=$this->upload->data('file_name');
            }
        }
        $data=array(
            'id_pegawai'=>$id_pegawai,
            'id_kegiatan'=>$id_kegiatan,
            'durasiAct'=>$durasi,
            'tanggalAct'=>$tanggal,
            'statusAct'=>$status,
            'photoAct'=>$photo
        );

            $this->db->insert('tb_activity',$data);
    }

    function app_activity()
    {
        $id_activity=$this->input->post('id_activity');
        $this->db->set('statusAct', '1');
        $this->db->where('id_activity', $id_activity);
        $this->db->update('tb_activity');

        $this->load->view('admin/appactivity/data_appactivity',$data);
    }
    function hapus_activity()
    {
        // print_r($this->input->post());
        // exit();
        $id_activity=$this->input->post('id_activity');
        // $whereQ = array('id_activity' => $id_activity);
        // $where=" where id_activity='$id_activity'";
        $reason=$this->input->post('reasonAct');
        // $getPathOld=$this->ModelActivity->get_where_join($where)->result_array();
        // $pathFileLama='./photo/'.$getPathOld[0]['photoAct'];
        $set=array('statusAct'=>'2',
                    'reasonAct'=>$reason);
        //  $this->load->view('admin/activity/tambah_activity',$data);
        $this->db->set($set);
        $this->db->where('id_activity', $id_activity);
        $this->db->update('tb_activity');
        // $this->ModelPenggajian->delete_data($whereQ, 'tb_activity');
        $response['status'] = 'Success';
        $response['message'] = 'File successfully delete';
        // }else{
        // redirect('admin/activity');
       
    }

    function editPotongan()
    {
        $data = array(
            'potongan'=>$this->input->post('potongan_baru'),
            'jml_potongan'=>$this->input->post('jml_potongan')
		);
        $potongan = $this->input->post('potongan_lama');
        $this->db->where('potongan', $potongan);
        $this->db->update('potongan_gaji',$data);
    }
    function hapusPotongan()
    {
        $potongan=$this->input->post('potongan');
        $this->db->delete('potongan_gaji',array('potongan' => $potongan));
    }
}
?>