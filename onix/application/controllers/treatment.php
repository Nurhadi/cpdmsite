<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treatment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('treatment_model');
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

			$data["treatments"] = $this->treatment_model->get_treatments();

			$treatment = $this->page_model->get_data_page(3);
			foreach ($treatment->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('treatment_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function treatment_process()
	{
		$title = $this->input->post("title");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		if($this->input->post("form_action") === "create"){
			$treatment = $this->treatment_model->create_new_treatment($title, $status, $admin_id);
			$treatment_id = $treatment;
		}
		else{
			$treatment_id = $this->input->post("treatment_id");
			$treatment = $this->treatment_model->update_treatment($treatment_id, $title, $status, $admin_id);
		}


		if($treatment){
			$config['upload_path'] = './../assets/uploads/treatment/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			for($i = 0; $i <= 4; $i++){
				if($_FILES["image_".$i]["name"] != "")
				{
					if (!$this->upload->do_upload("image_".$i))
					{
						$this->session->set_flashdata("status", "image_".$i." | ".$this->upload->display_errors());
						redirect("treatment");
					}
					else
					{
						$old_treatment_path = $this->treatment_model->get_treatment_path($treatment_id, $i);
						if($old_treatment_path){
							unlink("./../".$old_treatment_path);
						}

						$data = array('upload_data' => $this->upload->data());
						$file_path = "assets/uploads/treatment/" . $data["upload_data"]["file_name"];
						$upload_slider = $this->treatment_model->upload_image($file_path, $treatment_id, $i);
					}
				}
			}

			$this->session->set_flashdata("status", "Success create data treatment");
			redirect("treatment");
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("treatment");
		}
	}

	// public function create_new_jadwal()
	// {
	// 	$profile_id = $this->input->post("profile_id");
	// 	$hari = $this->input->post("hari");
	// 	$status = $this->input->post("status");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_jadwal = $this->treatment_model->create_new_jadwal($profile_id, $hari, $status, $admin_id);

	// 	if($new_jadwal){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function edit_treatment()
	{
		$treatment_id = $this->input->post("treatment_id");

		$treatment = $this->treatment_model->get_data_treatment($treatment_id);
		foreach($treatment->result() as $j)
		{
			$treatment_id = $j->treatment_id;
			$title = $j->title;
			$big_image = $j->big_image;
			$small_image_1 = $j->small_image_1;
			$small_image_2 = $j->small_image_2;
			$small_image_3 = $j->small_image_3;
			$small_image_4 = $j->small_image_4;
			$status = $j->status;
		}

		echo $treatment_id . "|" . $title . "|" . $big_image . "|" . $small_image_1 . "|" . $small_image_2 . "|" . $small_image_3 . "|" . $small_image_4 . "|" . $status;
	}

	public function update_jadwal()
	{
		$jadwal_id = $this->input->post("jadwal_id");
		$profile_id = $this->input->post("profile_id");
		$hari = $this->input->post("hari");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_jadwal = $this->treatment_model->update_jadwal($jadwal_id, $profile_id, $hari, $status, $admin_id);

		if($update_jadwal){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_treatment()
	{
		$treatment_id = $this->input->post("treatment_id");
		$treatment_images = $this->treatment_model->get_data_treatment($treatment_id);
		foreach ($treatment_images->result() as $treatment)
		{
			if($treatment->big_image !== ""){unlink("./../".$treatment->big_image);}
			if($treatment->small_image_1 !== ""){unlink("./../".$treatment->small_image_1);}
			if($treatment->small_image_2 !== ""){unlink("./../".$treatment->small_image_2);}
			if($treatment->small_image_3 !== ""){unlink("./../".$treatment->small_image_3);}
			if($treatment->small_image_4 !== ""){unlink("./../".$treatment->small_image_4);}
		}
		$treatment = $this->treatment_model->delete_treatment($treatment_id);

		if($treatment){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file treatment.php */
/* Location: ./application/controllers/treatment.php */