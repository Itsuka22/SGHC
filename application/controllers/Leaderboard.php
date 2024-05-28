<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Leaderboard_model', 'leaderboard');


  }

    public function index() {
        // $this->load->model('Leaderboard_model, leaderboard');

        // $data['leaderboard'] = $this->leaderboard->get_leaderboard();
        $standing = $this->leaderboard->getLeaderboardData();
        $data = [
           'leaderboard' => $standing
        ];

        $this->load->view('templates/header.php');
        $this->load->view('../views/leaderboard.php', $data);
        $this->load->view('templates/footer.php');
    }
}
?>