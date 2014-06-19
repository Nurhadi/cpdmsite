<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
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
				$data["firstname"] = $row->firstname . " " . $row->lastname;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('page_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function update_page_title()
	{
		$page_id = $this->input->post("page_id");
		$title = $this->input->post("title");

		$update_page_title = $this->page_model->update_page_title($page_id, $title);

		if($update_page_title){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_page_keywords()
	{
		$page_id = $this->input->post("page_id");
		$keywords = $this->input->post("keywords");

		$update_page_keywords = $this->page_model->update_page_keywords($page_id, $keywords);

		if($update_page_keywords){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_page_description()
	{
		$page_id = $this->input->post("page_id");
		$description = $this->input->post("description");

		$update_page_description = $this->page_model->update_page_description($page_id, $description);

		if($update_page_description){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_page_longitude()
	{
		$page_id = $this->input->post("page_id");
		$longitude = $this->input->post("longitude");

		$update_page_longitude = $this->page_model->update_page_longitude($page_id, $longitude);

		if($update_page_longitude){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_page_content()
	{
		$page_id = $this->input->post("page_id");
		$content = $this->input->post("content");

		$update_page_content = $this->page_model->update_page_content($page_id, $content);

		if($update_page_content){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */