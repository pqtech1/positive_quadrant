<?php
class Invoice extends MY_Controller
{
    public function __construct()
	{
		
		$this->checkdetails();
	}

	public function index()
	{
	        $this->load->library('encrypt');

			$data['title'] = 'Manage Invoices';
   
			$data['mast_load'] = 'MLOAD';
			$data['user'] = $this->user->get_user();

			$this->load->master_template('invoice/view_invoice',$data);

	}
	
	
	public function add_invoice(){
	      $this->load->library('encrypt');

			$data['title'] = 'Manage Invoices';
   
			$data['mast_load'] = 'MLOAD';
			$data['user'] = $this->user->get_user();

			$this->load->master_template('invoice/add_invoice',$data);
	}
	
	public function genr_pdf(){
	    
	    echo "Scsdfsd"; die;
	    
	    	$this->load->master_template('invoice/genr_pdf');
	}
    
}
?>