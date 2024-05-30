<?php

class M_asprak extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_asprak');
        $this->db->order_by('id_asprak', 'DESC');

        return $this->db->get()->result();
    }
}