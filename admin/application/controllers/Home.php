<?php 
class Home extends MY_Controller
{
    
    public function __construct()
	{
		$this->checkdetails();		
	}
    public function index()
    {
        $data['title'] = 'Home';
        $data['mast_load']= 'ALOAD';

        $data['test'] = $this->home->getData();

        $this->load->master_template('Home/viewall',$data);
    }

    public function show_add()
    {
    	$data['title'] = 'Add Home';
        $data['mast_load']= 'ALOAD';

        $this->load->master_template('Home/add_home',$data);

    }

        public function add_home()
        {
            // $_POST;

            // print_r($_FILES['image']['name']);

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
                                "uploads/home/" . $fileName);
                                   
                                  
                            }
                        }            

                }

                   $data = array('home_image'=> $fileName,

                            'home_desc'=> $this->input->post('desc'),

                            'status' => $this->input->post('user_status')

                        );

                       // print_r($data);

                     $this->home->insert_data($data);

                     echo json_encode(array('status'=>'true'));
            

        }

          public function edit_home($id)
         {
               // echo $id ; exit;  
         	 $data['title'] = 'Edit Home';
        	 $data['mast_load']= 'ALOAD';
             $data['home_data'] =  $this->home->getHome($id);

             $this->load->master_template('Home/edit_home',$data);   


         }

             public function updateDirect($id)
            {	


                 

                if($_FILES['image']['name'] !='')
                {   
                    

                        @unlink('uploads/home/'.$_POST['old_img']);
                    
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
                                "uploads/home/" . $fileName);
                                   
                                  
                            }
                        }

                        $data = array('home_image'=> $fileName,
                                       'home_desc' => $this->input->post('desc'),
                                       'status'=> $this->input->post('euser_status')
                            );

                        $this->home->update_home($id, $data);

                       echo json_encode(array('status' => 'true'));


                }
                else
                {

                    // $_POST;

                     $data = array(
                                       'home_desc' => $this->input->post('desc'),

                                       'status'=> $this->input->post('euser_status')
                            );

                        $this->home->update_home($id, $data);

                       echo json_encode(array('status' => 'true'));


                }



           }


           public function delete_home($id)
          {

                    $data  = $this->home->delete_home($id);

                    if($data == TRUE)
                    {

                        $this->session->set_flashdata('success_msg', 'Data deleted Successfully.');

                    }
                    else
                    {
                      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');

                    }

                    $yourURL= base_url().'home';
				echo ("<script>location.href='".$yourURL."'</script>");
 

           }
               


    
   
}


?>