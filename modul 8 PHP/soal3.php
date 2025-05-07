<?php
$siswa = [
    ["noUrut" => 1, "Poin" => 75, "Siswa" => "Adi"],
    ["noUrut" => 2, "Poin" => 80, "Siswa" => "Joni"],
    ["noUrut" => 3, "Poin" => 65, "Siswa" => "Jihan"],
    ["noUrut" => 4, "Poin" => 70, "Siswa" => "Aya"],
    ["noUrut" => 5, "Poin" => 85, "Siswa" => "Ita"],
    ["noUrut" => 6, "Poin" => 90, "Siswa" => "Budi"],
    ["noUrut" => 7, "Poin" => 95, "Siswa" => "Tini"],
    ["noUrut" => 8, "Poin" => 65, "Siswa" => "Sari"],

];

//urut 5
for($i=0;$i< count($siswa);$i++){
    if($siswa[$i] ['noUrut'] == 5){
        echo " Poin siswa no 5 adalah " .$siswa[$i]['Poin'];
    }
}
//poin 90
for($i=0;$i<count($siswa);$i++){
    if($siswa[$i] ['Poin'] == 90){
        echo "<br> siswa yang memilik poin 90 adalah " .$siswa[$i]['Siswa'];
    }
}

// poin 100 hasilnya tidak ada
$temu = false;
for($i=0;$i<count($siswa);$i++){
    if($siswa[$i] ['Poin'] == 100){
        echo "<br> siswa yang memiliki point 100 adalah ".$siswa[$i]['Siswa'];
        $temu = true;
    } 
}
if(!$temu){
        echo "<br> siswa tidak ada yang memiliki point 100 ";
}
?>