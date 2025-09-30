<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tech_Expertise extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tech_Expertise_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('user_agent');
    }
    public function index($id)
    {

        if ($id && is_numeric($id)) {
            $data['id'] = $id;
            // Fetch specific hire details based on ID
            $data['hire_details'] = $this->Tech_Expertise_model->get_hire_details($id);
        } else {
            $data['id'] = null;
            // Fetch all hire details if no specific ID is provided
            $data['hire_details'] = $this->Tech_Expertise_model->get_hire_details();
        }
        // Fetch tech names from the `hire_tech_name` table
        $data['tech_names'] = $this->Tech_Expertise_model->get_tech_names();


        // echo "SDfdgfd111";
        // die;

        $data['title'] = 'Hire';
        $data['mast_load'] = 'ALOAD';
        // $data['fetch_data'] = $this->fetchDatafromDatabase($data['id']);
        // echo '<pre>';
        // print_r($data['id']);
        // echo '</pre>';
        // die;

        $this->load->master_template('Hire/tech_expertise', $data);
    }

    public function create()
    {
        $tech_id = $this->input->post('tech_id');
        $id = $this->input->post('id');
        $tech_expertise = $this->input->post('tech_expertise');

        if (empty($tech_expertise)) {
            echo json_encode(['status' => 'error', 'message' => 'Tech expertise values cannot be empty.']);
            return;
        }

        // Check if the same tech_id already exists for the given hire_id
        $existing_entry = $this->Tech_Expertise_model->check_duplicate($id, $tech_id);

        if ($existing_entry) {
            echo json_encode(['status' => 'error', 'message' => 'This Tech Category already exists for this ID. Please choose a different category.']);
            return;
        }

        // Convert tech_expertise array to JSON
        $tech_values_json = json_encode($tech_expertise);

        $data = [
            'hire_id' => $id,
            'tech_id' => $tech_id,
            'tech_values' => $tech_values_json
        ];

        $inserted = $this->Tech_Expertise_model->insert_tech_expertise($data);

        if ($inserted) {
            echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'There was an error inserting the data. Please try again.']);
        }
    }



    public function fetchDatafromDatabase($id)
    {


        // Ensure that $id is provided and is valid
        if ($id) {
            // Fetch all records from the hire_tech_expertise table where hire_id matches the provided $id
            $this->db->select('*');
            $this->db->from('hire_tech_expertise');
            $this->db->where('hire_id', $id);
            $this->db->order_by('exp_id', 'DESC');
            $resultList = $this->db->get()->result_array(); // Fetch results as an associative array
        } else {
            // Handle the case where $id is not valid
            $resultList = array();  // No data if $id is not provided
        }

        // echo '<pre>';
        // print_r($resultList);
        // echo '</pre>';
        // die;





        // Initialize the result array
        $result = array();
        $i = 1;

        // Check if records were found
        if ($resultList) {
            foreach ($resultList as $key => $value) {
                // Fetch tech_name from hire_tech_name table using tech_id
                $this->db->select('tech_name');
                $this->db->from('hire_tech_name');
                $this->db->where('tech_id', $value['tech_id']);
                $techNameQuery = $this->db->get()->row_array(); // Fetch the result as an array
                $techName = $techNameQuery ? $techNameQuery['tech_name'] : 'N/A';

                // Fetch tech_name from hire_details table using hire_id
                $this->db->select('tech_name');
                $this->db->from('hire_details');
                $this->db->where('id', $id);
                $hireNameQuery = $this->db->get()->row_array(); // Fetch the result as an array

                // echo '<pre>';
                // print_r($hireNameQuery);
                // echo '</pre>';
                // die;
                $hireName = $hireNameQuery ? $hireNameQuery['tech_name'] : 'N/A';

                // Decode the JSON string of tech_values into an array
                $techValues = json_decode($value['tech_values'], true);

                // Prepare the buttons for edit and delete actions
                $button = ''; // Reset the button variable       
                $button .= '<a class="btn-sm btn-success text-light" href="' . base_url('Tech_Expertise/edit/' . $value['exp_id']) . '"> <i class="fas fa-edit"></i></a>';
                $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['exp_id'] . ')" href="#"> <i class="fas fa-trash"></i></a>';

                // Build the row for each record
                $result['data'][] = array(
                    $i++,          // S No.
                    $hireName,     // Tech Name
                    $techName,     // Tech Expertise Name
                    json_encode($techValues), // Tech Expertise Values
                    $button        // Action
                );
            }
        }






        echo json_encode($result);

    }




    // UPDATE: Update an existing hire detail
    public function edit($exp_id)
    {
        $data['title'] = 'Hire';
        $data['mast_load'] = 'ALOAD';

        // Fetch the current tech expertise data based on exp_id
        $this->db->select('*');
        $this->db->from('hire_tech_expertise');
        $this->db->where('exp_id', $exp_id);
        $data['tech'] = $this->db->get()->row();

        if (!$data['tech']) {
            // If no record is found, redirect to index
            redirect('Tech_Expertise/index');
        }



        // Decode tech_values only once here for display in the edit form
        $data['tech']->tech_values = json_decode($data['tech']->tech_values, true);


        $this->db->select('tech_id, tech_name'); // Assuming 'id' is tech_id and 'name' is tech_name
        $this->db->from('hire_tech_name');
        $data['tech_names'] = $this->db->get()->result();


        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;

        // Load the edit view with data without setting flashdata
        $this->load->master_template('Hire/tech_expertise_edit', $data);
    }

    // Method to update the tech expertise record based on exp_id
    public function updateTechExpertise()
    {
        $exp_id = $this->input->post('exp_id');
        $tech_values = $this->input->post('tech_values'); // Now it's an array
        $tech_id = $this->input->post('tech_id'); // Get tech_id from dropdown

        // If no tech values provided, return an error
        if (empty($tech_values)) {
            echo json_encode(['success' => false, 'message' => 'Tech values cannot be empty.']);
            return;
        }

        // Process the tech_values as an array
        $tech_values_array = array_map('trim', $tech_values);

        // Encode the tech_values to JSON
        $tech_values_json = json_encode($tech_values_array);

        $data = [
            'tech_id' => $tech_id,
            'tech_values' => $tech_values_json
        ];

        try {
            // Update the record in the database
            $this->db->where('exp_id', $exp_id);
            $updated = $this->db->update('hire_tech_expertise', $data);

            if ($updated) {
                // If update is successful
                echo json_encode(['success' => true, 'message' => 'Data updated successfully!']);
            } else {
                // If update fails
                echo json_encode(['success' => false, 'message' => 'Error occurred while updating.']);
            }
        } catch (mysqli_sql_exception $e) {
            // Catch database-related exceptions and set the error message
            echo json_encode(['success' => false, 'message' => 'Error occurred: ' . $e->getMessage()]);
        }
    }








    public function deleteSingleData()
    {
        $exp_id = $this->input->post('exp_id');

        $dataDelete = $this->Tech_Expertise_model->deleteData('hire_tech_expertise', array('exp_id' => $exp_id));
        echo json_encode($dataDelete ? 1 : 2);
    }

}