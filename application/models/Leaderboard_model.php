<?php
class Leaderboard_model extends CI_Model {

    public function getLeaderboardData($param){
        $query = $this->db->query(
          "SELECT u.username, COUNT(a.id_pegawai) AS activity_count
          FROM tb_activity a
          JOIN data_pegawai u ON u.id_pegawai = a.id_pegawai
          where u.id_pegawai='$param'
          GROUP BY a.id_pegawai
          ORDER BY activity_count DESC;");
        return $query->result_array();
      }
    public function getData($param){
      $query=$this->db->query("SELECT *,'1'as Point from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan  where a.statusAct='1' AND b.id_pegawai='$param'
        ORDER BY a.tanggalAct ASC");
        return $query->result_array();
    }
    public function getDetail($param){
      $query=$this->db->query("SELECT *,'1'as Point from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan  where a.statusAct='1' AND a.id_activity='$param'
        ORDER BY a.tanggalAct ASC");
        return $query->result_array();
    }
    public function getEmployee(){
      $query=$this->db->query("select * from data_pegawai where jabatan<>'admin'");
      return $query->result_array();
    }
}
?>