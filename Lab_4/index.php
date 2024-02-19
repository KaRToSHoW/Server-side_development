<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <textarea name="" id="" cols="30" rows="10">
        <?php 
            print_r(get_headers(`https://httpbin.org/post`))
        ?>
        </textarea>
        <a href="http://localhost/server-side_development/Lab_4/index.index">Back</a>
    </main>
</body>
</html>