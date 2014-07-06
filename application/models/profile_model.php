<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_pengelola($pengelola_bagian)
  {
    $this->db->select('id, nama, alamat, email, telepon, jabatan, photo, pengelola_bagian');
    $this->db->where('pengelola_bagian', $pengelola_bagian);
    $this->db->order_by('id', 'asc');
    $result = $this->db->get('pengelola');
    return $result;
  }
}

/* End of file profile_model.php */
/* Location: ./application/controllers/profile_model.php */