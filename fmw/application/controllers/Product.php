<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Product extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        // Load the user model
        $this->load->model('Product_model');
    }

    
    public function productList_get() {
       $response = $this->Product_model->productList(); 
             $this->response([
                        'status' => true,
                        'data' => $response
            ], REST_Controller::HTTP_OK);
    }
    

}