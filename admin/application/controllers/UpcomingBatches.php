<?php

class UpcomingBatches extends MY_Controller
{
	
   public function __construct()
   {

   	  $this->checkdetails();

   }

   public function index()
   {


   	$data['title'] = 'Upcoming Batches';


   	$data['mast_load'] =  'MLOAD';

   	$data['batches'] = $this->upcoming->viewbatches();


   $this->load->master_template('Batches/viewbatches', $data);	


   }

   public function view_courses($ctype)
   {
   		$data =  $this->upcoming->viewcourses($ctype);

   		echo json_encode(array('data'=>$data));
   }

   public function view_syllabus($cid)
   {

      $data = $this->upcoming->viewsyllabus($cid);
      echo json_encode(array('data'=>$data));
   }

   public function add_batches()
   {
      $data['title'] = 'Upcoming Batches';


      $data['mast_load'] =  'MLOAD';


      $this->load->master_template('Batches/addbatches', $data); 

   }

   public function save_batches()
   {

   	 if($this->upcoming->checkBatcheExist($_POST['course_name'],$_POST['syllabus_name'],""))
   	 {



      $data = array('c_id'=>$_POST['course_name'],'s_id'=>$_POST['syllabus_name'],'b_from'=>$_POST['batch_from'],'b_to'=>$_POST['batch_to'],'batch_time_from'=>$_POST['hrsfrm'],'batch_time_to'=>$_POST['hrsto'],'batch_type'=>$_POST['batch_type'],'b_venue'=>($_POST['venue_detail']!='') ? $_POST['venue_detail'] : '','b_status'=>$_POST['status'],'b_date'=>date('Y-m-d', strtotime($_POST['batch_start_date'])));

      $this->upcoming->save_batches_data($data);

      echo json_encode(array('status'=>true));
  	}else
  	{
  		echo json_encode(array('status'=>0));
  	}
   }

   public function delete_batches($batch_id)
   {
      $this->upcoming->deleteBatches($batch_id);

      echo json_encode(array('status'=>true));

   }

   public function edit_batches($batch_id)
   {

	  $data['title'] = 'Edit Upcoming Batches';
      $data['mast_load'] =  'MLOAD';
      $data['batches'] = $this->upcoming->getSingleBatch($batch_id);
      $this->load->master_template('Batches/editbatches', $data);    	
   }

   public function getSingleBatch($batch_id)
   {
   	$data = 	$this->upcoming->getSingleBatch($batch_id);
   	echo json_encode($data);
   }

   public function update_batches()
   {
	
   	 if($this->upcoming->checkBatcheExist($_POST['course_name'],$_POST['syllabus_name'],$_POST['batch_id']))
   	 {		

      $data = array('b_id'=>$_POST['batch_id'],'c_id'=>$_POST['course_name'],'s_id'=>$_POST['syllabus_name'],'b_from'=>$_POST['batch_from'],'b_to'=>$_POST['batch_to'],'batch_time_from'=>$_POST['hrsfrm'],'batch_time_to'=>$_POST['hrsto'],'batch_type'=>$_POST['batch_type'],'b_venue'=>($_POST['venue_detail']!='') ? $_POST['venue_detail'] : '','b_status'=>$_POST['status'],'b_date'=>date('Y-m-d', strtotime($_POST['batch_start_date'])));

      $this->upcoming->updateBatches($data);
   		echo json_encode(array('status'=>true));
   	}else
   	{
   		echo json_encode(array('status'=>0));
   	}
   }
}

?>