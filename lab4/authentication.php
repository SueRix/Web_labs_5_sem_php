<?php
session_start();

try {
    $connection = new PDO("pgsql:host=postgres;dbname=users_db;user=laravel-getting-started-user;password=laravel-getting-started-password");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = $connection->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $query->bindParam(':username', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $hashedPassword);
            
            if ($query->execute()) {
                echo "Успішна реєстрація!";
            } else {
                echo "Не вдалося зареєструватися.";
            }
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = $connection->prepare("SELECT id, password FROM users WHERE username = :username");
            $query->bindParam(':username', $username);
            $query->execute();

            if ($query->rowCount() > 0) {
                $userData = $query->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $userData['password'])) {
                    $_SESSION['user_id'] = $userData['id'];
                    header("Location: welcome.php");
                    exit;
                } else {
                    echo "Неправильний пароль.";
                }
            } else {
                echo "Користувача не знайдено.";
            }
        }
    }
} catch (PDOException $error) {
    echo "Не вдалося підключитися: " . $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація та Авторизація</title>
</head>
<body>

<h2>Реєстрація</h2>
<form method="POST" action="auth.php">
    <input type="hidden" name="register">
    <label>Логін:</label>
    <input type="text" name="username" required><br>
    <label>Електронна адреса:</label>
    <input type="email" name="email" required><br>
    <label>Пароль:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Зареєструватися</button>
</form>

<h2>Авторизація</h2>
<form method="POST" action="auth.php">
    <input type="hidden" name="login">
    <label>Логін:</label>
    <input type="text" name="username" required><br>
    <label>Пароль:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Увійти</button>
</form>

</body>
</html>
