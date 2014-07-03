<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum_dan_struktur_bidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('kurikulum_dan_struktur_bidang_model');
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

			$data["kurikulum_dan_struktur_bidangs"] = $this->kurikulum_dan_struktur_bidang_model->get_kurikulum_dan_struktur_bidang();

			$kurikulum_dan_struktur_bidang = $this->page_model->get_data_page(27);
			foreach ($kurikulum_dan_struktur_bidang->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('kurikulum_dan_struktur_bidang_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function kurikulum_dan_struktur_bidang_process()
	{
		$description = $this->input->post("description");
		$form_action = $this->input->post("form_action");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$created_at = date("Y-m-d H:i:s");

		if($this->input->post("form_action") === "create"){
			$kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->create_new_kurikulum_dan_struktur_bidang($description, $created_at, $admin_id);
			$kurikulum_dan_struktur_bidang_id = $kurikulum_dan_struktur_bidang;
		}
		else{
			$kurikulum_dan_struktur_bidang_id = $this->input->post("kurikulum_dan_struktur_bidang_id");
			$kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->update_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id, $description, $created_at, $admin_id);
		}

		if($kurikulum_dan_struktur_bidang !== false){
			if($form_action === "create"){
				$this->session->set_flashdata("status", "Success create data kurikulum dan struktur bidang");
			}
			else if($form_action === "update"){
				$this->session->set_flashdata("status", "Success update data kurikulum dan struktur bidang");
			}
			redirect("kurikulum_dan_struktur_bidang");
		}
		else{
			$this->session->set_flashdata("status", "Error");
			redirect("kurikulum_dan_struktur_bidang");
		}
	}

	public function detail_kurikulum_dan_struktur_bidang()
	{
		$kurikulum_dan_struktur_bidang_id = $this->input->post("kurikulum_dan_struktur_bidang_id");

		$kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->get_data_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id);
		foreach ($kurikulum_dan_struktur_bidang->result() as $p)
		{
			$kurikulum = $p->kurikulum;
			$description = $p->description;
			$created_at = $p->created_at;
		}

		echo $kurikulum.'|'.strip_tags($description).'|'.date("d-m-Y H:i:s", strtotime($created_at));
	}

	public function edit_kurikulum_dan_struktur_bidang()
	{
		$kurikulum_dan_struktur_bidang_id = $this->input->post("kurikulum_dan_struktur_bidang_id");

		$kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->get_data_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id);
		foreach($kurikulum_dan_struktur_bidang->result() as $p)
		{
			$description = $p->description;
		}

		echo $description.'|';
	}

	public function update_kurikulum_dan_struktur_bidang()
	{
		$kurikulum_dan_struktur_bidang_id = $this->input->post("kurikulum_dan_struktur_bidang_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->update_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($update_kurikulum_dan_struktur_bidang){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_kurikulum_dan_struktur_bidang()
	{
		$kurikulum_dan_struktur_bidang_id = $this->input->post("kurikulum_dan_struktur_bidang_id");
		$kurikulum_dan_struktur_bidang = $this->kurikulum_dan_struktur_bidang_model->delete_kurikulum_dan_struktur_bidang($kurikulum_dan_struktur_bidang_id);

		if($kurikulum_dan_struktur_bidang !== false){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file kurikulum_dan_struktur_bidang.php */
/* Location: ./application/controllers/kurikulum_dan_struktur_bidang.php */