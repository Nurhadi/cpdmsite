<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_praktek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('jadwal_praktek_model');
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
				$data["firstname"] = $row->firstname . " " . $row->lastname;
			}

			$data["profiles"] = $this->profile_model->get_profiles();
			$data["jadwals"] = $this->jadwal_praktek_model->get_jadwals();

			$jadwal_praktek = $this->page_model->get_data_page(3);
			foreach ($jadwal_praktek->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('jadwal_praktek_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function create_new_jadwal()
	{
		$profile_id = $this->input->post("profile_id");
		$hari = $this->input->post("hari");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$new_jadwal = $this->jadwal_praktek_model->create_new_jadwal($profile_id, $hari, $status, $admin_id);

		if($new_jadwal){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function edit_jadwal()
	{
		$jadwal_id = $this->input->post("jadwal_id");

		$jadwal = $this->jadwal_praktek_model->get_data_jadwal($jadwal_id);
		foreach($jadwal->result() as $j)
		{
			$profile_id = $j->profile_id;
			$hari = $j->hari;
			$status = $j->status;
		}

		echo $profile_id . "|" . $hari . "|" . $status;
	}

	public function update_jadwal()
	{
		$jadwal_id = $this->input->post("jadwal_id");
		$profile_id = $this->input->post("profile_id");
		$hari = $this->input->post("hari");
		$status = $this->input->post("status");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_jadwal = $this->jadwal_praktek_model->update_jadwal($jadwal_id, $profile_id, $hari, $status, $admin_id);

		if($update_jadwal){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_jadwal()
	{
		$jadwal_id = $this->input->post("jadwal_id");

		$jadwal = $this->jadwal_praktek_model->delete_jadwal($jadwal_id);

		if($jadwal){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file jadwal_praktek.php */
/* Location: ./application/controllers/jadwal_praktek.php */