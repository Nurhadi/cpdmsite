<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data_download()
  {
    $this->db->select('title, filename');
    $this->db->order_by('created_at', 'desc');
    $result = $this->db->get('download');
    return $result;
  }
}

/* End of file contact_person_model.php */
/* Location: ./application/controllers/contact_person_model.php */