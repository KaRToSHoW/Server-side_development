<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab_1</title>
</head>
<body>
    <header style="display:flex; flex-direction:row;box-sizing:border-box; margin:0;font-size:18px;font-family:monospace;"> 
        <img style="height: 85px;margin-top:10px;margin-right:50px;" src='http://localhost/server-side_development/Lab_1/image/Logo_Polytech_rus_main.jpg'>
        <h1>Hello, World!</h1>
    </header>
    <main>
        <h2 style="font-size:22px;">
            <?php
            echo "Hello, World! Today: ".date("d.m.y");
            ?>
        </h2>
    </main>
    <footer>
        <p style="font-size:20px;">Создать любой html элемент с 
        адеквтаным динамическим контеном</p>
    </footer>
</body>
</html>