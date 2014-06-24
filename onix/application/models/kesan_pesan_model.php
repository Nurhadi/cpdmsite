<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesan_pesan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_kesan_pesan()
	{
		$this->db->where("status !=", "deleted");
		$this->db->order_by("tanggal_dibuat", "desc");
		$result = $this->db->get("kesan_pesan");
		return $result;
	}

	public function get_data_kesan_pesan($kesan_pesan_id)
	{
		$this->db->where("id", $kesan_pesan_id);
		$result = $this->db->get("kesan_pesan");
		return $result;
	}

	public function approve_kesan_pesan($kesan_pesan_id, $tanggal_disetujui)
	{
		$data = array("tanggal_disetujui" => $tanggal_disetujui, "status" => "approved");
		$this->db->where("id", $kesan_pesan_id);
		$this->db->update("kesan_pesan", $data);
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

	public function delete_status_kesan_pesan($kesan_pesan_id)
	{
		$data = array("status" => "deleted");
		$this->db->where("id", $kesan_pesan_id);
		$this->db->update("kesan_pesan", $data);
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
}

?>