<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct() {
        // parent::__construct();
        // // Load the database library
        // $this->load->database();
        $this->userTbl = 'fmw_registration';
    }

   
    public function insertRegistration($data){
        $insert = $this->db->insert($this->userTbl, $data);
        return $insert?$this->db->insert_id():false;
    }
    
    public function insertEmail($data){
        $insert = $this->db->insert('fmw_passwordreset', $data);
        return $insert?$this->db->insert_id():false;
    }
    
   public function mailExists($email)
       {
            $this->db->where('email',$email);
            $query = $this->db->get($this->userTbl);
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
      }
      
  public function phoneExists($phone)
   {
        $this->db->where('phone',$phone);
        $query = $this->db->get($this->userTbl);
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
  }
  
  function checkEmailExist($userData)
   {
        $email = $userData['email'];
        $this->db->where('email',$email);
        $query = $this->db->get($this->userTbl);
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
  }
  
  function checkLogin($userData)
   { 
       $username = $userData['username'];
       $password = $userData['password'];
       $this->db->select('id as user_id,name,phone,email')
          ->from($this->userTbl)
          ->where("($this->userTbl.phone = '$username' OR $this->userTbl.email = '$username')")
          ->where('password', $password);
           $query = $this->db->get();
            if($query->num_rows() == 1){
              return $query->result();
            }else{
              return false;
            }
   }
   
   function getUserDetails($user_id){
       $query = $this->db->query("select id,name,email,phone from $this->userTbl where id = $user_id");
       return $query->result_array();
   }
   
   function updateUserDetails($user_id,$userData){
      $name = $userData['name'];
      $email = $userData['email'];
      $query = $this->db->query("UPDATE  $this->userTbl SET name = '$name', email = '$email' WHERE id = $user_id;");
      $updated_status = $this->db->affected_rows();
        if($updated_status):
            return $user_id;
        else:
            return false;
        endif;
     }
    
}