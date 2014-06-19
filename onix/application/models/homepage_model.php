<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage_model extends CI_Model
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

	public function update_homepage_title($title)
	{
		$data = array("title" => $title);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_homepage_keywords($keywords)
	{
		$data = array("keywords" => $keywords);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_homepage_description($description)
	{
		$data = array("description" => $description);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_homepage_facebook($facebook)
	{
		$data = array("facebook" => $facebook);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_homepage_twitter($twitter)
	{
		$data = array("twitter" => $twitter);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_homepage_google_plus($google_plus)
	{
		$data = array("google_plus" => $google_plus);
		$this->db->where("homepage_id", "1");
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function get_sliders()
	{
		$this->db->select("slider_id, slider_title, status");
		$this->db->order_by("date_created", "desc");
		$result = $this->db->get("slider");
		return $result;
	}

	public function get_data_slider($slider_id)
	{
		$this->db->where("slider_id", $slider_id);
		$result = $this->db->get("slider");
		return $result;
	}

	public function create_new_slider($slider_title, $slider_description, $status, $admin_id)
	{
		$data = array("slider_title" => $slider_title, "slider_description" => $slider_description, "status" => $status, "admin_id" => $admin_id);
		$result = $this->db->insert("slider", $data);
		return $this->db->insert_id();
	}

	public function update_slider($slider_id, $slider_title, $slider_description, $status, $admin_id)
	{
		$data = array("slider_title" => $slider_title, "slider_description" => $slider_description, "status" => $status, "admin_id" => $admin_id);
		$this->db->where("slider_id", $slider_id);
		$result = $this->db->update("slider", $data);
		return $result;
	}

	public function delete_slider($slider_id)
	{
		$this->db->where("slider_id", $slider_id);
		$result = $this->db->delete("slider");
		return $result;
	}

	public function upload_slider($slider_path, $slider){
		$data = array("slider_path" => $slider_path);
		$this->db->where("slider_id", $slider);
		$result = $this->db->update("slider", $data);
		return $result;
	}

	public function get_slider_path($slider_id){
		$this->db->select('slider_path')->from('slider')->where('slider_id',$slider_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->slider_path;
    }
    return false;
	}
}

?>