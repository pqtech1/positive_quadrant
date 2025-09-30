<?php 
class Ourportfolio extends MY_Controller
{
    
    public function __construct()
    {
      $this->checkdetails();
    }    

    public function index()
    {
        $data['title'] = 'Portfolio';
        $data['mast_load']= 'ALOAD';
        $data['test'] = $this->portfolio->viewall();
        $this->load->master_template('OurPortfolio/ourportfolio',$data);
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
                                "uploads/portfolio/" . $fileName);
                                   
                                  
                            }
                        }            

                }

                   $data = array('image'=> $fileName,
                              'name'=>  $this->input->post('person_name'),
                              'designation'=> $this->input->post('designation'),
                            'status' => $this->input->post('dr_status'),
                            
                        );

                       // print_r($data);

                     $this->portfolio->insert_data($data);

                     echo json_encode(array('status'=>'true'));
            

        }

          public function edit_home($id)
          {
               // echo $id ; exit;  
              $data = $this->portfolio->edit_data($id);

              echo json_encode($data);

            }

             public function updateDirect($id)
            {


                if($_FILES['image']['name'] !='')
                {   
                    
                       $fileName  =  $_POST['old_img'];
                        @unlink('uploads/portfolio/'.$_POST['old_img']);
                    
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
                                "uploads/portfolio/" . $fileName);
                                   
                                  
                            }
                        }
                        
                            $data = array('image'=> $fileName,
                              'name'=>  $this->input->post('person_name'),
                              'designation'=> $this->input->post('edt_designation'),
                            'status' => $this->input->post('edr_status'),
                            
                        );

                        $this->portfolio->update_partner($id, $data);

                       echo json_encode(array('status' => 'true'));


                }
                else
                {

                    // $_POST;

                            $data = array(
                              'name'=>  $this->input->post('person_name'),
                              'designation'=> $this->input->post('edt_designation'),
                            'status' => $this->input->post('edr_status'),
                           
                        );
                     
                        $this->portfolio->update_partner($id, $data);

                       echo json_encode(array('status' => 'true'));


                }



           }


          public function delete_workshop($id)
          {

                    $data  = $this->portfolio->delete_portfolio($id);

                   echo json_encode(array('status'=>'true'));

           }
               


    
   
}
?>