<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('agenda_model');
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

			$data["agendas"] = $this->agenda_model->get_agenda();

			$data["title"] = "Agenda";
			$data["keywords"] = "";
			$data["description"] = "";
			$data["content"] = "";

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('agenda_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function agenda_process()
	{
		$title = $this->input->post("title");
		$link = $this->input->post("link");
		$photo = $this->input->post("photo");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$agenda = $this->agenda_model->create_new_agenda($title, $link, $created_at, $admin_id);
			$agenda_id = $agenda;
		}
		else{
			$agenda_id = $this->input->post("agenda_id");
			$agenda = $this->agenda_model->update_agenda($agenda_id, $title, $link, $created_at, $admin_id);
		}

		if($agenda !== false){
			$config['upload_path'] = './../uploads/agenda/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("photo"))
			{
				if($photo === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("agenda");
				}
				else{
					$this->session->set_flashdata("status", "Success update data agenda");
					redirect("agenda");
				}
			}
			else
			{
				// $old_photo_path = $this->agenda_model->get_photo_path($agenda_id);
				// if($old_photo_path !== false){
				// 	unlink("./../uploads/agenda/".$old_photo_path);
				// }

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->agenda_model->upload_photo($file_path, $agenda_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data agenda");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data agenda");
			}
			redirect("agenda");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("agenda");
		}
	}

	// create agenda ajax
	// public function create_new_agenda()
	// {
	// 	$title = $this->input->post("title");
	// 	$keywords = $this->input->post("keywords");
	// 	$description = $this->input->post("description");
	// 	$photo = $this->input->post("photo");
	// 	$content = $this->input->post("content");
	// 	$promo = $this->input->post("promo");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_agenda = $this->agenda_model->create_new_agenda($title, $keywords, $description, $photo, $content, $promo, $admin_id);

	// 	if($new_agenda){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function detail_agenda()
	{
		$agenda_id = $this->input->post("agenda_id");

		$agenda = $this->agenda_model->get_data_agenda($agenda_id);
		foreach ($agenda->result() as $p)
		{
			$title = $p->title;
			$link = $p->link;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$link.'|'.$filename.'|'.$created_at;
	}

	public function edit_agenda()
	{
		$agenda_id = $this->input->post("agenda_id");

		$agenda = $this->agenda_model->get_data_agenda($agenda_id);
		foreach ($agenda->result() as $p)
		{
			$title = $p->title;
			$link = $p->link;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$link.'|'.$filename.'|'.$created_at;
	}

	public function update_agenda()
	{
		$agenda_id = $this->input->post("agenda_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$photo = $this->input->post("photo");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_agenda = $this->agenda_model->update_agenda($agenda_id, $title, $keywords, $description, $photo, $content, $promo, $admin_id);

		if($update_agenda){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_agenda()
	{
		$agenda_id = $this->input->post("agenda_id");
		$photo = $this->agenda_model->get_photo_path($agenda_id);
		$agenda = $this->agenda_model->delete_agenda($agenda_id);

		if($agenda !== false){
			if($photo !== false){
				unlink("./../uploads/agenda/".$photo);
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

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */