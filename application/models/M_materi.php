<?php

class M_materi extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_kursus.id_user', 'left');
        $this->db->order_by('id_materi', 'DESC');

        return $this->db->get()->result();
    }

    public function detail($id_materi)
    {
        $this->db->select('*');
        $this->db->from('tbl_materi');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_materi.id_kursus', 'left');
        $this->db->where('id_materi', $id_materi);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_materi', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_materi', $data['id_materi']);
        $this->db->update('tbl_materi', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_materi', $data['id_materi']);
        $this->db->delete('tbl_materi', $data);
    }

    public function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
