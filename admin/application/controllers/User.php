<?php

class User extends MY_Controller
{



		public function __construct()
		{

			$this->checkdetails();

		}


		public function index()
		{

			$this->load->library('encrypt');

			$data['title'] = 'User Details';

			$data['mast_load'] = 'MLOAD';

	
			 $data['user'] = $this->user->get_user();

			$this->load->master_template('User/showuser',$data);

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
		
		public function career_user_delete(){
		    
		    $id = $this->input->post('id');

			$res = $this->user->career_user_delete($id);

			if ($res == 1 ){
				echo "success";
			}
			else {
				echo "unsuccess";
			}
		    
		}

		



		}


?>