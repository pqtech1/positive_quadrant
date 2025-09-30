<?php 

class Director extends MY_Controller
{


       public function __construct()
       {

			$this->checkdetails();

	   }

		public function index()
		{

			$data['title'] = 'Director Details';

			$data['mast_load'] = 'MLOAD';

				

					// print_r($data); exit;

			$data['direct'] = $this->direct->getDirect();

		         // $data['user_list'] = $this->user->getListTable("users");

					// print_r($data);exit;

			$this->load->master_template('Director/showdirectors',$data);

		}

        public function addDirect()
        {

            	
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
		                        "uploads/directors/" . $fileName);
		                           
		                          copy('uploads/directors/'.$fileName, '/home2/togglebits/public_html/chromepictures/uploads/directors/' . $fileName);
		                    }
		                }

     				
     				

     			}
     		     

					// print_r('direct_title'=> $this->input->post('title')); exit;
                  
                    $abc =  $this->input->post('title');

                    $ac = strtolower($abc);

                    

                    	$b = str_replace(" ", "-", $ac);



                        $main = $this->direct->makeslug($abc);


                
                   
                    if($main > 0 )
                    {
                    	
                    	 $slug = $this->direct->addslug($b);


                        $mar = str_replace("-", " ", $slug[0]->c);	


				         $var = $mar+1;
				         // print_r($mar);

	                    if(!is_numeric($mar))
	                    {

	                    		$data = array('direct_title'=> $this->input->post('title'),

										   'direct_desc' => $this->input->post('desc'),

								            'direct_slug' => $b."-".$main,

									      'direct_image'=> $fileName,

									      'status' => $this->input->post('dr_status')

										     );
							  		
							  	      // print_r($data);
							

					      }
					      else
					      {

					        $data = array('direct_title'=> $this->input->post('title'),

										   'direct_desc' => $this->input->post('desc'),

								            'direct_slug' => $b."-".$var,

									       'direct_image'=> $fileName,

									       'status' => $this->input->post('dr_status')

										     );
							  		
							  	      // print_r($data); 
					      }
		        	 }
		        	 else
		    	     {

						                             // echo json_encode($slug);

			               $data = array('direct_title'=> $this->input->post('title'),

									'direct_desc' => $this->input->post('desc'),

								   'direct_slug' => $b,

							      'direct_image'=> $fileName,

							      'status' => $this->input->post('dr_status')

								);
						           // print_r($data);

				      }

		                 


                      $insert = $this->direct->insert_dir($data);


		             echo json_encode(array('status'=>'true'));

				          	

                 
                 // echo json_encode($data);

                 // redirect('director/index');

            }


            
            

            public function edit($id)
            {
               // echo $id ; exit;	
              $data = $this->direct->getDirector($id);

              echo json_encode($data);

            }


            public function updateDirect($id)
            {
                 

            	if($_FILES['image']['name'] !='')
            	{	
            		

            			@unlink('uploads/diretors/'.$_POST['old_img']);
					    @unlink('/home2/togglebits/public_html/chromepictures/uploads/directors/'.$_POST['old_img']);
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
		                        "uploads/directors/" . $fileName);
		                           
		                          copy('uploads/directors/'.$fileName, '/home2/togglebits/public_html/chromepictures/uploads/directors/' . $fileName);
		                    }
		                }

                    

		                $abc = $this->input->post('title');

		                // print_r($abc);


		                $ac = strtolower($abc);

		                $b = str_replace(" ", "-", $ac);

		               $task = $this->direct->get_slug($abc, $id);
				                 
				                   // print_r($task);

					if($task > 0)
				    { 	 

				     	   $data = array(
				     	   	             'direct_desc' =>$this->input->post('desc'),

				     	   	              'direct_image' => $fileName,

				     	   	              'status' => $this->input->post('edr_status')

				     	   	);

				     	    $this->direct->update_direct($id, $data);

		         	        echo json_encode(array('status' => 'true'));


				    }
    			    else 
					{
						// print_r('expression');

		            	$dat = $this->direct->makeslug($abc);

		            	// print_r($dat);

		            	if( $dat > 0 )
		            	{	
                                // print_r($b); 

				                 $slug = $this->direct->edit_slug($b);	
				                 // print_r($slug);

				                  $mar = str_replace("-", " ", $slug[0]->c);	


				                 if(!is_numeric($mar))
					             {

					                    		$data = array('direct_title'=> $this->input->post('title'),

														   'direct_desc' => $this->input->post('desc'),

												            'direct_slug' => $b."-".$dat,

													      'direct_image'=> $fileName,

													      'status' => $this->input->post('edr_status')

														     );
											  	       // print_r($data);
							     }
							     else
							     {


							     	 	     $var = $mar+1;


							     	        $data = array('direct_title'=> $this->input->post('title'),

														   'direct_desc' => $this->input->post('desc'),

												             'direct_slug' => $b."-".$var,

													      'direct_image'=> $fileName,

													      'status' => $this->input->post('edr_status')

														     );

							     	  // print_r($data);
							     }
							}
							else
				    	    {
                             // echo json_encode($slug);

					            $data = array('direct_title'=> $this->input->post('title'),

											'direct_desc' => $this->input->post('desc'),

										   'direct_slug' => $b,
										   
									      'direct_image'=> $fileName,

									      'status' => $this->input->post('edr_status')	

													   );
								           // print_r($data);

						     }	

						     $this->direct->update_direct($id, $data);

		         	        echo json_encode(array('status' => 'true'));

						}	   

		         }

		        else
		        {

		        	// print_r($_POST); exit;

		        	  $abc = $this->input->post('title');

		                $ac = strtolower($abc);

		                $b = str_replace(" ", "-", $ac);

		                $task = $this->direct->get_slug($abc, $id);

		                if($task > 0)
		                {	

                         $data = array(
				     	   	             'direct_desc' =>$this->input->post('desc'),

				     	   	              'status' => $this->input->post('edr_status')

				     	   	);

				     	    $this->direct->update_direct($id, $data);

		         	        echo json_encode(array('status' => 'true'));


                  //            $this->direct->update_direct($id, $data);

			         	     // echo json_encode(array('status' => 'true'));

		                }
		                else
		                {	


		            	     $dat = $this->direct->makeslug($abc);

			            	  // print_r($dat);

			            	if( $dat > 0 )
			            	{	

					                 $slug = $this->direct->addslug($b);


					                  $mar = str_replace("-", " ", $slug[0]->c);	


							          $var = $mar+1;


									 if(!is_numeric($mar))
						             {

						                    		$data = array('direct_title'=> $this->input->post('title'),

															   'direct_desc' => $this->input->post('desc'),

													            'direct_slug' => $b."-".$dat,

														      //'direct_image'=> $file_name['file_name']

													            'status' => $this->input->post('edr_status')

															     );
												  	       // print_r($data);
								     }
								     else
								     {

								     	// print_r('cannot update slug');

								     	$data = array('direct_title'=> $this->input->post('title'),

															   'direct_desc' => $this->input->post('desc'),

													             'direct_slug' => $b."-".$var,

														      //'direct_image'=> $file_name['file_name']
													             'status' => $this->input->post('edr_status')

															     );

								     	 // print_r($data);

								     }
								}
								else
					    	    {
	                             // echo json_encode($slug);

						            $data = array('direct_title'=> $this->input->post('title'),

												'direct_desc' => $this->input->post('desc'),

											   'direct_slug' => $b,
											   
										      //'direct_image'=> $file_name['file_name']

										      'status' => $this->input->post('edr_status')	

														   );
									           // print_r($data);

							     }

							      $this->direct->update_direct($id, $data);

			         	        echo json_encode(array('status' => 'true'));

			         	    }    
						

   			       }
			        
			  
            }


              public function delete_direct($id)
              {

	                $data  = $this->direct->delete_direct($id);

	                if($data == TRUE)
	                {

	                    $this->session->set_flashdata('success_msg', 'Data deleted Successfully.');

	                }
	                else
	                {
	                  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');

	                }

	                     redirect('director/index');

               }
               



}
// director