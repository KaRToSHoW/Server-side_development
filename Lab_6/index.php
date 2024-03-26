<?php
    $db = require('db.php');
    $connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) print_r(mysqli_connect_error());
    if(!isset($_GET['p'])) $_GET['p'] = 'view';
    if (!isset($_GET['o'])) $_GET['o']='id';
    if (!isset($_GET['page'])) $_GET['page']='0';
    if (isset($_POST['firstname'])){
        $sql = "INSERT INTO `friends`
                (`firstname`, `name`, `lastname`, `gender`, `date`, `phone`, `email`, `adress`, `comment`)
                VALUES (
                '".htmlspecialchars($_POST['firstname'])."',
                '".htmlspecialchars($_POST['name'])."',
                '".htmlspecialchars($_POST['lastname'])."',                       
                '".$_POST['gender']."',
                '".$_POST['date']."',
                '".$_POST['phone']."',
                '".htmlspecialchars($_POST['email'])."',                       
                '".htmlspecialchars($_POST['adress'])."',                       
                '".htmlspecialchars($_POST['comment'])."'
                )";        
                mysqli_query($connect, $sql);
            if (mysqli_errno($connect)) print_r(mysqli_error($connect));
            }
    require('header.php');
        if ($_GET['p']=='view') include('view.php');
        if ($_GET['p']=='add') include('add.php');
        if ($_GET['p']=='update') include('update.php');
        if ($_GET['p']=='delete') include('delete.php');
    require('footer.php');
?>