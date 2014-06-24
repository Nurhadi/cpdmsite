<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_page()
	{
		$this->db->where("page_id >", 5);
		$this->db->order_by("page_id", "asc");
		$result = $this->db->get("page");
		return $result;
	}

	public function create_new_page($title, $keywords, $description, $content, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		$this->db->insert("page", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_page($page_id, $title, $keywords, $description, $content, $admin_id)
	{
		if($content === ""){
			$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "admin_id" => $admin_id);
		}
		else{
			$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		}
		$this->db->where("page_id", $page_id);
		$this->db->update("page", $data);
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

	public function get_thumbnail_path($page_id){
		$this->db->select('thumbnail')->from('page')->where('page_id',$page_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    return false;
	}

	public function upload_thumbnail($file_path, $page){
		$data = array("thumbnail" => $file_path);
		$this->db->where("page_id", $page);
		$this->db->update("page", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_page($page_id)
	{
		$this->db->where("page_id", $page_id);
		$this->db->delete("page");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	// function for whole application
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