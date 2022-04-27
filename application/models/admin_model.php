<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function getusersdetails($user_email)
	{
		$query = $this->db->select('*')->where('email !=', $user_email)->get('users');
		return $query->result();
	}

//Getting particular user deatials on the basis of id
	public function getuserdetail($uid)
	{
		$ret = $this->db->select('*')->where('email', $email)->get('users');
		return $ret->row();
	}

	// Function for use deletion
	public function delete($id)
	{
		$delete = $this->db->where('id', $id)->delete('users');
		return ($delete == true) ? true : false;
	}

	public function create($data = '')
	{

		if ($data) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();


			return $user_id;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		return ($update == true) ? true : false;
	}


	public function getUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

	}


}
