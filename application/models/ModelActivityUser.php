<?php

class ModelActivityUser extends CI_model{
    
    // public function get_data($param) {
    //     $query="SELECT * from tb_activity a 
    //     left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
    //     left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan 
    //     WHERE b.id_pegawai='$param'
    //     ORDER BY a.tanggalAct DESC";

    //     return $this->db->query($query);
	// }

    public function get_data($id_karyawan, $limit, $offset) {
        $query = "SELECT * FROM tb_activity a 
        LEFT JOIN data_pegawai b ON a.id_pegawai = b.id_pegawai 
        LEFT JOIN tb_jns_kegiatan c ON a.id_kegiatan = c.id_kegiatan 
        WHERE b.id_pegawai = $id_karyawan
        ORDER BY   
            CASE 
                WHEN a.statusAct = 2 THEN 0 
                WHEN a.statusAct = 0 THEN 1 
                ELSE 2 
            END,
            a.tanggalAct DESC
        LIMIT $limit OFFSET $offset";
        return $this->db->query($query, array($id_karyawan, (int)$limit, (int)$offset))->result_object();
    }
    public function get_where_join($where){
        $query="SELECT * from tb_activity a 
        left JOIN data_pegawai b on a.id_pegawai=b.id_pegawai 
        left JOIN tb_jns_kegiatan c on a.id_kegiatan=c.id_kegiatan 
        $where";
        return $this->db->query($query);
    }

    public function get_count($param) {
        $query = "SELECT COUNT(*) AS count FROM tb_activity a 
                  LEFT JOIN data_pegawai b ON a.id_pegawai = b.id_pegawai 
                  WHERE b.id_pegawai = '$param'";

        return $this->db->query($query)->row()->count;
    }

    // public function get_count($id_karyawan) {
    //     $query = "SELECT COUNT(*) as count FROM tb_activity WHERE id_pegawai = ?";
    //     $result = $this->db->query($query, array($id_karyawan))->row();
    //     return $result->count;
    // }
}
?>