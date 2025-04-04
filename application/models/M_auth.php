<?php 

class M_auth extends CI_Model{

	public function cek_login(){

		$email		= set_value('email');
		$password	= md5(set_value('password'));

		$result 	= $this->db->where('email', $email)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_user');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	public function cek_slogin(){

		$email		= set_value('email');
		$spassword	= md5(set_value('spassword'));

		$result 	= $this->db->where('email', $email)
							   ->where('spassword', $spassword)
							   ->limit(1)
							   ->get('tbl_user');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}
	
	public function cek_login_admin(){

		$email		= set_value('email');
		$password	= md5(set_value('password'));

		$result 	= $this->db->where('email', $email)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tbl_admin');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	// public function cek_login_dosen(){

	// 	$username	= set_value('username');
	// 	$password	= set_value('password');

	// 	$result 	= $this->db->where('username', $username)
	// 						   ->where('password', $password)
	// 						   ->limit(1)
	// 						   ->get('tbl_dosen');

	// 	if ($result->num_rows() > 0) {
	// 		return $result->row();
	// 	}else {
	// 		return array();
	// 	}
	// }

	// public function cek_login_asprak(){

	// 	$username	= set_value('username');
	// 	$password	= set_value('password');

	// 	$result 	= $this->db->where('username', $username)
	// 						   ->where('password', $password)
	// 						   ->limit(1)
	// 						   ->get('tbl_asprak');

	// 	if ($result->num_rows() > 0) {
	// 		return $result->row();
	// 	}else {
	// 		return array();
	// 	}
	// }

}