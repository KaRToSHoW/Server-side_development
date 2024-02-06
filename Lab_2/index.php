<?php
    function separator(){
        echo '<br>------------<br>';
    }
    $m1 = array('summer');
    print $m1[0].'<br>';
    separator();
    $m2[0] = 'winter';
    var_dump($m2).'<br>';

    $m3 = array(3, 'autumn',100);
    $m3[3]=7;
    $m3[5]='five';
    $m3[6]=22;
    $m3['arr']='arr';
    var_dump($m3);
    separator();

    // for ($i=0; $i < count($m3); $i++) { 
    //     echo $m3[$i].'<br>';
    // }
    foreach($m3 as $value){
        echo $value.'<br>';
    }
    separator();
    foreach($m3 as $key=>$value){
        echo $key.'=>'.$value.'<br>';
    }
    separator();
    $a = array(1,2);
    $b = array(1,3);
    $c = $a+$b;
    var_dump($c);
    echo '<br>';
    foreach ($c as $key => $value) {
        echo $key.'='.$value.'<br>';
    }
    separator();
    $d = array(2 => 'a', 3 => 'b', 8 => 'c');
    var_dump($a+$d);
    separator();
    var_dump($a==$b);
    echo '<br>';
    var_dump($a===$b);
    echo '<br>';
    var_dump($a!=$b);
    echo '<br>';
    var_dump($a!==$b);
    separator();
?>