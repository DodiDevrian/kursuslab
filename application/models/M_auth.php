<?php 

class M_auth extends CI_Model{

	public function cek_login(){

		$username	= set_value('username');
		$password	= set_value('password');

		$result 	= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_user');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	public function cek_login_dosen(){

		$username	= set_value('username');
		$password	= set_value('password');

		$result 	= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_dosen');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	public function cek_login_asprak(){

		$username	= set_value('username');
		$password	= set_value('password');

		$result 	= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_aspran');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	public function cek_login_admin(){

		$username	= set_value('username');
		$password	= set_value('password');

		$result 	= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_admin');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}
}