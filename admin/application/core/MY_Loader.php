<?php
class MY_Loader extends CI_Loader
{
	public function master_template($temp,$var=array())
	{
        $this->view('Loader/header',$var);
        $this->view($temp,$var);
        $this->view('Loader/footer',$var); 
	
	}
}
?>