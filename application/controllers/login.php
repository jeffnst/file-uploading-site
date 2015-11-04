<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Login extends CI_Controller {

	
	function index()
	{	//checking for active session
	
	
		if($this->session->userdata('is_logged_in'))
		{
		 $session_data = $this->session->userdata('is_logged_in');
		 $sdata['username'] = $session_data['username'];
		 $this->load->view('main',$sdata);
		 $this->load->view('upldr',$sdata);
		}else{
		$data['main_content'] = 'logins/login_form';
		$this->load->view('includes/template', $data);
		}
	}
	

	function validate_credentials()
	{	
		$this->load->model('user_model');
		$query = $this->user_model->validate();
		
		if($query) // correct match...
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data); 
			redirect('site/main');
			
			
		}
		else // incorrect username or password -reloads the page
		{
			$this->index();
		}
	}	
	
	function signup()
	{
		$data['main_content'] = 'logins/signupform';
		$this->load->view('includes/template', $data);
	}
	
	function create_user()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('logins/signupform');
		}
		
		else
		{			
			$this->load->model('user_model');
			
			if($query = $this->user_model->create_user())
			{
				$data['main_content'] = 'logins/signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('logins/signupform');
				
			}
		}
		
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}