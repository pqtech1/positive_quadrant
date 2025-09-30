<?php 

class College_model extends CI_model
{

      public function get_user()
      {
          echo "sdsf"; die;
         $this->db->select('*');
         $this->db->from('college');
         $query = $this->db->get();
         return $query->result_array();
      }
      
}