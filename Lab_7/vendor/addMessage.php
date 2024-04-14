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

// Добавить каждый хэштег в таблицу hashtags и сохранить его id
$hashtag_ids = array();
foreach ($hashtags as $hashtag) {
    // Извлечь имя хэштега, убрав символ '#'
    $hashtag_name = str_replace('#', '', $hashtag);
    
    // Вставить хэштег в таблицу hashtags
    $sql = "INSERT INTO `hashtags` (name, Data) VALUES ('$hashtag_name', '$text')";
    if ($connect->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
    
    // Получить id добавленного хэштега и добавить его в список id
    $hashtag_ids[] = $connect->insert_id;
}

// Сформировать строку из id хэштегов
$hashtag_ids_str = implode(',', $hashtag_ids);

// Вставить запись в таблицу sms с учетом имени пользователя и текста сообщения
$sql_insert_sms = "INSERT INTO sms (hashtag_id, Description, user_id, Data) VALUES ('$hashtag_ids_str', '$text_without_hashtags', '$userid', '$text')";
if (mysqli_query($connect, $sql_insert_sms)) {
    $_SESSION['message'] = 'Пост успешно добавлен!';
} else {
    echo "Error: " . $sql_insert_sms . "<br>" . mysqli_error($connect);
}

// Перенаправить пользователя на страницу добавления поста
header('Location: ../addpost.php');
