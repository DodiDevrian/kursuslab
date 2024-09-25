<?php

class M_diskusi extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_diskusi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_diskusi.id_user', 'left');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_diskusi.id_kursus', 'left');
        $this->db->order_by('id_diskusi', 'DESC');

        return $this->db->get()->result();
    }
}