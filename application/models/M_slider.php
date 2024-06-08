<?php

class M_slider extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->order_by('id_slider', 'DESC');

        return $this->db->get()->result();
    }

    public function detail_kursus($id_slider)
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('id_slider', $id_slider);

        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_slider', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->update('tbl_slider', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->delete('tbl_slider', $data);
    }
}