<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_data_homepage()
	{
		$this->db->where("homepage_id", "1");
		$result = $this->db->get("homepage");
		return $result;
	}

	public function get_inboxes()
	{
		$this->db->order_by("inbox_id", "desc");
		$result = $this->db->get("inbox");
		return $result;
	}

	public function get_data_inbox($inbox_id)
	{
		$this->db->where("inbox_id", $inbox_id);
		$result = $this->db->get("inbox");
		return $result;
	}

	public function update_inbox_status($inbox_id, $status)
	{
		$data = array("status" => $status);
		$this->db->where("inbox_id", $inbox_id);
		$result = $this->db->update("inbox", $data);
		return $result;
	}

	public function delete_inbox($inbox_id)
	{
		$this->db->where("inbox_id", $inbox_id);
		$result = $this->db->delete("inbox");
		return $result;
	}

	public function reply_inbox($subject, $content, $recipient_email, $recipient_name)
	{
		$this->load->library('email');

		// $config['charset'] = 'utf-8';
		// $config['wordwrap'] = TRUE;
		// $config['mailtype'] = 'html';
		// $this->email->initialize($config);

		$this->email->from('noreply@klinikgigibandung.com', 'No Reply - Klinik Gigi Bandung');
		$this->email->to($recipient_email);

		$this->email->subject($subject);
		$this->email->message($content);

		$send_email = $this->email->send();

		if($send_email)
		{
			return 'success';
		}
		else
		{
			return 'error';
		}
		// echo $this->email->print_debugger();
	}

	public function create_inbox_reply($inbox_id, $subject, $message, $admin_id)
	{
		$data = array("inbox_id" => $inbox_id, "subject" => $subject, "message" => $message, "admin_id" => $admin_id);
		$result = $this->db->insert("inbox_reply", $data);
		return $result;
	}
}

?>