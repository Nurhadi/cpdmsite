<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Berita_model extends CI_Model
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

	public function get_berita()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("berita");
		return $result;
	}

	public function get_data_berita($berita_id)
	{
		$this->db->where("berita_id", $berita_id);
		$result = $this->db->get("berita");
		return $result;
	}

	public function create_new_berita($title, $keywords, $description, $thumbnail, $content, $promo, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "thumbnail" => $thumbnail, "content" => $content, "promo" => $promo, "admin_id" => $admin_id);
		$result = $this->db->insert("berita", $data);
		return $result;
	}

	public function update_berita($berita_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id)
	{
		$data = array("title" => $title, "keywords" => $keywords, "description" => $description, "thumbnail" => $thumbnail, "content" => $content, "promo" => $promo, "admin_id" => $admin_id);
		$this->db->where("berita_id", $berita_id);
		$result = $this->db->update("berita", $data);
		return $result;
	}

	public function delete_berita($berita_id)
	{
		$this->db->where("berita_id", $berita_id);
		$result = $this->db->delete("berita");
		return $result;
	}
}

?>