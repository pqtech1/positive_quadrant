<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('resizeAndCompressImage')) {
    function resizeAndCompressImage($filePath, $targetSizeKB = 200)
    {
        list($width, $height, $type) = getimagesize($filePath);

        // Load the image based on its type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($filePath);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($filePath);
                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($filePath);
                break;
            default:
                return false;
        }

        // Resize if the image is too large
        $maxWidth = 800;
        $maxHeight = 800;

        if ($width > $maxWidth || $height > $maxHeight) {
            $ratio = min($maxWidth / $width, $maxHeight / $height);
            $newWidth = round($width * $ratio);
            $newHeight = round($height * $ratio);

            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        } else {
            $resizedImage = $image;
        }

        // Compress the image until it reaches the target size
        $quality = 90;
        do {
            ob_start();
            imagejpeg($resizedImage, null, $quality);
            $compressedImage = ob_get_contents();
            ob_end_clean();

            $compressedSize = strlen($compressedImage) / 1024; // Convert bytes to KB

            if ($compressedSize <= $targetSizeKB) {
                file_put_contents($filePath, $compressedImage);
                return true;
            }

            $quality -= 10; // Reduce quality by 10%
        } while ($quality > 10);

        return false;
    }
}
