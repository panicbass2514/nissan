<?php
$name = 'Peter';
$a = 1;
$b = 2;
$str = <<<'FOO'
My name is: '$name' The result is: "$a + $b"
FOO;

echo $str;
?>