<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum_dan_struktur_bidang_model extends CI_Model
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

	public function get_kurikulum_dan_struktur_bidang()
	{
		$this->db->order_by("id", "asc");
		$result = $this->db->get("kurikulum_dan_struktur_bidang");
		return $result;
	}

	public function get_kurikulum_dan_struktur_bidang_title($kurikulum_dan_struktur_bidang_id){
		$this->db->select("title");
		$this->db->where("id", $kurikulum_dan_struktur_bidang_id);
		$result = $this->db->get("kurikulum_dan_struktur_bidang");
		return $result->row()->title;
	}

	public function get_data_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id)
	{
		$this->db->where("id", $kurikulum_dan_struktur_bidang_id);
		$result = $this->db->get("kurikulum_dan_struktur_bidang");
		return $result;
	}

	public function create_new_kurikulum_dan_struktur_bidang($title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("kurikulum_dan_struktur_bidang", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id, $description, $created_at, $admin_id)
	{
		$data = array("description" => $description, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $kurikulum_dan_struktur_bidang_id);
		$this->db->update("kurikulum_dan_struktur_bidang", $data);
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

	public function delete_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id)
	{
		$this->db->where("id", $kurikulum_dan_struktur_bidang_id);
		$this->db->delete("kurikulum_dan_struktur_bidang");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_thumbnail($file_path, $kurikulum_dan_struktur_bidang){
		$data = array("thumbnail" => $file_path);
		$this->db->where("id", $kurikulum_dan_struktur_bidang);
		$this->db->update("kurikulum_dan_struktur_bidang", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_small_thumbnail($file_path, $kurikulum_dan_struktur_bidang){
		$data = array("small_thumbnail" => $file_path);
		$this->db->where("id", $kurikulum_dan_struktur_bidang);
		$this->db->update("kurikulum_dan_struktur_bidang", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_thumbnail_path($kurikulum_dan_struktur_bidang_id){
		$this->db->select('thumbnail')->from('kurikulum_dan_struktur_bidang')->where('kurikulum_dan_struktur_bidang_id',$kurikulum_dan_struktur_bidang_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->thumbnail;
    }
    return false;
	}

	public function get_small_thumbnail_path($kurikulum_dan_struktur_bidang_id){
		$this->db->select('small_thumbnail')->from('kurikulum_dan_struktur_bidang')->where('kurikulum_dan_struktur_bidang_id',$kurikulum_dan_struktur_bidang_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->small_thumbnail;
    }
    return false;
	}
}

?>