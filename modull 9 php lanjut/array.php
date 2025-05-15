<?php
$data = [
    ["nama" => "Adi", "umur" => 20],
    ["nama" => "pandu", "umur" => 19],
    ["nama" => "awa", "umur" => 29],
    ["nama" => "Bimo", "umur" => 23],
    ["nama" => "akin", "umur" => 18],
    ["nama" => "amba", "umur" => 22],
    ["nama" => "Rafid", "umur" => 25],
    ["nama" => "arka", "umur" => 21],
    ["nama" => "Fahrizal", "umur" => 19],
    ["nama" => "pendy", "umur" => 24],
    ["nama" => "dontol", "umur" => 21],
    ["nama" => "rusdi", "umur" => 22],
    ["nama" => "dimas", "umur" => 20],
    ["nama" => "ilham", "umur" => 23],
    ["nama" => "Rusdi", "umur" => 18],
];


$json = json_encode($data, JSON_PRETTY_PRINT);
echo "<pre>$json</pre>";
