<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_peserta()
	{
		$this->db->where("status !=", "deleted");
		$this->db->order_by("tanggal_dibuat", "desc");
		$result = $this->db->get("peserta");
		return $result;
	}

	public function get_data_peserta($peserta_id)
	{
		$this->db->where("id", $peserta_id);
		$result = $this->db->get("peserta");
		return $result;
	}

	public function approve_peserta($peserta_id, $tanggal_disetujui)
	{
		$data = array("tanggal_disetujui" => $tanggal_disetujui, "status" => "approved");
		$this->db->where("id", $peserta_id);
		$this->db->update("peserta", $data);
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

	public function delete_status_peserta($peserta_id)
	{
		$data = array("status" => "deleted");
		$this->db->where("id", $peserta_id);
		$this->db->update("peserta", $data);
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