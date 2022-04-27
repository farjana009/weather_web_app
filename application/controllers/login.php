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
			$this->login_model->update_last_signed_in_datetime($data['email']);
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
			if ($data['profile']->is_admin == 1){
				$this->load->view('admin/dashboard', isset($data) ? $data : NULL);

			}
			else{
				//echo $this->input->post('search_by_city');
				$data['weather_info']=array();
				if($this->input->post('search_by_city')!=''){
					$apiKey = "49cc8c821cd2aff9af04c9f98c36eb74";//API KEY
					//$cityId = "1185241";//CITY ID 524901=Moscow
					$city_name=$this->input->post('search_by_city');
					$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city_name . "&lang=en&units=metric&APPID=" . $apiKey;

					$ch = curl_init();

					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_VERBOSE, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$response = curl_exec($ch);

					curl_close($ch);
					$data['weather_info'] = json_decode($response);
					if($data['weather_info']->cod != "404"){
						$data['weather_info'] = json_decode($response);
					}else{
						$data['weather_info']=array();
						$data['city_name']=$this->input->post('search_by_city');
					}
					//print_r($data['weather_info']);
					//$currentTime = time();
				}

				$this->load->view('user/dashboard',isset($data) ? $data : NULL,'refresh');

			}
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
