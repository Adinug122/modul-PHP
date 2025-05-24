<?php

include 'koneksi.php';

//mengecek apakah url ada dinilai get id dosen

if (isset($_GET['kodeMK'])){
    $kodeMK = $_GET['kodeMK'];
    $query = "SELECT * FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);

    if(!$result){
        die ("Query Error: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $kodeMK = $data["kodeMK"];
    $namaMK = $data["namaMK"];
    $SKS = $data["SKS"];
    $JAM = $data["JAM"];
 
} else {
    header("location:viewMataKuliah.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MataKuliah</title>
    <style>
        h1{
            text-align: center;
        }
        .container{
            width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Edit Data</h1>
    <div class="container">
        <form action="proses_editmatakuliah.php" id="form_mahasiswa" method="post">
            <fieldset>
                <legend>Edit Data Mahasiswa</legend>
                <p>
                    <label for="kodeMK">kodeMK: </label>
                    <input type="text" name="kodeMK" value="<?php echo $kodeMK; ?>">
                </p>
                <p>
                    <label for="namaMK">Nama MataKuliah : </label>
                    <input type="text" name="namaMK" id="namaMK" value="<?php echo $namaMK?>">
                </p>
                <p>
                    <label for="SKS"> SKS: </label>
                    <input type="text" name="SKS" id="SKS" value="<?php echo $SKS?>">
                </p>
                <p>
                    <label for="JAM"> JAM: </label>
                    <input type="text" name="JAM" id="JAM" value="<?php echo $JAM?>">
                </p>
            </fieldset>
            <p>
                <input type="submit" name="edit" value="Update data">
            </p>
        </form>
    </div>
    
</body>
</html>