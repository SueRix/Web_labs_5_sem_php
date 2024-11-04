<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}
echo "Привіт!!!! Ви попали на цю сторінку бо залогінилися!";
?>