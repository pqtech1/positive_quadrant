<?php 

class Tag extends My_controller
{

		   public function __construct()
		   {

		        $this->checkdetails();

		   }



		   public function index()
		   {

		   		$data['title'] = 'Tag Details';

			    $data['mast_load'] = 'MLOAD';


			    $data['test'] = $this->tag->get_data();


			    $this->load->master_template('Tag/viewtags', $data);


		   }


		   public function addTag()
		   {
		   	// print_r($_POST);

		   	     $abc = $this->input->post('sname');

		   	     $ac = strtolower($abc);

		   	     $b = str_replace(' ', '-', $ac);

		   	     // print_r($b);

		   	      $main = $this->tag->makeslug($abc);

		   	    

		   	      // print_r($main);

                   if($main > 0)
                   {

                   	  $val = $this->tag->addslug($b);

                   	  // print_r($val);

                      $var = str_replace('-', ' ',$val[0]->c);

                      // print_r($var);

                            if(!is_numeric($var))
                            {

                            	$data = array('tag_name'=> $this->input->post('sname'),

                                               'tag_slug'=> $b."-".$main,

                                               'status'=> $this->input->post('tag_status')
                            	 );

                            }
                            else
                            {
                                 $mar = $var+1;
                                 
                               $data = array('tag_name'=> $this->input->post('sname'),

                                              'tag_slug'=> $b."-".$mar,

                                              'status' => $this->input->post('tag_status')
                                           );

                            }

                     }
                     else
                     {

                     	$data = array('tag_name'=> $this->input->post('sname'),

                                       'tag_slug'=> $b,

                                       'status' => $this->input->post('tag_status')
                     	 	);

                      } 

                   $insert = $this->tag->insert_tag($data);

                   echo json_encode(array('status'=>'true'));
		 
           }


           public function edit_data($id)
           {

           	 $data = $this->tag->get_tag($id);

             echo json_encode($data);

           }

           public function update_data($id)
           {

	            $abc = $this->input->post('ename');

	              $ac = strtolower($abc);

	              $b = str_replace(' ', '-', $ac);

	              $task = $this->tag->check_name($abc, $id);

	              // echo $this->db->last_query();

	              // print_r($task); 

	              if($task > 0)
	              {
	              	$data = array(
	              		'status' => $this->input->post('etag_status')
					); 


	                   $this->tag->update_data($id, $data);

	                   echo json_encode(array('status'=>'true'));
	                

	              }
	              else
	              {
	                 $main = $this->tag->count_tag($abc);

	                      // print_r($main);


	                 if($main > 0)
	                 {

	                 	$sent = $this->tag->addslug($b);

	                 	// print_r($sent);

	                 	$var = str_replace('-', ' ', $sent[0]->c);

	                 	// print_r($var);

		                 	  if(!is_numeric($var))
		                 	  {

		                       $data = array( 'tag_name'=> $this->input->post('ename'),

		                                       'tag_slug'=> $b."-".$main,

		                                       'status' => $this->input->post('etag_status')

		                       	); 

		                 	  }
		                      else
		                      {
		                      	$mar = $var+1;

		                      	$data = array('tag_name' => $this->input->post('ename'),

		                      		          'tag_slug'=> $b."-".$mar,

		                      		          'status' => $this->input->post('etag_status')
		                      		);
		                      	// print_r($data);

		                      }

	                   }
	                   else
	                   {

	                   	$data = array('tag_name'=> $this->input->post('ename'),

	                                   'tag_slug' => $b,

	                                   'status' => $this->input->post('etag_status')

	                   		);

	                   }

	                   $this->tag->update_data($id, $data);

	                   echo json_encode(array('status'=>'true'));


	                 }
                  
              }

               // print_r($task);
               
             public function delete_data($id)
             {
             	   // echo $id;

                   $data = $this->tag->delete_data($id);

                   echo json_encode($data);

                   // if($data == TRUE)
                   // {

                   // 	  $this->session->set_flashdata('success_msg', 'Data deleted successfully');

                   // }
                   // else
                   // {
               
                   //     $this->session->set_flashdata('error_msg', 'Error occurred. Please try again');
                   // }

               
             }


}