<?php
$x = 10;
while($x >= 5){
    echo "Nomor : $x <br>";
    $x--;
}
//do while

$x = 1;
do {
    echo "Nomor: $x <br>";
    $x++;
}while ($x <=5 );

//foreach

$colors = array("red", "green","blue", "yellow");
foreach($colors as $value) {
    echo "$value <br>"; 
}

//for

for ($x = 0; $x <= 10; $x++){
    echo "nomor: $x <br>";
}
for ($x = 0; $x <10; $x++){
    if ($x == 4){
        break;
    }
    echo "Nomor : : $x <br>";
}
?>