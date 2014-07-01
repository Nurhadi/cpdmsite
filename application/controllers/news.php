<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('news_view');
	}
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */