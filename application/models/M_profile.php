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
}
