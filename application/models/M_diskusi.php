<?php

class M_diskusi extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_diskusi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_diskusi.id_user', 'left');
        $this->db->join('tbl_asprak', 'tbl_asprak.id_asprak = tbl_diskusi.id_asprak', 'left');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_diskusi.id_kursus', 'left');
        $this->db->order_by('id_diskusi', 'DESC');
    
        return $this->db->get()->result();
    }
    
    public function lists($limit, $start)
    {
        $this->db->join('tbl_asprak', 'tbl_asprak.id_asprak = tbl_diskusi.id_asprak', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_diskusi.id_user', 'left');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_diskusi.id_kursus', 'left');
        $this->db->order_by('id_diskusi', 'DESC');
        $query = $this->db->get('tbl_diskusi', $limit, $start);
        return $query;

    }


    // public function detail_diskusi($id_kursus)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_kursus');
    //     $this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_kursus.id_admin', 'left');
    //     // $this->db->join('tbl_asprak', 'tbl_asprak.id_asprak = tbl_kursus.id_asprak', 'left');
    //     $this->db->where('id_kursus', $id_kursus);

    //     return $this->db->get()->row();
    // }

    public function add_chat_user($data)
    {
        $this->db->insert('tbl_diskusi', $data);
    }
}