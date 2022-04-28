<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{

	public function save_review($data = array())
	{
		$create = $this->db->insert('review', $data);

		$review_id = $this->db->insert_id();


		return $review_id;
	}

	public function get_all_review()
	{
		$query = $this->db->select('*')->get('review');
		return $query->result();
	}

	public function get_all_search_logs()
	{
		$query = $this->db->select('*')->get('visitor_log');
		return $query->result();
	}

	public function save_visitor_info($data = array())
	{
		$create = $this->db->insert('visitor_log', $data);

		$visitor_id = $this->db->insert_id();


		return $visitor_id;
	}



}
