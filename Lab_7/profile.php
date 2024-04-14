<?php
session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header>
        <nav>
            <a class="active" href="./register.php">Регистрация</a>
            <a href="./index.php">Авторизация</a>
            <a href="./addPost.php">Посты</a>
        </nav>
    </header>

    <!-- Профиль -->
    <main>
        <form>
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="./vendor/logout.php" class="logout">Выход</a>
        </form>
    </main>

</body>
</html>