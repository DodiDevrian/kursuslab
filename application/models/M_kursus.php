<?php

class M_kursus extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->order_by('id_kursus', 'DESC');

        return $this->db->get()->result();
    }

    public function detail_kursus($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function lists_materi()
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->order_by('id_materi', 'ASC');

        return $this->db->get()->result();
    }

    public function lists_materi_button()
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->order_by('id_materi', 'ASC');
        // $this->db->limit(1);

        return $this->db->get()->result();
    }

    public function detail_materi($id_materi)
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->where('id_materi', $id_materi);

        return $this->db->get()->row();
    }

    
}