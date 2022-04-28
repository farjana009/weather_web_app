<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather_app extends CI_Controller
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
		$this->load->model('review_model');
	}


	public function index()
	{
		if ($this->session->userdata('user_email')) {
			$user_email = $this->session->userdata('user_email');
			$data['user_data'] = $this->login_model->get_user_profile($user_email);
			//$this->load->view('welcome_message');
			$this->load->view('home', isset($data) ? $data : NULL);

		} else {
			$this->load->view('home');

		}
	}

	public function search()
	{

		if (isset($_POST['search_by_city'])) {
			//echo 1;
			if ($this->input->post('search_by_city') != '') {
				$ip = $this->input->ip_address();
				$data = array(
					//'password' => $password,
					'visitor_ip' => $ip,
					'search_by' => $this->input->post('search_by_city'),
					'created_at' => date('Y-m-d H:i:s')
				);

				$insert_id = $this->review_model->save_visitor_info($data);
				$apiKey = "49cc8c821cd2aff9af04c9f98c36eb74";//API KEY
				//$cityId = "1185241";//CITY ID 524901=Moscow
				$city_name = $this->input->post('search_by_city');
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
				$data['city_name'] = $this->input->post('search_by_city');
				if ($data['weather_info']->cod != "404") {
					$data['weather_info'] = json_decode($response);
				} else {
					$data['weather_info'] = array();
				}
				if ($this->session->userdata('user_email')) {
					$user_email = $this->session->userdata('user_email');
					$data['user_data'] = $this->login_model->get_user_profile($user_email);
					//print_r($data['user_data']);
					//$this->load->view('welcome_message');

				}
				//print_r($data['weather_info']);
				//$currentTime = time();
			}
		} else {
			$data['city_name'] = '';
			$data['user_data'] = array();
		}
		$this->load->view('search', isset($data) ? $data : NULL, 'refresh');

	}

}
