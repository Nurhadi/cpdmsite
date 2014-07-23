<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola_model extends CI_Model
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

	public function get_pengelola()
	{
		$this->db->order_by("created_at", "desc");
		$result = $this->db->get("pengelola");
		return $result;
	}

	public function get_data_pengelola($pengelola_id)
	{
		$this->db->where("id", $pengelola_id);
		$result = $this->db->get("pengelola");
		return $result;
	}

	public function create_new_pengelola($nama, $alamat, $email, $telepon, $jabatan, $pengelola_bagian, $created_at, $admin_id)
	{
		$data = array("nama" => $nama, "alamat" => $alamat, "email" => $email, "telepon" => $telepon, "jabatan" => $jabatan, "pengelola_bagian" => $pengelola_bagian, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->insert("pengelola", $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function update_pengelola($pengelola_id, $nama, $alamat, $email, $telepon, $jabatan, $pengelola_bagian, $created_at, $admin_id)
	{
		$data = array("nama" => $nama, "alamat" => $alamat, "email" => $email, "telepon" => $telepon, "jabatan" => $jabatan, "pengelola_bagian" => $pengelola_bagian, "created_at" => $created_at, "admin_id" => $admin_id);
		$this->db->where("id", $pengelola_id);
		$this->db->update("pengelola", $data);
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

	public function delete_pengelola($pengelola_id)
	{
		$this->db->where("id", $pengelola_id);
		$this->db->delete("pengelola");
		return($this->db->affected_rows() != 1) ? false : true;
	}

	public function upload_photo($file_path, $pengelola){
		$data = array("photo" => $file_path);
		$this->db->where("id", $pengelola);
		$this->db->update("pengelola", $data);
		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_photo_path($pengelola_id){
		$this->db->select('photo')->from('pengelola')->where('id',$pengelola_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->photo;
    }
    else
    {
    	return false;
    }
	}
}

?>