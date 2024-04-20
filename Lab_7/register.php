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
        <?php if (!isset($_SESSION['user'])) { ?>
                <a class="active" href="./register.php">Регистрация</a>
                <a href="./index.php">Авторизация</a>
            <?php } ?>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="./profile.php">Профиль</a>
            <?php } ?>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="./addPost.php">Посты</a>
            <?php } ?>
        </nav>
    </header>


    <main>
        <form class="form" action="vendor/signup.php" method="post">
            <label>Имя</label>
            <p class="error-message"></p>
            <input class="input" type="text" name="full_name" placeholder="Введите свое полное имя" required>
            <label>Логин</label>
            <p class="error-message"></p>
            <input class="input" type="text" name="login" placeholder="Введите свой логин" required>
            <label>Почта</label>
            <p class="error-message"></p>
            <input class="input" type="email" name="email" placeholder="Введите адрес своей почты" required>
            <label>Пароль</label>
            <p class="error-message"></p>
            <input class="input" type="password" name="password" placeholder="Введите пароль" required>
            <label>Подтверждение пароля</label>
            <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
            <button type="submit">Войти</button>
            <p>
                У вас уже есть аккаунт? - <a href="./index.php">авторизуйтесь</a>!
            </p>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            ?>
        </form>
    </main>
</body>

</html>