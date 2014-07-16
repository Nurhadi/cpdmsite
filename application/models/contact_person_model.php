<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_person_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function create_contact_person($nama_lengkap, $email, $subject, $pesan, $created_at)
  {
    $data = array('nama_lengkap' => $nama_lengkap, 'email' => $email, 'subject' => $subject, 'pesan' => $pesan, 'created_at' => $created_at);
    $this->db->insert("contact_person", $data);
    return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }
}

/* End of file contact_person_model.php */
/* Location: ./application/controllers/contact_person_model.php */