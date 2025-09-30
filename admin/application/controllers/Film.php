<?php 
class About extends MY_Controller
{
    
    
    public function index()
    {
        $data['title'] = 'Product';
        $data['mast_load']= 'ALOAD';

        $data['test'] = $this->home->getData();

        $this->load->master_template('About/viewall',$data);
    }

        public function add_about()
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

                   $data = array('about_image'=> $fileName,

                            'about_desc'=> $this->input->post('desc'),

                            'status' => $this->input->post('user_status')

                        );

                       // print_r($data);

                     $this->about->insert_data($data);

                     echo json_encode(array('status'=>'true'));
            

        }

          public function edit_about($id)
         {
               // echo $id ; exit;  
              $data = $this->about->getHome($id);

              echo json_encode($data);

            }

             public function updateDirect($id)
            {
                 

                if($_FILES['image']['name'] !='')
                {   
                    

                        @unlink('uploads/about/'.$_POST['old_img']);
                    
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
                                "uploads/about/" . $fileName);
                                   
                                  
                            }
                        }

                        $data = array('about_image'=> $fileName,
                                       'about_desc' => $this->input->post('desc'),
                                       'status'=> $this->input->post('euser_status')
                            );

                        $this->home->update_about($id, $data);

                       echo json_encode(array('status' => 'true'));


                }
                else
                {

                    // $_POST;

                     $data = array(
                                       'about_desc' => $this->input->post('desc'),
                                       'status'=> $this->input->post('euser_status')
                            );
                        $this->home->update_home($id, $data);

                       echo json_encode(array('status' => 'true'));


                }



           }


           public function delete_about($id)
          {

                    $data  = $this->home->delete_about($id);

                    if($data == TRUE)
                    {

                        $this->session->set_flashdata('success_msg', 'Data deleted Successfully.');

                    }
                    else
                    {
                      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');

                    }

                         redirect('home');

           }
               


    
   
}


?>