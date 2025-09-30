<?php 

class Director_model extends CI_model
{


   
	    public function insert_dir($data)
	    {
          
          $insert = $this->db->insert('director', $data);

          return $insert?true:false;

	    }

	    public function getDirect()
	    {
	    			// $this->db->order_by('direct_id','desc');
           $query = $this->db->query('select * from director order by direct_id desc');

            $result = $query->result_array();

            return $result;
	    }

            public function getDirector($id)
            {

                 $query = $this->db->query('select * from director where direct_id =' .$id);

                  $test = $query->result_array();

                  return $test;

            }

	    public function update_direct($id, $data)
	    {

          $this->db->where('direct_id', $id);

          $this->db->update('director', $data);

          return true;

	    }

	    public function delete_direct($id)
	    {

	    	$this->db->where('direct_id', $id);

             $this->db->delete('director');

             return true;

	    }

         public function makeslug($name)
         {

             $this->db->where('direct_title', $name);

             return $this->db->count_all_results('director');


         }



	    public function checkslug($slug)
	    {
	    	
	        $this->db->like('direct_slug', $slug);

	    	return $this->db->count_all_results('director'); 

	    }


	    public function addslug($slug)
	    {

	    	$query = $this->db->query("SELECT (Select RIGHT(direct_slug ,2)) as c FROM director WHERE direct_slug = '$slug' OR direct_slug LIKE '%$slug%' order by direct_slug desc limit 1");

	    	return $result = $query->result();

	    }

	    public function slug_updat($slug, $id)
	    {

	    // 	// $query = $this->db->query("select * from director where direct_id != $id and direct_slug = '$slug'");

	    	// $this->db->where('direct_id != ', $id);

	    	$this->db->like('direct_slug', $slug);

	    	return $this->db->count_all_results('director');


	    }

         public function edit_slug($slug)
         {

         	$query = $this->db->query("SELECT (Select RIGHT(direct_slug ,2)) as c FROM director WHERE direct_slug = '$slug' OR direct_slug LIKE '%$slug%' order by direct_slug desc limit 1");

	    	return $result = $query->result();

         }


	    public function get_slug($name, $id)
	    {
	    	$this->db->where('direct_id', $id);

           $this->db->where('direct_title', $name);

           return $this->db->count_all_results('director');


	    }


}