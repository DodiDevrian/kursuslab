<?php

class M_dosen extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->order_by('id_admin', 'DESC');

        return $this->db->get()->result();
    }

    public function detail($id_admin)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('id_admin', $id_admin);

        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_admin', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('tbl_admin', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->delete('tbl_admin', $data);
    }

    public function profile($id_admin)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('id_admin', $id_admin);

        return $this->db->get()->row();
    }
}