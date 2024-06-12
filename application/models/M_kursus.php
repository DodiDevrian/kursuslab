<?php

class M_kursus extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_kursus.id_user', 'left');
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
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_kursus.id_user', 'left');
        $this->db->order_by('id_materi', 'ASC');

        return $this->db->get()->result();
    }

    public function lists_materi_button()
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->order_by('id_materi', 'ASC');

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

    public function add($data)
    {
        $this->db->insert('tbl_kursus', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_kursus', $data['id_kursus']);
        $this->db->update('tbl_kursus', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kursus', $data['id_kursus']);
        $this->db->delete('tbl_kursus', $data);
    }

    
}