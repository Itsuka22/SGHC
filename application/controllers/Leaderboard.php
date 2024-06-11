<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Leaderboard_model', 'leaderboard');


  }

    public function index() {
        // $this->load->model('Leaderboard_model, leaderboard');
        $dataPegawai= $this->leaderboard->getEmployee();

        $data=array();
        foreach($dataPegawai as $result){
          $dataHeader = $this->leaderboard->getData($result['id_pegawai']);
          // print_r($dataHeader);
          $datapegawaiN[]=array(
            
            "id_pegawai"=>$result['id_pegawai'],
            "nama_pegawai"=>$result['nama_pegawai'],
            "point"=>count($dataHeader)
            );
        }
        usort($datapegawaiN, function($a, $b) {
          return $b['point'] - $a['point'];
        });

        $data = [
          //  'leaderboard' => $standing,
           'dataHeader'=>$datapegawaiN
        ];

        $this->load->view('templates/header.php');
        $this->load->view('../views/leaderboard.php', $data);
        $this->load->view('templates/footer.php');
    }
    public function detailActivity(){
      $id=$this->input->post('idPegawai');
      $detail=$this->leaderboard->getData($id);
      $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($detail));
    }
}
?>