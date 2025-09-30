<?php 

class Category extends MY_controller
{

   public function __construct()
   {

   	  $this->checkdetails();

   }


   public function index()
   {


   	$data['title'] = 'Category Details';


   	$data['mast_load'] =  'MLOAD';

   	$data['view'] = $this->category->viewall();


   $this->load->master_template('Category/view_category', $data);	


   }


   public function add()
   {
   
     $abc = $this->input->post('cname');

     $ac = strtolower($abc);

     $b = str_replace(" ", "-", $ac);

     $main = $this->category->name_check($abc);


                    // print_r($main);exit;

      if($main > 0)
      {

        echo json_encode(array('status'=> 'false'));

      }
      else
      {
                 $data = array( 'cat_name' => $abc,
                               'cat_slug' => $b,
                                'status' => $this->input->post('cat_status')
                                 );

          $insert = $this->category->adddata($data);


          echo json_encode(array('status'=>'true'));


      }

      // $data = array(
      //               'cat_name' => $abc,
      //              'cat_slug' => $b."-".$main,
      //              'status' => $this->input->post('cat_status')
      //              );
    



    //  if( $main > 0 )
    //  {

    //    $slug = $this->category->addslug($b);


    //    $mar = str_replace("-", " ", $slug[0]->c);  


    //    $var = $mar+1;
    //              // print_r($mar);

    //    if(!is_numeric($mar))
    //    {

    //     $data = array(
    //      'cat_name' => $abc,
    //      'cat_slug' => $b."-".$main,
    //      'status' => $this->input->post('cat_status')
    //    );

    //                     // print_r($data);


    //   }
    //   else
    //   {

    //     $data = array(
    //      'cat_name' => $abc,
    //      'cat_slug' => $b."-".$var,
    //      'status' => $this->input->post('cat_status')
    //    );

    //                     // print_r($data); 
    //   }
    // }
    // else
    // {
    //                                      // echo json_encode($slug);

    //   $data = array(
    //      'cat_name' => $abc,
    //      'cat_slug' => $b,
    //      'status' => $this->input->post('cat_status')
    //    );
    //                    // print_r($data);

    // }

   }


   public function viewsingle($id)
   {
   		$data = $this->category->getdata($id);

   		echo json_encode($data);
   }


   public function edit()
   {

       $cat_id = $this->input->post('ecat_id');
      
       $abc = $this->input->post('ename');

       $ac = strtolower($abc);

       $b = str_replace(' ', '-', $ac) ;


       $main = $this->category->check_cat($cat_id, $abc);


                    // print_r($main);exit;

      if($main > 0)
      {

         echo json_encode(array('status'=> 'false'));

      }
      else
      {

                 $data = array( 'cat_name' => $abc,
                               'cat_slug' => $b,
                                'status' => $this->input->post('ecat_status')
                                 );

                 $update = $this->category->edit_data($data, $cat_id);

 
                  echo json_encode(array('status'=>'true'));

      }

       // $check_name = $this->category->check_name($cat_id,$abc);

       // if($check_name == 1)
       // {


       //    $data = array(
       //      'status' => $this->input->post('ecat_status')
       //    );

       //    $this->category->edit_data($data,$cat_id);
       //    echo json_encode(array('status'=>true)); 

       // }else
       // {
        
       //  $ac = strtolower($abc);

       //  $b = str_replace(" ", "-", $ac);

       //  $main = $this->category->check_name($cat_id,$abc);


                    // print_r($main);exit;

      //   if( $main > 0 )
      //   {

      //    $slug = $this->category->addslug($b,$cat_id);


      //    $mar = str_replace("-", " ", $slug[0]->c);  


      //    $var = $mar+1;
      //            // print_r($mar);

      //    if(!is_numeric($mar))
      //    {

      //     $data = array(
      //      'cat_name' => $abc,
      //      'cat_slug' => $b."-".$main,
      //      'status' => $this->input->post('ecat_status')
      //    );

      //                   // print_r($data);


      //   }
      //   else
      //   {

      //     $data = array(
      //      'cat_name' => $abc,
      //      'cat_slug' => $b."-".$var,
      //      'status' => $this->input->post('ecat_status')
      //    );

      //                   // print_r($data); 
      //   }
      // }
      // else
      // {
      //                                    // echo json_encode($slug);

      //   $data = array(
      //    'cat_name' => $abc,
      //    'cat_slug' => $b,
      //    'status' => $this->input->post('ecat_status')
      //  );
      //                  // print_r($data);

      // }
      // print_r($data);


      // $this->category->edit_data($data,$cat_id);
      // echo json_encode(array('status'=>true)); 
      
       

       
   		

   }

   public function delete_data($id)
   {
   		$data = $this->category->delete_data($id);

   		echo json_encode($data);
   }

}