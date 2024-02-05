<?php
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['croppedImage'])) {
    $file = $_FILES['croppedImage'];

    // Check for errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Upload failed with error code ' . $file['error']);
    }

    // Generate a unique filename to avoid overwriting existing files
    $uploadDir = 'uploads/';
    $filename = uniqid() . '_' . basename($file['name']); // Generate a unique filename
    $uploadPath = $uploadDir . $filename;

    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        echo $filename;
        // You can now save the path to the image in your database
    } else {
        echo 'Failed to move file to destination directory.';
    }
}
?>
