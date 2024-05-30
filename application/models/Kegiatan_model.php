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

    public function getDelete($id) {
      $get_where = $this->db->get_where('tb_activity', array('id' => $id))->row_array();
      if ($get_where) {
        $files = $get_where['files'];
        $deleted = $this->db->delete('tb_activity', array('id' => $id));
        if ($deleted) {
          unlink(FCPATH . './assets/files/' . $files);
        } else {
          log_message('error', 'Database deletion failed for activity ID: ' . $id); // Example using a logging function
        }
      } else {
        // Handle potential record not found scenario (optional)
      }
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