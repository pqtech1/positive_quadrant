<?php 

  class Services_model extends  CI_model
  { 
  	

        public function getData()
	    {
	    	$query = $this->db->get('services');
	  
	    	 return $query->result_array();
	    }

	   	public function getServiceDetail($id)
	   	{

	   		$this->db->select('*');
	   		$this->db->from('service_page as sp');
	   		$this->db->join('services as s','s.s_id = sp.serv_type');
	   		$this->db->where('sp.status',1);
	   		$this->db->where('sp.ser_pg_id',$id);
	   	$data = $this->db->get()->result_array();

	   		return $data;
	   	}

	    public function insert_data($data)
	    {

           $insert = $this->db->insert('services', $data);

          return $insert;

	    }

	   
	    public function edit_data($id)
	    {
	    			$this->db->select('*');
	    			$this->db->from('services');
	    			$this->db->where('s_id',$id);
	    			$this->db->where('status',1);
	    	$query	=$this->db->get()->result_array();
	    	
		    return $query;

	    }




	    public function update_service($id, $data)
	    {
	    	$this->db->where('s_id', $id);

	    	$this->db->update('services', $data);

	    	return true;

	    }



	    public function delete_services($id)
	    {

	    	$this->db->where('s_id', $id);

	    	$this->db->delete('services');

	    	
	    	$this->db->where('serv_type', $id);
	    	$this->db->delete('service_page');
	    	return true;
	    }



	     public function insert_detail_data($data)
	    {

	    	    $insert = $this->db->insert('service_page', $data);

         
	    }


	     public function edit_detail_data($id)
	    {

	    	$this->db->select('*');

			$this->db->from('service_page');

			$this->db->where('s_id', $id);

			$query = $this->db->get();

		    return  $query->result_array();

	    }

	    public function update_detail_service($id, $data)
	    {
	    	$this->db->where('ser_pg_id', $id);

	    	$this->db->update('service_page', $data);

	    	return true;

	    }



	    public function delete_detail_services($id)
	    {

	    	$this->db->where('ser_pg_id', $id);

	    	$this->db->delete('service_page');

	    	return true;
	    }

	    public function getServiceDetailData($id)
	    {
	    	$this->db->where('serv_type',$id);
	    	return $this->db->get('service_page')->result_array();
	    }


}