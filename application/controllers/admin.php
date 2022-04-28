<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

			$data['userdetails'] = $this->admin_model->getusersdetails($user_email);
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
				'is_admin' => $is_admin,
				'createdon' => date('Y-m-d H:i:s')
//					'profile_picture' => $new_name,
			);
			//print_r($data);

			$create = $this->admin_model->create($data);

			if ($create) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('admin', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('admin/create', 'refresh');
			}
//			}
		} else {
			// false case
			$this->load->view('admin/create');
			//$this->render_template('users/create', $this->data);
		}


	}

	public function edit($id = null)
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		}

		if ($id) {
			//echo $id;die();
//			$this->form_validation->set_rules('groups', 'Group', 'required');
//			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
//			$this->form_validation->set_rules('email', 'Email', 'trim|required');
//			$this->form_validation->set_rules('fname', 'First name', 'trim|required');

			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');


			if ($this->input->post('email') != '') {
//				if ($this->input->post('old_profile_picture') != '') {
//					$old_profile_picture = $this->input->post('old_profile_picture');
//					if ($_FILES['profile_picture']['name'] != '')
//						unlink("assets/images/profile_pictures/" . $old_profile_picture);
//				}

//				if (!empty($_FILES["profile_picture"]['name'])) {
//					$new_name = time() . str_replace(" ", "_", $_FILES["profile_picture"]['name']);
//					$config = array(
//						'file_name' => $new_name,
//						'upload_path' => './assets/images/profile_pictures/',
//						'allowed_types' => 'gif|jpg|png|jpeg',
//						'max_size' => '1024',
//						'max_width' => '1024',
//						'max_height' => '768'
//
//					);
//
//					$this->load->library('upload', $config);
//				} else {
//					if ($this->input->post('old_profile_picture') != '')
//						$new_name = $old_profile_picture;
//					else
//						$new_name = '';
//				}

//				if (!empty($_FILES["profile_picture"]['name']) && !$this->upload->do_upload('profile_picture')) {
//					$error = array('error' => $this->upload->display_errors());
////                    $this->session->set_flashdata('errors', $error);
//					redirect('users/edit/' . $id, 'refresh');
//
//				} else {
//					if (!empty($_FILES["profile_picture"]['name'])) {
//						$data = array('upload_data' => $this->upload->data());
//					}
				// true case
//					if (empty($password) && empty($cpassword)) {
//						$data = array(
//							'username' => $this->input->post('username'),
//							'email' => $this->input->post('email'),
//							'firstname' => $this->input->post('fname'),
//							'lastname' => $this->input->post('lname'),
//							'phone' => $this->input->post('phone'),
//							'gender' => $this->input->post('gender'),
//							'profile_picture' => $new_name,
//						);
//
//						$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
//						if ($update == true) {
//							$this->session->set_flashdata('success', 'Successfully created');
//							redirect('users/', 'refresh');
//						} else {
//							$this->session->set_flashdata('errors', 'Error occurred!!');
//							redirect('users/edit/' . $id, 'refresh');
//						}
//					} else {
//						$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//						$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

//						if ($this->form_validation->run() == TRUE) {
				if (empty($password) && empty($cpassword)) {
					$user_data = $this->admin_model->getUserData($id);
					$password = $user_data['password'];

				} else {
					$password = md5($this->input->post('password'));

				}
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
//								'profile_picture' => $new_name,
				);
//				print_r($data);
//				die();
				$update = $this->admin_model->edit($data, $id);
				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('admin/', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('admin/edit/' . $id, 'refresh');
				}

//						} else {
//							// false case
//							$user_data = $this->model_users->getUserData($id);
//							$groups = $this->model_users->getUserGroup($id);
//
//							$this->data['user_data'] = $user_data;
//							$this->data['user_group'] = $groups;
//
//							$group_data = $this->model_groups->getGroupData();
//							$this->data['group_data'] = $group_data;
//
//							$this->render_template('users/edit', $this->data);
//						}

//					}
//				}
			} else {
				// false case
				$user_data = $this->admin_model->getUserData($id);
//				print_r($user_data);die();
				$data['user_data'] = $user_data;

				$this->load->view('admin/edit', isset($data) ? $data : NULL);

			}
		}
	}

	public function delete($id)
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		}

		if ($id) {
//			if ($this->input->post('confirm')) {
				//$user_data = $this->model_users->getUserData($id);
//				if ($user_data['profile_picture'] != '')
//					unlink("assets/images/profile_pictures/" . $user_data['profile_picture']);
				$delete = $this->admin_model->delete($id);
				if ($delete == true) {
					$this->session->set_flashdata('success', 'User has been deleted successfully');
					redirect('admin/', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error occurred!!');
					redirect('admin/' . $id, 'refresh');
				}
//
//			} else {
//				$this->data['id'] = $id;
//				$this->render_template('users/delete', $this->data);
//			}
		}
	}

	public function profile()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		}

		$user_email = $this->session->userdata('user_email');

		$data['user_data'] = $this->admin_model->getuserdetail($user_email);
//		print_r($data['user_data']);

		$this->load->view('admin/profile', isset($data) ? $data : NULL);
	}


	public function edit_profile()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('/');
		}
		$id = $this->input->post('user_id');
		//die();
		if ($id) {

			if ($this->input->post('email') != '') {

				$data = array(
					//'password' => $password,
					'email' => $this->input->post('email'),
					'first_name' => $this->input->post('fname'),
					'last_name' => $this->input->post('lname'),
					'phone' => $this->input->post('phone'),
//								'profile_picture' => $new_name,
				);
//				print_r($data);
//				die();
				$update = $this->admin_model->edit($data, $id);
				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('admin/profile', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('admin/profile/', 'refresh');
				}


			}
		}

	}
	public function change_password()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('/');
		}
		$user_email = $this->session->userdata('user_email');

		$data['user_data'] = $this->admin_model->getuserdetail($user_email);
		$this->load->view('admin/change_password', isset($data) ? $data : NULL);

	}
	public function edit_password()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('/');
		}
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$user_id = $this->input->post('user_id');

		$password = md5($this->input->post('password'));
		$update = $this->admin_model->update_password($password, $user_id);
		if ($update == true) {
			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('admin/change_password', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('admin/change_password', 'refresh');
		}
		//$this->load->view('user/change_password');

	}


}
