<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('pengelola_model');
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

			$data["pengelolas"] = $this->pengelola_model->get_pengelola();

			$pengelola = $this->page_model->get_data_page(5);
			foreach ($pengelola->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('pengelola_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function pengelola_process()
	{
		$nama = $this->input->post("nama");
		$alamat = $this->input->post("alamat");
		$email = $this->input->post("email");
		$telepon = $this->input->post("telepon");
		$jabatan = $this->input->post("jabatan");
		$photo = $this->input->post("photo");
		$pengelola_bagian = $this->input->post("pengelola_bagian");

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		if($this->input->post("form_action") === "create"){
			$pengelola = $this->pengelola_model->create_new_pengelola($nama, $alamat, $email, $telepon, $jabatan, $pengelola_bagian, $created_at, $admin_id);
			$pengelola_id = $pengelola;
		}
		else{
			$pengelola_id = $this->input->post("pengelola_id");
			$pengelola = $this->pengelola_model->update_pengelola($pengelola_id, $nama, $alamat, $email, $telepon, $jabatan, $pengelola_bagian, $created_at, $admin_id);
		}

		if($pengelola !== false){
			$config['upload_path'] = './../uploads/pengelola/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("photo"))
			{
				if($photo === true){
					$this->session->set_flashdata("status", $this->upload->display_errors());
					redirect("pengelola");
				}
				else{
					$this->session->set_flashdata("status", "Success update data gallery photo");
					redirect("pengelola");
				}
			}
			else
			{
				if($form_action === "update")
				{
					$old_photo_path = $this->pengelola_model->get_photo_path($pengelola_id);
					if($old_photo_path !== false){
						unlink("./../uploads/pengelola/".$old_photo_path);
					}
				}

				$data = array('upload_data' => $this->upload->data());
				$file_path = $data["upload_data"]["file_name"];
				$upload_slider = $this->pengelola_model->upload_photo($file_path, $pengelola_id);
			}

			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data pengelola");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data pengelola");
			}
			redirect("pengelola");

		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("pengelola");
		}
	}

	// create pengelola ajax
	// public function create_new_pengelola()
	// {
	// 	$title = $this->input->post("title");
	// 	$keywords = $this->input->post("keywords");
	// 	$description = $this->input->post("description");
	// 	$thumbnail = $this->input->post("thumbnail");
	// 	$content = $this->input->post("content");
	// 	$promo = $this->input->post("promo");
	// 	$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

	// 	$new_pengelola = $this->pengelola_model->create_new_pengelola($title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

	// 	if($new_pengelola){
	// 		echo "success";
	// 	}
	// 	else{
	// 		echo "error";
	// 	}
	// }

	public function detail_pengelola()
	{
		$pengelola_id = $this->input->post("pengelola_id");

		$pengelola = $this->pengelola_model->get_data_pengelola($pengelola_id);
		foreach ($pengelola->result() as $p)
		{
			$nama = $p->nama;
			$alamat = $p->alamat;
			$email = $p->email;
			$telepon = $p->telepon;
			$jabatan = $p->jabatan;
			$photo = $p->photo;
			$pengelola_bagian = $p->pengelola_bagian;
			$created_at = $p->created_at;
		}

		echo $nama.'|'.$alamat.'|'.$email.'|'.$telepon.'|'.$jabatan.'|'.$photo.'|'.$pengelola_bagian.'|'.$created_at;
	}

	public function edit_pengelola()
	{
		$pengelola_id = $this->input->post("pengelola_id");

		$pengelola = $this->pengelola_model->get_data_pengelola($pengelola_id);
		foreach ($pengelola->result() as $p)
		{
			$nama = $p->nama;
			$alamat = $p->alamat;
			$email = $p->email;
			$telepon = $p->telepon;
			$jabatan = $p->jabatan;
			$photo = $p->photo;
			$pengelola_bagian = $p->pengelola_bagian;
			$created_at = $p->created_at;
		}

		echo $nama.'|'.$alamat.'|'.$email.'|'.$telepon.'|'.$jabatan.'|'.$photo.'|'.$pengelola_bagian.'|'.$created_at;
	}

	public function update_pengelola()
	{
		$pengelola_id = $this->input->post("pengelola_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_pengelola = $this->pengelola_model->update_pengelola($pengelola_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($update_pengelola){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_pengelola()
	{
		$pengelola_id = $this->input->post("pengelola_id");
		$photo = $this->pengelola_model->get_photo_path($pengelola_id);
		$pengelola = $this->pengelola_model->delete_pengelola($pengelola_id);

		if($pengelola !== false){
			if($photo !== false){
				unlink("./../uploads/pengelola/".$photo);
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

/* End of file pengelola.php */
/* Location: ./application/controllers/pengelola.php */