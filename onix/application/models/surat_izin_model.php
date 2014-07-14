<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_izin_model extends CI_Model
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

	public function get_surat_izin()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("surat_izin");
		return $result;
	}

	public function get_data_surat_izin($surat_izin_id)
	{
		$this->db->where("id", $surat_izin_id);
		$result = $this->db->get("surat_izin");
		return $result;
	}

	public function create_new_surat_izin($title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("surat_izin", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_surat_izin($surat_izin_id, $title, $created_at, $admin_id)
	{
		$data = array("title" => $title, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $surat_izin_id);
		$this->db->update("surat_izin", $data);
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

	public function delete_surat_izin($surat_izin_id)
	{
		$this->db->where("id", $surat_izin_id);
		$this->db->delete("surat_izin");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_filename($file_path, $surat_izin){
		$data = array("filename" => $file_path);
		$this->db->where("id", $surat_izin);
		$this->db->update("surat_izin", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_filename_path($surat_izin_id){
		$this->db->select('filename')->from('surat_izin')->where('id',$surat_izin_id);
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