<?php

class 	Courses  extends MY_controller

{

	

	public function __construct()

 {



  $this->checkdetails();



}



public function index()

{





  $data['title'] = 'Courses Details';





  $data['mast_load'] =  'MLOAD';



  $data['courses'] = $this->courses->viewcourses();





  $this->load->master_template('Courses/viewcourses', $data);	





}



public function add_courses()

{

 $data['title'] = 'ADD COURSES';

 $data['mast_load'] =  'MLOAD';

 $this->load->master_template('Courses/addcourse', $data);	



}





public function edit_courses($id)

{







 $data['title'] = 'EDIT COURSES';

 $data['mast_load'] =  'MLOAD';



 $data['course'] = $this->courses->view_single_course($id);

 $this->session->set_userdata('total_highlight',count(explode(',',$data['course']['chighlight']))+1 );

 $this->load->master_template('Courses/editcourse', $data);	



}



public function get_count()

{



 $course = $this->courses->view_single_course($id);

 $cnt = count(explode(',',$course['chighlight']));

 echo json_encode(array('count'=>$cnt));



}



public function save_course()

{

 $imp = implode(',',$_POST['course_highlight']);





 if($this->courses->check_course_exist($_POST['course_name'],$_POST['course_type'],true))

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

        "uploads/courses/" . $fileName);





    }

  }            



}







$data = array('cname'=>$_POST['course_name'],

 'cimage'=>$fileName,

 'cdesc'=>$_POST['course_desc'],

 'chighlight'=>$imp,

 'cfees'=>$_POST['cfees'],

 'ctype'=>$_POST['course_type'],

 'cdiscount'=>$_POST['in_offer'],

 'cdiscfees'=>$_POST['dfees']

);



$this->courses->save_course($data);



echo json_encode(array('status'=>true));

}else

{

  echo json_encode(array('status'=>0));

}



}



public function update_course()

{

  $imp = implode(',',$_POST['course_highlight']);

  $fileName  =  $_POST['old_img'];

  if($this->courses->check_course_exist($_POST['course_name'],$_POST['course_type'],$_POST['c_id']))

  {

   if($_FILES['image']['name'] !='')

   {   



    @unlink('uploads/courses/'.$fileName);



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

        "uploads/courses/" . $fileName);





    }

  }            



}



$data = array('cname'=>$_POST['course_name'],

 'cimage'=>$fileName,

 'cdesc'=>$_POST['course_desc'],

 'chighlight'=>$imp,

 'cfees'=>$_POST['cfees'],

 'ctype'=>$_POST['course_type'],

 'cdiscount'=>$_POST['in_offer'],  

 'cdiscfees'=>$_POST['dfees'],

 'c_id'=>$_POST['c_id']

);



$this->courses->update_course($data);



echo json_encode(array('status'=>true));

}else

{

 echo json_encode(array('status'=>0));

}



}



public function delete_course($id)

{

 $this->courses->delete_course($id);



 echo json_encode(array('status'=>true));

}





// realated to syllabus



public function addsyllabus($course_id)

{
  $data['title'] = 'ADD SYLLABUS';
  $data['mast_load'] =  'MLOAD';
  $data['course'] = $this->courses->view_single_course($course_id);

  if(count($data['course']) > 0)
  {
    $this->load->master_template('Courses/addsyllabus', $data); 	
  }else
  {
    return redirect('courses');
  }

}



public function view_syllabus($course_id)

{

  $data['title'] = 'Syllabus Details';



  $data['mast_load'] =  'MLOAD';



  $data['course'] = $this->courses->view_single_course($course_id);



  $data['syllabus'] = $this->courses->viewsyllabus($course_id);



  $this->load->master_template('Courses/viewsyllabus', $data);  







}



public function save_syllabus()

{

 if($this->courses->check_syllabus_exist($_POST['course_id'],$_POST['syllabus_name'],$_POST['course_type'],true)){




  if(!empty($_FILES))

  {



    $allowed = array('pdf');

    $extension = pathinfo($_FILES['syllabus_pdf']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($extension), $allowed))

    {

     $data['inputerror'][] = 'syllabus_pdf';

     $data['error_string'][] = 'File extension should be pdf';

     $data['status'] = FALSE;

     echo json_encode($data);

     exit();



   }else

   {

    if ($_FILES["syllabus_pdf"]["error"] > 0) {

                            //$data =  json_encode(array('type'=>'error', 'msg'=>"Return Code: " . $_FILES["file"]["error"][$i])); 

      $data['inputerror'][] = 'syllabus_pdf';

      $data['error_string'][] = ''.$_FILES["syllabus_pdf"]["error"].'';

      $data['status'] = FALSE;

      echo json_encode($data);

      exit();

    } else {



      $name = explode(".", $_FILES['syllabus_pdf']['name']);

      $fileName = $name[0].time().'.'.$name[1];



      move_uploaded_file($_FILES["syllabus_pdf"]["tmp_name"],

        "uploads/syllabus/" . $fileName);





    }

  }            



}



$data = array('c_id'=>$_POST['course_id'],

 'sname'=>$_POST['syllabus_name'],

 'scontent'=>$_POST['syllabus_desc'],

 'spdf'=>$fileName,

 'ctype'=>$_POST['course_type'],

 'status'=>$_POST['status']

);

$this->courses->save_syllabusss($data);



echo json_encode(array('status'=>true));

}else

{

  echo json_encode(array('status'=>0));	

}

}



public function edit_syllabus($course_id,$s_id)

{



 $data['title'] = 'EDIT SYLLABUS';

 $data['mast_load'] =  'MLOAD';



 $data['course'] = $this->courses->view_single_course($course_id);

 $data['syllabus'] = $this->courses->view_single_syllabus($s_id);



 if(count($data['course']) > 0)

 {

  $this->load->master_template('Courses/editsyllabus', $data); 	

}else

{

  return redirect('courses');

}





}



public function update_syllabus()

{



  $fileName  =  $_POST['old_pdf'];



  if($this->courses->check_syllabus_exist($_POST['course_id'],$_POST['syllabus_name'],$_POST['course_type'],$_POST['s_id'])){



   if($_FILES['syllabus_pdf']['name'] !='')

   {   



    @unlink('uploads/syllabus/'.$fileName);



    $allowed = array('pdf');

    $extension = pathinfo($_FILES['syllabus_pdf']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($extension), $allowed))

    {

     $data['inputerror'][] = 'syllabus_pdf';

     $data['error_string'][] = 'File extension should be pdf';

     $data['status'] = FALSE;

     echo json_encode($data);

     exit();



   }else

   {



    if ($_FILES["syllabus_pdf"]["error"] > 0) {



      $data['inputerror'][] = 'syllabus_pdf';

      $data['error_string'][] = ''.$_FILES["syllabus_pdf"]["error"].'';

      $data['status'] = FALSE;

      echo json_encode($data);

      exit();

    } else {



      $name = explode(".", $_FILES['syllabus_pdf']['name']);

      $fileName = $name[0].time().'.'.$name[1];



      move_uploaded_file($_FILES["syllabus_pdf"]["tmp_name"],

        "uploads/syllabus/" . $fileName);





    }

  }            



}





$data = array('c_id'=>$_POST['course_id'],

 'sname'=>$_POST['syllabus_name'],

 'scontent'=>$_POST['syllabus_desc'],

 'spdf'=>$fileName,

 'ctype'=>$_POST['course_type'],

 's_id'=>$_POST['s_id'],

 'status'=>$_POST['status']

);



$this->courses->update_syllabusss($data);



echo json_encode(array('status'=>true));

}else

{

  echo json_encode(array('status'=>0));	

}

}





public function delete_syllabus($s_id)

{

 $this->courses->delete_syllabus($s_id);

 echo json_encode(array('status'=>true));

}

}



?>