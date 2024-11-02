<?php
$directory = './uploads/';

if (is_dir($directory)) {
    $files = scandir($directory);
    if (count($files) > 2) { // виключаючи . і ..
        echo '<h2>Files in directory:</h2>';
        echo '<ul>';
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                // Вивід списку файлів у директорії з посиланнями для їх завантаження
                echo '<li><a href="uploads/'.$file.'">'.$file.'</a></li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'No files found in the directory.';
    }
} else {
    echo 'The directory does not exist.';
}
?>
