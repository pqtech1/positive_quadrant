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


if (!function_exists('compressImage')) {
    /**
     * Compress an image to under a target size in KB.
     *
     * @param string $source        Temporary uploaded file path
     * @param string $destination   Final destination to save image
     * @param int    $targetSizeKB  Max allowed size in KB
     * @return bool
     */
    function compressImage($source, $destination, $targetSizeKB)
    {
        $info = getimagesize($source);

        switch ($info['mime']) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                imagepalettetotruecolor($image);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                $image = $bg;
                break;
            default:
                return false;
        }

        $quality = 85;
        do {
            ob_start();
            imagejpeg($image, null, $quality);
            $data = ob_get_clean();
            $filesizeKB = strlen($data) / 1024;
            $quality -= 5;
        } while ($filesizeKB > $targetSizeKB && $quality > 10);

        return file_put_contents($destination, $data) !== false;
    }
}

if (!function_exists('convertToWebP')) {
    /**
     * Convert an image to WebP format and compress it under target size (in KB).
     *
     * @param string $source      Source file path (temp upload)
     * @param string $destination Destination path for WebP image
     * @param string $extension   Original file extension
     * @param int    $maxSizeKB   Max allowed file size in KB (e.g., 50)
     * @return bool
     */
    function convertToWebP($source, $destination, $extension, $maxSizeKB = 50)
    {
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'png':
                $image = imagecreatefrompng($source);
                imagepalettetotruecolor($image);
                break;
            case 'gif':
                $image = imagecreatefromgif($source);
                $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                $image = $bg;
                break;
            default:
                return false;
        }

        $quality = 90; // start quality
        do {
            ob_start();
            imagewebp($image, null, $quality);
            $data = ob_get_clean();
            $sizeKB = strlen($data) / 1024;
            $quality -= 5;
            if ($quality < 10) break; // prevent too low quality
        } while ($sizeKB > $maxSizeKB);

        // Save final compressed image
        return file_put_contents($destination, $data) !== false;
    }
}
