<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Address_model extends CI_Model {

    public function __construct() {
        $this->userTbl = 'fmw_userAddress';
    }

    public function insertAddress($data){
        $insert = $this->db->insert($this->userTbl, $data);
        return $insert?$this->db->insert_id():false;
    }
    
   function getAddress($user_id){
       $query = $this->db->query("select id as address_id,name,phone,flat_no_building_name,street,locality,landmark,city,state,pincode from $this->userTbl where user_id = $user_id");
       return $query->result_array();
   }
   
   function updateAddress($address_id,$addressData){
      $name = $addressData['name'];
      $phone = $addressData['phone'];
      $flat_no_building_name = $addressData['flat_no_building_name'];
      $street = $addressData['street'];
      $locality = $addressData['locality'];
      $landmark = $addressData['landmark'];
      $city = $addressData['city'];
      $state = $addressData['state'];
      $pincode = $addressData['pincode'];
      
      $query = $this->db->query("UPDATE  $this->userTbl SET name = '$name', phone = '$phone',flat_no_building_name = '$flat_no_building_name', street = '$street',
      locality = '$locality', landmark = '$landmark',city = '$city', state = '$state',pincode = '$pincode' WHERE id = $address_id;");
      $updated_status = $this->db->affected_rows();
        if($updated_status):
            return $address_id;
        else:
            return false;
        endif;
     }
     
   function deleteAddress($address_id){
       $query = $this->db->query("delete from $this->userTbl where id = $address_id");
       $delete_status = $this->db->affected_rows();
        if($delete_status):
            return $address_id;
        else:
            return false;
        endif;
   }
    
}