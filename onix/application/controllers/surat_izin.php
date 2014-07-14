<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_izin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('surat_izin_model');
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

			$data["surat_izins"] = $this->surat_izin_model->get_surat_izin();

			$data["title"] = "Surat izin";
			$data["keywords"] = "";
			$data["description"] = "";
			$data["content"] = "";

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('surat_izin_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function surat_izin_process()
	{
		$title = $this->input->post("title");
		$filename = $this->input->post("filename");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$surat_izin = $this->surat_izin_model->create_new_surat_izin($title, $created_at, $admin_id);
			$surat_izin_id = $surat_izin;
		}
		else{
			$surat_izin_id = $this->input->post("surat_izin_id");
			$surat_izin = $this->surat_izin_model->update_surat_izin($surat_izin_id, $title, $created_at, $admin_id);
		}

		if($surat_izin !== false){
			$config['upload_path'] = './../uploads/surat_izin/';
			$config['allowed_types'] = '*';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("filename"))
			{
				if($filename === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("surat_izin");
				}
				else{
					$this->session->set_flashdata("status", "Success update data surat izin");
					redirect("surat_izin");
				}
			}
			else
			{
				$old_filename_path = $this->surat_izin_model->get_filename_path($surat_izin_id);
				if($old_filename_path !== false){
					unlink("./../uploads/surat_izin/".$old_filename_path);
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->surat_izin_model->upload_filename($file_path, $surat_izin_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data surat izin");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data surat izin");
			}
			redirect("surat_izin");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("surat_izin");
		}
	}

	// create surat_izin ajax
	// public function create_new_surat_izin()
	// {
	// 	$title = $this->input->post("title");
	// 	$keywords = $this->input->post("keywords");
	// 	$description = $this->input->post("description");
	// 	$filename = $this->input->post("filename");
	// 	$content = $this->input->post("content");
	// 	$promo = $this->input->post("promo");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_surat_izin = $this->surat_izin_model->create_new_surat_izin($title, $keywords, $description, $filename, $content, $promo, $admin_id);

	// 	if($new_surat_izin){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function detail_surat_izin()
	{
		$surat_izin_id = $this->input->post("surat_izin_id");

		$surat_izin = $this->surat_izin_model->get_data_surat_izin($surat_izin_id);
		foreach ($surat_izin->result() as $p)
		{
			$title = $p->title;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$filename.'|'.$created_at;
	}

	public function edit_surat_izin()
	{
		$surat_izin_id = $this->input->post("surat_izin_id");

		$surat_izin = $this->surat_izin_model->get_data_surat_izin($surat_izin_id);
		foreach ($surat_izin->result() as $p)
		{
			$title = $p->title;
			$filename = $p->filename;
			$created_at = $p->created_at;
		}

		echo $title.'|'.$filename.'|'.$created_at;
	}

	public function update_surat_izin()
	{
		$surat_izin_id = $this->input->post("surat_izin_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$filename = $this->input->post("filename");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_surat_izin = $this->surat_izin_model->update_surat_izin($surat_izin_id, $title, $keywords, $description, $filename, $content, $promo, $admin_id);

		if($update_surat_izin){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_surat_izin()
	{
		$surat_izin_id = $this->input->post("surat_izin_id");
		$filename = $this->surat_izin_model->get_filename_path($surat_izin_id);
		$surat_izin = $this->surat_izin_model->delete_surat_izin($surat_izin_id);

		if($surat_izin !== false){
			if($filename !== false){
				unlink("./../uploads/surat_izin/".$filename);
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

/* End of file surat_izin.php */
/* Location: ./application/controllers/surat_izin.php */