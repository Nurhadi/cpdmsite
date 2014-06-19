<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('profile_model');
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

			$data["profiles"] = $this->profile_model->get_profiles();

			$profile = $this->page_model->get_data_page(2);
			foreach ($profile->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('new_profile_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function profile_process()
	{
		$fullname = $this->input->post("fullname");
		$position = $this->input->post("position");
		$description = $this->input->post("description");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		if($this->input->post("form_action") === "create"){
			$profile = $this->profile_model->create_new_profile($fullname, $position, $description, $status, $admin_id);
			$profile_id = $profile;
		}
		else{
			$profile_id = $this->input->post("profile_id");
			$profile = $this->profile_model->update_profile($profile_id, $fullname, $position, $description, $status, $admin_id);
		}


		if($profile){
			$config['upload_path'] = './../assets/uploads/profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("photo"))
			{
				// if($profile_path === true){
				// 	$this->session->set_flashdata("status", $this->upload->display_errors());
				// 	redirect("profile");
				// }
				// else{
					$this->session->set_flashdata("status", "Success update data profile");
					redirect("profile");
				// }
			}
			else
			{
				$old_profile_path = $this->profile_model->get_profile_path($profile_id);
				if($old_profile_path){
					unlink("./../".$old_profile_path);
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = "assets/uploads/profile/" . $data["upload_data"]["file_name"];
				$upload_slider = $this->profile_model->upload_photo($file_path, $profile_id);

				$this->session->set_flashdata("status", "Success create data profile");
				redirect("profile");
			}
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("profile");
		}
	}

	// create profile ajax
	// public function create_new_profile()
	// {
	// 	$fullname = $this->input->post("fullname");
	// 	$position = $this->input->post("position");
	// 	$description = $this->input->post("description");
	// 	$photo = $this->input->post("photo");
	// 	$status = $this->input->post("status");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_profile = $this->profile_model->create_new_profile($fullname, $position, $description, $photo, $status, $admin_id);

	// 	if($new_profile){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function edit_profile()
	{
		$profile_id = $this->input->post("profile_id");

		$profile = $this->profile_model->get_data_profile($profile_id);
		foreach($profile->result() as $b)
		{
			$fullname = $b->fullname;
			$position = $b->position;
			$description = $b->description;
			$photo = $b->photo;
			$status = $b->status;
		}

		echo $fullname . "|" . $position . "|" . $description . "|" . $photo . "|" . $status;
	}

	// public function update_profile()
	// {
	// 	$profile_id = $this->input->post("profile_id");
	// 	$fullname = $this->input->post("fullname");
	// 	$position = $this->input->post("position");
	// 	$description = $this->input->post("description");
	// 	$photo = $this->input->post("photo");
	// 	$status = $this->input->post("status");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$update_profile = $this->profile_model->update_profile($profile_id, $fullname, $position, $description, $photo, $status, $admin_id);

	// 	if($update_profile){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function delete_profile()
	{
		$profile_id = $this->input->post("profile_id");
		$photo_path = $this->profile_model->get_profile_path($profile_id);
		$profile = $this->profile_model->delete_profile($profile_id);

		if($profile){
			if($photo_path){
				unlink("./../".$photo_path);
			}
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */