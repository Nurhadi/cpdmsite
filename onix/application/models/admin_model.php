<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function check_admin_authentication($email, $password)
	{
		$array = array('email' => $email, 'password' => md5($password));
		$this->db->where($array);
		$result = $this->db->get('admin');
		return $result;
	}

	public function get_data_admin($email)
	{
		$this->db->select('firstname, lastname');
		$this->db->where('email', $email);
		$result = $this->db->get('admin');
		return $result;
	}

	public function get_admin_id($email)
	{
		$this->db->select('id');
		$this->db->where('email', $email);
		$result = $this->db->get('admin');
		return $result->row()->id;

	}

	public function get_list_admin()
	{
		$this->db->select('firstname, lastname, username, email, type');
		$this->db->order_by('id','asc');
		$result = $this->db->get('admin');
		return $result;
	}
}

?>