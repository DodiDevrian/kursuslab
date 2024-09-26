<?php

class M_home extends CI_Model
{
    public function kursus_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->order_by('id_kursus', 'DESC');
        $this->db->limit(3);

        return $this->db->get()->result();
    }

    public function slider_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->order_by('id_slider', 'DESC');
        $this->db->limit(5);

        return $this->db->get()->result();
    }

    public function asprak_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->join('tbl_asprak', 'tbl_asprak.id_asprak = tbl_kursus.id_asprak', 'left');
        $this->db->order_by('id_kursus', 'DESC');

        // $this->db->select('*');
        // $this->db->from('tbl_asprak');
        // $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_asprak.id_kursus', 'left');
        // $this->db->order_by('id_asprak', 'DESC');
        $this->db->limit(4);

        return $this->db->get()->result();
    }

    public function no_asprak()
    {
        $this->db->select('*');
        $this->db->from('tbl_asprak');
        $this->db->order_by('id_asprak', 'ASC');
        $this->db->limit(1);

        return $this->db->get()->result();
    }
}