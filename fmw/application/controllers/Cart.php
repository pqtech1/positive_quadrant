<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Cart extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        // Load the user model
        $this->load->model('Cart_model');
    }
    
    public function addCart_post() {
        
        $user_id = strip_tags($this->post('user_id'));
        $product_id = strip_tags($this->post('product_id'));
        $product_name = strip_tags($this->post('product_name'));
        $product_price = $this->post('product_price');
        $discount_amount = strip_tags($this->post('discount_amount'));
        $discount_percentage = $this->post('discount_percentage');
        $quantity = strip_tags($this->post('quantity'));
        
        // Validate the addreess data
        if(!empty($user_id) && !empty($product_id) && !empty($product_name) && !empty($product_price) && !empty($discount_amount) && !empty($discount_percentage) && !empty($quantity)){
                $CartData = array(
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'discount_amount' => $discount_amount,
                    'discount_percentage' => $discount_percentage,
                    'quantity' => $quantity
                );
                $insert = $this->Cart_model->insertCart($CartData);
                if($insert){
                     $getCartCount = $this->Cart_model->getCartCount($user_id); 
                    $this->response([
                        'status' => true,
                        'message' => 'Product added has been added successfully.'
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
    
    public function getCart_post(){
        $user_id = strip_tags($this->post('user_id'));
        if(!empty($user_id)){
            $response = $this->Cart_model->getCart($user_id); 
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
    
    public function updateCart_post(){
        $Cart_id = strip_tags($this->post('cart_id'));
        $quantity = strip_tags($this->post('quantity'));
       
                
        if(!empty($Cart_id) && !empty($quantity)){
            
                $response = $this->Cart_model->updateCart($Cart_id,$quantity); 
                if($response){
                    $this->response([
                        'status' => true,
                        'message' => 'Cart updated successfully!'
                    ], REST_Controller::HTTP_OK);
                }else{
                       $this->response([
                        'status' => true,
                        'message' => 'Cart updated successfully but its seem you not updated anything!'
                    ], REST_Controller::HTTP_OK);
                } 
                
        } else {
            $this->response([
                        'status' => false,
                        'message' => 'Provide Cart id.'
                    ], REST_Controller::HTTP_OK);
        }
        
    }
    
    public function deleteCart_post(){
        $Cart_id = strip_tags($this->post('Cart_id'));
        if(!empty($Cart_id)){
            $response = $this->Cart_model->deleteCart($Cart_id); 
            if($response){
                $this->response([
                    'status' => true,
                    'message' => 'Cart deleted successfully'
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
                        'message' => 'Provide Cart id id.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
}