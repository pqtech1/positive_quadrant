<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_portfolios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_portfolio_model');
        $this->load->model('IndustriesServeModel');
        $this->load->helper(array('form', 'url'));
    }

    // List projects
    public function index()
    {
        $data['title'] = 'Project And Portfolios ';

        $data['mast_load'] = 'ALOAD';
        $data['projects'] = $this->Project_portfolio_model->get_all_projects();
        $this->load->master_template('project_portfolios/list', $data);
    }

    // Create form
    public function create()
    {
        $data['title'] = 'Add Project and Portfolios ';

        $data['mast_load'] = 'ALOAD';
        $data['industries'] = $this->IndustriesServeModel->get_all();
        $this->load->master_template('project_portfolios/create', $data);
    }

    // Store project
    public function store()
    {
        // --- insert project base data first ---
        $projectData = [
            'industry_id' => $this->input->post('industry_id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        ];
        $project_id = $this->Project_portfolio_model->insert_project($projectData);

        // --- multiple image upload + convert to webp ---
        if (!empty($_FILES['project_images']['name'][0])) {
            $this->load->library('upload');

            // load helper if not already loaded (adjust helper name if needed)
            if (!function_exists('resizeAndCompressImage')) {
                // change 'image_helper' to the actual helper name where your function lives
                @$this->load->helper('image_helper');
            }

            $files = $_FILES['project_images'];
            $count = count($files['name']);

            for ($i = 0; $i < $count; $i++) {
                if (empty($files['name'][$i]))
                    continue;

                // re-map single file for CI upload lib
                $_FILES['project_image']['name'] = $files['name'][$i];
                $_FILES['project_image']['type'] = $files['type'][$i];
                $_FILES['project_image']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['project_image']['error'] = $files['error'][$i];
                $_FILES['project_image']['size'] = $files['size'][$i];

                // basic client-side validation
                $extension = pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION);
                $allowed = array('jpg', 'jpeg', 'png', 'gif');
                if (!in_array(strtolower($extension), $allowed)) {
                    // skip invalid type
                    continue;
                }

                // CI upload config (max_size is KB)
                $config['upload_path'] = './uploads/projects/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120; // 5 MB
                // sanitize base name and create unique name (CI will append original ext)
                $baseName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($_FILES['project_image']['name'], PATHINFO_FILENAME));
                $config['file_name'] = uniqid() . '_' . $baseName;

                // ensure directory exists
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }

                // initialize and upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('project_image')) {
                    $image_data = $this->upload->data(); // contains full_path, file_name, etc.
                    $source = $image_data['full_path'];  // e.g. ./uploads/projects/uniqname.jpg

                    // OPTIONAL: apply your resize/compress helper BEFORE conversion if available
                    if (function_exists('resizeAndCompressImage')) {
                        // assume helper signature: resizeAndCompressImage($filePath, $maxKb)
                        @resizeAndCompressImage($source, 200); // compress to ~200KB (as per your helper)
                    }

                    // destination webp path (same folder, same base name)
                    $destination = rtrim($config['upload_path'], '/') . '/' . pathinfo($image_data['file_name'], PATHINFO_FILENAME) . '.webp';

                    // convert to webp (quality 80)
                    $converted = $this->convertToWebp($source, $destination, 80);

                    if ($converted) {
                        // delete original uploaded file
                        @unlink($source);

                        // store only webp filename in DB
                        $saveName = basename($destination); // e.g. uniqid_basename.webp
                    } else {
                        // fallback: store original uploaded filename (jpg/png)
                        // (you may want to log conversion errors)
                        $saveName = $image_data['file_name'];
                    }

                    // insert into project_images table (only filename)
                    $this->Project_portfolio_model->insert_image([
                        'project_id' => $project_id,
                        'image_path' => $saveName
                    ]);
                } else {
                    // upload failed for this file; you can log $this->upload->display_errors()
                    // continue to next file
                    continue;
                }
            }
        }

        redirect('project_portfolios');
    }

    /**
     * Convert image to webp using GD (imagewebp). Fallback to Imagick if GD/webp support missing.
     * @param string $source Full path to source image
     * @param string $destination Full path to destination .webp
     * @param int $quality 0-100
     * @return bool true on success
     */
    private function convertToWebp($source, $destination, $quality = 80)
    {
        if (!file_exists($source))
            return false;

        $info = @getimagesize($source);
        if ($info === false)
            return false;
        $mime = $info['mime'];

        $image = false;
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = @imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = @imagecreatefrompng($source);
                if ($image) {
                    // preserve transparency
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }
                break;
            case 'image/gif':
                $image = @imagecreatefromgif($source);
                break;
            default:
                return false;
        }

        // Try GD imagewebp if available
        if ($image && function_exists('imagewebp')) {
            // ensure destination dir exists
            $destDir = dirname($destination);
            if (!is_dir($destDir))
                @mkdir($destDir, 0755, true);

            $result = @imagewebp($image, $destination, (int) $quality);
            imagedestroy($image);
            if ($result && file_exists($destination)) {
                return true;
            }
        }

        // Fallback: try Imagick if available
        if (extension_loaded('imagick')) {
            try {
                $im = new Imagick($source);
                // For animated GIFs this will only convert first frame; handle if needed
                $im->setImageFormat('webp');
                $im->setImageCompressionQuality((int) $quality);
                // write to dest
                $im->writeImage($destination);
                $im->clear();
                $im->destroy();
                return file_exists($destination);
            } catch (Exception $e) {
                // log exception if you want
                return false;
            }
        }

        // neither GD-webp nor imagick succeeded
        return false;
    }



    // Edit form
    public function edit($id)
    {
        $data['title'] = 'Edit Project and Portfolios ';

        $data['mast_load'] = 'ALOAD';
        $data['project'] = $this->Project_portfolio_model->get_project($id);
        $data['images'] = $this->Project_portfolio_model->get_project_images($id);
        $data['industries'] = $this->IndustriesServeModel->get_all();
        $this->load->master_template('project_portfolios/edit', $data);
    }

    // Update
    public function update($id)
    {
        $projectData = [
            'industry_id' => $this->input->post('industry_id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        ];
        $this->Project_portfolio_model->update_project($id, $projectData);

        // Handle new images (convert to webp and save in DB)
        if (!empty($_FILES['project_images']['name'][0])) {
            $files = $_FILES;
            $count = count($files['project_images']['name']);

            for ($i = 0; $i < $count; $i++) {
                $_FILES['project_image']['name'] = $files['project_images']['name'][$i];
                $_FILES['project_image']['type'] = $files['project_images']['type'][$i];
                $_FILES['project_image']['tmp_name'] = $files['project_images']['tmp_name'][$i];
                $_FILES['project_image']['error'] = $files['project_images']['error'][$i];
                $_FILES['project_image']['size'] = $files['project_images']['size'][$i];

                $config['upload_path'] = './uploads/projects/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5120; // 5MB
                $config['file_name'] = uniqid() . '_' . pathinfo($_FILES['project_image']['name'], PATHINFO_FILENAME);

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('project_image')) {
                    $uploadData = $this->upload->data();
                    $source = $uploadData['full_path'];

                    // Destination file with .webp extension
                    $destination = $config['upload_path'] . pathinfo($uploadData['file_name'], PATHINFO_FILENAME) . '.webp';

                    // Convert to webp
                    if ($this->convertToWebp($source, $destination, 80)) {
                        // Remove original uploaded file
                        unlink($source);

                        // Save only filename in DB
                        $this->Project_portfolio_model->insert_image([
                            'project_id' => $id,
                            'image_path' => basename($destination)
                        ]);
                    }
                }
            }
        }

        redirect('project_portfolios');
    }

    // Delete project
    public function delete($id)
    {
        $this->Project_portfolio_model->delete_project($id);
        redirect('project_portfolios');
    }

    // Delete single image
    public function delete_image($id, $project_id)
    {
        $this->Project_portfolio_model->delete_image($id);
        redirect('project_portfolios/edit/' . $project_id);
    }
}
