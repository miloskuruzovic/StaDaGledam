<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Film extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('film_model');

		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function test()
	{
		$data['title'] = $this->film_model->get_films(3)->title;
		$data['films'] = $this->film_model->get_films(3);
		$data['genres'] = $this->film_model->get_genres_by_film(3);
		$data['tags'] = $this->film_model->get_tags_by_film(3);
		$data['summary_id'] = $this->film_model->get_summaryID_by_film(3);
		$data['positive'] = $this->film_model->get_positive_summary_by_film(3);
		$data['negative'] = $this->film_model->get_negative_summary_by_film(3);

		$this->load->view('templates/header', $data);
		$this->load->view('film/test', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add_test()
	{
		$data['title'] = "Add Test";

		$this->load->view('templates/header', $data);
		$this->load->view('film/add_test', $data);
		$this->load->view('templates/footer', $data);

		$this->film_model->set_film();

	}
}