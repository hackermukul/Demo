<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FunctionModel {

    protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                //$this->CI->load->model('administrator/Admin_Common_Model');
                $this->CI->load->helper('url');
                $this->CI->load->database();
		        $this->CI->load->library('session');

        }
        function getModule_details()
        {
        	  $segment1	=$this->CI->uri->segment(2);
			  $segment2	=$this->CI->uri->segment(3);
			  $final =  $segment1.'/'.$segment2;
			  $pg_content= array();
			 $this->CI->db->select('u.*');
			  $this->CI->db->from('module_master as u');
			  $this->CI->db->where('class_name' , $final);
			  $query_get_list=$this->CI->db->get();
			  //echo $this->CI->db->last_query();
			  if($query_get_list->num_rows() > 0)
			  {
			  	$pg_content = $query_get_list->result();
			  }
			  return $pg_content;
        }

 
}