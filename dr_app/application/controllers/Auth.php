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
    
    public function login_post() {
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('pwd');
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'pwd' => $password,
                'status' => 1
            );
            $user = $this->user->getRows($con);
            $aa = array();
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid login and Password.',
                    'data' => $aa
                ], REST_Controller::HTTP_OK);
            }
        }else{
            // Set the response and exit
            $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    public function Add_pat_post() {
        // Get the post data
        $dr_ids = strip_tags($this->post('dr_ids'));
        $name = strip_tags($this->post('name'));
        $age = strip_tags($this->post('age'));
        $weight = $this->post('weight');
        $phone = strip_tags($this->post('phone'));
        $blood_group = strip_tags($this->post('blood_group'));
        $gender = strip_tags($this->post('gender'));
        $email = strip_tags($this->post('email'));
        
        // Validate the post data
        if(!empty($dr_ids) && !empty($name) && !empty($age) && !empty($weight)){
            
                $userData = array(
                    'dr_ids' => $dr_ids,
                    'name' => $name,
                    'age' => $age,
                    'weight' => $weight,
                    'phone' => $phone,
                    'blood_group' => $blood_group,
                    'gender' => $gender,
                    'email' => $email
                );
                $insert = $this->user->insert($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The patient has been added successfully.',
                        'data' => $userData
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
        
        }else{
            // Set the response and exit
            $this->response("Provide complete patient user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function fetch_pat_post(){
        
        // Get the post data
        $dr_ids = strip_tags($this->post('dr_id'));
        $page = strip_tags($this->post('page'));
        
        // Validate the post data
        if(!empty($dr_ids)){
            
                 //$data = $this->db->get_where("add_pat", ['dr_ids' => $dr_ids])->result_array();
                
                 $this->db->order_by("pat_id", "desc");                
                 $data =  $this->db->get_where('add_pat', array('dr_ids' => $dr_ids), 10, $page)->result_array();
                
                
                 $count = count($data);
                // Check if the user data is inserted
                if($count > 0 ){
                    // Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'count' => $count,
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response([
                    'status' => FALSE,
                    'count' => $count,
                    'data' => $data
                ], REST_Controller::HTTP_BAD_REQUEST);
                }
        
        }else{
            // Set the response and exit
            $this->response("Provide Doctor id  and page no. to get patient info.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function Add_pat_detail_post() {
        // Get the post data
        $pat_id = strip_tags($this->post('pat_id'));
        $description = strip_tags($this->post('description'));
        $paid = strip_tags($this->post('paid'));
        $pending = $this->post('pending');
        $medi_array = json_decode( $this->post('medi_array'));
        
        // Validate the post data
        if(!empty($pat_id)){
            
            
            // set the timezone first
        if(function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }
        
        $d2 = date("Y-m-d H:i:s");
        //add created and modified date if not exists
             
                $userData = array(
                    'pat_id' => $pat_id,
                    'description' => $description,
                    'paid' => $paid,
                    'pending' => $pending,
                    'created_date'=>$d2
                );
               // $insert = $this->user->Add_pat_detail($userData);
                
                
                
                $insert = $this->db->insert('pat_hist', $userData);
         $insert_id = $this->db->insert_id();

  
                // Check if the user data is inserted
                //if($insert_id !=""){
                    // Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The patient detail has been added successfully.',
                        'data' => $userData,
                        "last_inserted_id"=>$insert_id
                    ], REST_Controller::HTTP_OK);
                //}else{
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                //}
        
        }else{
            // Set the response and exit
            $this->response("Provide complete patient user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
       

}