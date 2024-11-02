<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('png', 'jpg', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions) && $fileSize <= 2097152) {
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (file_exists($dest_path)) {
                // Додавання унікального суфікса до імені файлу, якщо він вже існує
                $fileName = $fileNameCmps[0] . '_' . time() . '.' . $fileExtension;
                $dest_path = $uploadFileDir . $fileName;
            }

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // Вивід інформації про файл після успішного завантаження
                echo "File is successfully uploaded.<br>";
                echo "File name: " . $fileName . "<br>";
                echo "File type: " . $fileType . "<br>";
                echo "File size: " . round($fileSize / 1024, 2) . " KB<br>";
                echo '<a href="'.$dest_path.'">Download file</a>';
            } else {
                echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } else {
            echo 'Upload failed. Allowed file types: ' . implode(', ', $allowedfileExtensions) . '. File size must be less than 2 MB.';
        }
    } else {
        echo 'There is some error in the file upload. Please check the following error.<br>';
        echo 'Error:' . $_FILES['file']['error'];
    }
}
?>
