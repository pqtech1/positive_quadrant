<?php
class MY_Controller extends CI_Controller
{   
   
    public function checkdetails()
    {
        ob_start();
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

   	    if(!$this->session->userdata('is_logged_in'))
   		{            
            return redirect('Login');            
   		}
   		$output = ob_get_clean();
    }
	public function pagInation($table,$id,$controller,$per_page,$searchBy='',$searchValue='',$order='',$order_by='',$from='',$to='',$s=''){
	   // PAGINATION
         // print_r($s);exit;
        
        $config = array();

        $config['suffix']='?'.$_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . $controller."/index";

        $total_row = $this->my->getCount($table, $searchBy, $searchValue,$from,$to,$s);
        // print_r($total_row);exit;
        $config["first_url"] = base_url().$controller."/index".'?'.$_SERVER['QUERY_STRING'];

        $config["total_rows"] = $total_row;

        $config["per_page"] = $per_page;

        $config["uri_segment"] = $this->uri->total_segments();

        $config['use_page_numbers'] = TRUE;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a>';

        $config['full_tag_open'] = "<ul class='pagination'>";

        $config['full_tag_close'] ="</ul>";

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = "<li>";

        $config['next_tagl_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";

        $config['prev_tagl_close'] = "</li>";

        $config['first_link'] = 'First';

        $config['first_tag_open'] = "<li>";

        $config['first_tagl_close'] = "</li>";

        $config['last_link'] = 'Last';

        $config['last_tag_open'] = "<li>";

        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);



        if($this->uri->segment(2)){

          $cur_page = $id;
          // print_r($cur_page);exit;
          $pagi = array("cur_page"=>($cur_page-1)*$per_page, "per_page"=>$per_page, 'order'=>$order, 'order_by'=>$order_by);


        }

        else{ 

        $pagi = array("cur_page"=>0, "per_page"=>$per_page);
        //print_r($pegi);exit;

      }



         $data["pagi"] = $pagi;

        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        return  $data;

        // ./ PAGINATION /.
	}
//    public function adddata($model_name,$model_function_name,$multiple_data)
//    {
//        $this->$model_name->$model_function_name($multiple_data);
//    }
//    
//    public function viewall_data($model_name,$model_function_name)
//    {
//        return $this->$model_name->$model_function_name();
//    }
//    
//    public function delete_data($model_name,$model_function_name,$id)
//    {
//        return $this->$model_name->$model_function_name($id);
//    }
//    public function edit_data($model_name,$model_function_name,$multiple_data,$id)
//    {
//         $this->$model_name->$model_function_name($id,$multiple_data);
//    }
}
?>