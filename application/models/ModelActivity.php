<?php

class ModelActivity extends CI_model{
    
    public function get_data($limit, $offset) {
        $query="SELECT * FROM tb_activity a 
        LEFT JOIN data_pegawai b ON a.id_pegawai = b.id_pegawai 
        LEFT JOIN tb_jns_kegiatan c ON a.id_kegiatan = c.id_kegiatan 
        ORDER BY 
            CASE 
                WHEN a.statusAct = 0 THEN 0
                WHEN a.statusAct = 2 THEN 0
                ELSE 1 
            END,
            a.tanggalAct DESC
        LIMIT $limit OFFSET $offset";

        return $this->db->query($query, array((int)$limit, (int)$offset))->result();
	}
    public function get_count() {
        $query = "SELECT COUNT(*) AS count FROM tb_activity a 
                LEFT JOIN data_pegawai b ON a.id_pegawai = b.id_pegawai 
                LEFT JOIN tb_jns_kegiatan c ON a.id_kegiatan = c.id_kegiatan";

        return $this->db->query($query)->row()->count;
    }
    public function get_where_join($where){
        $query="SELECT * from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan 
        $where";
        return $this->db->query($query);
    }

    public function get_dataact() {
        $query="SELECT * FROM tb_activity a 
        LEFT JOIN data_pegawai b ON a.id_pegawai = b.id_pegawai 
        LEFT JOIN tb_jns_kegiatan c ON a.id_kegiatan = c.id_kegiatan 
        ORDER BY   
            CASE 
                WHEN a.statusAct = 0 THEN 0
                ELSE 1 
            END,
            a.tanggalAct DESC;";

        return $this->db->query($query);
	}

}
?>