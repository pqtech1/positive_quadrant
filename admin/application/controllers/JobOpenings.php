<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobOpenings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JobOpeningsModel');
    }

    public function index()
    {
        $data['title'] = 'Job Openings';

        $data['mast_load'] = 'ALOAD';



        $this->load->master_template('JobOpenings/job_openings', $data);
        // $this->load->view('Technology/technology');
    }

    public function create()
    {

        // echo '<pre>';
        // print_r($this->input->post());   // For POST data
        // print_r($this->input->get());    // For GET data
        // print_r($_FILES);                // For file uploads
        // echo '</pre>';

        // echo "this is create method of job opening controller ";
        // die;
        $job_title = $this->input->post('job_title');
        $job_description = $this->input->post('job_description');
        $job_type = $this->input->post('job_type');
        $experience_level = $this->input->post('experience_level');
        $job_location = $this->input->post('job_location');
        $job_date = $this->input->post('job_date');
        $job_status = $this->input->post('job_status');

        // Check if a file was uploaded


        // Prepare data for database insertion
        $data = array(
            'job_title' => $job_title,
            'job_description' => $job_description,
            'job_type' => $job_type,
            'experience_level' => $experience_level,
            'job_location' => $job_location,
            'job_date' => $job_date,
            'job_status' => $job_status,
        );

        // print_r($data);
        // die;

        // Insert data into the database
        $insertData = $this->JobOpeningsModel->createData($data);

        // Return the result as JSON
        echo json_encode($insertData);
    }
    public function fetchDatafromDatabase()
    {
        $resultList = $this->JobOpeningsModel->fetchAllData('*', 'job_openings', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            // $button = "<a class='btn-sm btn-info text-light' href='" . base_url() . "subDetails/TechnologySubDetails/technologyPage/{$value['id']}' >Details</a> ";
/*             $button = "<a class='btn-sm btn-info text-light' href='#' onclick='loadTechnologyDetails(<?php echo $value['id']; ?>)'  >Details</a> ";
 */
            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"><i class="fas fa-trash"></i></a>';

            $result['data'][] = array(
                $i++,
                $value['job_title'],
                $value['job_description'],
                $value['job_type'],
                $value['experience_level'],
                $value['job_location'],
                $value['job_status'],
                $value['job_date'],
                $button
            );
            $button = '';

        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->JobOpeningsModel->fetchSingleData('*', 'job_openings', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $job_title = $this->input->post('job_title');
        $job_description = $this->input->post('job_description');
        $job_type = $this->input->post('job_type');
        $experience_level = $this->input->post('experience_level');
        $job_location = $this->input->post('job_location');
        $job_date = $this->input->post('job_date');
        $job_status = $this->input->post('job_status');

        $data = array(
            'job_title' => $job_title,
            'job_description' => $job_description,
            'job_type' => $job_type,
            'experience_level' => $experience_level,
            'job_location' => $job_location,
            'job_date' => $job_date,
            'job_status' => $job_status,
        );



        // Update data in the database
        $update = $this->JobOpeningsModel->updateData('job_openings', $data, array('id' => $id));

        // Log the status of the update operation
        if ($update) {
            log_message('info', 'Record with ID ' . $id . ' successfully updated.');
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            log_message('error', 'Failed to update record with ID ' . $id);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
        }
    }
    public function deleteSingleData()
    {
        $id = $this->input->post('id');
        $dataDelete = $this->JobOpeningsModel->deleteData('job_openings', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}