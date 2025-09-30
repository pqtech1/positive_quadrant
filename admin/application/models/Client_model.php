    <?php



        class Client_model extends CI_Model

        {



            public function insert_data($data)

            {

                $insert = $this->db->insert('client',$data);

                return $insert ? true : false;

            }


            public function viewall()
            {
                return $this->db->get('client')->result_array();
            }

            public function getdata($id)
            {
                $this->db->where('id',$id);

                return $this->db->get('client')->row_array();
            }

            public function update_client($cat_id,$data)
            {


                $this->db->where('id',$cat_id);
                $this->db->update('client',$data);


            }

             public function edit_data($id)
            {

                $this->db->select('*');

                $this->db->from('client');

                $this->db->where('id', $id);

                $query = $this->db->get();

                return  $query->result_array();

            }

            public function delete_client($id)
            {
                $this->db->where('id',$id);

                $this->db->delete('client');
            }


           
        
        }



    ?>