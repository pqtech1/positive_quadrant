<?php 
class Workshop extends MY_Controller
{
    
    public function __construct()
	{
		$this->checkdetails();		
	}
    public function index()
    {
        $data['title'] = 'Product';
        $data['mast_load']= 'ALOAD';

        $data['test'] = $this->workshop->viewall();

        $this->load->master_template('Workshop/showwork',$data);
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
                                "uploads/workshop/" . $fileName);
                                   
                                  
                            }
                        }            

                }

                   $data = array('work_image'=> $fileName,

                            'status' => $this->input->post('dr_status'),
                            'work_desc'=>$this->input->post('work_desc')
                        );

                       // print_r($data);

                     $this->workshop->insert_data($data);

                     echo json_encode(array('status'=>'true'));
            

        }

          public function edit_home($id)
          {
               // echo $id ; exit;  
              $data = $this->workshop->edit_data($id);

              echo json_encode($data);

            }

             public function updateDirect($id)
            {
                 

                if($_FILES['image']['name'] !='')
                {   
                    
                       $fileName  =  $_POST['old_img'];
                        @unlink('uploads/workshop/'.$_POST['old_img']);
                    
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
                                "uploads/workshop/" . $fileName);
                                   
                                  
                            }
                        }
                        
                        $data = array('work_image'=> $fileName,
                                        'work_desc'=>$this->input->post('work_desc_edt'),
                                       'status'=> $this->input->post('edr_status')
                            );

                        $this->workshop->update_workshop($id, $data);

                       echo json_encode(array('status' => 'true'));


                }
                else
                {

                    // $_POST;

                     $data = array('work_desc'=>$this->input->post('work_desc_edt'),
                                       'status'=> $this->input->post('edr_status')
                            );

                        $this->workshop->update_workshop($id, $data);

                       echo json_encode(array('status' => 'true'));


                }



           }


          public function delete_workshop($id)
          {

                    $data  = $this->workshop->delete_workshop($id);

                   echo json_encode(array('status'=>'true'));

           }
               


    
   
}
?>