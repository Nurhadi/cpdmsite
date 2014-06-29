<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_photo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_photo_model');
		$this->load->model('email_model');
	}

	public function index()
	{
		$this->load->view('gallery_photo_view');
	}
}

/* End of file gallery_photo.php */
/* Location: ./application/controllers/gallery_photo.php */