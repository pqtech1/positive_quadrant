<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->library('upload');
        $this->load->helper('image');

    }

    public function index()
    {
        $data['title'] = 'Team';
        $data['mast_load'] = 'ALOAD';

        $data['team_members'] = $this->Team_model->get_all();
        $this->load->master_template('team/index', $data);

    }

   public function store()
{
    $config['upload_path'] = './uploads/team_member/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 2048;
    $this->upload->initialize($config);

    if ($this->upload->do_upload('image')) {
        $image_data = $this->upload->data();
        $source = $image_data['full_path'];

        // Set destination path with .webp extension
        $destination = $config['upload_path'] . pathinfo($image_data['file_name'], PATHINFO_FILENAME) . '.webp';

        // Convert and compress image to webp
        if (! $this->convertToWebp($source, $destination, 80)) { // 80 = quality (0-100)
            echo json_encode(['status' => 'error', 'message' => 'Image conversion to webp failed.']);
            return;
        }

        // Optionally delete original uploaded image
        unlink($source);

        $data = [
            'name' => $this->input->post('name'),
            'position' => $this->input->post('position'),
            'yoe' => $this->input->post('yoe'),
            'linkedinurl' => $this->input->post('linkedinurl'),
            'image' => basename($destination), // store webp filename
            'is_active' => $this->input->post('is_active')
        ];
        $this->Team_model->insert($data);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
    }
}

// Helper function to convert image to webp format
private function convertToWebp($source, $destination, $quality = 80)
{
    $info = getimagesize($source);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            // Preserve transparency for PNG
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            return false;
    }

    if (!$image) {
        return false;
    }

    // Save image as webp
    $result = imagewebp($image, $destination, $quality);

    imagedestroy($image);

    return $result;
}


  public function update($id)
{
    $data = [
        'name' => $this->input->post('name'),
        'position' => $this->input->post('position'),
        'yoe' => $this->input->post('yoe'),
        'linkedinurl' => $this->input->post('linkedinurl'),
        'is_active' => $this->input->post('is_active')
    ];

    if (!empty($_FILES['image']['name'])) {
        $config['upload_path'] = './uploads/team_member/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $image_data = $this->upload->data();

            $source = $image_data['full_path'];
            // Set destination with webp extension
            $destination = $config['upload_path'] . pathinfo($image_data['file_name'], PATHINFO_FILENAME) . '.webp';

            // Convert and compress to webp with 80 quality
            if (! $this->convertToWebp($source, $destination, 80)) {
                echo json_encode(['status' => 'error', 'message' => 'Image conversion to webp failed.']);
                return;
            }

            // Delete original uploaded image
            unlink($source);

            $data['image'] = basename($destination); // save webp filename in DB
        } else {
            echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            return;
        }
    }

    $this->Team_model->update($id, $data);
    echo json_encode(['status' => 'success']);
}


    public function delete($id)
    {
        $this->Team_model->delete($id);
        echo json_encode(['status' => 'success']);
    }

    public function get($id)
    {
        $data = $this->Team_model->get_by_id($id);
        echo json_encode($data);
    }
}
