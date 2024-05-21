<?php
class Leaderboard_model extends CI_Model {

    public function getLeaderboard() {
        $this->db->select('username, point');
        $this->db->from('tb_leaderboard');
        $this->db->order_by('point', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
?>