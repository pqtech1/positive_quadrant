<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hire extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hire_model');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $data['title'] = 'Hire';

        $data['mast_load'] = 'ALOAD';

        $data['categories'] = $this->db->get('hire_category')->result_array();


        $this->load->master_template('Hire/hire_details', $data);
        // $this->load->view('Technology/technology');
    }
    // CREATE: Insert new hire detail
    public function create()
    {
        // Map category name to category ID
        $cat_name = $this->input->post('tech_category');
        $hire_cat_id = $this->input->post('tech_category');

        // Collect other form data
        $data = [
            'hire_cat_id' => $hire_cat_id,
            'tech_name' => $this->input->post('tech_name'),
            'tech_main_desc' => $this->input->post('tech_main_desc'),
            'tech_sub_desc' => $this->input->post('tech_sub_desc'),
            'slug_url' => $this->input->post('slug_url'),
            'isActive' => $this->input->post('status')
        ];

        // Handle file uploads with specific folder paths
        $uploadErrors = [];

        if (!empty($_FILES['tech_banner_img']['name'])) {
            $bannerUpload = $this->_upload_file('tech_banner_img', 'tech_banner_img');
            if ($bannerUpload['status']) {
                $data['banner_img'] = $bannerUpload['file_name'];
            } else {
                $uploadErrors[] = $bannerUpload['error'];
            }
        }

        if (!empty($_FILES['tech_main_img']['name'])) {
            $mainImgUpload = $this->_upload_file('tech_main_img', 'tech_main_img');
            if ($mainImgUpload['status']) {
                $data['tech_main_img'] = $mainImgUpload['file_name'];
            } else {
                $uploadErrors[] = $mainImgUpload['error'];
            }
        }

        // If there were upload errors, return them
        if (!empty($uploadErrors)) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'errors' => $uploadErrors
            ]);
            return;
        }

        // Insert data into the database
        $insert = $this->Hire_model->create_hire_detail($data);

        // Return JSON response for AJAX
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $insert ? 'success' : 'error',
            'message' => $insert ? 'Data saved successfully' : 'Failed to save data'
        ]);
    }


    /**
     * Handles file upload with validation, and stores it in the specified folder.
     *
     * @param string $fieldName The form field name for the file.
     * @param string $uploadFolder The folder name where the file should be stored.
     * @return array The result status and file name or error message.
     */
    private function _upload_file($fieldName, $uploadFolder)
    {
        // Allowed file extensions and max file size
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $maxSize = 5097152; // 5 MB in bytes
        $file = $_FILES[$fieldName];

        // Initialize upload response
        $uploadResponse = [
            'status' => TRUE,
            'file_name' => '',
            'error' => ''
        ];

        // Get the file extension and validate it
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            return [
                'status' => FALSE,
                'error' => 'Invalid file extension. Allowed: jpg, jpeg, png, gif'
            ];
        }

        // Validate file size
        if ($file['size'] > $maxSize) {
            return [
                'status' => FALSE,
                'error' => 'File size exceeds 5 MB limit'
            ];
        }

        // Check for upload errors
        if ($file['error'] > 0) {
            return [
                'status' => FALSE,
                'error' => 'Error during file upload: ' . $file['error']
            ];
        }

        // Generate unique file name and define upload path
        $uniqueFileName = pathinfo($file['name'], PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
        $uploadPath = './uploads/' . $uploadFolder . '/';

        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Full path of the uploaded file
        $uploadedFilePath = $uploadPath . $uniqueFileName;

        // Attempt to move the file to the designated directory
        if (!move_uploaded_file($file['tmp_name'], $uploadedFilePath)) {
            return [
                'status' => FALSE,
                'error' => 'Failed to move uploaded file.'
            ];
        }

        // **Compress the image after uploading**
        if (!resizeAndCompressImage($uploadedFilePath, 200)) {
            return [
                'status' => FALSE,
                'error' => 'Failed to compress image.'
            ];
        }

        // Return successful upload response with the file name
        $uploadResponse['file_name'] = $uniqueFileName;
        return $uploadResponse;
    }



    // READ: Get all hire details
    public function fetchDatafromDatabase()
    {
        $resultList = $this->Hire_model->fetchAllData('*', 'hire_details', array(), 'id', 'DESC');

        $result = array();
        $i = 1;
        foreach ($resultList as $key => $value) {
            // Initialize the button variable for each record
            $button = ''; // Reset the button variable

            // Construct the edit and delete buttons
            // $button .= '<a class="btn-sm btn-warning text-light" href="' . site_url('Tech_Expertise/index/' . $value['id']) . '">Add Tech Expertise</a> ';
            $button .= '<a class="btn-sm btn-warning text-light" href="' . site_url('Tech_Expertise/index/' . $value['id']) . '"><i class="fas fa-plus"></i></a> ';

            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"><i class="fas fa-trash"></i></a>';

            // Build each row with the required columns, including an image
            $result['data'][] = array(
                $i++,  // Row index
                '<a href="' . site_url('HireAllDetails/' . $value['id']) . '" class="text-decoration-none">' . $value['tech_name'] . '</a>',
                $value['tech_main_desc'],  // Assuming 'tech_main_desc' field exists in hire details
                // '<img src="' . base_url('uploads/tech_banner_img/' . $value['banner_img']) . '" alt="Image" style="width: 100px;">', // Assuming 'banner_img' field exists
                // $value['tech_sub_desc'],
                // '<img src="' . base_url('uploads/tech_main_img/' . $value['tech_main_img']) . '" alt="Image" style="width: 100px;">', // Assuming 'tech_main_img' field exists

                // $value['slug_url'],
                $value['isActive'],

                $button // Add buttons for edit and delete
            );
        }

        echo json_encode($result); // Output data as JSON
    }



    // UPDATE: Update an existing hire detail
    public function getEditData()
    {
        $id = $this->input->post('id');
        // if($id){
        //     echo $id;
        // }
        // echo "Nothing";
        // die();
        $resultData = $this->Hire_model->fetchSingleData('*', 'hire_details', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $hire_cat_id = $this->input->post('tech_category');

        // Fetch the current record data if no category is provided
        $currentData = $this->Hire_model->fetchSingleData('hire_cat_id', 'hire_details', array('id' => $id));



        // Collect form data
        $data = [
            'hire_cat_id' => $hire_cat_id,
            'tech_name' => $this->input->post('tech_name'),
            'tech_main_desc' => $this->input->post('tech_main_desc'),
            'tech_sub_desc' => $this->input->post('tech_sub_desc'),

            'slug_url' => $this->input->post('slug_url'),
            'isActive' => $this->input->post('status')

        ];

        // Handle image uploads
        $uploadErrors = [];

        if (!empty($_FILES['tech_banner_img']['name'])) {
            $bannerUpload = $this->_upload_file('tech_banner_img', 'tech_banner_img');
            if ($bannerUpload['status']) {
                $data['banner_img'] = $bannerUpload['file_name'];
                // Delete the old banner image if a new one was uploaded
                $oldBannerImg = $this->input->post('old_banner_img');
                if ($oldBannerImg && file_exists('./uploads/tech_banner_img/' . $oldBannerImg)) {
                    unlink('./uploads/tech_banner_img/' . $oldBannerImg);
                }
            } else {
                $uploadErrors[] = $bannerUpload['error'];
            }
        }

        if (!empty($_FILES['tech_main_img']['name'])) {
            $mainImgUpload = $this->_upload_file('tech_main_img', 'tech_main_img');
            if ($mainImgUpload['status']) {
                $data['tech_main_img'] = $mainImgUpload['file_name'];
                // Delete the old main image if a new one was uploaded
                $oldMainImg = $this->input->post('old_main_img');
                if ($oldMainImg && file_exists('./uploads/tech_main_img/' . $oldMainImg)) {
                    unlink('./uploads/tech_main_img/' . $oldMainImg);
                }
            } else {
                $uploadErrors[] = $mainImgUpload['error'];
            }
        }

        // If there were upload errors, return them
        if (!empty($uploadErrors)) {
            echo json_encode([
                'status' => 'error',
                'errors' => $uploadErrors
            ]);
            return;
        }

        // Log the data to be updated
        log_message('info', 'Data to be updated: ' . print_r($data, true));

        // Update data in the database
        $update = $this->Hire_model->updateData('hire_details', $data, array('id' => $id));

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
        $dataDelete = $this->Hire_model->deleteData('hire_details', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }   // File upload handler
}
