<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Address extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        // Load the user model
        $this->load->model('Address_model');
    }
    
    public function addAddress_post() {
        
        $user_id = strip_tags($this->post('user_id'));
        $name = strip_tags($this->post('name'));
        $phone = strip_tags($this->post('phone'));
        $flat_no_building_name = strip_tags($this->post('flat_no_building_name'));
        $street = $this->post('street');
        $locality = strip_tags($this->post('locality'));
        $landmark = strip_tags($this->post('landmark'));
        $city = strip_tags($this->post('city'));
        $state = strip_tags($this->post('state'));
        $pincode = strip_tags($this->post('pincode'));

        // Validate the addreess data
        if(!empty($user_id) && !empty($name) && !empty($phone) && !empty($flat_no_building_name) && !empty($locality) && !empty($landmark) && !empty($pincode)){
                $addressData = array(
                    'user_id' => $user_id,
                    'name' => $name,
                    'phone' => $phone,
                    'flat_no_building_name' => $flat_no_building_name,
                    'street' => $street,
                    'locality' => $locality,
                    'landmark' => $landmark,
                    'city' => $city,
                    'state' => $state,
                    'pincode' => $pincode
                );
                $insert = $this->Address_model->insertAddress($addressData);
                if($insert){
                    $this->response([
                        'status' => true,
                        'message' => 'Addres has been added successfully.'
                    ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => false,
                        'message' => 'Some problems occurred, please try again later.'
                    ], REST_Controller::HTTP_OK);
                }
           
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide all details.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function getAddress_post(){
        $user_id = strip_tags($this->post('user_id'));
        if(!empty($user_id)){
            $response = $this->Address_model->getAddress($user_id); 
            if($response){
                $this->response([
                    'status' => true,
                    'data' =>$response
                ], REST_Controller::HTTP_OK);
            }else{
                   $this->response([
                    'status' => false,
                    'data' =>$response
                ], REST_Controller::HTTP_OK);
            }
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide user id.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function updateAddress_post(){
        $address_id = strip_tags($this->post('address_id'));
        $name = strip_tags($this->post('name'));
        $phone = strip_tags($this->post('phone'));
        $flat_no_building_name = strip_tags($this->post('flat_no_building_name'));
        $street = $this->post('street');
        $locality = strip_tags($this->post('locality'));
        $landmark = strip_tags($this->post('landmark'));
        $city = strip_tags($this->post('city'));
        $state = strip_tags($this->post('state'));
        $pincode = strip_tags($this->post('pincode'));
       
        $addressData = array(
                    'address_id' => $address_id,
                    'name' => $name,
                    'phone' => $phone,
                    'flat_no_building_name' => $flat_no_building_name,
                    'street' => $street,
                    'locality' => $locality,
                    'landmark' => $landmark,
                    'city' => $city,
                    'state' => $state,
                    'pincode' => $pincode
                );
                
        if(!empty($address_id) && !empty($name) && !empty($phone) && !empty($flat_no_building_name) && !empty($locality) && !empty($landmark) && !empty($pincode)){
            
                $response = $this->Address_model->updateAddress($address_id,$addressData); 
                if($response){
                    $this->response([
                        'status' => true,
                        'message' => 'Address updated successfully!'
                    ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => true,
                        'message' => 'Address updated successfully but its seem you not updated anything!'
                    ], REST_Controller::HTTP_OK);
                } 
                
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide address id.'
                    ], REST_Controller::HTTP_OK);
        }
        
    }
    
    public function deleteAddress_post(){
        $address_id = strip_tags($this->post('address_id'));
        if(!empty($address_id)){
            $response = $this->Address_model->deleteAddress($address_id); 
            if($response){
                $this->response([
                    'status' => true,
                    'message' => 'Address deleted successfully'
                ], REST_Controller::HTTP_OK);
            }else{
                   $this->response([
                    'status' => false,
                    'message' =>'Some problems occurred, please try again later.'
                ], REST_Controller::HTTP_OK);
            }
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide address id id.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
}