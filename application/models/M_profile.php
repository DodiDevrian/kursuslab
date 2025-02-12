<?php

class M_profile extends CI_Model
{
    public function profile($slug_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('slug_user', $slug_user);

        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('slug_user', $data['slug_user']);
        $this->db->update('tbl_user', $data);
    }
}
