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
		$this->db->where("id", $gallery_photo_id);
		$result = $this->db->get("gallery_photo");
		return $result;
	}

	public function create_new_gallery_photo($gallery_id, $title, $description, $created_at, $admin_id)
	{
		$data = array("gallery_id" => $gallery_id, "title" => $title, "description" => $description, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("gallery_photo", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_gallery_photo($gallery_photo_id, $gallery_id, $title, $description, $created_at, $admin_id)
	{
		$data = array("gallery_id" => $gallery_id, "title" => $title, "description" => $description, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $gallery_photo_id);
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
		$this->db->where("id", $gallery_photo_id);
		$this->db->delete("gallery_photo");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_photo($file_path, $gallery_photo){
		$data = array("filename" => $file_path);
		$this->db->where("id", $gallery_photo);
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

	public function get_photo_path($gallery_photo_id){
		$this->db->select('filename')->from('gallery_photo')->where('id',$gallery_photo_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->filename;
    }
    else
    {
    	return false;
    }
	}
}

?>