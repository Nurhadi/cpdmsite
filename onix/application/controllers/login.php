<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('admin_model');
		// $this->output->enable_profiler(true);
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function login_process()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$admin_auth = $this->admin_model->check_admin_authentication($email, $password);
		if($admin_auth->num_rows() > 0)
		{
			$admin = array(
				'email' => $email,
				'logged_in' => TRUE
			);

			$this->session->set_userdata($admin);
			redirect('/homepage', 'refresh');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function logout_process()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logged_in');
		
		redirect('/login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */