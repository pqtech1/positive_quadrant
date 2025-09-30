<?php 
class Services extends MY_Controller
{
    
    public function __construct()
	{
		$this->checkdetails();		
	}
    public function index()
    {
        $data['title'] = 'Services';
        $data['mast_load']= 'ALOAD';

        $data['test'] = $this->services->getData();


        // print_r($data);  exit;

        $this->load->master_template('Services/viewservices',$data);
    }

    public function add_services()
    {
             $data = array('serv_name' => $this->input->post('service_name'),
                                    'status'=> $this->input->post('status')
                            );


          $this->services->insert_data($data);
            echo json_encode(array('status' => 'true'));

    }
       
         public function show_add()
            {
                $data['title'] = 'Add Services';
                $data['mast_load']= 'ALOAD';

                $this->load->master_template('Services/add_services',$data);

            }



        public function edit_services($id)
        {

             $data['title'] = 'Edit Services';
             $data['mast_load']= 'ALOAD';
             $data['services_data'] = $this->services->edit_data($id);

            $this->load->master_template('Services/edit_services',$data);   

        }


       public function updateDirect($id)
            {
                 


                    // $_POST;

                     $data = array('serv_name' => $this->input->post('service_name'),
                                    'status'=> $this->input->post('status')
                            );
                        $this->services->update_service($id, $data);

                       echo json_encode(array('status' => 'true'));


                



           }
       public function add_services_details()
        {

        	$fileName = '';

            if(!empty($_FILES))
                {
                    
                        $allowed = array('jpg', 'jpeg','png','gif');
                        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                        if(!in_array(strtolower($extension), $allowed))
                        {
                               $data['inputerror'][] = 'image';
                               $data['error_string'][] = 'Image extension should be jpeg,gif,png,pdf';
                               $data['status'] = FALSE;
                               echo json_encode($data);
                               exit();
                        
                        }else
                        {
                            $maxsize = 2097152;
                            if($_FILES['image']['size'] >= $maxsize)
                            {
                                $data['inputerror'][] = 'image';
                                $data['error_string'][] = 'File too large. File must be less than 2 megabytes';
                                $data['status'] = FALSE;
                                echo json_encode($data);
                                exit();
                            }
                            if ($_FILES["image"]["error"] > 0) {
                            //$data =  json_encode(array('type'=>'error', 'msg'=>"Return Code: " . $_FILES["file"]["error"][$i])); 
                            $data['inputerror'][] = 'image';
                            $data['error_string'][] = ''.$_FILES["image"]["error"].'';
                            $data['status'] = FALSE;
                            echo json_encode($data);
                            exit();
                            } else {
                                   
                                    $name = explode(".", $_FILES['image']['name']);
                                    $fileName = $name[0].time().'.'.$name[1];
                                   
                                    move_uploaded_file($_FILES["image"]["tmp_name"],
                                "uploads/services/" . $fileName);
                                   
                                  
                            }
                        }            

                }

                   $data = array(
                        'serv_type'=>$this->input->post('serv_type'),
                        'serv_heading'=>$this->input->post('ser_heading'),
                        'serv_description'=>$this->input->post('serv_desc'),
                        'serv_image'=>$fileName,
                         'status' => $this->input->post('status')
                        );

                    

                     $this->services->insert_detail_data($data);

                     echo json_encode(array('status'=>'true'));
            

        }


            public function update_service_detail($id)
            {
                    // $_POST;
              	$fileName  =  $_POST['old_img'];
               if($_FILES['image']['name'] !='')
                {  
                        @unlink('uploads/services/'.$_POST['old_img']);
                        $allowed = array('jpg', 'jpeg','png','gif');
                        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                        if(!in_array(strtolower($extension), $allowed))
                        {
                               $data['inputerror'][] = 'image';
                               $data['error_string'][] = 'Image extension should be jpeg,gif,png,pdf';
                               $data['status'] = FALSE;
                               echo json_encode($data);
                               exit();
                        
                        }else
                        {
                            $maxsize = 2097152;
                            if($_FILES['image']['size'] >= $maxsize)
                            {
                                $data['inputerror'][] = 'image';
                                $data['error_string'][] = 'File too large. File must be less than 2 megabytes';
                                $data['status'] = FALSE;
                                echo json_encode($data);
                                exit();
                            }
                            if ($_FILES["image"]["error"] > 0) {
                            //$data =  json_encode(array('type'=>'error', 'msg'=>"Return Code: " . $_FILES["file"]["error"][$i])); 
                            $data['inputerror'][] = 'image';
                            $data['error_string'][] = ''.$_FILES["image"]["error"].'';
                            $data['status'] = FALSE;
                            echo json_encode($data);
                            exit();
                            } else {
                                   
                                    $name = explode(".", $_FILES['image']['name']);
                                    $fileName = $name[0].time().'.'.$name[1];
                                   
                                    move_uploaded_file($_FILES["image"]["tmp_name"],
                                "uploads/services/" . $fileName);
                                   
                                  
                            }
                        }            

                }

           		 $data = array(
                        'serv_heading'=>$this->input->post('ser_heading'),
                        'serv_description'=>$this->input->post('serv_description'),
                        'serv_image'=>$fileName,
                         'status' => $this->input->post('status'));
				echo json_encode(array('status' => $this->services->update_detail_service($id, $data)));


                



           }

          public function delete_services($id)
          {

                    $data  = $this->services->delete_services($id);

                    echo json_encode(array('status'=>'true'));

           }
               

           public function add_serviceDetail($id)
           {
                 $data['title'] = 'Add Service Detail';
                 $data['mast_load']= 'ALOAD';

                 $data['services_name'] = $this->services->edit_data($id);
              
                $this->load->master_template('Services/serviceDetails/add_service_detail',$data);   

           }



          public function edit_serviceDetail($id)
           {
                $data['title'] = 'Edit Service Detail';
                $data['mast_load']= 'ALOAD';
                $data['services_data'] = $this->services->getServiceDetail($id);
                //$data['services_name'] = $this->services->edit_data($id);

                $this->load->master_template('Services/serviceDetails/edit_service_detail',$data);   

           }
    
   
         public function delete_servicesData($id)
          {

                   $data  = $this->services->delete_detail_services($id);

                    echo json_encode(array('status'=>'true'));

           }

           public function view_service_detail($id)
           {

          
              $data['title'] = 'Services';
              $data['mast_load']= 'ALOAD';

              $data['test'] = $this->services->getServiceDetailData($id);
              $this->load->master_template('Services/serviceDetails/viewdetails',$data);
           }
}


?>;