<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TechnologySubDetails extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subDetailsModel/TechnologySubDetailsModel', 'TechModel');
    }

    // public function index($id = NULL)
    // {
    //     if ($id !== NULL) {
    //         // Pass the ID to the view or use it to fetch data
    //         $data['id'] = $id;
    //     } else {
    //         $data['id'] = NULL;
    //     }

    //     echo $data;
    //     die;

    //     // Load the view
    //     $this->load->view('subDetails/Technology/technologySubDetails', $data);
    // }

    public function technologyPage($id = NULL)
    {
        $data['technology_id'] = $id;
        $data['title'] = 'Technology Sub Details';
        $data['mast_load'] = 'ALOAD';
        // echo $id;
        // die;
        $this->load->master_template('subDetails/Technology/technologySubDetails', $data);
        // $this->load->view('subDetails/Technology/technologySubDetails', $data);
    }

    public function create()
    {
        // Get POST data
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $technology_id = $this->input->post('technology_id');

        // Initialize response data
        $data = array('status' => TRUE);

        // Validate required fields
        if (empty($title)) {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title is required';
            $data['status'] = FALSE;
        }
        if (empty($description)) {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Description is required';
            $data['status'] = FALSE;
        }
        if (empty($technology_id)) {
            $data['inputerror'][] = 'technology_id';
            $data['error_string'][] = 'Technology ID is required';
            $data['status'] = FALSE;
        }

        // Return error if any field is missing
        if (!$data['status']) {
            echo json_encode($data);
            exit();
        }

        // Convert description into a list format using ";;" delimiter
        $descriptionArray = explode(';;', $description);
        // Remove any empty elements caused by extra ";;"
        $descriptionArray = array_filter(array_map('trim', $descriptionArray));
        // Convert the description array to a JSON string to store it in the database
        $descriptionJson = json_encode($descriptionArray);

        // File upload logic
        if (!empty($_FILES['image']['name'])) {
            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg+xml');

            // Get the file extension
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Image extension should be jpg, jpeg, png, gif, webp, bmp, or svg+xml';
                $data['status'] = FALSE;
            } else {
                // Maximum file size (5 MB in bytes)
                $maxsize = 5097152;

                // Validate file size
                if ($_FILES['image']['size'] >= $maxsize) {
                    $data['inputerror'][] = 'image';
                    $data['error_string'][] = 'File too large. File must be less than 5 megabytes';
                    $data['status'] = FALSE;
                }

                // Check for upload errors
                if ($_FILES["image"]["error"] > 0) {
                    $data['inputerror'][] = 'image';
                    $data['error_string'][] = 'Error during file upload: ' . $_FILES["image"]["error"];
                    $data['status'] = FALSE;
                } else {
                    // Create a unique file name
                    $name = explode(".", $_FILES['image']['name']);
                    $fileName = $name[0] . time() . '.' . end($name);

                    // Move the file to the designated directory
                    if (!move_uploaded_file($_FILES["image"]["tmp_name"], './uploads/techonologysubdetails/' . $fileName)) {
                        $data['inputerror'][] = 'image';
                        $data['error_string'][] = 'Failed to move uploaded file.';
                        $data['status'] = FALSE;
                    }
                }
            }
        } else {
            // Handle the case where no file is uploaded
            $fileName = null;
        }

        // Return error if any validation failed
        if (!$data['status']) {
            echo json_encode($data);
            exit();
        }

        // Prepare data for database insertion
        $dataToInsert = array(
            'title' => $title,
            'description' => $descriptionJson, // Store the description as JSON
            'image' => $fileName,
            'second_key' => $technology_id,
        );

        // Insert data into the database
        $insertData = $this->TechModel->createData($dataToInsert);

        // Check if insertion was successful
        if ($insertData) {
            $data['message'] = 'Record added successfully';
        } else {
            $data['status'] = FALSE;
            $data['message'] = 'Failed to add record';
        }

        // Return the result as JSON
        echo json_encode($data);
    }


    public function fetchDatafromDatabase()
    {
        $technology_id = $this->input->get('technology_id');

        // Fetch data where `second_key` matches the provided `technology_id`
        $resultList = $this->TechModel->fetchAllData(
            '*',
            'techonologysubdetails',
            array('second_key' => $technology_id), // Filter condition
            'id',
            'DESC'
        );

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button = '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#">Edit</a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#">Delete</a>';

            // Decode JSON description
            $descriptionArray = json_decode($value['description'], true);

            // Handle cases where descriptionArray is not an array (e.g., JSON decoding failed)
            if (!is_array($descriptionArray)) {
                $descriptionArray = [];
            }

            // Convert array back to a string with line breaks
            $description = implode('<br>', array_map('htmlspecialchars', $descriptionArray));

            $result['data'][] = array(
                $i++,
                htmlspecialchars($value['title']), // Ensure title is safe for HTML output
                $description, // Use the formatted description
                '<img src="' . base_url('uploads/techonologysubdetails/' . htmlspecialchars($value['image'])) . '" alt="Image" style="width: 100px;">',
                $button
            );
        }
        echo json_encode($result);
    }




    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->TechModel->fetchSingleData('*', 'techonologysubdetails', array('id' => $id));
        // Log the result for debugging
        log_message('info', 'Data fetched for edit: ' . print_r($resultData, true));
        echo json_encode($resultData);
    }


    public function update()
    {
        // Retrieve POST data
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $old_image = $this->input->post('old_img'); // Old image name
        $technology_id = $this->input->post('technology_id'); // Fetch technology_id

        // Validate the ID
        if (!$id) {
            echo json_encode(['status' => 'error', 'message' => 'ID is missing']);
            return;
        }

        // Prepare data for update
        $data = array(
            'title' => $title,
            'description' => $description,
            // 'second_key' => $technology_id // Ensure technology_id is correctly assigned
        );

        // Handle file upload if a new image is provided
        if (!empty($_FILES['image']['name'])) {
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            // Validate the file extension
            if (!in_array($extension, $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate the file size (5MB limit)
            $maxsize = 5 * 1024 * 1024; // 5MB
            if ($_FILES['image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Check for upload errors
            if ($_FILES['image']['error'] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES['image']['error']]);
                return;
            }

            // Generate a unique file name
            $fileName = time() . '.' . $extension;
            $uploadPath = './uploads/techonologysubdetails/' . $fileName;

            // Move the file to the designated directory
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                return;
            }

            // Delete the old image if it exists
            if ($old_image && file_exists('./uploads/techonologysubdetails/' . $old_image)) {
                unlink('./uploads/techonologysubdetails/' . $old_image);
            }

            // Add the new image name to the data array
            $data['image'] = $fileName;
        } else {
            // If no new image is uploaded, keep the old image
            if ($old_image) {
                $data['image'] = $old_image;
            }
        }

        // Log the data to be updated for debugging
        log_message('info', 'Data to be updated: ' . print_r($data, true));

        // Update data in the database
        $update = $this->TechModel->updateData('techonologysubdetails', $data, array('id' => $id));

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
        $dataDelete = $this->TechModel->deleteData('techonologysubdetails', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }
}
