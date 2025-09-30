insertCart<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function __construct() {
        $this->userTbl = 'fmw_cart';
    }

    public function insertCart($data){
        $insert = $this->db->insert($this->userTbl, $data);
        return $insert?$this->db->insert_id():false;
    }
    
   function getCart($user_id){
       $query = $this->db->query("select * as count from $this->userTbl where user_id = $user_id");
       return $query->result();
   }
   
   function updateCart($Cart_id,$quantity){
      
      $query = $this->db->query("UPDATE  $this->userTbl SET quantity = '$quantity' WHERE id = $Cart_id;");
      $updated_status = $this->db->affected_rows();
        if($updated_status):
            return $Cart_id;
        else:
            return false;
        endif;
     }
     
   function deleteCart($Cart_id){
       $query = $this->db->query("delete from $this->userTbl where id = $Cart_id");
       $delete_status = $this->db->affected_rows();
        if($delete_status):
            return $Cart_id;
        else:
            return false;
        endif;
   }
    
}