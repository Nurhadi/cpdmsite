<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->model('home_model');
    $this->load->library('homepage');
	}

	public function index()
	{
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['title'] = '';
    $data['keywords'] = $data['homepage']->keywords;
    $data['description'] = $data['homepage']->description;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $data['sliders'] = $this->home_model->get_sliders();
    $data['news_with_thumbnail'] = $this->home_model->get_news(2);
    $data['agenda_terkini'] = $this->home_model->get_agenda();
    // $data['surat_izin'] = $this->home_model->get_surat_izin();
    $data['kesan_pesan'] = $this->home_model->get_kesan_pesan();
    $data['gallery_photos'] = $this->home_model->get_gallery_photos();
		$this->load->view('home_view', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */