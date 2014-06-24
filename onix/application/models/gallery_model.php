<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model
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

	public function get_gallery()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("gallery");
		return $result;
	}

	public function get_gallery_title($gallery_id){
		$this->db->select("title");
		$this->db->where("id", $gallery_id);
		$result = $this->db->get("gallery");
		return $result->row()->title;
	}

	public function get_data_gallery($gallery_id)
	{
		$this->db->where("id", $gallery_id);
		$result = $this->db->get("gallery");
		return $result;
	}

	public function create_new_gallery($title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("gallery", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_gallery($gallery_id, $title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $gallery_id);
		$this->db->update("gallery", $data);
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

	public function delete_gallery($gallery_id)
	{
		$this->db->where("id", $gallery_id);
		$this->db->delete("gallery");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_thumbnail($file_path, $gallery){
		$data = array("thumbnail" => $file_path);
		$this->db->where("id", $gallery);
		$this->db->update("gallery", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_small_thumbnail($file_path, $gallery){
		$data = array("small_thumbnail" => $file_path);
		$this->db->where("id", $gallery);
		$this->db->update("gallery", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_thumbnail_path($gallery_id){
		$this->db->select('thumbnail')->from('gallery')->where('gallery_id',$gallery_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    return false;
	}

	public function get_small_thumbnail_path($gallery_id){
		$this->db->select('small_thumbnail')->from('gallery')->where('gallery_id',$gallery_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->small_thumbnail;
    }
    return false;
	}
}

?>