<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('tentang_kami_model');
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

			$tentang_kami = $this->page_model->get_data_page(4);
			foreach ($tentang_kami->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('tentang_kami_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
}

/* End of file tentang_kami.php */
/* Location: ./application/controllers/tentang_kami.php */