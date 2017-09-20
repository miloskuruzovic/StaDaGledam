<?php 

/**
* 
*/
class Film_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_films($id = FALSE)
	{

		$this->db->select('*');
		$this->db->from('film');
		($id)?$this->db->where('film_id', $id):"";

		$query = $this->db->get();

		return ($id)?$query->result()[0]:$query->result_array();
	}

	public function get_genres_by_film($id)
	{
		$this->db->select('genre_id');
		$this->db->from('film_genre_pivot');
		$this->db->where('film_id', $id);

		$query = $this->db->get();		

		$genreArray = $query->result_array();
		$genreIDs = array();
		foreach ($genreArray as $key => $value) {
			$genreIDs[] = $value['genre_id'];
		}

		$this->db->select('name');
		$this->db->from('genre');
		$this->db->where_in('genre_id', $genreIDs);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_tags_by_film($id)
	{
		$this->db->select('tag_id');
		$this->db->from('film_tags_pivot');
		$this->db->where('film_id', $id);

		$query = $this->db->get();		

		$tagArray = $query->result_array();
		$tagIDs = array();
		foreach ($tagArray as $key => $value) {
			$tagIDs[] = $value['tag_id'];
		}

		$this->db->select('name');
		$this->db->from('tags');
		$this->db->where_in('tags_id', $tagIDs);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_summaryID_by_film($id)
	{
		$this->db->select('film_summary_id');
		$this->db->from('film_summary');
		$this->db->where('film', $id);

		$query = $this->db->get();

		return $query->result_array()[0]['film_summary_id'];
	}

	public function get_positive_summary_by_film($id)
	{
		$summaryID = $this->get_summaryID_by_film($id);

		$this->db->select('text');
		$this->db->from('positive_summary');
		$this->db->where('summary', $summaryID);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_negative_summary_by_film($id)
	{
		$summaryID = $this->get_summaryID_by_film($id);

		$this->db->select('text');
		$this->db->from('negative_summary');
		$this->db->where('summary', $summaryID);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function set_film()
	{
		$this->load->helper('url');

		$test = $this->input->post('post');
		$arr = explode("<p>", $test);

		print_r($test);

		var_dump($test, $arr);
	}

}