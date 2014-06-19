<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
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

	public function get_profiles()
	{
		$this->db->order_by("profile_id", "asc");
		$result = $this->db->get("profile");
		return $result;
	}

	public function get_data_profile($profile_id)
	{
		$this->db->where("profile_id", $profile_id);
		$result = $this->db->get("profile");
		return $result;
	}

	public function create_new_profile($fullname, $position, $description, $status, $admin_id)
	{
		$data = array("fullname" => $fullname, "position" => $position, "description" => $description, "status" => $status, "admin_id" => $admin_id);
		$result = $this->db->insert("profile", $data);
		return $this->db->insert_id();
	}

	public function update_profile($profile_id, $fullname, $position, $description, $status, $admin_id)
	{
		$data = array("fullname" => $fullname, "position" => $position, "description" => $description, "status" => $status, "admin_id" => $admin_id);
		$this->db->where("profile_id", $profile_id);
		$result = $this->db->update("profile", $data);
		return $result;
	}

	public function delete_profile($profile_id)
	{
		$this->db->where("profile_id", $profile_id);
		$result = $this->db->delete("profile");
		return $result;
	}

	public function upload_photo($photo, $profile){
		$data = array("photo" => $photo);
		$this->db->where("profile_id", $profile);
		$result = $this->db->update("profile", $data);
		return $result;
	}

	public function get_profile_path($profile_id){
		$this->db->select('photo')->from('profile')->where('profile_id',$profile_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->photo;
    }
    return false;
	}
}

?>