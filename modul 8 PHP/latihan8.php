<?php

$array = array(
    "1C"=>array("udin","ismail","adi"),
    "1D"=>array("lukman", "fajri","mahmud")
);
print_r($array);
echo "<br>";
print_r($array['1D']);
echo "<br>";
echo $array['1D'][0];

//tampilkan fajri
echo $array['1D'][1];
//tampilkan andi
echo $array['1C'][2];

//data kelas bisa ditulis juga dengan

$array_simple = [
    "1C"=>["udin","ismail","adi"],
    "1D"=>["lukman", "fajri","mahmud"]
];
?>