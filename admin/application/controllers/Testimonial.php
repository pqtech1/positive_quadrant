<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TestimonialModel');
    }

    public function index()
    {
        $data['title'] = 'Testimonial ';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('Testimonials/testimonial', $data);

    }

    public function create()
    {
        $name = $this->input->post('client_name');
        $description = $this->input->post('client_description');
        $status = $this->input->post('status');
        $fileName = null; // Default value in case no file is uploaded

        // Check if an image is being uploaded
        if (!empty($_FILES['client_image']['name'])) {
            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['client_image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['client_image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Generate a unique file name
            $fileName = pathinfo($_FILES['client_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
            $uploadPath = './uploads/testimonials/' . $fileName;

            // Move the uploaded file
            if (!move_uploaded_file($_FILES["client_image"]["tmp_name"], $uploadPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                return;
            }

            // **Apply Compression**
            resizeAndCompressImage($uploadPath, 200); // Compress to 200KB max

        }

        // Prepare data for insertion
        $data = array(
            'client_name' => $name,
            'client_description' => $description,
            'status' => $status,
            'client_image' => $fileName
        );

        // Insert data into the database
        $insertData = $this->TestimonialModel->createData($data);

        echo json_encode($insertData);
    }


    public function fetchDatafromDatabase()
    {

        $resultList = $this->TestimonialModel->fetchAllData('*', ' testimonials', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"><i class="fas fa-trash"></i></a>';

            $result['data'][] = array(
                $i++,
                $value['client_name'],
                $value['client_description'],
                $value['status'],
                '<img src="' . base_url('uploads/testimonials/' . $value['client_image']) . '" alt="Image" style="width: 100px;">',
                $button
            );
            $button = '';
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->TestimonialModel->fetchSingleData('*', 'testimonials', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $client_name = $this->input->post('client_name');
        $client_description = $this->input->post('client_description');
        $status = $this->input->post('status');
        $client_old_image = $this->input->post('client_old_image'); // Get the old image name

        $fileName = $client_old_image; // Default to old image

        // Check if a new image is uploaded
        if (!empty($_FILES['client_image']['name'])) {
            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['client_image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['client_image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Check for upload errors
            if ($_FILES["client_image"]["error"] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES["client_image"]["error"]]);
                return;
            }

            // Generate a unique file name
            $fileName = pathinfo($_FILES['client_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
            $uploadPath = './uploads/testimonials/' . $fileName;

            // Move the uploaded file
            if (!move_uploaded_file($_FILES["client_image"]["tmp_name"], $uploadPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                return;
            }

            // **Apply Compression**
            resizeAndCompressImage($uploadPath, 200); // Compress to 200KB max

            // Delete the old image if it exists
            if ($client_old_image && file_exists('./uploads/testimonials/' . $client_old_image)) {
                unlink('./uploads/testimonials/' . $client_old_image);
            }
        }

        // Prepare data for update
        $data = array(
            'client_name' => $client_name,
            'client_description' => $client_description,
            'status' => $status,
            'client_image' => $fileName
        );

        // Perform the update
        $update = $this->TestimonialModel->updateData('testimonials', $data, array('id' => $id));

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
        $dataDelete = $this->TestimonialModel->deleteData('testimonials', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}