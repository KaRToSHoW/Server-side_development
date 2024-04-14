<?php

$servername = "localhost"; // имя сервера базы данных
$username = "root"; // имя пользователя базы данных
$password = ""; // пароль пользователя базы данных
$dbname = "sorter"; // имя базы данных

$connect = mysqli_connect($servername, $username, $password, $dbname);

// Проверка подключения
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}