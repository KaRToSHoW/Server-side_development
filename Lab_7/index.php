<?php
session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <header>
        <nav>
            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="./register.php">Регистрация</a>
                <a class="active" href="./index.php">Авторизация</a>
            <?php } ?>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="./profile.php">Профиль</a>
            <?php } ?>
            <a href="./addPost.php">Посты</a>
        </nav>
    </header>

    <!-- Форма авторизации -->
    <main>
        <section>
            <form action="vendor/signin.php" method="post">
                <label>Логин</label>
                <input type="text" name="login" placeholder="Введите свой логин" required>
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль" required>
                <button type="submit">Войти</button>
                <p>
                    У вас нет аккаунта? - <a href="./register.php">зарегистрируйтесь!</a>
                </p>
                <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        unset($_SESSION['message']);
                    }
                ?>
            </form>
        </section>
    </main>

</body>
</html>
