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

    $data['pengelola_cpdmsite'] = $this->profile_model->get_pengelola('CPD-MSITE');
    $data['pengelola_matematika'] = $this->profile_model->get_pengelola('Matematika');
    $data['pengelola_kimia'] = $this->profile_model->get_pengelola('Kimia');
    $data['pengelola_fisika'] = $this->profile_model->get_pengelola('Fisika');
    $data['pengelola_biologi'] = $this->profile_model->get_pengelola('Biologi');
    $data['pengelola_ilmu_komputer'] = $this->profile_model->get_pengelola('Ilmu Komputer');
    $data['pengelola_ipa'] = $this->profile_model->get_pengelola('IPA');

    $this->load->view('pengelola_view', $data);
  }

  public function get_detail_pengelola()
  {
    $pengelola_id = $this->input->post('pengelola_id');
    $pengelola = $this->profile_model->get_detail_pengelola($pengelola_id);
    if($pengelola->num_rows() > 0){
      foreach($pengelola->result() as $p){
        $nama = $p->nama;
        $alamat = $p->alamat;
        $email = $p->email;
        $telepon = $p->telepon;
        $jabatan = $p->jabatan;
        $photo = $p->photo;
      }
      echo $nama."|".$alamat."|".$email."|".$telepon."|".$jabatan."|".$photo;
    }
    else{
      echo 'error';
    }
  }
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */