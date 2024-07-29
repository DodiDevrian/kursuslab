<?php

class M_pretest extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->order_by('id_kursus', 'DESC');

        return $this->db->get()->result();
    }

    public function lists_soal()
    {
        $this->db->select('*');
        $this->db->from('tbl_pretest');
        $this->db->join('tbl_materi', 'tbl_materi.id_materi = tbl_pretest.id_materi', 'left');
        $this->db->order_by('id_pretest', 'ASC');

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_pretest', $data);
    }
}