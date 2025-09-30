<?php
class Dashboard extends MY_Controller
{
    public function __construct()
	{
		$this->checkdetails();		
	}
    
    public function index()
    {
        
        
        $data['title'] = 'Dashboard';
        $data['mast_load'] = 'MLOAD';        
        $data['message'] = '';
       
//         print_r($_SESSION['user'][0]['admin_name']);exit;
        $this->load->master_template('Dashboard/dashboard',$data);
    }

    // today order details

   


}
?>