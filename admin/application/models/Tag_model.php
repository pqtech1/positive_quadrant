<?php 

class Tag_model extends CI_model
{

      public function get_data()
      {

            $this->db->select('*');
 
            $this->db->from('tags');

            $query = $this->db->get();

            return $query->result_array();


       }

       public function insert_tag($data)
       {

            $add = $this->db->insert('tags', $data);

            return $add?true:false;
       }

       public function makeslug($name)
       {
           $this->db->where('tag_name', $name);

            return $this->db->count_all_results('tags');
    

       }

       public function addslug($slug)
       {

          $query = $this->db->query("SELECT (Select RIGHT(tag_slug ,2)) as c FROM tags WHERE tag_slug = '$slug' OR tag_slug LIKE '%$slug%' order by tag_slug desc limit 1 ");

          return $result = $query->result();

       }

       public function get_tag($id)
       {
	         $this->db->select('*');

	         $this->db->from('tags');

	         $this->db->where('tag_id', $id);

	          $query = $this->db->get();

	          return $query->result_array();

       }

       public function check_name($name, $id)
       {

          $this->db->where('tag_name', $name);

       	  $this->db->where('tag_id', $id);

          return $this->db->count_all_results('tags');

       }

       public function count_tag($name)
       {

	        $this->db->where('tag_name', $name);

	        return $this->db->count_all_results('tags');

       }

       public function update_data($id, $data)
       {

	       	$this->db->where('tag_id', $id);

	       	$this->db->update('tags', $data);

       }

       public function delete_data($id)
       {

	       	$this->db->where('tag_id', $id);

	       	$this->db->delete('tags');


       }


}