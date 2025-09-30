<?php 

  class About_model extends  CI_model
  { 
  	

        public function getData()
	    {
	    	$query = $this->db->get('about');

	    	 return $query->result_array();
	    }

	   
	    public function insert_data($data)
	    {

           $insert = $this->db->insert('about', $data);

          return $insert ? true:false;

	    }


	    public function edit_data($id)
	    {

	    	$this->db->select('*');

			$this->db->from('about');

			$this->db->where('about_id', $id);

			$query = $this->db->get();

		    return  $query->result_array();

	    }

	    public function update_about($id, $data)
	    {
	    	$this->db->where('about_id', $id);

	    	$this->db->update('about', $data);

	    	return true;

	    }

	    public function delete_about($id,$image_name)
	    {
	    	@unlink('uploads/about/'.$image_name);
	    	$this->db->where('about_id', $id);
	    	$this->db->delete('about');
	    	return true;
	    }




}