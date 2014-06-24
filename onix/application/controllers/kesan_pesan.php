<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesan_pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('kesan_pesan_model');
		$this->load->model('page_model');
		$this->load->model('email_model');
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

			$data["kesan_pesan"] = $this->kesan_pesan_model->get_kesan_pesan();

			$kesan_pesan = $this->page_model->get_data_page(26);
			foreach ($kesan_pesan->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('kesan_pesan_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function detail_kesan_pesan()
	{
		$kesan_pesan_id = $this->input->post("kesan_pesan_id");

		$kesan_pesan = $this->kesan_pesan_model->get_data_kesan_pesan($kesan_pesan_id);
		foreach ($kesan_pesan->result() as $p)
		{
			$nama_lengkap = $p->nama_lengkap;
			$jabatan = $p->jabatan;
			$kota = $p->kota;
			$thumbnail = $p->thumbnail;
			$kesan_pesan = $p->kesan_pesan;
			$tanggal_dibuat = $p->tanggal_dibuat;
			$status = $p->status;
			$tanggal_disetujui = $p->tanggal_disetujui;
		}

		echo $nama_lengkap.'|'.$jabatan.'|'.$kota.'|'.$thumbnail.'|'.strip_tags($kesan_pesan).'|'.date("d/m/Y H:i:s", strtotime($tanggal_dibuat)).'|'.$status.'|'.date("d/m/Y H:i:s", strtotime($tanggal_disetujui));
	}

	public function approve_kesan_pesan()
	{
		$kesan_pesan_id = $this->input->post("kesan_pesan_id");

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_disetujui = date("Y-m-d H:i:s");

		$kesan_pesan = $this->kesan_pesan_model->approve_kesan_pesan($kesan_pesan_id, $tanggal_disetujui);

		if($kesan_pesan === true){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_kesan_pesan()
	{
		$kesan_pesan_id = $this->input->post("kesan_pesan_id");
		$kesan_pesan = $this->kesan_pesan_model->delete_status_kesan_pesan($kesan_pesan_id);

		if($kesan_pesan === true){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file kesan_pesan.php */
/* Location: ./application/controllers/kesan_pesan.php */