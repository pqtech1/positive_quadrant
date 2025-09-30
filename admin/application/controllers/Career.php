<?php

class Career extends MY_Controller
{



		public function __construct()
		{

			$this->checkdetails();

		}


		public function index()
		{
		     $this->load->library('encrypt');

			 $data['title'] = 'Career Enquiry Details';

		     $data['mast_load'] = 'MLOAD';

			$data['user'] = $this->user->career_user();
		
			$this->load->master_template('User/career',$data);

		}
		
		public function delete_user(){

			$id = $this->input->post('id');

			$res = $this->user->delete_user($id);

			if ($res == 1 ){
				echo "success";
			}
			else {
				echo "unsuccess";
			}

		}

	
		}


?>