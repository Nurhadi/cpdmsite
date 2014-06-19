<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('homepage_model');
		$this->load->library('sidebar');
		// $this->output->enable_profiler(true);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == 1){
			$admin = $this->admin_model->get_data_admin($this->session->userdata('email'));
			foreach ($admin->result() as $row)
			{
				$data["firstname"] = $row->firstname . " " . $row->lastname;
			}

			$homepage = $this->homepage_model->get_data_homepage();
			foreach ($homepage->result() as $hp)
			{
				$data["logo"] = $hp->logo;
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["slider_title"] = $hp->slider_title;
				$data["slider_description"] = $hp->slider_description;
				$data["content"] = $hp->content;
				$data["image_address"] = $hp->image_address;
				$data["address"] = $hp->address;
				$data["phone"] = $hp->phone;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('admin_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}

/* End of file homepage.php */
/* Location: ./application/controllers/homepage.php */