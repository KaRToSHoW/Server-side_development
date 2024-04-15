<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/main.css">
  <title>Document</title>
</head>

<body>
  <header>
    <nav>
    <?php if (!isset($_SESSION['user'])) { ?>
                <a href="./register.php">Регистрация</a>
                <a href="./index.php">Авторизация</a>
            <?php } ?>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="./profile.php">Профиль</a>
            <?php } ?>
      <a class="active" href="./addPost.php">Посты</a>
    </nav>
  </header>
  <main>
    <section class="navigation-post">
      <ul class="navigation-post__list">
        <li class="navigation-post__item"><a class="active" href="./addPost.php">Добавление</a></li>
        <li class="navigation-post__item"><a href="./viewPost.php">Просмотр постов</a></li>
      </ul>
    </section>

    <section class="message">
      <form class="message__form" action="vendor/addMessage.php" method="post">
        <label class="message__label">
          <span>Введите ваш пост</span>
          <textarea name="sms" cols="50" rows="10" class="message__textarea" required></textarea>
        </label>
        <button class="message__bth" type="submit">Добавить запись</button>
      </form>
    </section>
  </main>
  <footer>
    <?php
    if (isset($_SESSION['message'])) {
      echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      unset($_SESSION['message']);
    }
    ?>
  </footer>
</body>

</html>