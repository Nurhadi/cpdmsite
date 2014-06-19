<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('gallery_model');
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

			$data["gallerys"] = $this->gallery_model->get_gallery();

			$gallery = $this->page_model->get_data_page(3);
			foreach ($gallery->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('gallery_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function gallery_process()
	{
		$title = $this->input->post("title");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$gallery = $this->gallery_model->create_new_gallery($title, $created_at, $admin_id);
			$gallery_id = $gallery;
		}
		else{
			$gallery_id = $this->input->post("gallery_id");
			$gallery = $this->gallery_model->update_gallery($gallery_id, $title, $created_at, $admin_id);
		}

		if($gallery !== false){
			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data gallery");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data gallery");
			}
			redirect("gallery");
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("gallery");
		}
	}

	public function detail_gallery()
	{
		$gallery_id = $this->input->post("gallery_id");

		$gallery = $this->gallery_model->get_data_gallery($gallery_id);
		foreach ($gallery->result() as $p)
		{
			$title = $p->title;
			$created_at = $p->created_at;
		}

		echo $title.'|'.date("d-m-Y H:i:s", strtotime($created_at));
	}

	public function edit_gallery()
	{
		$gallery_id = $this->input->post("gallery_id");

		$gallery = $this->gallery_model->get_data_gallery($gallery_id);
		foreach($gallery->result() as $p)
		{
			$title = $p->title;
		}

		echo $title.'|';
	}

	public function update_gallery()
	{
		$gallery_id = $this->input->post("gallery_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_gallery = $this->gallery_model->update_gallery($gallery_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($update_gallery){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_gallery()
	{
		$gallery_id = $this->input->post("gallery_id");
		$gallery = $this->gallery_model->delete_gallery($gallery_id);

		if($gallery !== false){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */