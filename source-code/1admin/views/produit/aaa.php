<?php
// Check if form is submitted





if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the uploaded file information
	$fileName = basename($_FILES["fileToUpload"]["name"]);
	$targetFilePath = 'uploads/' . $fileName;
	$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if ($check !== false) {
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			echo "Sorry, your file is too large.";
		} else {
			// Allow certain file formats
			$allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
			if (in_array($fileType, $allowedTypes)) {
				// Generate a random string for the new filename
				$randomString = uniqid('cropped_') . '_';
				$newFileName = $randomString . $fileName;

				// Upload file
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 'uploads/' . $newFileName)) {
					// Display uploaded image
					echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

					// Crop image (you can use your preferred method/library for cropping)
					// Retrieve the cropped image data
					$croppedImageData = $_POST['croppedImageData'];

					// Convert base64 data to image file
					file_put_contents('uploads/' . $newFileName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData)));

					// You can retrieve the cropped image name here and store it in the database or do any other processing you need.
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			} else {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}
	} else {
		echo "File is not an image.";
	}
}
echo $newFileName;
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Upload and Crop</title>
	<link href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>
	<style>
		#preview {
			width: 100%;
			height: auto;
		}
	</style>
</head>

<body>
	<h2>Upload and Crop Image</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload">
		<!-- Add a hidden input field to store cropped image data -->
		<input type="hidden" id="croppedImageData" name="croppedImageData">
		<br><br>
		<button type="submit">Upload Image</button>
	</form>

	<h2>Crop Preview</h2>
	<div>
		<img id="preview" src="" alt="Preview">
	</div>

	<script>
		const input = document.getElementById('fileToUpload');
		const preview = document.getElementById('preview');
		const cropper = new Cropper(preview, {
			aspectRatio: 1, // Set your desired aspect ratio
			crop(event) {
				// Output cropped area details
				console.log(event.detail.x);
				console.log(event.detail.y);
				console.log(event.detail.width);
				console.log(event.detail.height);

				// Get cropped canvas
				const canvas = cropper.getCroppedCanvas();
				// Convert canvas to base64 data
				const croppedImageData = canvas.toDataURL();
				// Set cropped image data to hidden input field
				document.getElementById('croppedImageData').value = croppedImageData;
			},
		});

		input.addEventListener('change', (e) => {
			const file = e.target.files[0];
			const reader = new FileReader();
			reader.onload = (event) => {
				preview.src = event.target.result;
				cropper.replace(event.target.result);
			};
			reader.readAsDataURL(file);
		});
	</script>
	
</body>
</html>
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