<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesan_pesan_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function create_kesan_pesan($nama_lengkap, $jabatan, $kota, $kesan_pesan, $tanggal_dibuat)
  {
    $data = array('nama_lengkap' => $nama_lengkap, 'jabatan' => $jabatan, 'kota' => $kota, 'kesan_pesan' => $kesan_pesan, 'tanggal_dibuat' => $tanggal_dibuat);
    $this->db->insert("kesan_pesan", $data);
    return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }

  public function upload_thumbnail($file_path, $kesan_pesan){
    $data = array("thumbnail" => $file_path);
    $this->db->where("id", $kesan_pesan);
    $this->db->update("kesan_pesan", $data);
    if ($this->db->trans_status() !== FALSE)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}

/* End of file kesan_pesan_model.php */
/* Location: ./application/controllers/kesan_pesan_model.php */