<?php

if(isset($_FILES['fileToUpload'])){
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], __DIR__ . '/uploads/uploaded.jpg');
}

?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" onchange="encodeImageFileAsURL(this)" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            console.log('RESULT', reader.result)
        }
        reader.readAsDataURL(file);
    }
</script>


