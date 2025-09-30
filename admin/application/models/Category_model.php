    <?php



        class Category_model extends CI_Model

        {



            public function adddata($data)

            {

                $insert = $this->db->insert('category',$data);

                return $insert ? true : false;

            }


            public function viewall()
            {
                return $this->db->get('category')->result_array();
            }

            public function getdata($id)
            {
                $this->db->where('cat_id',$id);

                return $this->db->get('category')->row_array();
            }

            public function addslug($slug)
            {

                $query = $this->db->query("SELECT (Select RIGHT(cat_slug ,2)) as c FROM category WHERE cat_slug = '$slug' OR cat_slug LIKE '%$slug%' order by cat_slug desc limit 1");

                return $result = $query->result();

            }

            public function editslug($slug,$cat_id)
            {

                $query = $this->db->query("SELECT (Select RIGHT(cat_slug ,2)) as c FROM category WHERE cat_slug = '$slug' and cat_id = '$cat_id' OR cat_slug LIKE '%$slug%' order by cat_slug desc limit 1");

                return $result = $query->result();

            }

            public function check_name($cat_id,$cat_name)
            {
                $this->db->where('cat_id',$cat_id);

                $this->db->where('cat_name',$cat_name);

                $cat_data = $this->db->get('category')->result_array();

                if(count($cat_data) > 0)
                {
                    return 1;
                }else
                {
                    return 0;
                }

                // return $this->db->count_all_results('category');
            }

            public function name_check($cat_name)
            {
                $this->db->where('cat_name',$cat_name);

                $cat_data = $this->db->get('category')->result_array();

                if(count($cat_data) > 0)
                {
                    return 1;
                }else
                {
                    return 0;
                }
            }

            // public function slug_check($data)
            // {
            //     // $this->db->query("SELECT * FROM category WHERE cat_id != ". $data['cat_id'] and "cat_slug = " . $data['cat_slug']);

            //     $this->db->where('cat_slug',$data['cat_slug']);
            //     $this->db->where_not_in('cat_id',$data['cat_id']);

            //     $cat_data = $this->db->get('category')->result_array();

            //     if(count($cat_data) > 0)
            //     {
            //         return 1;
            //     }else
            //     {
            //         return 0;
            //     }

            //     // return $this->db->count_all_results('category');
            // }

            public function edit_data($data,$cat_id)
            {


                $this->db->where('cat_id',$cat_id);
                $this->db->update('category',$data);


            }

            public function delete_data($id)
            {
                $this->db->where('cat_id',$id);

                $this->db->delete('category');
            }


            public function check_cat($id, $cat)
            {
                $this->db->where('cat_id !=', $id);

                $this->db->where('cat_name', $cat);

                return $this->db->count_all_results('category');


            }

        }



    ?>