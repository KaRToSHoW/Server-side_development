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

if (!empty($hashtags)) {
    $hashtags[0] = ltrim($hashtags[0], '#');
    $hashtags_str = implode('', $hashtags);

    $sql = "INSERT INTO `hashtags` (name, Data) VALUES ('$hashtags_str', '$text')";
    if ($connect->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

$sql_insert_sms = "INSERT INTO sms (hashtag_id, Description, user_id, Data) VALUES ('$connect->insert_id', '$text_without_hashtags', '$userid', '$text')";
if (mysqli_query($connect, $sql_insert_sms)) {
    $_SESSION['message'] = 'Пост успешно добавлен!';
} else {
    echo "Error: " . $sql_insert_sms . "<br>" . mysqli_error($connect);
}

header('Location: ../addpost.php');
?>
