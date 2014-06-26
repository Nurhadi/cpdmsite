<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('home_view');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */