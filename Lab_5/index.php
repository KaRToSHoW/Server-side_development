<!-- 1 -->
<?php
    echo preg_replace("/a{3}(?=b)/", "!", "aaab");
?>
<!-- 2 -->
<?php
    $string = 'aa aba abba abbba abbbba abbbbba';
    preg_match_all('/\b(?:a(b{4,})a)\b/', $string, $matches);
    print_r($matches[0]);
?>
<!-- 3 -->
<?php
    $string = 'aba aca aea abba adca abea';
    preg_match_all('/\b(a[b|e]a)\b/', $string, $matches);
    foreach ($matches[1] as $match) {
        echo $match;
    }
?>
<!-- 4 -->
<?php
    $string = 'aae xxz 33a';
    echo preg_replace('/(.)\1/', '!', $string);
?>

