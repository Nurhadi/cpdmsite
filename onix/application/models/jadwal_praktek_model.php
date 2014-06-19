<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Jadwal_praktek_model extends CI_Model
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

	public function get_jadwals()
	{
		$this->db->from("jadwal");
		$this->db->join("profile", "profile.profile_id = jadwal.profile_id");	
		$this->db->order_by("profile.fullname", "asc");
		$result = $this->db->get();
		return $result;
	}

	public function get_data_jadwal($jadwal_id)
	{
		$this->db->where("jadwal_id", $jadwal_id);
		$result = $this->db->get("jadwal");
		return $result;
	}

	public function create_new_jadwal($profile_id, $hari, $status, $admin_id)
	{
		$data = array("profile_id" => $profile_id, "hari" => $hari, "status" => $status, "admin_id" => $admin_id);
		$result = $this->db->insert("jadwal", $data);
		return $result;
	}

	public function update_jadwal($jadwal_id, $profile_id, $hari, $status, $admin_id)
	{
		$data = array("profile_id" => $profile_id, "hari" => $hari, "status" => $status, "admin_id" => $admin_id);
		$this->db->where("jadwal_id", $jadwal_id);
		$result = $this->db->update("jadwal", $data);
		return $result;
	}

	public function delete_jadwal($jadwal_id)
	{
		$this->db->where("jadwal_id", $jadwal_id);
		$result = $this->db->delete("jadwal");
		return $result;
	}
}

?>