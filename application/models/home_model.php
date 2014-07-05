<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_sliders()
  {
    $this->db->select('slider_id, slider_title, slider_description, slider_path');
    $this->db->where('status', 'Active');
    $this->db->order_by('date_created', 'desc');
    $result = $this->db->get('slider');
    return $result;
  }

  public function get_news($count)
  {
    $this->db->select('news_id, title, small_thumbnail, content, created_at');
    $this->db->order_by('created_at', 'desc');
    if($count === 2){
      $result = $this->db->get('news', 2, 0);
    }
    else{
      $result = $this->db->get('news', 3, 2);
    }
    return $result;
  }

  public function get_gallery_photos()
  {
    $this->db->select('id, gallery_id, title, description, filename');
    $this->db->order_by('created_at', 'desc');
    $result = $this->db->get('gallery_photo', 8, 0);
    return $result;
  }

  public function get_kesan_pesan()
  {
    $this->db->select('id, nama_lengkap, jabatan, thumbnail, kesan_pesan');
    $this->db->where('status', 'approved');
    $this->db->order_by('tanggal_disetujui', 'desc');
    $result = $this->db->get('kesan_pesan');
    return $result;
  }
}

/* End of file home_model.php */
/* Location: ./application/controllers/home_model.php */