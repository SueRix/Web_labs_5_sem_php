<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['text']) && !empty($_POST['text'])) {
        $text = $_POST['text'];
        $logFile = 'log.txt';

        if (file_put_contents($logFile, $text.PHP_EOL, FILE_APPEND)) {
            // Вивід повідомлення про успішне збереження тексту
            echo 'Text saved successfully.<br>';
            echo 'Current content of log.txt:<br><br>';
            echo nl2br(file_get_contents($logFile));
        } else {
            echo 'Failed to save text.';
        }
    } else {
        echo 'Please enter some text.';
    }
}
?>
