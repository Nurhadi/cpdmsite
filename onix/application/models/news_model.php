<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_data_homepage()
	{
		$this->db->where("homepage_id", "1");
		$result = $this->db->get("homepage");
		return $result;
	}

	public function get_news()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("news");
		return $result;
	}

	public function get_data_news($news_id)
	{
		$this->db->where("news_id", $news_id);
		$result = $this->db->get("news");
		return $result;
	}

	public function create_new_news($title, $keywords, $description, $content, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		$this->db->insert("news", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_news($news_id, $title, $keywords, $description, $content, $admin_id)
	{
		if($content === ""){
			$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "admin_id" => $admin_id);
		}
		else{
			$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		}
		$this->db->where("news_id", $news_id);
		$this->db->update("news", $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_news($news_id)
	{
		$this->db->where("news_id", $news_id);
		$this->db->delete("news");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_thumbnail($file_path, $news){
		$data = array("thumbnail" => $file_path);
		$this->db->where("news_id", $news);
		$this->db->update("news", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_small_thumbnail($file_path, $news){
		$data = array("small_thumbnail" => $file_path);
		$this->db->where("news_id", $news);
		$this->db->update("news", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_thumbnail_path($news_id){
		$this->db->select('thumbnail')->from('news')->where('news_id',$news_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    else
    {
    	return false;
    }
	}

	public function get_small_thumbnail_path($news_id){
		$this->db->select('small_thumbnail')->from('news')->where('news_id',$news_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->small_thumbnail;
    }
    else
    {
    	return false;
    }
	}
}

?>