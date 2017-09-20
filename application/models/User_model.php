<?php 

/**
* 
*/
class User_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_users($id = FALSE)
	{
		$this->db->select('*');
		$this->db->from('users');
		($id)?$this->db->where('users_id', $id):"";

		$query = $this->db->get();

		return ($id)?$query->result()[0]:$query->result_array();
	}

	public function get_users_JSON()
	{
		$this->db->select('*');
		$this->db->from('users');

		$query = $this->db->get();

		return json_encode($query->result_array());
	}

	public function register_user()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$username = $this->input->post('username');

		$query = $this->db->query("call user_register('$email', '$password', '$username')");

		return $query->result()[0]->ODGOVOR;
	}

	public function login_user($email, $password)
	{
		$query = $this->db->query("call user_login('$email', '$password')");

		if (isset($query->result()[0])) {
			$user = $query->result()[0];

			session_start();

			$_SESSION['user_id'] = $user->users_id;
			$_SESSION['email'] = $user->email;
			$_SESSION['username'] = $user->username;
			$_SESSION['status'] = $user->status;
			$_SESSION['msg'] = "Hello $user->username!";

		}else{
			session_start();

			$_SESSION['msg'] = "Try again, please.";

			return $_SESSION['msg'];
		}
		
	}


	public function change_user_status($id, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('users_id', $id);
		$this->db->update('users');
	}
}