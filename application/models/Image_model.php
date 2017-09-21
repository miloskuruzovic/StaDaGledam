<?php 

/**
* 
*/
class Image_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('blog_img');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function set_image()
	{
		if (!empty($_FILES['img']['tmp_name'])) {
			$simpleimage = new abeautifulsite\SimpleImage($_FILES['img']['tmp_name']);
			$simpleimage->save("./img/".$_FILES['img']['name']);

			$data = array('name' => $_FILES['img']['name']);
			$this->db->insert('blog_img', $data);
		}
	}
}