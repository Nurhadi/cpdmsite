<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periode_pelatihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('periode_pelatihan_model');
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

			$data["periode_pelatihans"] = $this->periode_pelatihan_model->get_periode_pelatihan();

			$data["title"] = "Periode Pelatihan";
			$data["keywords"] = "";
			$data["description"] = "";
			$data["content"] = "";

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('periode_pelatihan_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function periode_pelatihan_process()
	{
		$title = $this->input->post("title");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$periode_pelatihan = $this->periode_pelatihan_model->create_new_periode_pelatihan($title, $created_at, $admin_id);
			$periode_pelatihan_id = $periode_pelatihan;
		}
		else{
			$periode_pelatihan_id = $this->input->post("periode_pelatihan_id");
			$periode_pelatihan = $this->periode_pelatihan_model->update_periode_pelatihan($periode_pelatihan_id, $title, $created_at, $admin_id);
		}

		if($periode_pelatihan !== false){
			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data periode pelatihan");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data periode pelatihan");
			}
			redirect("periode_pelatihan");
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("periode_pelatihan");
		}
	}

	public function detail_periode_pelatihan()
	{
		$periode_pelatihan_id = $this->input->post("periode_pelatihan_id");

		$periode_pelatihan = $this->periode_pelatihan_model->get_data_periode_pelatihan($periode_pelatihan_id);
		foreach ($periode_pelatihan->result() as $p)
		{
			$title = $p->title;
			$created_at = $p->created_at;
		}

		echo $title.'|'.date("d-m-Y H:i:s", strtotime($created_at));
	}

	public function edit_periode_pelatihan()
	{
		$periode_pelatihan_id = $this->input->post("periode_pelatihan_id");

		$periode_pelatihan = $this->periode_pelatihan_model->get_data_periode_pelatihan($periode_pelatihan_id);
		foreach($periode_pelatihan->result() as $p)
		{
			$title = $p->title;
		}

		echo $title.'|';
	}

	public function update_periode_pelatihan()
	{
		$periode_pelatihan_id = $this->input->post("periode_pelatihan_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_periode_pelatihan = $this->periode_pelatihan_model->update_periode_pelatihan($periode_pelatihan_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($update_periode_pelatihan){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_periode_pelatihan()
	{
		$periode_pelatihan_id = $this->input->post("periode_pelatihan_id");
		$periode_pelatihan = $this->periode_pelatihan_model->delete_periode_pelatihan($periode_pelatihan_id);

		if($periode_pelatihan !== false){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file periode_pelatihan.php */
/* Location: ./application/controllers/periode_pelatihan.php */