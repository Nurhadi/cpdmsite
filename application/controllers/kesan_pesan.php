<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesan_pesan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('profile_model');
    $this->load->model('page_model');
    $this->load->model('kesan_pesan_model');
    $this->load->library('homepage');
  }

  public function index()
  {
    $data['homepage'] = $this->homepage->get_homepage_info();
    $data['page_title'] = $data['homepage']->title;
    $data['facebook'] = $data['homepage']->facebook;
    $data['twitter'] = $data['homepage']->twitter;
    $data['google_plus'] = $data['homepage']->google_plus;

    $page = $this->page_model->get_data_page(26);
    foreach($page->result() as $p){
      $data['title'] = $p->title;
      $data['keywords'] = $p->keywords;
      $data['description'] = $p->description;
      $data['content'] = $p->content;
    }

    $this->load->view('kesan_pesan_view', $data);
  }

  public function kesan_pesan_process()
  {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $jabatan = $this->input->post('jabatan');
    $kota = $this->input->post('kota');
    $thumbnail = $this->input->post("thumbnail");
    $kesan_pesan = $this->input->post('kesan_pesan');

    $this->load->helper('date');
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_dibuat = date("Y-m-d H:i:s");

    $kesan_pesan = $this->kesan_pesan_model->create_kesan_pesan($nama_lengkap, $jabatan, $kota, $kesan_pesan, $tanggal_dibuat);

    if($kesan_pesan !== false){
      $config['upload_path'] = './uploads/kesan_pesan/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload("thumbnail"))
      {
        $this->session->set_flashdata("status", "success");
        $this->session->set_flashdata("message", "Terima kasih Anda telah memberikan kesan pesan terhadap pelatihan kami !");
        redirect("kesan_pesan");
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $file_path = $data["upload_data"]["file_name"];
        $upload_thumbnail = $this->kesan_pesan_model->upload_thumbnail($file_path, $kesan_pesan);
      }

      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("message", "Terima kasih Anda telah memberikan kesan pesan terhadap pelatihan kami !");
      redirect("kesan_pesan");
    }
    else{
      $this->session->set_flashdata("status", "error");
      $this->session->set_flashdata("message", "Terjadi kesalahan pada saat pengiriman !");
      redirect("kesan_pesan");
    }
  }
}

/* End of file kesan_pesan.php */
/* Location: ./application/controllers/kesan_pesan.php */