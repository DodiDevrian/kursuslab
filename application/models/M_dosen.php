<?php

class M_dosen extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_dosen');
        $this->db->order_by('id_dosen', 'DESC');

        return $this->db->get()->result();
    }

    public function detail($id_dosen)
    {
        $this->db->select('*');
        $this->db->from('tbl_dosen');
        $this->db->where('id_dosen', $id_dosen);

        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_dosen', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_dosen', $data['id_dosen']);
        $this->db->update('tbl_dosen', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_dosen', $data['id_dosen']);
        $this->db->delete('tbl_dosen', $data);
    }
}