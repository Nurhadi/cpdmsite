<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('profile_model');
    $this->load->model('page_model');
    $this->load->library('homepage');
  }

  public function latar_belakang()
  {
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(6);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
      $data['content'] = $p->content;
    }

    $this->load->view('latar_belakang_view', $data);
  }

  public function visi_dan_misi()
  {
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(7);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
      $data['content'] = $p->content;
    }

    $this->load->view('visi_dan_misi_view', $data);
  }

  public function pengelola()
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
      $data['content'] = $p->content;
    }

    $this->load->view('pengelola_view', $data);
  }
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */