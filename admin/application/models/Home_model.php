<?php 

class Home_model extends CI_model
{


  public function getData()
  {
     return  $query = $this->db->get('home')->result_array();

  }

   public function insert_data($data)
   {

     	$this->db->insert('home', $data);

   }

    public function getHome($id)
   {

	    	 $query = $this->db->query('select * from home where home_id =' .$id);

	    	  $test = $query->result_array();

	    	  return $test;

    }

    public function update_home($id, $data)
     {

          $this->db->where('home_id', $id);

          $this->db->update('home', $data);

          return true;

    }

    public function delete_home($id)
    {

	        	$this->db->where('home_id', $id);

             $this->db->delete('home');

             return true;

    }
















} 