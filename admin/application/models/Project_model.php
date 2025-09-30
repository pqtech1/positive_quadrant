<?php 
class project_model extends CI_model
{





  public function getData()

  {

     return  $query = $this->db->get('project')->result_array();



  }



   public function insert_data($data)

   {



     	$this->db->insert('project', $data);



   }



    public function getHome($id)

   {



	    	 $query = $this->db->query('select * from project where project_id =' .$id);



	    	  $test = $query->result_array();



	    	  return $test;



    }



    public function update_home($id, $data)

     {



          $this->db->where('project_id', $id);



          $this->db->update('project', $data);



          return true;



    }



    public function delete_home($id)

    {



	        	$this->db->where('project_id', $id);



             $this->db->delete('project');



             return true;



    }

} ?>