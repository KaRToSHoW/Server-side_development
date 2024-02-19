<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3</title>
</head>

<body>
    <main>
        <?php
            $res = get_headers("http://localhost/Server-side_development/Lab_3/index.html");
            foreach ($res as $element){
            echo $element . "<br>";
            }
        ?>
    </main>
    <a href="index.html">Обратно</a>
</body>
</html>