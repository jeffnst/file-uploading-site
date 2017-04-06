<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_m extends CI_Model {
    
	function add($fdata){	
		$this->db->insert('files',$fdata);
	}	
    function getById( $fid ) {
        $fid = intval( $fid );
        
        $query = $this->db->where( 'file_id', $fid )->limit( 1 )->get( 'files' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    function getAll() {
		$q2 = $this->db->get('files');
		return $q2->result();
    } 
    function delete( $fid ) {
   
   		$q3 = $this->db->get_where('files',array('file_id'=>$fid));
		$result = $q3->result();
		$q3 = $this->db->delete('files', array('file_id'=>$fid));
		return $result[0]->name;
	}
	function down( $fid ) {
   
   		$q4 = $this->db->get_where('files',array('file_id'=>$fid));
		$result = $q4->result();
		return $result[0]->name;
	}

} 

