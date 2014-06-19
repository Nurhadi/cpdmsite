<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Page_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_data_page($page_id)
	{
		$this->db->where("page_id", $page_id);
		$result = $this->db->get("page");
		return $result;
	}

	public function update_page_title($page_id, $title)
	{
		$data = array("title" => $title);
		$this->db->where("page_id", $page_id);
		$result = $this->db->update("page", $data);
		return $result;
	}

	public function update_page_keywords($page_id, $keywords)
	{
		$data = array("keywords" => $keywords);
		$this->db->where("page_id", $page_id);
		$result = $this->db->update("page", $data);
		return $result;
	}

	public function update_page_description($page_id, $description)
	{
		$data = array("description" => $description);
		$this->db->where("page_id", $page_id);
		$result = $this->db->update("page", $data);
		return $result;
	}

	public function update_page_longitude($page_id, $longitude)
	{
		$data = array("longitude" => $longitude);
		$this->db->where("page_id", $page_id);
		$result = $this->db->update("page", $data);
		return $result;
	}

	public function update_page_content($page_id, $content)
	{
		$data = array("content" => $content);
		$this->db->where("page_id", $page_id);
		$result = $this->db->update("page", $data);
		return $result;
	}
}

?>