<?php
session_start();
require_once 'connect.php';

$userid = $_SESSION['user']['id'];
$text = $_POST["sms"];

// Найти все хэштеги в сообщении
preg_match_all('/#\w+/', $text, $matches);
$hashtags = $matches[0];

// Удалить все хэштеги из текста сообщения
$text_without_hashtags = preg_replace('/#\w+\s*/', '', $text);

// Если есть хотя бы один хэштег
if (!empty($hashtags)) {
    // Убрать первый символ '#' только из первого хэштега
    $hashtags[0] = ltrim($hashtags[0], '#');
    
    // Объединить хэштеги в одну строку без пробелов
    $hashtags_str = implode('', $hashtags);

    // Вставить хэштеги в таблицу hashtags как одну строку
    $sql = "INSERT INTO `hashtags` (name, Data) VALUES ('$hashtags_str', '$text')";
    if ($connect->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

// Вставить запись в таблицу sms с учетом имени пользователя и текста сообщения
$sql_insert_sms = "INSERT INTO sms (hashtag_id, Description, user_id, Data) VALUES ('$connect->insert_id', '$text_without_hashtags', '$userid', '$text')";
if (mysqli_query($connect, $sql_insert_sms)) {
    $_SESSION['message'] = 'Пост успешно добавлен!';
} else {
    echo "Error: " . $sql_insert_sms . "<br>" . mysqli_error($connect);
}

// Перенаправить пользователя на страницу добавления поста
header('Location: ../addpost.php');
?>
