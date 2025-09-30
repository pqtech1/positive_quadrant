<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RecentlyPlaced extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RecentlyPlacedModel');
    }

    public function index()
    {
        $data['title'] = 'Recently Placed ';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('RecentlyPlaced/recently_placed', $data);

    }

    public function create()
    {
        $student_name = $this->input->post('student_name');
        $student_description = $this->input->post('student_description');
        $student_linkedIn_link = $this->input->post('student_linkedIn_link');
        $status = $this->input->post('status');

        $fileName = null; // Default value if no file is uploaded

        // Check if an image is uploaded
        if (!empty($_FILES['student_image']['name'])) {
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['student_image']['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);

            // Validate file extension
            if (!in_array($extension, $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Allowed: jpg, jpeg, png, gif']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5 * 1024 * 1024; // 5MB
            if ($_FILES['student_image']['size'] > $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. Must be less than 5MB']);
                return;
            }

            // Generate a unique file name
            $fileName = pathinfo($_FILES['student_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
            $targetPath = './uploads/RecentlyPlaced/' . $fileName;

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($_FILES["student_image"]["tmp_name"], $targetPath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
                return;
            }

            // Resize and compress the image
            if (!resizeAndCompressImage($targetPath, 200)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to resize and compress image.']);
                return;
            }
        }

        // Prepare data for insertion
        $data = array(
            'student_name' => $student_name,
            'student_description' => $student_description,
            'student_linkedin_link' => $student_linkedIn_link,
            'status' => $status,
            'student_image' => $fileName
        );

        // Insert into database
        $insertData = $this->RecentlyPlacedModel->createData($data);

        echo json_encode($insertData);
    }

    public function fetchDatafromDatabase()
    {

        $resultList = $this->RecentlyPlacedModel->fetchAllData('*', ' recently_placed', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {

            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"><i class="fas fa-trash"></i></a>';

            $result['data'][] = array(
                $i++,
                $value['student_name'],
                $value['student_description'],
                $value['student_linkedin_link'],
                $value['status'],
                '<img src="' . base_url('uploads/RecentlyPlaced/' . $value['student_image']) . '" alt="Image" style="width: 100px;">',
                $button
            );
            $button = '';
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->RecentlyPlacedModel->fetchSingleData('*', 'recently_placed', array('id' => $id));

        echo json_encode($resultData);
        // echo '<pre>';
        // print_r($resultData);
        // echo '</pre>';
        // die;
    }

    public function update()
    {
        $id = $this->input->post('id');
        $student_name = $this->input->post('student_name');
        $student_description = $this->input->post('student_description');
        $student_linkedIn_link = $this->input->post('student_linkedin_link');
        $status = $this->input->post('status');
        $student_old_image = $this->input->post('student_old_image'); // Get the old image name

        $fileName = $student_old_image; // Default to old image

        if (!empty($_FILES['student_image']['name'])) {
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['student_image']['name'], PATHINFO_EXTENSION);

            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['student_image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5MB']);
                return;
            }

            if ($_FILES["student_image"]["error"] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES["student_image"]["error"]]);
                return;
            } else {
                $fileName = pathinfo($_FILES['student_image']['name'], PATHINFO_FILENAME) . time() . '.' . $extension;
                $filePath = './uploads/RecentlyPlaced/' . $fileName;

                if (!move_uploaded_file($_FILES["student_image"]["tmp_name"], $filePath)) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
                    return;
                }

                // Apply compression and resizing
                if (!resizeAndCompressImage($filePath, 200)) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to compress and resize image.']);
                    return;
                }

                // Delete the old image
                if ($student_old_image && file_exists('./uploads/RecentlyPlaced/' . $student_old_image)) {
                    unlink('./uploads/RecentlyPlaced/' . $student_old_image);
                }
            }
        }

        $data = array(
            'student_name' => $student_name,
            'student_description' => $student_description,
            'student_linkedin_link' => $student_linkedIn_link,
            'status' => $status,
            'student_image' => $fileName
        );

        $update = $this->RecentlyPlacedModel->updateData('recently_placed', $data, array('id' => $id));

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
        $dataDelete = $this->RecentlyPlacedModel->deleteData('recently_placed', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}