<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndustriesServe extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('IndustriesServeModel');
    }

    public function index()
    {
        $data['title'] = 'Industries Serve ';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('IndustriesServe/index', $data);

    }

    public function create()
    {
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $fileName = null; // Default value in case no file is uploaded

        // Check if an image is being uploaded
        if (!empty($_FILES['industry_image']['name'])) {
            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['industry_image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['industry_image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Generate a unique file name
            $fileName = pathinfo($_FILES['industry_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
            $uploadPath = './uploads/industry-serve/' . $fileName;

            // Move the uploaded file
            if (!move_uploaded_file($_FILES["industry_image"]["tmp_name"], $uploadPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                return;
            }

            // **Apply Compression**
            resizeAndCompressImage($uploadPath, 200); // Compress to 200KB max

        }

        // Prepare data for insertion
        $data = array(
            'name' => $name,
            'status' => $status,
            'industry_image' => $fileName
        );

        // Insert data into the database
        $insertData = $this->IndustriesServeModel->createData($data);

        echo json_encode($insertData);
    }


    public function fetchDatafromDatabase()
    {

        $resultList = $this->IndustriesServeModel->fetchAllData('*', ' industries_serve', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            // inside your foreach
            $button = '<a class="btn-sm btn-success text-light btn-edit" data-id="' . $value['id'] . '" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light btn-delete" data-id="' . $value['id'] . '" href="#"><i class="fas fa-trash"></i></a>';

            $result['data'][] = array(
                $i++,
                $value['name'],
                $value['status'],
                '<img src="' . base_url('uploads/industry-serve/' . $value['industry_image']) . '" alt="Image" style="width: 100px;">',
                $button
            );
            $button = '';
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->IndustriesServeModel->fetchSingleData('*', 'industries_serve', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $industry_old_image = $this->input->post('industry_old_image'); // Get the old image name

        $fileName = $industry_old_image; // Default to old image

        // Check if a new image is uploaded
        if (!empty($_FILES['industry_image']['name'])) {
            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['industry_image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['industry_image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Check for upload errors
            if ($_FILES["industry_image"]["error"] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES["industry_image"]["error"]]);
                return;
            }

            // Generate a unique file name
            $fileName = pathinfo($_FILES['industry_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
            $uploadPath = './uploads/industry-serve/' . $fileName;

            // Move the uploaded file
            if (!move_uploaded_file($_FILES["industry_image"]["tmp_name"], $uploadPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                return;
            }

            // **Apply Compression**
            resizeAndCompressImage($uploadPath, 200); // Compress to 200KB max

            // Delete the old image if it exists
            if ($industry_old_image && file_exists('./uploads/industry-serve/' . $industry_old_image)) {
                unlink('./uploads/industry-serve/' . $industry_old_image);
            }
        }

        // Prepare data for update
        $data = array(
            'name' => $name,
            'status' => $status,
            'industry_image' => $fileName
        );

        // Perform the update
        $update = $this->IndustriesServeModel->updateData('industries_serve', $data, array('id' => $id));

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
        $dataDelete = $this->IndustriesServeModel->deleteData('industries_serve', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}