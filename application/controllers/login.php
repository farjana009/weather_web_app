<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
		$this->load->model('login_model');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user_email')) {
			redirect('login/home');
		} else {
			$this->load->view('login');
			if ($this->session->flashdata('error')) {
				unset($_SESSION['error']);
			}
		}
	}

	public function user_login()
	{
		//load session library

		$email = $_POST['email_address'];
		$password = $_POST['password'];

		$data = $this->login_model->users_login($email, $password);
		//print_r($data['email']);die();

		if ($data) {
			$this->session->set_userdata('user_email', $data['email']);
			redirect('login/home');
		} else {
			//$this->load->view('login');
			$this->session->set_flashdata('error', 'Invalid login. User not found');
			redirect('login/', 'refresh');
		}
	}

	public function home()
	{

		//restrict users to go to home if not logged in
		if ($this->session->userdata('user_email')) {
			$user_email = $this->session->userdata('user_email');
			$data['profile'] = $this->login_model->get_user_profile($user_email);
//			print_r($data['profile']);
			if ($data['profile']->is_admin == 1)
				$this->load->view('admin/dashboard', isset($data) ? $data : NULL);
			else
				$this->load->view('user/dashboard',isset($data) ? $data : NULL);
		} else {
			redirect('/');
		}

	}

	public function logout()
	{
		//load session library
		$this->session->unset_userdata('user_email');
		redirect('login/');
	}


}
