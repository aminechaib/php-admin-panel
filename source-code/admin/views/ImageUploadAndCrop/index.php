<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include Cropper.js library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<div class="container">
    <h1>Image Cropping</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageCropModal">Open Image Cropper</button>
</div>

<!-- Image Cropper Modal -->
<div class="modal fade" id="imageCropModal" tabindex="-1" role="dialog" aria-labelledby="imageCropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageCropModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" id="inputImage" accept="image/*">
                <br>
                <div class="img-container">
                    <img src="" id="croppedImage" style="max-width: 100%;" alt="Cropped Image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="cropButton">Crop Image</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and Cropper.js library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    $(document).ready(function() {
        var image = document.getElementById('croppedImage');
        var inputImage = document.getElementById('inputImage');
        var cropButton = document.getElementById('cropButton');
        var cropper;

        inputImage.addEventListener('change', function() {
            var files = this.files;
            var file;

            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        image.src = reader.result;
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(image, {
                            aspectRatio: 1 / 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please choose an image file.');
                }
            }
        });

        cropButton.addEventListener('click', function() {
            var canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
            });

            canvas.toBlob(function(blob) {
                // Set a meaningful filename
                var filename = 'cropped_image_' + new Date().getTime() + '.png';

                var formData = new FormData();
                formData.append('croppedImage', blob, filename);

                // You can use fetch or AJAX to upload the cropped image
                // Example using fetch
                fetch('upload.php', {
                    method: 'POST',
                    body: formData,
                }).then(response => {
                    console.log('Image uploaded successfully');
                }).catch(error => {
                    console.error('Error uploading image:', error);
                });
            }, 'image/png'); // Specify the MIME type of the image
        });
    });
</script>
