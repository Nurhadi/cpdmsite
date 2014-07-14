<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periode_pelatihan_model extends CI_Model
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

	public function get_periode_pelatihan()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("periode_pelatihan");
		return $result;
	}

	public function get_periode_pelatihan_title($periode_pelatihan_id){
		$this->db->select("title");
		$this->db->where("id", $periode_pelatihan_id);
		$result = $this->db->get("periode_pelatihan");
		return $result->row()->title;
	}

	public function get_data_periode_pelatihan($periode_pelatihan_id)
	{
		$this->db->where("id", $periode_pelatihan_id);
		$result = $this->db->get("periode_pelatihan");
		return $result;
	}

	public function create_new_periode_pelatihan($title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("periode_pelatihan", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_periode_pelatihan($periode_pelatihan_id, $title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $periode_pelatihan_id);
		$this->db->update("periode_pelatihan", $data);
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

	public function delete_periode_pelatihan($periode_pelatihan_id)
	{
		$this->db->where("id", $periode_pelatihan_id);
		$this->db->delete("periode_pelatihan");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_thumbnail($file_path, $periode_pelatihan){
		$data = array("thumbnail" => $file_path);
		$this->db->where("id", $periode_pelatihan);
		$this->db->update("periode_pelatihan", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_small_thumbnail($file_path, $periode_pelatihan){
		$data = array("small_thumbnail" => $file_path);
		$this->db->where("id", $periode_pelatihan);
		$this->db->update("periode_pelatihan", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_thumbnail_path($periode_pelatihan_id){
		$this->db->select('thumbnail')->from('periode_pelatihan')->where('periode_pelatihan_id',$periode_pelatihan_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    return false;
	}

	public function get_small_thumbnail_path($periode_pelatihan_id){
		$this->db->select('small_thumbnail')->from('periode_pelatihan')->where('periode_pelatihan_id',$periode_pelatihan_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->small_thumbnail;
    }
    return false;
	}
}

?>