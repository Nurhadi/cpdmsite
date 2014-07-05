<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pengelola_model');
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

    $page = $this->page_model->get_data_page(5);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
    }

		$this->load->view('pengelola_view', $data);
	}
}

/* End of file pengelola.php */
/* Location: ./application/controllers/pengelola.php */