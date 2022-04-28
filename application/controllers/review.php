<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
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
		$this->load->model('review_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		} else {
			$user_email = $this->session->userdata('user_email');

			$data['review_details'] = $this->review_model->get_all_review();
			$this->load->view('admin/manage_review', isset($data) ? $data : NULL);

		}
	}
	public function weather_search_logs()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login/');
		} else {
			$user_email = $this->session->userdata('user_email');

			$data['search_log_details'] = $this->review_model->get_all_search_logs();
			$this->load->view('admin/manage_search_logs', isset($data) ? $data : NULL);

		}
	}

	public function save_review()
	{
//		if (!$this->session->userdata('user_email')) {
//			redirect('/');
//		}
		$user_email = $this->session->userdata('user_email');
		$user_data = $this->user_model->getusersdetails($user_email);
		if($user_data)
			$user_id=$user_data['id'];
		else
			$user_id=0;
		$data = array(
			//'password' => $password,
			'name' => $this->input->post('review_name'),
			'user_id' => $user_id,
			'email' => $this->input->post('review_email'),
			'review_details' => $this->input->post('review_details'),
			'created_at' => date('Y-m-d H:i:s')
//								'profile_picture' => $new_name,
		);

		$insert_id = $this->review_model->save_review($data);
		if($insert_id)
			echo $insert_id;
		else
			echo 0;
		//$this->load->view('user/change_password', isset($data) ? $data : NULL);

	}



}
