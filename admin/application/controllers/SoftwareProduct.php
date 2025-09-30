<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoftwareProduct extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SoftwareProductModel');
    }

    public function index()
    {
        $data['title'] = 'Software Product';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('SoftwareProduct/softwareproduct', $data);
        // $this->load->view('SoftwareProduct/softwareproduct');
    }

    public function create()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        // Check if a file was uploaded
        if (!empty($_FILES['image']['name'])) {

            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');

            // Get the file extension
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Image extension should be jpeg, gif, png, or jpg';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            } else {
                // Maximum file size (5 MB in bytes)
                $maxsize = 5097152;

                // Validate file size
                if ($_FILES['image']['size'] >= $maxsize) {
                    $data['inputerror'][] = 'image';
                    $data['error_string'][] = 'File too large. File must be less than 5 megabytes';
                    $data['status'] = FALSE;
                    echo json_encode($data);
                    exit();
                }

                // Check for upload errors
                if ($_FILES["image"]["error"] > 0) {
                    $data['inputerror'][] = 'image';
                    $data['error_string'][] = 'Error during file upload: ' . $_FILES["image"]["error"];
                    $data['status'] = FALSE;
                    echo json_encode($data);
                    exit();
                } else {
                    // Create a unique file name
                    $name = explode(".", $_FILES['image']['name']);
                    $fileName = $name[0] . time() . '.' . $name[1];

                    $uploadPath = './uploads/softwareproducts/' . $fileName;

                    // Move the file to the designated directory
                    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
                        $data['inputerror'][] = 'image';
                        $data['error_string'][] = 'Failed to move uploaded file.';
                        $data['status'] = FALSE;
                        echo json_encode($data);
                        exit();
                    }

                    // Load the helper and compress the image
                    $this->load->helper('image_helper'); // Make sure to load your helper
                    resizeAndCompressImage($uploadPath); // Resize and compress the uploaded image
                }
            }
        } else {
            // Handle the case where no file is uploaded
            $fileName = null;
        }

        // Prepare data for database insertion
        $data = array(
            'title' => $title,
            'description' => $description,
            'image' => $fileName
        );

        // Insert data into the database
        $insertData = $this->SoftwareProductModel->createData($data);

        // Return the result as JSON
        echo json_encode($insertData);
    }

    public function fetchDatafromDatabase()
    {
        // Fetch data ordered by `id` in descending order
        $resultList = $this->SoftwareProductModel->fetchAllData('*', 'software_product', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button = "<a class='btn-sm btn-info text-light' href='" . base_url() . "subDetails/SoftwareProductSubDetails/softwareProductPage/{$value['id']}' >Details</a> ";

            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#">Edit</a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#">Delete</a>';

            $result['data'][] = array(
                $i++,
                $value['title'],
                $value['description'],
                '<img src="' . base_url('uploads/softwareproducts/' . $value['image']) . '" alt="Image" style="width: 100px;">',
                $button
            );
        }
        echo json_encode($result);
    }

    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->SoftwareProductModel->fetchSingleData('*', 'software_product', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $old_image = $this->input->post('old_img'); // Old image name

        $fileName = $old_image;

        // Prepare data for update
        $data = array(
            'title' => $title,
            'description' => $description
        );

        // Check if a new image is being uploaded
        if (!empty($_FILES['image']['name'])) {

            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate the file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Check for any errors during file upload
            if ($_FILES["image"]["error"] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES["image"]["error"]]);
                return;
            } else {
                // Generate a unique file name
                $name = explode(".", $_FILES['image']['name']);
                $fileName = $name[0] . time() . '.' . $extension;

                $uploadPath = './uploads/softwareproducts/' . $fileName;

                // Move the uploaded file to the designated directory
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                    return;
                }

                // Resize and compress the uploaded image
                $compressSuccess = resizeAndCompressImage($uploadPath);

                if (!$compressSuccess) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to resize and compress the image.']);
                    return;
                }

                // Delete the old image if a new one is uploaded
                if ($old_image && file_exists('./uploads/softwareproducts/' . $old_image)) {
                    unlink('./uploads/softwareproducts/' . $old_image);
                }

                // Add the new image name to the data array
                $data['image'] = $fileName;
            }
        }

        // Log the data to be updated
        log_message('info', 'Data to be updated: ' . print_r($data, true));

        // Update data in the database
        $update = $this->SoftwareProductModel->updateData('software_product', $data, array('id' => $id));

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
        $dataDelete = $this->SoftwareProductModel->deleteData('software_product', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }
}


















































