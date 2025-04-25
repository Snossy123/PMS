<?php
// Define the directory where uploaded images will be stored
define('UPLOAD_DIR', __DIR__ . '/../uploads/');  // Adjust the path if needed

// Check if the upload directory exists; if not, create it
if (!file_exists(UPLOAD_DIR)) {
    // Create the directory with full permissions (read/write/execute for all)
    mkdir(UPLOAD_DIR, 0777, true);
}

/**
 * Handles uploading of an image file to the server
 *
 * @param array $image - The uploaded image file from $_FILES
 * @return string|false - The path to the uploaded image or false on failure
 */
function uploadImage($image) {
    // Check if the file was uploaded without errors
    if ($image['error'] === UPLOAD_ERR_OK) {
        // Generate a unique filename to avoid collisions
        $imageName = uniqid() . '-' . basename($image['name']);
        $imagePath = UPLOAD_DIR . $imageName;

        // Move the uploaded file from temp location to the target uploads folder
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            return $imagePath;  // Return full path of uploaded image
        }
    }
    // Return false if upload fails
    return false;
}
