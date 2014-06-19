<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar {

    public function get_unread_message_count()
    {
    	$ci =& get_instance();
			$ci->db->select('inbox_id');
			$ci->db->where('status', 'unread');
			$result = $ci->db->get('inbox');

			return $result->num_rows();
    }
}

/* End of file Someclass.php */