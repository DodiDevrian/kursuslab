<?php

class M_posttest extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->order_by('id_posttest', 'DESC');

        return $this->db->get()->result();
    }

    public function lists_soal()
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_posttest.id_kursus', 'left');
        $this->db->order_by('id_posttest', 'ASC');

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_posttest', $data);
    }



    public function detail($id_posttest)
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_posttest.id_kursus', 'left');
        $this->db->where('id_posttest', $id_posttest);

        return $this->db->get()->row();
    }

    public function list_kunci()
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->order_by('id_kunciposttest', 'DESC');

        return $this->db->get()->result();
    }

    public function kunci($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function add_kunci($data)
    {
        $this->db->insert('tbl_kunci_posttest', $data);
    }

    public function detail_kunci($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function submit($data)
    {
        $this->db->insert('tbl_do_posttest', $data);
    }

    public function hasil_posttest($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function nilai()
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->order_by('id_doposttest', 'ASC');

        return $this->db->get()->result();
    }

    public function do_posttest()
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_do_posttest.id_kursus', 'left');
        $this->db->order_by('id_doposttest', 'ASC');

        return $this->db->get()->result();
    }

}