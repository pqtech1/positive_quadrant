<?php
class Home_model extends CI_model
{

    public function home()
    {


        $this->db->where('status', 1);
        $d = $this->db->get('home')->result_array();
        return $d;
    }

    public function get_column_data($table, $columns = '*')
    {
        $this->db->select($columns);
        $query = $this->db->get($table);

        // Return result as an array or an empty array if no rows found
        return $query->result_array() ?: [];
    }



    // In your model (e.g., Home_model.php)
    public function get_categories_with_tech_names()
    {

        $this->db->select('hire_category.cat_name, hire_details.tech_name, hire_details.id,hire_details.slug_url');
        $this->db->from('hire_category');
        $this->db->join('hire_details', 'hire_category.hire_cat_id = hire_details.hire_cat_id');
        $query = $this->db->get();

        // Group the results by category name and store both tech names and their ids
        $categories = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                // Group by category name (hire_cat_id) and store an array of tech_name and id under each category
                $categories[$row['cat_name']][] = [
                    'tech_name' => $row['tech_name'],
                    'id' => $row['id'],
                    'slug_url' => $row['slug_url']

                ];
            }
        }

        return $categories;
    }



    // home_model.php

    public function get_tech_details($tech_name)
    {
        $this->db->select('*');
        $this->db->from('hire_details');
        $this->db->where('tech_name', $tech_name); // Fetch details based on the tech_name
        $query = $this->db->get();

        // Return the result or an empty array if no rows found
        return $query->row_array() ?: [];
    }




    public function get_tech_details_by_id($id)
    {
        // Fetching the details from the hire_details table based on id
        $this->db->select('*');
        $this->db->from('hire_details');
        $this->db->where('id', $id);  // Only filter by id
        $query = $this->db->get();

        // Check if any results found
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Returning the first row of the result
        }

        return null; // If no result found, return null
    }


    public function get_tech_id_by_slug($slug_url)
    {
        $this->db->select('id');
        $this->db->from('hire_details');
        $this->db->where('slug_url', $slug_url); // Use slug_url to filter
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['id']; // Return the ID corresponding to the slug_url
        }

        return null; // Return null if no match found
    }


    public function get_all_tech_names()
    {
        // Select tech_id and tech_name from hire_tech_name table
        $this->db->select('tech_id, tech_name');
        $this->db->from('hire_tech_name');
        $query = $this->db->get();

        // Check if there are any results and return them as an array
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return array of results
        }

        return []; // Return an empty array if no data found
    }

    public function get_tech_values_by_hire_id($hire_id)
    {
        $this->db->select('tech_id, tech_values');
        $this->db->from('hire_tech_expertise');
        $this->db->where('hire_id', $hire_id);
        $query = $this->db->get();

        // Organize tech_values by tech_id
        $tech_values = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $tech_values[$row['tech_id']] = json_decode($row['tech_values']); // Decode JSON values
            }
        }

        return $tech_values;
    }

    public function get_tech_details_with_values_by_hire_id($hire_id)
    {
        $this->db->select('hire_tech_name.tech_id, hire_tech_name.tech_name, hire_tech_expertise.tech_values');
        $this->db->from('hire_tech_expertise');
        $this->db->join('hire_tech_name', 'hire_tech_name.tech_id = hire_tech_expertise.tech_id');
        $this->db->where('hire_tech_expertise.hire_id', $hire_id);
        $query = $this->db->get();

        // Prepare result with tech_id, tech_name, and tech_values as decoded JSON
        $tech_details = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $tech_details[] = [
                    'tech_id' => $row['tech_id'],
                    'tech_name' => $row['tech_name'],
                    'tech_values' => json_decode($row['tech_values']), // Decode JSON values
                ];
            }
        }

        return $tech_details;
    }










    public function contactus_data($data)
    {
        $this->db->insert('contactus', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function insertEnquiry()
    {
        $data = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "service" => $_POST['service'],
            "message" => $_POST['message']
        );
        $this->db->insert('enquiry', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function career_data($data = array())
    {
        date_default_timezone_set('Asia/Kolkata');
        if (!array_key_exists("created", $data)) {
            $data['created'] = date("y-m-d H:i:s");
        }
        if (!array_key_exists("modified", $data)) {
            $data['modified'] = date("y-m-d H:i:s");
        }
        $this->db->insert('career', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function project()
    {
        $this->db->where('status', 1);
        $this->db->order_by("project_id", "asc");
        return $this->db->get('project')->result_array();
    }


    public function about()
    {
        $this->db->where('status', 1);
        return $this->db->get('about')->result_array();

    }

    public function about_home()
    {
        $this->db->where('status', 1);
        $this->db->limit(1);
        return $this->db->get('about')->result_array();
    }


    public function view_syllabus($course_id)
    {

        $this->db->select('course.*,syllabus.*,ub.*');
        $this->db->from('upcoming_batches as ub');
        $this->db->join('course', 'course.c_id = ub.c_id');
        $this->db->join('syllabus', 'syllabus.s_id = ub.s_id');
        $this->db->where('syllabus.status', 1);
        if ($course_id != null) {
            $this->db->where('ub.c_id', $course_id);
        }
        $this->db->where('ub.b_status', 1);
        return $this->db->get()->result_array();
    }

    public function getWeekendName($w1, $w2)
    {

        $this->db->where('w_id', $w1);
        $week1 = $this->db->get('weeks')->row_array();

        if ($w2 != 0) {
            $this->db->where('w_id', $w2);
            $week2 = $this->db->get('weeks')->row_array();

        } else {
            $week2['wname'] = '';
        }

        $d = ($week2['wname'] != '') ? ' To ' . $week2['wname'] : '';
        return $week1['wname'] . $d;
    }
    public function client($limit)
    {
        if ($limit == 0) {
            $this->db->where('status', 1);
            return $this->db->get('client')->result_array();
        } else {
            $this->db->where('status', 1);
            $this->db->limit($limit);
            return $this->db->get('client')->result_array();
        }

    }


    public function workshop()
    {
        $this->db->where('status', 1);
        return $this->db->get('workshop')->result_array();

    }


    public function development()
    {
        $this->db->where('status', 1);
        $this->db->where('serv_type', 1);
        return $this->db->get('service_page')->result_array();
    }

    public function consultancy()
    {
        $this->db->where('status', 1);
        $this->db->where('serv_type', 2);
        return $this->db->get('service_page')->result_array();
    }

    public function training()
    {
        return $this->db->select('*')->from('course')->get()->result_array();
        // $data['job_openings'] = $this->db->select('*')->from('job_openings')->get()->result_array();

    }

    public function partners()
    {
        $this->db->where('status', 1);
        return $this->db->get('our_partner')->result_array();
    }

    public function get_team_members()
    {
        $this->db->where('is_active', 1);
        return $this->db->get('team_members')->result_array();
    }

    public function viewSyllabusByCourse($course_id)
    {
        $this->db->select('course.*,sb.*');
        $this->db->from('syllabus as sb');
        $this->db->join('course ', 'course.c_id = sb.c_id');
        $this->db->where('sb.c_id ', $course_id);
        $this->db->where('sb.status', 1);
        return $this->db->get()->result_array();
    }

    public function VenueDetails($b_id)
    {
        $this->db->select('b_venue');
        $this->db->where('b_id', $b_id);
        return $this->db->get('upcoming_batches')->row_array();
    }

    public function portfolio()
    {
        $this->db->where('status', 1);
        return $this->db->get('our_portfolio')->result_array();
    }


    // project and portfolios

    // Get all industries
    public function get_all_industries()
    {
        return $this->db->where('status', 1)
            ->get('industries_serve')
            ->result();
    }
    // Get all projects
    // Get all active projects
    public function get_all_projects()
    {
        return $this->db->where('status', 'active')
            ->get('project_portfolios')
            ->result();
    }

    // Get active projects by industry
    public function get_projects_by_industry($industry_id)
    {
        return $this->db->where('industry_id', $industry_id)
            ->where('status', 'active')   // <-- add this
            ->get('project_portfolios')
            ->result();
    }

    // Get images for project (no change needed)
    public function get_images_by_project($project_id)
    {
        return $this->db->where('project_id', $project_id)
            ->get('project_images')
            ->result();
    }

    // Get all active projects with industry name
    public function get_all_projects_with_industry()
    {
        $this->db->select('project_portfolios.*, industries_serve.name as industry_name');
        $this->db->from('project_portfolios');
        $this->db->join('industries_serve', 'project_portfolios.industry_id = industries_serve.id', 'left');
        $this->db->where('project_portfolios.status', 'active');   // <-- add this
        return $this->db->get()->result();
    }

    // Get active projects by industry with industry name
    public function get_projects_by_industry_with_name($industry_id)
    {
        $this->db->select('project_portfolios.*, industries_serve.name as industry_name');
        $this->db->from('project_portfolios');
        $this->db->join('industries_serve', 'project_portfolios.industry_id = industries_serve.id', 'left');
        $this->db->where('project_portfolios.industry_id', $industry_id);
        $this->db->where('project_portfolios.status', 'active');   // <-- add this
        return $this->db->get()->result();
    }


}


?>