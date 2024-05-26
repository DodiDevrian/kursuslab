<?php

class M_home extends CI_Model
{
    public function kursus_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->order_by('id_kursus', 'DESC');
        $this->db->limit(3);

        return $this->db->get()->result();
    }
}