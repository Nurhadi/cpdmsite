<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
    $this->load->model('page_model');
    $this->load->model('home_model');
		$this->load->library('homepage');
	}

	public function index()
	{
    $this->load->helper('text');

    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(2);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
    }

    $data['newss'] = $this->news_model->get_data_news();
    $data['archived_news'] = $this->news_model->get_data_news();

    $this->load->view('news_view', $data);
  }

  public function detail()
  {
    $this->load->helper('text');

    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $news_id = $this->uri->segment(4);
    $news_detail = $this->news_model->get_news_detail($news_id);
    if($news_detail->num_rows() > 0){
      foreach($news_detail->result() as $news){
        $data['title'] = $news->title;
        $data['keywords'] = $news->keywords;
        $data['description'] = $news->description;
        $data['thumbnail'] = $news->thumbnail;
        $data['content'] = $news->content;
        $data['created_at'] = $news->created_at;
        $data['admin_id'] = $news->admin_id;
      }
    }

    $data['admin'] = $this->home_model->get_data_admin($data['admin_id']);
    $data['archived_news'] = $this->news_model->get_data_news();

    $this->load->view('news_detail_view', $data);
  }
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */