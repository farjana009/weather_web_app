<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_mgmt extends CI_Controller
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
		$this->load->model('admin_model');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		//restrict users to go back to login if session has been set
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		} else {
			$user_email = $this->session->userdata('user_email');

			$data['userdetails'] = $this->admin_model->getusersdetails();
			$this->load->view('admin/manage_users', isset($data) ? $data : NULL);

		}
	}

	public function create()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		}

//		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
//		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
//		$this->form_validation->set_rules('fname', 'First name', 'trim|required');

		if ($this->input->post('email') != '') {

//			if (!empty($_FILES["profile_picture"]['name']))
//				$new_name = time() . str_replace(" ", "_", $_FILES["profile_picture"]['name']);
//			else
//				$new_name = '';
//			$config = array(
//				'file_name' => $new_name,
//				'upload_path' => './assets/images/profile_pictures/',
//				'allowed_types' => 'gif|jpg|png|jpeg',
//				'max_size' => '1024',
//				'max_width' => '1024',
//				'max_height' => '768'
//
//			);
//
//			$this->load->library('upload', $config);

			//die();
//			if (!empty($_FILES["profile_picture"]['name']) && !$this->upload->do_upload('profile_picture')) {
//
//				$error = array('error' => $this->upload->display_errors());
////                    $this->session->set_flashdata('errors', $error);
//				redirect('users/create', 'refresh');
//
//			} else {
//				$data = array('upload_data' => $this->upload->data());
			// true case
			$password = md5($this->input->post('password'));
			if ($this->input->post('is_admin') != '')
				$is_admin = $this->input->post('is_admin');
			else
				$is_admin = 0;
			$data = array(
				'password' => $password,
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'is_admin' => $is_admin
//					'profile_picture' => $new_name,
			);
			//print_r($data);

			$create = $this->admin_model->create($data);

			if ($create) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('admin/user_mgmt/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('user_mgmt/create', 'refresh');
			}
//			}
		} else {
			// false case
			$this->load->view('admin/create');
			//$this->render_template('users/create', $this->data);
		}


	}


}
