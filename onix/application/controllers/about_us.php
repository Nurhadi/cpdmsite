<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('about_us_model');
		$this->load->model('page_model');
		$this->load->library('sidebar');
		// $this->output->enable_profiler(true);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == 1){
			$admin = $this->admin_model->get_data_admin($this->session->userdata('email'));
			foreach ($admin->result() as $row)
			{
				$data["fullname"] = $row->firstname . " " . $row->lastname;
			}

			$about_us = $this->page_model->get_data_page(4);
			foreach ($about_us->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$maps = $this->about_us_model->get_maps();
			foreach ($maps->result() as $map)
			{
				$data["latitude"] = $map->latitude;
				$data["longitude"] = $map->longitude;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('about_us_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function update_latitude()
	{
		$latitude = $this->input->post("latitude");

		$update_page_latitude = $this->about_us_model->update_latitude($latitude);

		if($update_page_latitude){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_longitude()
	{
		$longitude = $this->input->post("longitude");

		$update_page_longitude = $this->about_us_model->update_longitude($longitude);

		if($update_page_longitude){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file about_us.php */
/* Location: ./application/controllers/about_us.php */