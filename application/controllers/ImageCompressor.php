<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImageCompressor extends CI_Controller
{

    private $apiKey = "Cr14k48JKlYLl9fZgKQCVtftLHSGzZjh";
    public function __construct()
    {
        parent::__construct();
    }


    public function compressAllImages()
    {
        $directories = [
            './assets/img',
            './assets/partner_image',
            './assets/new_img'
        ];

        $backupDir = './assets/backup_images/';

        // Create backup directory if it doesn't exist
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        $this->load->helper('image_helper'); // Ensure resizeAndCompressImage function is correctly loaded

        foreach ($directories as $directory) {
            if (is_dir($directory)) {
                $files = scandir($directory);
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        $filePath = $directory . '/' . $file;
                        $backupPath = $backupDir . $file;

                        // Allowed extensions (excluding PNG)
                        $allowedExtensions = ['jpg', 'jpeg', 'gif'];
                        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                        if (in_array($extension, $allowedExtensions)) {
                            // Copy original image to backup folder before compression
                            if (!file_exists($backupPath)) {
                                copy($filePath, $backupPath);
                            }

                            // Compress and resize image
                            if (resizeAndCompressImage($filePath)) {
                                echo "Compressed: $filePath <br>";
                            } else {
                                echo "Failed to compress: $filePath <br>";
                            }
                        } else {
                            echo "Skipped (PNG file): $filePath <br>";
                        }
                    }
                }
            } else {
                echo "Directory not found: $directory <br>";
            }
        }

        echo "All applicable images processed safely!";
    }



    public function compressImages()
    {
        set_time_limit(0); // Remove time limit

        $folders = ["assets/img", "assets/partner_image", "assets/new_img"];

        foreach ($folders as $folder) {
            $files = glob($folder . "/*.png");

            foreach ($files as $file) {
                if ($this->compressPngWithTinyPng($file)) {
                    echo "✔ Successfully compressed: " . basename($file) . "<br>";
                } else {
                    echo "❌ Failed to compress: " . basename($file) . "<br>";
                }
            }
        }
    }


    private function compressPngWithTinyPng($filePath)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.tinify.com/shrink",
            CURLOPT_USERPWD => "api:" . $this->apiKey,
            CURLOPT_POSTFIELDS => file_get_contents($filePath),
            CURLOPT_BINARYTRANSFER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true
        ]);

        $response = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = json_decode(substr($response, $headerSize), true);
        curl_close($ch);

        if (isset($body["output"]["url"])) {
            file_put_contents($filePath, file_get_contents($body["output"]["url"]));
            return true;
        }
        return false;
    }

}
