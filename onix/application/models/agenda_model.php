<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model
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

	public function get_agenda()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("agenda");
		return $result;
	}

	public function get_data_agenda($agenda_id)
	{
		$this->db->where("id", $agenda_id);
		$result = $this->db->get("agenda");
		return $result;
	}

	public function create_new_agenda($title, $link, $created_at, $admin_id)
	{
		$data = array("title" => $title, "link" => $link, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("agenda", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_agenda($agenda_id, $title, $link, $created_at, $admin_id)
	{
		$data = array("title" => $title, "link" => $link, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $agenda_id);
		$this->db->update("agenda", $data);
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

	public function delete_agenda($agenda_id)
	{
		$this->db->where("id", $agenda_id);
		$this->db->delete("agenda");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_photo($file_path, $agenda){
		$data = array("filename" => $file_path);
		$this->db->where("id", $agenda);
		$this->db->update("agenda", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_photo_path($agenda_id){
		$this->db->select('filename')->from('agenda')->where('id',$agenda_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->filename;
    }
    return false;
	}
}

?>