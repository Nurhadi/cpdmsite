<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pengelola_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('pengelola_view');
	}
}

/* End of file pengelola.php */
/* Location: ./application/controllers/pengelola.php */