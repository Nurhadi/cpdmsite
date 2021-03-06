<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_photo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_photo_model');
    $this->load->model('page_model');
		$this->load->library('homepage');
	}

	public function index()
	{
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(4);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
    }

    $this->load->view('gallery_photo_view', $data);
	}
}

/* End of file gallery_photo.php */
/* Location: ./application/controllers/gallery_photo.php */