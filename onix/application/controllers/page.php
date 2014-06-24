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
				$data["fullname"] = $row->firstname . " " . $row->lastname;
			}

			$data["pages"] = $this->page_model->get_page();

			// $page = $this->page_model->get_data_page(2);
			// foreach ($page->result() as $hp)
			// {
			// 	$data["title"] = $hp->title;
			// 	$data["keywords"] = $hp->keywords;
			// 	$data["description"] = $hp->description;
			// 	$data["content"] = $hp->content;
			// }

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('page_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function page_process()
	{
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		if($this->input->post("form_action") === "create"){
			$page = $this->page_model->create_new_page($title, $keywords, $description, $content, $admin_id);
			$page_id = $page;
		}
		else{
			$page_id = $this->input->post("page_id");
			$page = $this->page_model->update_page($page_id, $title, $keywords, $description, $content, $admin_id);
		}

		if($page !== false){
			$config['upload_path'] = './../uploads/page/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("thumbnail"))
			{
				if($thumbnail === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("page");
				}
				else{
					$this->session->set_flashdata("status", "Success update data page");
					redirect("page");
				}
			}
			else
			{
				$old_thumbnail_path = $this->page_model->get_thumbnail_path($page_id);
				if($old_thumbnail_path !== false){
					unlink("./../uploads/page/".$old_thumbnail_path);
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->page_model->upload_thumbnail($file_path, $page_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data page");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data page");
			}
			redirect("page");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("page");
		}
	}

	public function detail_page()
	{
		$page_id = $this->input->post("page_id");

		$page = $this->page_model->get_data_page($page_id);
		foreach ($page->result() as $p)
		{
			$title = $p->title;
			$keywords = $p->keywords;
			$description = $p->description;
			$content = $p->content;
			$thumbnail = $p->thumbnail;
		}

		echo $title.'|'.$keywords.'|'.$description.'|'.strip_tags($content).'|'.$thumbnail;
	}

	public function edit_page()
	{
		$page_id = $this->input->post("page_id");

		$page = $this->page_model->get_data_page($page_id);
		foreach ($page->result() as $p)
		{
			$title = $p->title;
			$keywords = $p->keywords;
			$description = $p->description;
			$content = $p->content;
			$thumbnail = $p->thumbnail;
		}

		echo $title.'|'.$keywords.'|'.$description.'|'.$content.'|'.$thumbnail;
	}

	public function delete_page()
	{
		$page_id = $this->input->post("page_id");
		$thumbnail = $this->page_model->get_thumbnail_path($page_id);
		$page = $this->page_model->delete_page($page_id);

		if($page !== false){
			if($thumbnail !== false){
				unlink("./../uploads/page/".$thumbnail);
				echo "success";
			}
			else{
				echo "error";
			}
		}
		else{
			echo "error";
		}
	}

	// function for whole application
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