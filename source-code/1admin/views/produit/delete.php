<?php

function deleteFilesWithoutPrefix($folderPath) {
    // Check if the folder path exists
    if (!is_dir($folderPath)) {
        die("Folder does not exist.");
    }
    
    // Open the folder
    $dir = opendir($folderPath);
    
    // Loop through files in the folder
    while (($file = readdir($dir)) !== false) {
        $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
        
        // Check if the file is a regular file and not a directory
        if (is_file($filePath)) {
            // Check if the filename does not contain "cropped_"
            if (strpos($file, 'cropped_') === false) {
                // Delete the file
                unlink($filePath);
                echo "Deleted file: $file <br>";
            }
        }
    }
    
    // Close the directory handle
    closedir($dir);
}

// Example usage:
$folderPath = "uploads";
deleteFilesWithoutPrefix($folderPath);
?>
