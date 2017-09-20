<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* stavi na hosting, jebavaj se sa procedurom
* stilizuj slike iz posta iole
* paginacija
*/

class Blog extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog_model');

		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');

		session_start();
	}

	public function test()
	{
		$data['title'] = "Šta da gledam?";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
		$this->load->view('blog/test', $data);
		$this->load->view('templates/footer', $data);
	}

	public function index()
	{
		$data['title'] = "Šta da gledam?";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add_post()
	{
		if (!isset($_SESSION['status']) || $_SESSION['status'] < 2) 
		{
			redirect(base_url());
		}
		$this->load->model('blog_category_model');
		$this->load->model('blog_post_model');

		$data['title'] = "Add New Blog Post";
		$data['categories'] = $this->blog_category_model->get_blog_categories();

		$this->load->view('templates/header', $data);
		$this->load->view('blog/add_post', $data);
		$this->load->view('templates/footer', $data);

		if ($this->input->post('sent') == "sent") {
			$this->blog_post_model->set_post();
		}
		
	}

	public function update_post($id)
	{
		if (!isset($_SESSION['status']) || $_SESSION['status'] < 2) 
		{
			redirect(base_url());
		}
		$this->load->model('blog_post_model');
		$this->load->model('blog_category_model');

		$data['title'] = $this->blog_post_model->get_post($id)->post_title;
		$data['categories'] = $this->blog_category_model->get_blog_categories();
		$data['post'] = $this->blog_post_model->get_post($id);

		if ($this->input->post('sent') == "sent") {
			$data['post'] = $this->blog_post_model->edit_post($id);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('blog/edit_post', $data);
		$this->load->view('templates/footer', $data);
		
	}

	public function show_post($id = FALSE)
	{
		$this->load->model('blog_post_model');


		$data['title'] = ($id)?
		$this->blog_post_model->get_post($id)->post_title:"All Posts";

		$data['posts'] = $this->blog_post_model->get_post($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
		($id)?
		$this->load->view('blog/show_post', $data):
		$this->load->view('blog/all_posts');

		$this->load->view('templates/footer', $data);
	}
}