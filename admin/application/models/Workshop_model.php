<?php
class Workshop_model extends CI_Model
        {



            public function insert_data($data)

            {

                $insert = $this->db->insert('workshop',$data);

                return $insert ? true : false;

            }


            public function viewall()
            {
                return $this->db->get('workshop')->result_array();
            }

            public function getdata($id)
            {
                $this->db->where('work_id',$id);

                return $this->db->get('workshop')->row_array();
            }

            public function update_workshop($cat_id,$data)
            {


                $this->db->where('work_id',$cat_id);
                $this->db->update('workshop',$data);


            }

             public function edit_data($id)
            {

                $this->db->select('*');

                $this->db->from('workshop');

                $this->db->where('work_id', $id);

                $query = $this->db->get();

                return  $query->result_array();

            }

            public function delete_workshop($id)
            {
                $this->db->where('work_id',$id);

                $this->db->delete('workshop');
            }


           
        
        }



    ?>