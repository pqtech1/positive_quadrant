<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function verifypasswordlink($data)
       {
            $this->db->where('email',$data['email']);
            $this->db->where('token',$data['token']);
            $query = $this->db->get('fmw_passwordreset');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
      }

}
