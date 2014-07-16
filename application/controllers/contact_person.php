<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_person extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('profile_model');
    $this->load->model('page_model');
    $this->load->model('contact_person_model');
    $this->load->model('email_model');
    $this->load->library('homepage');
  }

  public function index()
  {
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(25);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
      $data['content'] = $p->content;
    }

    $this->load->view('contact_person_view', $data);
  }

  public function contact_person_process()
  {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $email = $this->input->post('email');
    $subject = $this->input->post('subject');
    $pesan = $this->input->post('pesan');

    $this->load->helper('date');
    date_default_timezone_set("Asia/Jakarta");
    $created_at = date("Y-m-d H:i:s");

    $contact_person = $this->contact_person_model->create_contact_person($nama_lengkap, $email, $subject, $pesan, $created_at);

    if($contact_person !== false){
      $this->email_model->contact_person($nama_lengkap, $email, $subject, $pesan);
      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("message", "Berhasil dikirim !");
      redirect("contact_person");
    }
    else{
      $this->session->set_flashdata("status", "error");
      $this->session->set_flashdata("message", "Pengiriman gagal !");
      redirect("contact_person");
    }
  }
}

/* End of file contact_person.php */
/* Location: ./application/controllers/contact_person.php */