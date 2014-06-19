<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class About_us_model extends CI_Model
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

	public function get_maps()
	{
		$this->db->select("latitude, longitude");
		$result = $this->db->get("homepage");
		return $result;
	}

	public function update_latitude($latitude)
	{
		$data = array("latitude" => $latitude);
		$result = $this->db->update("homepage", $data);
		return $result;
	}

	public function update_longitude($longitude)
	{
		$data = array("longitude" => $longitude);
		$result = $this->db->update("homepage", $data);
		return $result;
	}
}

?>