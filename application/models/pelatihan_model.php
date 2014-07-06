<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelatihan_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_kurikulum_dan_struktur_bidang($id)
  {
    $this->db->select('description');
    $this->db->where('id', $id);
    $result = $this->db->get('kurikulum_dan_struktur_bidang');
    return $result->row()->description;
  }
}

/* End of file pelatihan_model.php */
/* Location: ./application/controllers/pelatihan_model.php */