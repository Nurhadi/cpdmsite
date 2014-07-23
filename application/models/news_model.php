<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data_news()
  {
    $this->db->select('news_id, title, small_thumbnail, content');
    $this->db->order_by('created_at', 'desc');
    $result = $this->db->get('news');
    return $result;
  }

  public function get_news_detail($news_id)
  {
    $this->db->select('title, keywords, description, thumbnail, content, created_at, admin_id');
    $this->db->where('news_id', $news_id);
    $result = $this->db->get('news');
    return $result;
  }
}

/* End of file news_model.php */
/* Location: ./application/controllers/news_model.php */