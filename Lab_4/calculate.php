<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab_4</title>
    <style>
        body{
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
        }
        .wrapper {
            margin-top: 40px;
            background-color: #6666ff;
            height: 240px;
            width: 200px;
            padding: 10px;
            border-radius: 10px;
        }
        .keys{
            display: flex;
            flex-wrap: wrap;
            width: 120px;
            gap: 5px;
            margin: 21px 0 0 2px;
        }
        .result {
            font-family: sans-serif;
            background-color: #9999ff;
            display: inline-block;
            min-width: 7px;
            margin-top: 7px;
            border-radius: 5px;
            padding: 0 2px;
            border: solid 1px purple;
        }
        .input{
            background-color: #ccccff;
            display: inline-block;
            border-radius: 5px;
            border: solid 1px purple;
        }
        .clear{
            background-color: pink;
            border: solid 1px black;
            height: 21px;
            transition: background-color 0.2s linear;
            cursor: pointer;
        }
        .clear:hover{
            background-color: #b84dff;
            transition: background-color 0.2s linear;
        }
        .pins{
            background-color: pink;
            border: solid 1px black;
            width: 25px;
            transition: background-color 0.2s linear;
            cursor: pointer;
            padding: 1px;
        }
        .pins:hover{
            background-color: #b84dff;
            transition: background-color 0.2s linear;
        }
        .eval{
            background-color: pink;
            border: solid 1px black;
            height: 21px;
            transition: background-color 0.2s linear;
            cursor: pointer;
        }
        .eval:hover{
            background-color: #b84dff;
            transition: background-color 0.2s linear;
        }
    </style>
</head>
<body>
<header style="display:flex; flex-direction:column;box-sizing:border-box; margin:0;font-size:18px;font-family:monospace;"> 
        <img style="height: 85px;margin-top:10px;margin-right:50px;" src='http://localhost/server-side_development/image/Logo_Polytech_rus_main.jpg'>
        <h1>calculator</h1>
    </header>
    <main>
        <div class="wrapper" id="calculator">
            <form method="post">
                <div class="top">
                    <button type="reset" class="clear">C</button>
                    <label class="label">
                        <input class="screen input" type="" name="equation" value="">
                    </label>
                    <div class="screen result">Результат:
                        <?php
                        function isNum($x)
                        {
                            if ((!$x) or (!is_numeric($x))) {
                                return false;
                            }
                            return true;
                        }
                        function calculate($val)
                        {
                            if (!$val) {
                                return 'Выражение не задано!';
                            }
                            if (isNum($val)) {
                                return $val;
                            }

                            $args = explode('+', $val);
                            if (count($args) > 1) {
                                $sum = 0;

                                for ($i = 0; $i < count($args); $i++) {
                                    $arg = $args[$i];

                                    if (!isNum($arg)) {
                                        $arg = calculate($arg);
                                    }

                                    $sum += (int)$arg;
                                }
                                return $sum;
                            }

                            $args = explode("-", $val);
                            if (count($args) > 1) {
                                if (!is_numeric($args[0])) {
                                    $args[0] = calculate($args[0]);
                                }

                                $minusRez = $args[0];

                                for ($i = 1; $i < count($args); $i++) {
                                    if (!is_numeric($args[$i])) {
                                        $args[$i] = calculate($args[$i]);
                                    }
                                    $minusRez -= (int)$args[$i];
                                }
                                return $minusRez;
                            }

                            $args = explode('*', $val);
                            if (count($args) > 1) {
                                $sup = 1;

                                for ($i = 0; $i < count($args); $i++) {
                                    $arg = $args[$i];
                                    if (!isNum($arg)) {
                                        $arg = calculate($args[$i]);
                                    }
                                    $sup *= (int)$arg;
                                }
                                return $sup;
                            }

                            $args = explode("÷", $val);
                            if (count($args) > 1) {
                                if (!is_numeric($args[0])) {
                                    $args[0] = calculate($args[0]);
                                }
                                $del = $args[0];
                                for ($i = 1; $i < count($args); $i++) {
                                    if (!is_numeric($args[$i])) {
                                        $args[$i] = calculate($args[$i]);
                                    }
                                    if ($args[$i] == 0) {
                                        return "Делить на 0 нельзя";
                                    } else {
                                        $del /= (int)$args[$i];
                                    }
                                }
                                return $del;
                            }
                            return 'Недопустимые символы в выражении';
                        }

                        function SqValidator($val)
                        {
                            $open = 0;
                            for ($i = 0; $i < strlen($val); $i++) {
                                if ($val[$i] == '(') $open++;
                                else {
                                    if ($val[$i] == ')') {
                                        $open--;
                                        if ($open < 0) return false;
                                    }
                                }
                            }
                            if ($open !== 0) return false;
                            return true;
                        }

                        function calculateTrigonometry($func, $arg) {
                            switch ($func) {
                                case 'sin':
                                    return sin(deg2rad($arg));
                                case 'cos':
                                    return cos(deg2rad($arg));
                                case 'tan':
                                    return tan(deg2rad($arg));
                                case 'cot':
                                    return 1 / tan(deg2rad($arg));
                                default:
                                    return 'Неподдерживаемая функция';
                            }
                        }
                        
                        function calculateSq($val)
                        {
                            $val = str_replace(' ', '', $val);
                            if (preg_match('/(sin|cos|tan|cot)\([\d.]+\)/', $val)) {
                                $val = preg_replace_callback('/(sin|cos|tan|cot)\(([\d.]+)\)/', function($matches) {
                                    $func = $matches[1];
                                    $arg = floatval($matches[2]);
                                    return calculateTrigonometry($func, $arg);
                                }, $val);
                            }
                            if (strpos($val, '(') !== false) {
                                $start = strpos($val, '(');
                                $end = $start + 1;
                                $open = 1;
                                while ($open && $end < strlen($val)) {
                                    if ($val[$end] == '(') $open++;
                                    if ($val[$end] == ')') $open--;
                                    $end++;
                                }
                                $new_val = substr($val, 0, $start);
                                $new_val .= calculateSq(substr($val, $start + 1, $end - $start - 2));
                                $new_val .= substr($val, $end);
                                return calculateSq($new_val);
                            }
                            return calculate($val);
                        }
                        
                        if (isset($_POST['equation'])) {
                            $res = calculateSq($_POST['equation']);
                            echo $res;
                        };
                        
                        ?>
                        
                    </div>
                </div>

                <div class="keys">
                    <button class="pins">1</button>
                    <button class="pins">2</button>
                    <button class="pins">3</button>
                    <button class="operator pins">+</button>
                    <button class="pins">4</button>
                    <button class="pins">5</button>
                    <button class="pins">6</button>
                    <button class="operator pins">-</button>
                    <button class="pins">7</button>
                    <button class="pins">8</button>
                    <button class="pins">9</button>
                    <button class="operator pins">÷</button>
                    <button class="pins">0</button>
                    <button class="pins">(</button>
                    <button class="pins">)</button>
                    <button class="operator pins">*</button>
                    <button class="operator pins">sin</button>
                    <button class="operator pins">cos</button>
                    <button class="operator pins">tan</button>
                    <button class="operator pins">cot</button>
                    <button class="eval" type="submit">=</button>
                </div>
            </form>
        </div>
    </main>
    <script src="calculator.js"></script>
</body>