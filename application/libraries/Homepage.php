<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage {

    public function get_homepage_info()
    {
      $ci =& get_instance();

      $ci->db->select('logo, title, keywords, description, facebook, twitter, google_plus');
      $ci->db->limit(1);
      $ci->db->order_by('homepage_id', 'asc');
      $result = $ci->db->get('homepage');

      return $result->row();
    }
}

/* End of file Homepage.php */