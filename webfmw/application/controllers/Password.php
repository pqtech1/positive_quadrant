<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
    
    public function __construct() { 
        $this->table = "fmw_passwordreset";
        parent::__construct();
        // Load the password model
        //$this->load->model('password_model');
    }
    
    public function reset(){
        $email = base64_decode($_GET['emailcode']);
        $token = base64_decode($_GET['token']);
        $sql = "select id from $this->table where email = ? AND token= ? ";
        $query = $this->db->query($sql, [$email, $token]);
        $result = $query->result_array();   
        //$response = $this->password_model->verifypasswordlink($data);
        if(count($result) > 0) {
            $this->load->view('changepassword');
        } else {
            echo '<p style"text-align:center;margin-top:20px;" >Link has been expired or password updated<p>';       
        }
    }
    
    public function updatepassword(){
        $email = base64_decode($this->input->post('emailcode'));
        $token = base64_decode($this->input->post('token'));
        $pwd = $this->input->post('pwd');
        $cpwd = $this->input->post('cpwd');
        $data['password'] = $pwd;
    
        $update = $this->db->update('fmw_registration', $data, array('email'=>$email));
        $updateresponse = $update?true:false;
        if($updateresponse) {
            $this->db->where('email', $email);
            $this->db->where('token', $token);
            $delete = $this->db->delete($this->table);
            $result = $delete?true:false;
            
             if($result) {
              echo json_encode("success");
            } else {
              echo json_encode("error");
            }
            
        } else {
          echo   json_encode("error");
        }
        
    }

}
