<?php
$db = require 'db.php';
$connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (mysqli_connect_errno()) print_r(mysqli_connect_error());

if (isset($_GET['p']) && $_GET['p'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleted_lastname = '';
    // Получение данных для вывода сообщения об удалении
    $sql_select = "SELECT `firstname`, `lastname` FROM `friends` WHERE `id` = $id";
    $res = mysqli_query($connect, $sql_select);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $deleted_lastname = $row['lastname'];
    } else {
        echo 'Ошибка при выполнении запроса';
    }
    // Удаление записи из базы данных
    $delete_query = "DELETE FROM `friends` WHERE `id` = $id";
    $result = mysqli_query($connect, $delete_query);
    if ($result) {
        echo 'Запись с фамилией ' . $deleted_lastname . ' удалена' . '<br>';
        $sql = "ALTER TABLE friends AUTO_INCREMENT = 1";
        $res = mysqli_query($connect, $sql);
    } else {
        echo 'Ошибка при удалении записи';
    }
    // Восстановление порядка ID 
    // $sql_reset = "ALTER TABLE friends AUTO_INCREMENT = 1";
    // $res = mysqli_query($connect, $sql_reset);
    // if (!$res) {
    //     echo 'Ошибка при восстановлении порядка ID';
    // }
}

$sql_select_all = "SELECT `id`, `firstname`, LEFT(`name`, 1) AS name, LEFT(`lastname`, 1) AS lastname FROM `friends`";
$res = mysqli_query($connect, $sql_select_all);

while ($arr = mysqli_fetch_assoc($res)) {
    echo '<a href="delete.php?p=delete&id=' . $arr['id'] . '">' . $arr['firstname'] . ' ' . $arr['name'] . '.' . $arr['lastname'] . '.</a><br>';
};