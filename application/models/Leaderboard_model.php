<?php
class Leaderboard_model extends CI_Model {

    public function getLeaderboardData(){
        $query = $this->db->query(
          "SELECT u.username, COUNT(a.id_pegawai) AS activity_count
          FROM tb_activity a
          JOIN data_pegawai u ON u.id_pegawai = a.id_pegawai
          GROUP BY a.id_pegawai
          ORDER BY activity_count DESC;");
        return $query->result_array();
      }
}
?>