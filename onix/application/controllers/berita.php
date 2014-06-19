<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('berita_model');
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

			$data["beritas"] = $this->berita_model->get_berita();

			$berita = $this->page_model->get_data_page(1);
			foreach ($berita->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('berita_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function create_new_berita()
	{
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$new_berita = $this->berita_model->create_new_berita($title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($new_berita){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function edit_berita()
	{
		$berita_id = $this->input->post("berita_id");

		$berita = $this->berita_model->get_data_berita($berita_id);
		foreach($berita->result() as $b)
		{
			$title = $b->title;
			$keywords = $b->keywords;
			$description = $b->description;
			$thumbnail = $b->thumbnail;
			$content = $b->content;
			$promo = $b->promo;
		}

		echo $title . "|" . $keywords . "|" . $description . "|" . $thumbnail . "|" . $content . "|" . $promo;
	}

	public function update_berita()
	{
		$berita_id = $this->input->post("berita_id");
		$title = $this->input->post("title");
		$keywords = $this->input->post("keywords");
		$description = $this->input->post("description");
		$thumbnail = $this->input->post("thumbnail");
		$content = $this->input->post("content");
		$promo = $this->input->post("promo");
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$update_berita = $this->berita_model->update_berita($berita_id, $title, $keywords, $description, $thumbnail, $content, $promo, $admin_id);

		if($update_berita){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_berita()
	{
		$berita_id = $this->input->post("berita_id");

		$berita = $this->berita_model->delete_berita($berita_id);

		if($berita){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */