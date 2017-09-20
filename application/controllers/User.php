<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');

		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('user_agent');

		session_start();
	}

	public function profile($id)
	{
		$user = $this->user_model->get_users($id);

		$data['title'] = $user->username . " - Profile";

		$data['user'] = $user;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer', $data);
	}

	public function register()
	{
		$data['title'] = "Napravi profil";

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');

		$this->load->view('templates/header', $data);

		if (!$this->form_validation->run() === FALSE)
		{
			$data['odgovor'] = $this->user_model->register_user();
			$this->load->view('user/register', $data);
		}
		else
		{
			$this->load->view('user/register');
		}
		
		$this->load->view('templates/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) 
		{
			$data['title'] = "Logovanje";

			$this->load->view('templates/header', $data);
			$this->load->view('user/login', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$this->user_model->login_user($email, $password);

			redirect($this->agent->referrer());
		}
	}

	public function logout()
 	{
 		//session_start();
		session_destroy();

		redirect($this->agent->referrer());
 	}

	public function list()
	{
		if (!isset($_SESSION['status']) || $_SESSION['status'] < 4) 
		{
			redirect(base_url());
		}
		$data['title'] = "All Users";

		$data['users'] = $this->user_model->get_users();

		$this->load->view('templates/header', $data);
		$this->load->view('user/list', $data);
		$this->load->view('templates/footer');
	}

	public function usersJson()
	{
		echo $this->user_model->get_users_JSON();
	}

	public function status_change($params)
	{
		$params = explode("-", $params);
		$id = $params[0];
		$status = $params[1];

		$this->user_model->change_user_status($id, $status);
	}
}