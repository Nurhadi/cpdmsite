<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_photo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('gallery_photo_model');
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

			$data["gallery_photos"] = $this->gallery_photo_model->get_gallery_photo();
			$data["gallery"] = $this->gallery_model->get_gallery();

			$gallery_photo = $this->page_model->get_data_page(4);
			foreach ($gallery_photo->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('gallery_photo_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function gallery_photo_process()
	{
		$gallery_id = $this->input->post("gallery_id");
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$photo = $this->input->post("photo");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$gallery_photo = $this->gallery_photo_model->create_new_gallery_photo($gallery_id, $title, $description, $created_at, $admin_id);
			$gallery_photo_id = $gallery_photo;
		}
		else{
			$gallery_photo_id = $this->input->post("gallery_photo_id");
			$gallery_photo = $this->gallery_photo_model->update_gallery_photo($gallery_photo_id, $gallery_id, $title, $description, $created_at, $admin_id);
		}

		if($gallery_photo !== false){
			$config['upload_path'] = './../uploads/gallery_photo/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("photo"))
			{
				if($photo === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("gallery_photo");
				}
				else{
					$this->session->set_flashdata("status", "Success update data gallery photo");
					redirect("gallery_photo");
				}
			}
			else
			{
				if($form_action === "update"){
					$old_photo_path = $this->gallery_photo_model->get_photo_path($gallery_photo_id);
					if($old_photo_path !== false){
						unlink("./../uploads/gallery_photo/".$old_photo_path);
					}
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->gallery_photo_model->upload_photo($file_path, $gallery_photo_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data gallery photo");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data gallery photo");
			}
			redirect("gallery_photo");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("gallery_photo");
		}
	}

	// create gallery_photo ajax
	// public function create_new_gallery_photo()
	// {
	// 	$title = $this->input->post("title");
	// 	$keywords = $this->input->post("keywords");
	// 	$description = $this->input->post("description");
	// 	$photo = $this->input->post("photo");
	// 	$content = $this->input->post("content");
	// 	$promo = $this->input->post("promo");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_gallery_photo = $this->gallery_photo_model->create_new_gallery_photo($title, $keywords, $description, $photo, $content, $promo, $admin_id);

	// 	if($new_gallery_photo){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function detail_gallery_photo()
	{
		$gallery_photo_id = $this->input->post("gallery_photo_id");

		$gallery_photo = $this->gallery_photo_model->get_data_gallery_photo($gallery_photo_id);
		foreach ($gallery_photo->result() as $p)
		{
			$gallery = $this->gallery_model->get_gallery_title($p->gallery_id);
			$title = $p->title;
			$description = $p->description;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $gallery.'|'.$title.'|'.$description.'|'.$filename.'|'.$created_at;
	}

	public function edit_gallery_photo()
	{
		$gallery_photo_id = $this->input->post("gallery_photo_id");

		$gallery_photo = $this->gallery_photo_model->get_data_gallery_photo($gallery_photo_id);
		foreach($gallery_photo->result() as $p)
		{
			$gallery_id = $p->gallery_id;
			$title = $p->title;
			$description = $p->description;
			$filename = $p->filename;
		}

		echo $gallery_id.'|'.$title.'|'.$description.'|'.$filename;
	}

	public function update_gallery_photo()
	{
		$gallery_photo_id = $this->input->post("gallery_photo_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$photo = $this->input->post("photo");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_gallery_photo = $this->gallery_photo_model->update_gallery_photo($gallery_photo_id, $title, $keywords, $description, $photo, $content, $promo, $admin_id);

		if($update_gallery_photo){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_gallery_photo()
	{
		$gallery_photo_id = $this->input->post("gallery_photo_id");
		$photo = $this->gallery_photo_model->get_photo_path($gallery_photo_id);
		$gallery_photo = $this->gallery_photo_model->delete_gallery_photo($gallery_photo_id);

		if($gallery_photo !== false){
			if($photo !== false){
				unlink("./../uploads/gallery_photo/".$photo);
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
}

/* End of file gallery_photo.php */
/* Location: ./application/controllers/gallery_photo.php */