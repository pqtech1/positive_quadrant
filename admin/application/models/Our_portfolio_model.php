<?php
class Our_portfolio_model extends CI_Model
{
            public function insert_data($data)

            {

                $insert = $this->db->insert('our_portfolio',$data);

                return $insert ? true : false;

            }


            public function viewall()
            {           
                return $this->db->get('our_portfolio')->result_array();
            }

            public function getdata($id)
            {
                $this->db->where('portfolio_id',$id);

                return $this->db->get('our_portfolio')->row_array();
            }

            public function update_partner($cat_id,$data)
            {


                $this->db->where('portfolio_id',$cat_id);
                $this->db->update('our_portfolio',$data);


            }

             public function edit_data($id)
            {

                $this->db->select('*');

                $this->db->from('our_portfolio');

                $this->db->where('portfolio_id', $id);

                $query = $this->db->get();

                return  $query->result_array();

            }

            public function delete_portfolio($id)
            {
                $this->db->where('portfolio_id',$id);

                $this->db->delete('our_portfolio');
            }


           
}
?>