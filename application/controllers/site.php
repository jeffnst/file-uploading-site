<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();	
	}
	
	
	/* access control - checks for session */
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo anchor('login','Hello, Login');
			die();		
		}
			
	}

	function main()
	{
		$this->load->view('upldr');
		$this->load->view('main');		
	}


	
	function update_info()
	{
	 	$this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|min_length[4]|max_length[25]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|max_length[32]');

		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('logins/update_form');
		}
		
		else
		{					
			$this->user_model->update_user();
			echo "<script>javascript:alert('Details changed, plz login again - redirected..')</script>";
			header('Refresh:0; url=../login/logout');
		}
	}
	
	function update_pswd()
	{
	 	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|max_length[32]');
		
		if($this->form_validation->run() == TRUE)
		{
			$this->user_model->update_pswd();			
			echo "<script>javascript:alert('Password Changed - redirected...!')</script>";
			header('Refresh:0; url=main');
		}
		else
		{
		 	$this->load->view('logins/update_form');
		}
	}
	

}			 