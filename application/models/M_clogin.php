<?php

class M_clogin extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_clogin');
        $this->db->order_by('id_clogin', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->result();
    }

    public function detail($id_clogin)
    {
        $this->db->select('*');
        $this->db->from('tbl_clogin');
        $this->db->where('id_clogin', $id_clogin);

        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_clogin', $data['id_clogin']);
        $this->db->update('tbl_clogin', $data);
    }

    public function add($data)
    {
        $this->db->insert('tbl_clogin', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_clogin', $data['id_clogin']);
        $this->db->delete('tbl_clogin', $data);
    }
}