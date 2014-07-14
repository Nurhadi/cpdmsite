<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_model extends CI_Model
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

	public function get_download()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("download");
		return $result;
	}

	public function get_data_download($download_id)
	{
		$this->db->where("id", $download_id);
		$result = $this->db->get("download");
		return $result;
	}

	public function create_new_download($title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("download", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_download($download_id, $title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $download_id);
		$this->db->update("download", $data);
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

	public function delete_download($download_id)
	{
		$this->db->where("id", $download_id);
		$this->db->delete("download");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_filename($file_path, $download){
		$data = array("filename" => $file_path);
		$this->db->where("id", $download);
		$this->db->update("download", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_filename_path($download_id){
		$this->db->select('filename')->from('download')->where('id',$download_id);
    $query = $this->db->get();

    if ($query->row()->filename !== "") {
      return $query->row()->filename;
    }
    else{
    	return false;
    }
	}
}

?>