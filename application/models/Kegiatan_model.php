<?php
class Kegiatan_model extends CI_Model {

    public function getKegiatan() {
      $query = "SELECT * FROM `tb_activity";
      return $this->db->query($query)->result_array();
    }

    public function delete_data($whare,$table){
      $this->db->where($whare);
      $this->db->delete($table);
    }

    public function getDelete($id){
      $get_where = $this->db->get_where('tb_activity', array('id' => $id))->row_array();
      // print_r($get_where);
      // exit();
      // $video = $get_where['video'];
      $files = $get_where['files'];
      // print_r($video);
      // exit();
   
        unlink(FCPATH . 'assets/upload/'.$files);
        // unlink(FCPATH . './assets/dist/video/'.$video);
      
  
      $this->db->where('id', $id);
      $this->db->delete('tb_activity');
      
    }

    public function getKegiatanById($id) {
      $query = "SELECT * FROM `tb_activity` WHERE `id_pegawai` = $id";
      return $this->db->query($query)->result_array();
    }
    
    public function countUploadsToday($id_pegawai) {
      $query = $this->db->query("SELECT COUNT(*) as count FROM tb_activity WHERE id_pegawai = ? AND DATE(tanggal) = ?", array($id_pegawai, date('Y-m-d')));
      $result = $query->row_array();
      return $result['count'];
  }



// SELECT id_pegawai, COUNT(*) AS activity_count
// FROM tb_activity
// GROUP BY id_pegawai
// ORDER BY activity_count DESC
    
}
?>