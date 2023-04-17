<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Uploads</title>
</head>
<body>

    <h1>File Upload Example</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*"><br/><br/>
        Select another file to upload:
        <input type="file" name="anotherFile" id="anotherFile"><br/><br/>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <hr />

    <h2>Files uploaded: </h2><br>

    <?php
        require_once __DIR__ . '/file-functions.php';
        $files = getListOfUploadedFiles();
    ?>

    <?php foreach ($files as $file): ?>
        Name: <?=$file?>: <a href="/uploads/<?=$file?>" target="_blank">Open</a> <br/>
        <img src="/uploads/<?=$file?>" width="20"><br><br>
    <?php endforeach ?>
</body>
</html>
