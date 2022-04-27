<?php
class Login_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function users_login($email, $password){
		$query = $this->db->get_where('users', array('email'=>$email, 'password'=>md5($password)));
		return $query->row_array();
	}

	public function get_user_profile($email){
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		//echo $this->db->last_query();die;
		return $query->row();
	}

}
?>
