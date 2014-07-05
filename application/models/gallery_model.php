<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_galleries()
  {
    $this->db->select('gallery_photo.id, gallery_photo.filename, gallery.id as gallery_id, gallery.title as gallery_title, gallery.created_at');
    $this->db->from('gallery_photo');
    $this->db->join('gallery', 'gallery.id = gallery_photo.gallery_id');
    $this->db->order_by('gallery_photo.created_at', 'desc');
    $result = $this->db->get();
    return $result;
  }

  public function get_gallery_photos($gallery_id)
  {
    $this->db->select('id, title, description, filename');
    $this->db->where('gallery_id', $gallery_id);
    $this->db->order_by('created_at', 'asc');
    $result = $this->db->get('gallery_photo');
    return $result;
  }
}

/* End of file gallery_model.php */
/* Location: ./application/controllers/gallery_model.php */