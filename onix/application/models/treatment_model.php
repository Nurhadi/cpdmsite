<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treatment_model extends CI_Model
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

	public function get_treatments()
	{
		$this->db->select("treatment_id, title, big_image, small_image_1, small_image_2, small_image_3, small_image_4, status");
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("treatment");
		return $result;
	}

	public function get_data_treatment($treatment_id)
	{
		$this->db->where("treatment_id", $treatment_id);
		$result = $this->db->get("treatment");
		return $result;
	}

	public function create_new_treatment($title, $status, $admin_id)
	{
		$data = array("title" => $title, "status" => $status, "admin_id" => $admin_id);
		$result = $this->db->insert("treatment", $data);
		return $this->db->insert_id();
	}

	public function update_treatment($treatment_id, $title, $status, $admin_id)
	{
		$data = array("title" => $title, "status" => $status, "admin_id" => $admin_id);
		$this->db->where("treatment_id", $treatment_id);
		$result = $this->db->update("treatment", $data);
		return $result;
	}

	public function delete_treatment($treatment_id)
	{
		$this->db->where("treatment_id", $treatment_id);
		$result = $this->db->delete("treatment");
		return $result;
	}

	public function upload_image($image, $treatment, $image_number){
		if($image_number === 0){$image_type = 'big_image';}
		else if($image_number === 1){$image_type = 'small_image_1';}
		else if($image_number === 2){$image_type = 'small_image_2';}
		else if($image_number === 3){$image_type = 'small_image_3';}
		else if($image_number === 4){$image_type = 'small_image_4';}

		$data = array($image_type => $image);
		$this->db->where("treatment_id", $treatment);
		$result = $this->db->update("treatment", $data);
		return $result;
	}

	public function get_treatment_path($treatment_id, $image_number){
		if($image_number === 0){$image_type = 'big_image';}
		else if($image_number === 1){$image_type = 'small_image_1';}
		else if($image_number === 2){$image_type = 'small_image_2';}
		else if($image_number === 3){$image_type = 'small_image_3';}
		else if($image_number === 4){$image_type = 'small_image_4';}

		$this->db->select($image_type)->from('treatment')->where('treatment_id',$treatment_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->$image_type;
    }
    return false;
	}

	// public function get_treatment_images($treatment_id){
	// 	$this->db->select("big_image, small_image_1, small_image_2, small_image_3, small_image_4");
	// 	$this->db->where("treatment_id", $treatment_id);
	// 	$result = $this->db->get("treatment");
	// 	return $result;
	// }
}

?>