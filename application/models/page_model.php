<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data_page($page_id)
  {
    $this->db->select('title, keywords, description, content');
    $this->db->where('page_id', $page_id);
    $result = $this->db->get('page');
    return $result;
  }
}

/* End of file page_model.php */
/* Location: ./application/controllers/page_model.php */