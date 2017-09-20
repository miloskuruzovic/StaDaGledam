<?php

/**
* 
*/
class Blog_category_model extends Blog_model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_blog_categories($id = FALSE)
	{
		$this->db->select('*');
		$this->db->from('blog_category');
		($id)?$this->db->where('blog_category_id', $id):"";

		$query = $this->db->get();

		return ($id)?$query->result()[0]:$query->result_array();
	}

}