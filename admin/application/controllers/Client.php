<?php 

class Client extends MY_Controller

{

    

    public function __construct()
	{
		$this->checkdetails();		
	}

    public function index()

    {

        $data['title'] = 'Client';

        $data['mast_load']= 'ALOAD';



        $data['test'] = $this->client->viewall();



        $this->load->master_template('Client/viewclient',$data);

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

                                "uploads/client/" . $fileName);

                                   

                                  

                            }

                        }            



                }



                   $data = array('client_image'=> $fileName,



                            'status' => $this->input->post('dr_status')



                        );



                       // print_r($data);



                     $this->client->insert_data($data);



                     echo json_encode(array('status'=>'true'));

            



        }



          public function edit_home($id)

          {

               // echo $id ; exit;  

              $data = $this->client->edit_data($id);



              echo json_encode($data);



            }



             public function updateDirect($id)
            {

                 


               $fileName  =  $_POST['old_img'];
               
                if($_FILES['image']['name'] !='')
                {   


                        @unlink('uploads/client/'.$_POST['old_img']);

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

                                "uploads/client/" . $fileName);

                                   

                                  

                            }

                        }

                        

                        $data = array('client_image'=> $fileName,

                                       

                                       'status'=> $this->input->post('edr_status')

                            );



                        $this->client->update_client($id, $data);



                       echo json_encode(array('status' => 'true'));





                }

                else

                {



                    // $_POST;



                     $data = array(

                                     



                                       'status'=> $this->input->post('edr_status')

                            );



                        $this->client->update_client($id, $data);



                       echo json_encode(array('status' => 'true'));





                }







           }





          public function delete_client($id)

          {



                    $data  = $this->client->delete_client($id);



                   echo json_encode(array('status'=>'true'));



           }

               





    

   

}





?>