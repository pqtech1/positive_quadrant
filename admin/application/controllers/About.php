<?php
class About extends MY_Controller
{
	
	public function __construct()
	{
		# code...
		$this->checkdetails();
	}

	public function index()
	{
		$data['test'] = $this->about->getData();
		$data['title'] = 'About';
        $data['mast_load']= 'ALOAD';
        $this->load->master_template('About/showabout',$data);
	}

	public function show_add()
	{
		$data['title'] = ' Add About';
        $data['mast_load']= 'ALOAD';
        $this->load->master_template('About/add_about',$data);

	}
	public function add_about()
	{
		if(!empty($_FILES))
                {
                    
                        $allowed = array('jpg', 'jpeg','png','gif');
                        $extension = pathinfo($_FILES['about_image']['name'], PATHINFO_EXTENSION);
                        if(!in_array(strtolower($extension), $allowed))
                        {
                               $data['inputerror'][] = 'about_image';
                               $data['error_string'][] = 'Image extension should be jpeg,gif,png,pdf';
                               $data['status'] = FALSE;
                               echo json_encode($data);
                               exit();
                        
                        }else
                        {
                            $maxsize = 2097152;
                            if($_FILES['about_image']['size'] >= $maxsize)
                            {
                                $data['inputerror'][] = 'about_image';
                                $data['error_string'][] = 'File too large. File must be less than 2 megabytes';
                                $data['status'] = FALSE;
                                echo json_encode($data);
                                exit();
                            }
                            if ($_FILES["about_image"]["error"] > 0) {
                            //$data =  json_encode(array('type'=>'error', 'msg'=>"Return Code: " . $_FILES["file"]["error"][$i])); 
                            $data['inputerror'][] = 'about_image';
                            $data['error_string'][] = ''.$_FILES["about_image"]["error"].'';
                            $data['status'] = FALSE;
                            echo json_encode($data);
                            exit();
                            } else {
                                   
                                    $name = explode(".", $_FILES['about_image']['name']);
                                    $fileName = $name[0].time().'.'.$name[1];
                                   
                                    move_uploaded_file($_FILES["about_image"]["tmp_name"],
                                "uploads/about/" . $fileName);
                                   
                                  
                            }
                        }            

                }

                   $data = array('about_image'=> $fileName,

                            'about_desc'=> $this->input->post('about_desc'),

                            'status' => $this->input->post('status')

                        );

                       // print_r($data);

                     $this->about->insert_data($data);

                     echo json_encode(array('status'=>'true'));

	}

	public function updateDirect($id)
	{
		     if($_FILES['about_image']['name'] !='')
                {   
                    

                        @unlink('uploads/about/'.$_POST['old_img']);
                    
                        $allowed = array('jpg', 'jpeg','png','gif');
                        $extension = pathinfo($_FILES['about_image']['name'], PATHINFO_EXTENSION);
                        if(!in_array(strtolower($extension), $allowed))
                        {
                               $data['inputerror'][] = 'about_image';
                               $data['error_string'][] = 'Image extension should be jpeg,gif,png,pdf';
                               $data['status'] = FALSE;
                               echo json_encode($data);
                               exit();
                        
                        }else
                        {
                            $maxsize = 2097152;
                            if($_FILES['about_image']['size'] >= $maxsize)
                            {
                                $data['inputerror'][] = 'about_image';
                                $data['error_string'][] = 'File too large. File must be less than 2 megabytes';
                                $data['status'] = FALSE;
                                echo json_encode($data);
                                exit();
                            }
                            if ($_FILES["about_image"]["error"] > 0) {
                            //$data =  json_encode(array('type'=>'error', 'msg'=>"Return Code: " . $_FILES["file"]["error"][$i])); 
                            $data['inputerror'][] = 'about_image';
                            $data['error_string'][] = ''.$_FILES["about_image"]["error"].'';
                            $data['status'] = FALSE;
                            echo json_encode($data);
                            exit();
                            } else {
                                   
                                    $name = explode(".", $_FILES['about_image']['name']);
                                    $fileName = $name[0].time().'.'.$name[1];
                                   
                                    move_uploaded_file($_FILES["about_image"]["tmp_name"],
                                "uploads/about/" . $fileName);
                                   
                                  
                            }
                        }

                        $data = array('about_image'=> $fileName,
                                       'about_desc' => $this->input->post('about_desc'),
                                       'status'=> $this->input->post('status')
                            );

                        $this->about->update_about($id, $data);

                       echo json_encode(array('status' => 'true'));


                }
                else
                {

                    // $_POST;

                     $data = array(
                                       'about_desc' => $this->input->post('about_desc'),

                                       'status'=> $this->input->post('status')
                            );

                        $this->about->update_about($id, $data);

                       echo json_encode(array('status' => 'true'));


                }



    }
	
	public function edit_about($id)
	{
		$data['about_data'] = $this->about->edit_data($id);
		$data['title'] = 'Edit About';
		$data['mast_load'] = 'ALOAD';
		$this->load->master_template('About/edit_about',$data);
	}

	public function delete_about($id)
	{
		$image_name = $this->input->post('image_name');
		
		echo json_encode(array('status'=>$this->about->delete_about($id,$image_name)));
	}
}

?>