<?php
class Leaderboard_model extends CI_Model {

    public function get_leaderboard() {
        $this->db->select('username, score');
        $this->db->from('tb_leaderboard');
        $this->db->order_by('score', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
?>