<?php
session_start();
$inactive = 300; // 5 хвилин

if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout'] > $inactive)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
$_SESSION['timeout'] = time();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Сесія з таймаутом</title>
</head>
<body>
    <p>Сесія активна.</p>
</body>
</html>
