<?php
// Установка cookie
if (isset($_POST['name'])) {
    setcookie("username", $_POST['name'], time() + (7 * 24 * 60 * 60)); // на 7 днів
    header("Location: index.php");
    exit();
}

// Видалення cookie
if (isset($_POST['delete_cookie'])) {
    setcookie("username", "", time() - 3600); // видалення cookie
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з $_COOKIE</title>
</head>
<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <p>Привіт, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</p>
        <form method="post">
            <button type="submit" name="delete_cookie">Видалити Cookie</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label>Ваше ім'я: <input type="text" name="name" required></label>
            <button type="submit">Зберегти</button>
        </form>
    <?php endif; ?>
</body>
</html>
