<?php

/**
* 
*/
class Blog_post_model extends Blog_model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function set_post()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		$title = $this->input->post('title');
		$post = $this->input->post('post');
		$category = $this->input->post('category');
		$author = $_SESSION['user_id'];

		$data = array(
			'post_title' => $title,
			'post_content' => $post,
			'post_cat' => $category,
			'post_author' => $author,
			'post_slug' => $slug
			);

		$this->db->insert('blog_post', $data);
	}

	public function get_post($id)
	{
		$this->db->select('*');
		$this->db->from('blog_post');
		($id)?$this->db->where('blog_post_id', $id):"";

		$query = $this->db->get();

		return ($id)?$query->result()[0]:$query->result_array();
	}

	public function edit_post($id)
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$this->db->set('post_title', $this->input->post('title'));
		$this->db->set('post_content', $this->input->post('post'));
		$this->db->set('post_cat', $this->input->post('category'));
		$this->db->set('post_slug', $slug);
		$this->db->where('blog_post_id', $id);
		$this->db->update('blog_post');

		return $this->get_post($id);
	}
}
