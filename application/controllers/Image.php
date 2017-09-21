<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Image extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('image_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->helper('simpleimage');

		session_start();
	}

	public function blog_library()
	{
		if (!isset($_SESSION['status']) || $_SESSION['status'] < 2) 
		{
			redirect(base_url());
		}
		$data['title'] = "Blog image Gallery";

		$data['images'] = $this->image_model->get_all();

		$this->load->view('templates/header', $data);
		$this->load->view('image/gallery', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add_image()
	{
		if (!isset($_SESSION['status']) || $_SESSION['status'] < 2) 
		{
			redirect(base_url());
		}
		$data['title'] = "Add image to Gallery";

		$submited = $_POST['submit'] ?? null;
		$data['submited'] = ($submited)?"Submited":"";

		($submited)?
		$this->image_model->set_image():"";

		$this->load->view('templates/header', $data);
		$this->load->view('image/add_image', $data);
		$this->load->view('templates/footer', $data);		
	}
}