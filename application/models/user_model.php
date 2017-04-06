<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* TODO: more desriptive function naming
 *
 */

class User_model extends CI_Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
	function create_user()
	{
		
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('users', $new_member_insert_data);
		return $insert;
	}
	function update_user()
	{		 
		$new_details = array(
			'email' => $this->input->post('email'),			
			'username' => $this->input->post('username')	
			);
			$this->db->where('username',$this->session->userdata('username'));
			$this->db->update('users',$new_details); 
	}
	function update_pswd()
	{	
		$new_pswd = array('password'=> md5($this->input->post('password')));
		$this->db->where('username',$this->session->userdata('username'));
		$this->db->update('users',$new_pswd); 
	}

}