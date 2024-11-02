<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: another_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Інформація про сервер</title>
</head>
<body>
    <p>IP-адреса клієнта: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
    <p>Браузер клієнта: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
    <p>Назва скрипта: <?php echo $_SERVER['PHP_SELF']; ?></p>
    <p>Метод запиту: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
    <p>Шлях до файлу: <?php echo $_SERVER['SCRIPT_FILENAME']; ?></p>
</body>
</html>
