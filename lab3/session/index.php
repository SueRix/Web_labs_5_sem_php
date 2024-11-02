<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $_SESSION['user'] = $_POST['login'];
    header("Location: index.php");
    exit();
}

// Вихід
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з $_SESSION</title>
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Вітаємо, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
        <form method="post">
            <button type="submit" name="logout">Вихід</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label>Логін: <input type="text" name="login" required></label><br>
            <label>Пароль: <input type="password" name="password" required></label><br>
            <button type="submit">Увійти</button>
        </form>
    <?php endif; ?>
</body>
</html>
