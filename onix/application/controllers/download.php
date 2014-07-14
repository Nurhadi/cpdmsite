<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('download_model');
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

			$data["downloads"] = $this->download_model->get_download();

			$news = $this->page_model->get_data_page(23);
			foreach ($news->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('download_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function download_process()
	{
		$title = $this->input->post("title");
		$filename = $this->input->post("filename");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$download = $this->download_model->create_new_download($title, $created_at, $admin_id);
			$download_id = $download;
		}
		else{
			$download_id = $this->input->post("download_id");
			$download = $this->download_model->update_download($download_id, $title, $created_at, $admin_id);
		}

		if($download !== false){
			$config['upload_path'] = './../uploads/download/';
			$config['allowed_types'] = '*';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("filename"))
			{
				if($filename === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("download");
				}
				else{
					$this->session->set_flashdata("status", "Success update data download");
					redirect("download");
				}
			}
			else
			{
				$old_filename_path = $this->download_model->get_filename_path($download_id);
				if($old_filename_path !== false){
					unlink("./../uploads/download/".$old_filename_path);
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->download_model->upload_filename($file_path, $download_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data download");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data download");
			}
			redirect("download");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("download");
		}
	}

	// create download ajax
	// public function create_new_download()
	// {
	// 	$title = $this->input->post("title");
	// 	$keywords = $this->input->post("keywords");
	// 	$description = $this->input->post("description");
	// 	$filename = $this->input->post("filename");
	// 	$content = $this->input->post("content");
	// 	$promo = $this->input->post("promo");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_download = $this->download_model->create_new_download($title, $keywords, $description, $filename, $content, $promo, $admin_id);

	// 	if($new_download){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function detail_download()
	{
		$download_id = $this->input->post("download_id");

		$download = $this->download_model->get_data_download($download_id);
		foreach ($download->result() as $p)
		{
			$title = $p->title;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$filename.'|'.$created_at;
	}

	public function edit_download()
	{
		$download_id = $this->input->post("download_id");

		$download = $this->download_model->get_data_download($download_id);
		foreach ($download->result() as $p)
		{
			$title = $p->title;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$filename.'|'.$created_at;
	}

	public function update_download()
	{
		$download_id = $this->input->post("download_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$filename = $this->input->post("filename");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_download = $this->download_model->update_download($download_id, $title, $keywords, $description, $filename, $content, $promo, $admin_id);

		if($update_download){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_download()
	{
		$download_id = $this->input->post("download_id");
		$filename = $this->download_model->get_filename_path($download_id);
		$download = $this->download_model->delete_download($download_id);

		if($download !== false){
			if($filename !== false){
				unlink("./../uploads/download/".$filename);
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

/* End of file download.php */
/* Location: ./application/controllers/download.php */