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

    public function do_pretest()
    {
        $this->db->select('*');
        $this->db->from('tbl_do_pretest');
        $this->db->join('tbl_materi', 'tbl_materi.id_materi = tbl_do_pretest.id_materi', 'left');
        $this->db->order_by('id_pretest', 'ASC');

        return $this->db->get()->result();
    }

    public function detail($id_soal)
    {
        $this->db->select('*');
        $this->db->from('tbl_banksoalpretest');
        $this->db->join('tbl_materi', 'tbl_materi.id_materi = tbl_banksoalpretest.id_materi', 'left');
        $this->db->where('id_soal', $id_soal);

        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_pretest', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_soal', $data['id_soal']);
        $this->db->update('tbl_pretest', $data);
    }

    public function keypretest()
    {
        $this->db->select('*');
        $this->db->from('tbl_keypretest');
        $this->db->order_by('id_keypretest', 'ASC');

        return $this->db->get()->result();
    }

    public function add_keypretest($data)
    {
        $this->db->insert('tbl_keypretest', $data);
    }

    public function edit_keypretest($data)
    {
        $this->db->where('id_keypretest', $data['id_keypretest']);
        $this->db->update('tbl_keypretest', $data);
    }
}