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
    
    
}
?>