<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum_dan_struktur_bidang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kurikulum_dan_struktur_bidang_model');
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

    $page = $this->page_model->get_data_page(27);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
    }

		$this->load->view('kurikulum_dan_struktur_bidang_view', $data);
	}
}

/* End of file kurikulum_dan_struktur_bidang.php */
/* Location: ./application/controllers/kurikulum_dan_struktur_bidang.php */