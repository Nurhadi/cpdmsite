<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum_dan_struktur_bidang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kurikulum_dan_struktur_bidang_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('kurikulum_dan_struktur_bidang_view');
	}
}

/* End of file kurikulum_dan_struktur_bidang.php */
/* Location: ./application/controllers/kurikulum_dan_struktur_bidang.php */