<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        // Load the user model
        $this->load->model('user');
    }

    
    public function register_post() {
       
        $name = strip_tags($this->post('name'));
        $username = strip_tags($this->post('username'));
        $phone = $this->post('phone');
        $email = strip_tags($this->post('email'));
        $password = strip_tags($this->post('password'));
        $device_type = strip_tags($this->post('device_type'));
        $device_id = strip_tags($this->post('device_id'));

        // Validate the post data
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($device_type) && !empty($device_id)){
        
            $phoneVerfication = $this->user->phoneExists($phone); 
            $emailVerfication = $this->user->mailExists($email);
            
            if($phoneVerfication){
                 $this->response([
                    'status' => false,
                    'message' => 'Phone no. already exist'
                ], REST_Controller::HTTP_OK);
            } else if($emailVerfication){
                $this->response([
                    'status' => false,
                    'message' => 'Email already exist'
                ], REST_Controller::HTTP_OK);
            } else {
                $userData = array(
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'password' => $password,
                    'device_type' => $device_type,
                    'device_id' => $device_id
                );
                
                $insert = $this->user->insertRegistration($userData);
                
                if($insert){
                    $this->response([
                        'status' => true,
                        'message' => 'User has been added successfully.',
                        'data' => array(array_merge($userData, array("user_id" => strval($insert))))
                    ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => false,
                        'message' => 'Some problems occurred, please try again later.'
                    ], REST_Controller::HTTP_OK);
                }
            }
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide all details.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function checkLogin_post() {
       $username = strip_tags($this->post('username'));
       $password = strip_tags($this->post('password'));
       
        $userData = array(
                    'username' => $username,
                    'password' => $password
                );
                
        if(!empty($username) && !empty($password)){
            $loginStatus = $this->user->checkLogin($userData); 
            
            if($loginStatus){
                $this->response([
                    'status' => true,
                    'message' => 'Logged in',
                    'data' => $loginStatus
                ], REST_Controller::HTTP_OK);
            }else{
                   $this->response([
                    'status' => false,
                    'message' => 'Invalid username or password',
                    'data' => $loginStatus
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide all details.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function getUserDetails_post(){
        $user_id = strip_tags($this->post('user_id'));
        if(!empty($user_id)){
            $response = $this->user->getUserDetails($user_id); 
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
    
    public function updateUserDetails_post(){
        
       $user_id = strip_tags($this->post('user_id'));
       $name = strip_tags($this->post('name'));
       $email = strip_tags($this->post('email'));
       
        $userData = array(
                    'name' => $name,
                    'email' => $email
                );
        if(!empty($user_id) && !empty($name) && !empty($email)){
             $emailVerfication = $this->user->mailExists($email);
             if($emailVerfication){
                $this->response([
                    'status' => false,
                    'message' => 'Email already exist'
                ], REST_Controller::HTTP_OK);
             } else {
                     
                $response = $this->user->updateUserDetails($user_id,$userData); 
                if($response){
                    $this->response([
                        'status' => true,
                        'message' => 'User updated successfully!'
                    ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => true,
                        'message' => 'User updated successfully but its seem you not updated anything!'
                    ], REST_Controller::HTTP_OK);
                } 
                
             }
           
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide user id.'
                    ], REST_Controller::HTTP_OK);
        }
        
    }
    
    public function phoneVerify_post() {
       $phone = strip_tags($this->post('phone'));
        if(!empty($phone)){
            $phoneVerfication = $this->user->phoneExists($phone); 
            if($phoneVerfication){
                $this->response([
                    'status' => false,
                    'message' =>'Phone no. already exist.'
                ], REST_Controller::HTTP_OK);
            }else{
                   $this->response([
                    'status' => true,
                    'message' => 'Valid phone no.',
                ], REST_Controller::HTTP_OK);
            }
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide phone no.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function otpVerify_post() {
       $phone = strip_tags($this->post('phone'));
       $otp = strip_tags($this->post('otp'));
        if(!empty($phone) && !empty($otp)){
            
            $phoneVerfication = $this->user->phoneExists($phone);
            
            if($phoneVerfication){
              $this->response([
                    'status' => false,
                    'message' =>'Phone no. already exist.'
                ], REST_Controller::HTTP_OK);
            } else {
                 
                 if($otp == "123456"){
                    $this->response([
                    'status' => true,
                    'message' =>'Otp verified'
                ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                    'status' => false,
                    'message' => 'Invalid Otp',
                ], REST_Controller::HTTP_OK);
                }
                
            }
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide phone no. and otp'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    
    public function changePassword_post(){
        $email = strip_tags($this->post('email'));
        $userData = array(
                    'email' => $email,
                );
                
        if(!empty($email)){
            $emailStatus = $this->user->checkEmailExist($userData); 
            if($emailStatus){
                
                $randomString = $this->random_string(14);
                $encodestring = base64_encode($randomString);
                $emailData = array(
                    'token' => $randomString,
                    'email' => $email
                );
                
             $insertEmail = $this->user->insertEmail($emailData);
             if($insertEmail){
                $this->load->helper('url');
                $encodeemail = base64_encode($email);
                $link = "http://positivequadrant.in/webfmw/index.php/password/reset?emailcode={$encodeemail}&token={$encodestring}";
                    $this->response([
                            'status' => true,
                            'message' => $link
                        ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => false,
                        'message' => 'Some problems occurred, please try again later.'
                    ], REST_Controller::HTTP_OK);
                }
                
                
            }else{
                   $this->response([
                    'status' => false,
                    'message' => 'Invalid email'
                ], REST_Controller::HTTP_OK);
            }
            
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide email'
                    ], REST_Controller::HTTP_OK);
        }
        
    }
    
    
    public function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
}