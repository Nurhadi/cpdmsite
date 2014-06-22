<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_photo_model extends CI_Model
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

	public function get_gallery_photo()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("gallery_photo");
		return $result;
	}

	public function get_data_gallery_photo($gallery_photo_id)
	{
		$this->db->where("gallery_photo_id", $gallery_photo_id);
		$result = $this->db->get("gallery_photo");
		return $result;
	}

	public function create_new_gallery_photo($title, $keywords, $description, $content, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		$this->db->insert("gallery_photo", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_gallery_photo($gallery_photo_id, $title, $keywords, $description, $content, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "content" => $content, "admin_id" => $admin_id);
		$this->db->where("gallery_photo_id", $gallery_photo_id);
		$this->db->update("gallery_photo", $data);
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

	public function delete_gallery_photo($gallery_photo_id)
	{
		$this->db->where("gallery_photo_id", $gallery_photo_id);
		$this->db->delete("gallery_photo");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_thumbnail($file_path, $gallery_photo){
		$data = array("thumbnail" => $file_path);
		$this->db->where("gallery_photo_id", $gallery_photo);
		$this->db->update("gallery_photo", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_small_thumbnail($file_path, $gallery_photo){
		$data = array("small_thumbnail" => $file_path);
		$this->db->where("gallery_photo_id", $gallery_photo);
		$this->db->update("gallery_photo", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_thumbnail_path($gallery_photo_id){
		$this->db->select('thumbnail')->from('gallery_photo')->where('gallery_photo_id',$gallery_photo_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    return false;
	}

	public function get_small_thumbnail_path($gallery_photo_id){
		$this->db->select('small_thumbnail')->from('gallery_photo')->where('gallery_photo_id',$gallery_photo_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->small_thumbnail;
    }
    return false;
	}
}

?>