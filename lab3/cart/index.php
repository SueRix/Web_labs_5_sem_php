<?php
session_start();

// Ініціалізуємо корзину в сесії, якщо вона ще не створена
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Додавання товару до корзини
if (isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
    setcookie("previous_cart", json_encode($_SESSION['cart']), time() + (7 * 24 * 60 * 60)); // на 7 днів
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Корзина покупок</title>
</head>
<body>
    <h2>Додати товар до корзини</h2>
    <form method="post">
        <input type="text" name="product" placeholder="Назва товару" required>
        <button type="submit">Додати</button>
    </form>

    <h2>Ваші товари в корзині:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($_COOKIE['previous_cart'])): ?>
        <h2>Товари з попередньої сесії:</h2>
        <ul>
            <?php foreach (json_decode($_COOKIE['previous_cart'], true) as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
