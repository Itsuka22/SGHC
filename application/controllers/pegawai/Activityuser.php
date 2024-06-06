<?php
class ActivityUser extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPotongan_Gaji');
        $this->load->model('ModelPenggajian');
        $this->load->model('ModelActivityUser');
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

	function index()
	{
        $data['title'] = "";
        // print_r($this->session->userdata());
        // exit();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/list_activityUser', $data);
        $this->load->view('template_pegawai/footer');
    }

    function TampilActivity()
    {
        $id_karyawan=$this->session->userdata('id_pegawai');
        $data['data']=$this->ModelActivityUser->get_data($id_karyawan)->result_object();
        
        $this->load->view('pegawai/data_activityUser',$data);
    }

    function tambah_activity()
    {
        // $aksi=$this->input->post('aksi');
        $data['data']=$this->ModelPenggajian->get_data('tb_jns_kegiatan')->result_array();
        $data['listKaryawan']=$this->ModelPenggajian->get_data('data_pegawai')->result_array();

        $this->load->view('pegawai/tambah_activityUser',$data);
    }

    function do_edit_activity(){
        $response=array();
        $idActivity     =$this->input->post('idActivity');
        $id_pegawai     =$this->session->userdata('id_pegawai');
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
                $getPathOld=$this->ModelActivityUser->get_where_join($where)->result_array();
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
        $id_pegawai     =$this->session->userdata('id_pegawai');;
        $id_kegiatan    =$this->input->post('jns_kegiatan');
        $durasi         =$this->input->post('timeInput');
        $tanggal        =date('Y-m-d');
        $status         =0;
        $photo          =$_FILES['file']['name'];

        $where=" where tanggalAct='$tanggal' and b.id_pegawai='$id_pegawai'";
        $check=$this->ModelActivityUser->get_where_join($where)->result();
        // print_r($check);
        // exit();
        if(empty($check)){
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
            $response['status'] = 'Success';
                $response['message'] = 'Data Success Entry';

                $this->db->insert('tb_activity',$data);
        }else{
                $response['status'] = 'Error';
                $response['message'] = 'Duplicate Date Your Activity';
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    function edit_activity()
    {
        $id_activity=$this->input->post('id_activity');
        $where=" where id_activity='$id_activity'";
        
        $data['data']=$this->ModelPenggajian->get_data('tb_jns_kegiatan')->result_array();
        $data['listKaryawan']=$this->ModelPenggajian->get_data('data_pegawai')->result_array();
        $data['hasil']=$this->ModelActivityUser->get_where_join($where)->result();

        $this->load->view('pegawai/edit_activityUser',$data);
    }
    function hapus_activity()
    {
        $id_activity=$this->input->post('id_activity');
        $whereQr = array('id_activity' => $id_activity);
        $where=" where id_activity='$id_activity'";
        $getPathOld=$this->ModelActivityUser->get_where_join($where)->result_array();
        $pathFileLama='./photo/'.$getPathOld[0]['photoAct'];
            
        if (unlink($pathFileLama)) {
                $this->ModelPenggajian->delete_data($whereQr, 'tb_activity');
                $response['status'] = 'Success';
                $response['message'] = 'File successfully delete';
        }else{
            redirect('pegawai/activityuser');
        }

        
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