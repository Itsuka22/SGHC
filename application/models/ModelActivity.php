<?php

class ModelActivity extends CI_model{
    
    public function get_data() {
        $query="SELECT * from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan 
        ORDER BY a.tanggalAct ASC";

        return $this->db->query($query);
	}
    public function get_where_join($where){
        $query="SELECT * from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan 
        $where";
        return $this->db->query($query);
    }

}
?>