<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('gallery_view');
	}
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */