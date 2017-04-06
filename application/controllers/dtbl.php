<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* TODO: remove relative paths
 *
 */

class Dtbl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();		
		$this->load->model( 'File_m' );	
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo anchor('login','Hello, Login');
			die();		
		}
			
	}
	function read() {
		echo json_encode( $this->File_m->getAll() );
	}
	function add(){
		$fdata = array(
		  	 'name'=>$this->input->post('name'),
		  	 'size'=>$this->input->post('size'),
		  	 'type'=>$this->input->post('type'),
		  	 'owner'=>$this->session->userdata('username'),
		  	 );
		$this->File_m->add($fdata);
		}
	function getById( $fid ) {
		if( isset( $fid ) )
			echo json_encode( $this->File_m->getById( $fid ) );
	}
	function delete( $fid) {
	
		$fdel = $this->File_m->delete($fid);		
		unlink('../uploads/'.$fdel);
	}
	function download($fid){
	
		$foo = $this->File_m->down($fid);
		$bar = file_get_contents('../uploads/'.$foo);	
		force_download($foo,$bar);
	}
}