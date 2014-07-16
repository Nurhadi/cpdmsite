<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('page_model');
    $this->load->model('download_model');
    $this->load->library('homepage');
  }

  public function index()
  {
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $data['downloads'] = $this->download_model->get_data_download();

    $page = $this->page_model->get_data_page(23);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
      $data['content'] = $p->content;
    }

    $this->load->view('download_view', $data);
  }
}

/* End of file download.php */
/* Location: ./application/controllers/download.php */