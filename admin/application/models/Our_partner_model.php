<?php
class Our_partner_model extends CI_Model
{
            public function insert_data($data)

            {

                $insert = $this->db->insert('our_partner',$data);

                return $insert ? true : false;

            }


            public function viewall()
            {
                return $this->db->get('our_partner')->result_array();
            }

            public function getdata($id)
            {
                $this->db->where('partner_id',$id);

                return $this->db->get('our_partner')->row_array();
            }

            public function update_partner($cat_id,$data)
            {


                $this->db->where('partner_id',$cat_id);
                $this->db->update('our_partner',$data);


            }

             public function edit_data($id)
            {

                $this->db->select('*');

                $this->db->from('our_partner');

                $this->db->where('partner_id', $id);

                $query = $this->db->get();

                return  $query->result_array();

            }

            public function delete_partner($id)
            {
                $this->db->where('partner_id',$id);

                $this->db->delete('our_partner');
            }


           
}
?>