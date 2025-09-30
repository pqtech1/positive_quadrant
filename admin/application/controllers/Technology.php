<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Technology extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TechnologyModel');
    }

    public function index()
    {
        $data['title'] = 'Technology';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('Technology/technology', $data);
        // $this->load->view('Technology/technology');
    }

    public function create()
    {

        $title = $this->input->post('title');
        $description = $this->input->post('description');

        if (!empty($_FILES['image']['name'])) {
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowed)) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Image extension should be jpeg, gif, png, or jpg';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }

            $maxsize = 5097152;
            if ($_FILES['image']['size'] >= $maxsize) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'File too large. File must be less than 5 MB';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }

            if ($_FILES["image"]["error"] > 0) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Error during file upload: ' . $_FILES["image"]["error"];
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }

            $name = explode(".", $_FILES['image']['name']);
            $fileName = $name[0] . time() . '.' . $extension;
            $uploadPath = './uploads/technology/' . $fileName;

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Failed to move uploaded file.';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }

            // Call helper function to resize and compress
            resizeAndCompressImage($uploadPath, 200);

        } else {
            $fileName = null;
        }

        $data = array(
            'title' => $title,
            'description' => $description,
            'image' => $fileName
        );

        $insertData = $this->TechnologyModel->createData($data);

        echo json_encode($insertData);
    }

    public function fetchDatafromDatabase()
    {
        $resultList = $this->TechnologyModel->fetchAllData('*', 'technology', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button = '<a class="btn-sm btn-info text-light" href="' . base_url() . "subDetails/TechnologySubDetails/technologyPage/{$value['id']}" . '"> <i class="fas fa-plus"></i> </a>';
            /*             $button = "<a class='btn-sm btn-info text-light' href='#' onclick='loadTechnologyDetails(<?php echo $value['id']; ?>)'  >Details</a> ";
             */
            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"> <i class="fas fa-edit"></i> </a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"> <i class="fas fa-trash"></i> </a>';

            $result['data'][] = array(
                $i++,
                $value['title'],
                $value['description'],
                '<img src="' . base_url('uploads/technology/' . $value['image']) . '" alt="Image" style="width: 100px;">',
                $button
            );
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->TechnologyModel->fetchSingleData('*', 'technology', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $old_image = $this->input->post('old_img'); // Assuming old image name is sent via POST

        $fileName = $old_image;

        // Prepare data for update
        $data = array(
            'title' => $title,
            'description' => $description
        );

        // Check if a new image is uploaded
        if (!empty($_FILES['image']['name'])) {

            // Allowed file extensions
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // Validate the file extension
            if (!in_array(strtolower($extension), $allowed)) {
                echo json_encode(['status' => 'error', 'message' => 'Image extension should be jpeg, gif, png, or jpg']);
                return;
            }

            // Validate file size (5MB limit)
            $maxsize = 5120 * 1024; // 5MB
            if ($_FILES['image']['size'] >= $maxsize) {
                echo json_encode(['status' => 'error', 'message' => 'File too large. File must be less than 5 megabytes']);
                return;
            }

            // Check for upload errors
            if ($_FILES["image"]["error"] > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Error during file upload: ' . $_FILES["image"]["error"]]);
                return;
            } else {
                // Generate a unique file name
                $name = explode(".", $_FILES['image']['name']);
                $fileName = $name[0] . time() . '.' . $extension;

                // Define the target path
                $targetPath = './uploads/technology/' . $fileName;

                // Compress and save the image
                $this->load->helper('image_helper'); // Ensure the helper is loaded
                $compressedImage = resizeAndCompressImage($_FILES["image"]["tmp_name"], $targetPath, 200);

                if (!$compressedImage) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to process uploaded image.']);
                    return;
                }

                // Delete the old image after successful upload
                if ($old_image && file_exists('./uploads/technology/' . $old_image)) {
                    unlink('./uploads/technology/' . $old_image);
                }

                // Add the new image to the update data
                $data['image'] = $fileName;
            }
        }

        // Log the update data
        log_message('info', 'Data to be updated: ' . print_r($data, true));

        // Update database record
        $update = $this->TechnologyModel->updateData('technology', $data, array('id' => $id));

        // Log and return the response
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
        $dataDelete = $this->TechnologyModel->deleteData('technology', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}