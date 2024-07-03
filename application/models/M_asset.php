<?php

class M_asset extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_asset');
        $this->db->order_by('id_asset', 'DESC');

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_asset', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_asset', $data['id_asset']);
        $this->db->delete('tbl_asset', $data);
    }
}