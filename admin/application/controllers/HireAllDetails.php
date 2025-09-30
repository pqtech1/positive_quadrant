<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HireAllDetails extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
        $this->load->helper(array('form', 'url')); // Load necessary helpers
    }

    public function index($id)
    {
        $data = []; // Initialize the data array

        // Set page title
        $data['title'] = 'Hire';

        // Fetch details from hire_details using the primary key column `id`
        $hireDetailsQuery = $this->db->get_where('hire_details', array('id' => $id));
        $hireDetails = $hireDetailsQuery->row_array(); // Get a single row as an associative array

        if ($hireDetails) {
            // Add hire_details data to the $data array
            $data['hire_details'] = $hireDetails;

            // Fetch hire_cat_id and get cat_name from hire_category
            $hireCatId = $hireDetails['hire_cat_id'];

            // Fetch category details from hire_category using hire_cat_id
            $categoryQuery = $this->db->get_where('hire_category', array('hire_cat_id' => $hireCatId));
            $categoryDetails = $categoryQuery->row_array();
            $data['category_name'] = $categoryDetails['cat_name'] ?? 'N/A';

            // Fetch tech expertise from hire_tech_expertise using the `hire_id`
            $techExpertiseQuery = $this->db->get_where('hire_tech_expertise', array('hire_id' => $id));
            $techExpertise = $techExpertiseQuery->result_array();

            // Prepare tech details and store all tech_id and tech_value
            $data['tech_details'] = [];
            // $data['tech_expertise'] = []; // To store all tech_id and respective tech_values
            foreach ($techExpertise as $tech) {
                // Fetch tech_name from hire_tech_name using tech_id
                $techNameQuery = $this->db->get_where('hire_tech_name', array('tech_id' => $tech['tech_id']));
                $techNameDetails = $techNameQuery->row_array();

                // Add to tech_details
                $data['tech_details'][] = [
                    'tech_id' => $tech['tech_values'],
                    'tech_name' => $techNameDetails['tech_name'] ?? 'N/A',
                ];

                // Add to tech_expertise (tech_id and tech_value)
                // $data['tech_expertise'][] = [
                //     'tech_id' => $tech['tech_id'],
                //     'tech_value' => $tech['tech_values'],
                // ];
            }
        } else {
            // Handle case when no data is found
            $data['hire_details'] = [];
            $data['category_name'] = 'N/A';
            $data['tech_details'] = [];
            $data['tech_expertise'] = [];
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;

        // Pass all the collected data to the view
        $this->load->view('Hire/hire_module_all_details', $data);
    }
}
