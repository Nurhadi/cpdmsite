<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('homepage_model');
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

			$data["sliders"] = $this->homepage_model->get_sliders();

			$homepage = $this->homepage_model->get_data_homepage();
			foreach ($homepage->result() as $hp)
			{
				$data["logo"] = $hp->logo;
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["facebook"] = $hp->facebook;
				$data["twitter"] = $hp->twitter;
				$data["google_plus"] = $hp->google_plus;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('new_homepage_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function update_homepage_title()
	{
		$title = $this->input->post("title");

		$update_homepage_title = $this->homepage_model->update_homepage_title($title);

		if($update_homepage_title){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_keywords()
	{
		$keywords = $this->input->post("keywords");

		$update_homepage_keywords = $this->homepage_model->update_homepage_keywords($keywords);

		if($update_homepage_keywords){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_description()
	{
		$description = $this->input->post("description");

		$update_homepage_description = $this->homepage_model->update_homepage_description($description);

		if($update_homepage_description){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_content()
	{
		$content = $this->input->post("content");

		$update_homepage_content = $this->homepage_model->update_homepage_content($content);

		if($update_homepage_content){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_address()
	{
		$address = $this->input->post("address");

		$update_homepage_address = $this->homepage_model->update_homepage_address($address);

		if($update_homepage_address){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_phone()
	{
		$phone = $this->input->post("phone");

		$update_homepage_phone = $this->homepage_model->update_homepage_phone($phone);

		if($update_homepage_phone){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_facebook()
	{
		$facebook = $this->input->post("facebook");

		$update_homepage_facebook = $this->homepage_model->update_homepage_facebook($facebook);

		if($update_homepage_facebook){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_twitter()
	{
		$twitter = $this->input->post("twitter");

		$update_homepage_twitter = $this->homepage_model->update_homepage_twitter($twitter);

		if($update_homepage_twitter){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function update_homepage_google_plus()
	{
		$google_plus = $this->input->post("google_plus");

		$update_homepage_google_plus = $this->homepage_model->update_homepage_google_plus($google_plus);

		if($update_homepage_google_plus){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function slider_process()
	{
		$slider_title = $this->input->post("slider_title");
		$slider_description = $this->input->post("slider_description");
		$slider_path = $this->input->post("slider_path");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		if($this->input->post("form_action") === "create"){
			$slider = $this->homepage_model->create_new_slider($slider_title, $slider_description, $status, $admin_id);
			$slider_id = $slider;
		}
		else{
			$slider_id = $this->input->post("slider_id");
			$slider = $this->homepage_model->update_slider($slider_id, $slider_title, $slider_description, $status, $admin_id);
		}


		if($slider){
			$config['upload_path'] = './../uploads/slider/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('slider'))
			{
				if($slider_path === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("homepage");
				}
				else{
					$this->session->set_flashdata("status", "Success update data slider");
					redirect("homepage");
				}
			}
			else
			{
				$old_slider_path = $this->homepage_model->get_slider_path($slider_id);
				if($old_slider_path){
					unlink("./../uploads/slider/".$old_slider_path);
				}

				$data = array('upload_data' => $this->upload->data('slider'));
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->homepage_model->upload_slider($file_path, $slider_id);

				$this->session->set_flashdata("status", "Success create data slider");
				redirect("homepage");
			}
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("homepage");
		}
	}

	public function edit_slider()
	{
		$slider_id = $this->input->post("slider_id");

		$slider = $this->homepage_model->get_data_slider($slider_id);
		foreach($slider->result() as $s)
		{
			$slider_title = $s->slider_title;
			$slider_description = $s->slider_description;
			$slider_path = $s->slider_path;
			$status = $s->status;
		}

		echo $slider_title . "|" . $slider_description . "|" . $slider_path . "|" . $status;
	}

	public function detail_slider()
	{
		$slider_id = $this->input->post("slider_id");

		$slider = $this->homepage_model->get_data_slider($slider_id);
		foreach ($slider->result() as $p)
		{
			$slider_title = $p->slider_title;
			$slider_description = $p->slider_description;
			$slider_path = $p->slider_path;
			$status = $p->status;
			$date_created = $p->date_created;
		}

		echo $slider_title.'|'.$slider_description.'|'.$slider_path.'|'.$status.'|'.$date_created;
	}

	public function update_slider()
	{
		$slider_id = $this->input->post("slider_id");
		$slider_title = $this->input->post("slider_title");
		$slider_path = $this->input->post("slider_path");
		$status = $this->input->post("status");

		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_slider = $this->homepage_model->update_slider($slider_id, $slider_title, $slider_path, $status, $admin_id);

		if($update_slider){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_slider()
	{
		$slider_id = $this->input->post("slider_id");
		$slider_path = $this->homepage_model->get_slider_path($slider_id);
		$slider = $this->homepage_model->delete_slider($slider_id);

		if($slider){
			if($slider_path){
				unlink("./../uploads/slider/".$slider_path);
			}
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function upload_image_address()
	{
		$config['upload_path'] = './../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("image_address"))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("status",$error);

			redirect("homepage");
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image_address = "assets/uploads/" . $data["upload_data"]["file_name"];
			$upload_image_address = $this->homepage_model->upload_image_address($image_address);

			$this->session->set_flashdata("status", "Success upload image address");
			redirect("homepage");
		}
	}

	public function upload_image_founder_1()
	{
		$config['upload_path'] = './../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("image_founder_1"))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("status",$error);

			redirect("homepage");
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image_founder_1 = "assets/uploads/" . $data["upload_data"]["file_name"];
			$upload_image_founder_1 = $this->homepage_model->upload_image_founder_1($image_founder_1);

			$this->session->set_flashdata("status", "Success upload image founder 1");
			redirect("homepage");
		}
	}

	public function upload_image_founder_2()
	{
		$config['upload_path'] = './../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("image_founder_2"))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("status",$error);

			redirect("homepage");
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image_founder_2 = "assets/uploads/" . $data["upload_data"]["file_name"];
			$upload_image_founder_2 = $this->homepage_model->upload_image_founder_2($image_founder_2);

			$this->session->set_flashdata("status", "Success upload image founder 2");
			redirect("homepage");
		}
	}
}

/* End of file homepage.php */
/* Location: ./application/controllers/homepage.php */