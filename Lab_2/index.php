<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
            $int = "10 + x = 33";
            $elem = explode(" ", $int);
            $firstpart = $elem[0];
            $x = $elem[2];
            $actual_x = 0;
            $res = $elem[4];
            switch ($elem[1]) {
                case "+":
                    $actual_x = $res - $firstpart;
                    break;
                case "-":
                    $actual_x = $firstpart - $res;
                    break;
                case "/":
                    $actual_x = $firstpart / $res;
                    break;
                case "*":
                    $actual_x = $res / $firstpart;
                    break;
                case "**":
                    $actual_x = log($res, $firstpart);
                    break;
            }
            echo "$actual_x"
        ?>
    </main>
</body>
</html>