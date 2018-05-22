<!DOCTYPE html>
<html>
<body>

<?php
$x = 5;
$y = 10;

function myTest() {
    global $x, $y, $z;
    $z = $x + $y;
} 

myTest();  // run function
echo $z; // output the new value for variable $y
?>

</body>
</html>