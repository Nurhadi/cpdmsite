<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('inbox_model');
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

			$data["inboxes"] = $this->inbox_model->get_inboxes();

			$data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('inbox_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function get_data_inbox()
	{
		$inbox_id = $this->input->post("inbox_id");

		$inbox = $this->inbox_model->get_data_inbox($inbox_id);
		foreach($inbox->result() as $b)
		{
			$email = $b->email;
			$fullname = $b->fullname;
			$subject = $b->subject;
			$message = $b->message;
			$status = $b->status;
		}

		// this function will be moved into codes when admin has already replied the message
		if($status === "unread")
		{
			$this->inbox_model->update_inbox_status($inbox_id, 'read');
		}

		echo $email . "|" . $fullname . "|" . $subject . "|" . $message;
	}

	public function delete_inbox()
	{
		$inbox_id = $this->input->post("inbox_id");

		$inbox = $this->inbox_model->delete_inbox($inbox_id);

		if($inbox){
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function reply_inbox()
	{
		$subject = $this->input->post('subject');
		$content = $this->input->post('content');
		$inbox_id = $this->input->post('inbox_id');
		$inbox = $this->inbox_model->get_data_inbox($inbox_id);
		foreach ($inbox->result() as $in) {
			$recipient_email = $in->email;
			$recipient_name = $in->fullname;
		}
		$admin_id = $this->admin_model->get_admin_id($this->session->userdata('email'));

		$reply_inbox = $this->inbox_model->reply_inbox($subject, $content, $recipient_email, $recipient_name);
		$reply_inbox_detail = $this->inbox_model->create_inbox_reply($inbox_id, $subject, $content, $admin_id);
		$update_inbox_status = $this->inbox_model->update_inbox_status($inbox_id, 'replied');

		if($reply_inbox === 'success'){
			$this->session->set_flashdata("status", "Success reply email");
			redirect('inbox');
		}
		else{
			$this->session->set_flashdata("status", $this->upload->display_errors());
			redirect('inbox');
		}
	}
}

/* End of file inbox.php */
/* Location: ./application/controllers/inbox.php */