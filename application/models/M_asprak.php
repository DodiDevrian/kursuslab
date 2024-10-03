<?php

class M_asprak extends CI_Model
{

    public function lists_asprak()
    {
        $this->db->select('*');
        $this->db->from('tbl_asprak');
        $this->db->order_by('id_asprak', 'DESC');

        return $this->db->get()->result();
    }

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_kursus');
        $this->db->join('tbl_asprak', 'tbl_asprak.id_asprak = tbl_kursus.id_asprak', 'left');
        $this->db->order_by('id_kursus', 'DESC');

        // $this->db->select('*');
        // $this->db->from('tbl_asprak');
        // $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_asprak.id_kursus', 'left');
        // $this->db->order_by('id_asprak', 'DESC');

        return $this->db->get()->result();
    }

    public function detail_asprak($id_asprak)
    {
        $this->db->select('*');
        $this->db->from('tbl_asprak');
        $this->db->where('id_asprak', $id_asprak);

        return $this->db->get()->row();
    }

    public function detail($id_asprak)
    {
        $this->db->select('*');
        $this->db->from('tbl_asprak');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_asprak.id_kursus', 'left');
        $this->db->where('id_asprak', $id_asprak);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_asprak', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_asprak', $data['id_asprak']);
        $this->db->update('tbl_asprak', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_asprak', $data['id_asprak']);
        $this->db->delete('tbl_asprak', $data);
    }
}