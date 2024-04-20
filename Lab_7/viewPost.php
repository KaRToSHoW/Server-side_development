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
  <style>
    .sender-divider {
      border-top: 2px solid #ccc;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
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
        <li class="navigation-post__item"><a href="./addPost.php">Добавление</a></li>
        <li class="navigation-post__item"><a class="active" href="./viewPost.php">Просмотр постов</a></li>
      </ul>
    </section>

    <section class="news-line">
      <ul class="news-line__list">
        <?php
        require_once './vendor/connect.php';

        // Запрос для выборки всех хештегов из таблицы hashtags и связанных сообщений
        $sql = "SELECT hashtags.name AS hashtag_name, GROUP_CONCAT(sms.Description SEPARATOR '|') AS messages, GROUP_CONCAT(users.full_name) AS senders
                FROM hashtags
                LEFT JOIN sms ON FIND_IN_SET(hashtags.id, sms.hashtag_id)
                LEFT JOIN users ON sms.user_id = users.id
                GROUP BY hashtags.name";

        $result = $connect->query($sql);

        // Если есть хештеги, выводим сообщения для каждого хештега
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $hashtag_name = $row["hashtag_name"];
            $messages = explode('|', $row["messages"]);
            $senders = explode(',', $row["senders"]);

            echo "<li class='news-line__item'>";
            echo "<p class='news-line__message'>#" . $hashtag_name . "</p>";

            // Выводим отправителя и соответствующее сообщение для каждой группы
            foreach ($messages as $index => $message) {
              $sender = $senders[$index];
              echo "<p class='news-line__user'>От: " . $sender . "</p>";
              echo "<p class='news-line__hastags'>Сообщение: " . $message . "</p>";

              if ($index < count($messages) - 1) {
                echo "<div class='sender-divider'></div>";
              }
            }

            echo "</li>";
          }
        } else {
          echo "<p>Нет хештегов.</p>";
        }
        ?>
      </ul>
    </section>
  </main>
  <footer>
  </footer>
</body>

</html>