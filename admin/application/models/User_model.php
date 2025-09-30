<?php 

class User_model extends CI_model
{

      public function insert_data($data)
      {

           $insert = $this->db->insert('users', $data);
        
      }

      public function username_exists($name)
      {

	      	$this->db->where('username', $name);

	      	 $query = $this->db->get('users');

	      	 if($query->num_rows() > 0)
	      	 {
	      	 	return TRUE;
	      	 }
	      	 else
	      	 {
	      	 	return FALSE;
	      	 }
        

      }

      public function get_user()
      {

         $this->db->select('*');

         $this->db->from('contactus');

          $query = $this->db->get();

          return $query->result_array();

      }
      
         public function career_user()
      {

         $this->db->select('*');

         $this->db->from('career');

          $query = $this->db->get();

          return $query->result_array();

      }

      public function edit_user($id)
      {

         $this->db->select('*');

         $this->db->from('users');

         $this->db->where('user_id', $id);

          $query = $this->db->get();

           return $query->result_array();

      }

      public function update_data($id, $data)
      {
        
         $this->db->where('user_id', $id);

         $this->db->update('users', $data);

      }

      public function name_exists($id, $name)
      {

          $this->db->where('user_id != ', $id);

          $this->db->where('username', $name);

           $query = $this->db->get('users');

            if( $query->num_rows() > 0)
            {
              return TRUE;
            }
            else
            {
              return FALSE;
            }

      }
      
      
       public function delete_user($id) {

        $this ->db-> where('id', $id);
       $this ->db -> delete('contactus');

       $row = $this->db->affected_rows();
         if ( $row > 0 ){
          return true;
         } 
         else
         {
          return false;
         }

      }
      
        public function career_user_delete($id) {

        $this ->db-> where('id', $id);
       $this ->db -> delete('career');

       $row = $this->db->affected_rows();
         if ( $row > 0 ){
          return true;
         } 
         else
         {
          return false;
         }

      }


























}