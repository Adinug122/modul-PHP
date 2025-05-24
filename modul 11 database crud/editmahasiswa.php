<?php

include 'koneksi.php';

//mengecek apakah url ada dinilai get id dosen

if (isset($_GET['npm'])){
    $npm = $_GET['npm'];
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if(!$result){
        die ("Query Error: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $NPM = $data["npm"];
    $namaMahasiswa = $data["namaMHS"];
    $noHP = $data["noHP"];
    $prodi = $data["prodi"];
    $alamat = $data["alamat"];
} else {
    header("location:viewMahasiswa.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
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
        <form action="proses_editmahasiswa.php" id="form_mahasiswa" method="post">
            <fieldset>
                <legend>Edit Data Mahasiswa</legend>
                <p>
                    <input type="hidden" name="npm_lama" value="<?php echo $npm; ?>">
                    <label for="npm">NPM: </label>
                    <input type="text" name="npm" value="<?php echo $npm; ?>">

                </p>
                <p>
                    <label for="namaMHS">Nama Mahasiswa : </label>
                    <input type="text" name="namaMHS" id="namaMHS" value="<?php echo $namaMahasiswa?>">
                </p>
                <p>
                    <label for="prodi"> Program studi: </label>
                    <input type="text" name="prodi" id="prodi" value="<?php echo $prodi?>">
                </p>
                <p>
                    <label for="alamat"> Alamat: </label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $alamat?>">
                </p>
                <p>
                    <label for="noHP"> No HP: </label>
                    <input type="text" name="noHP" id="noHP" value="<?php echo $noHP?>">
                </p>
            </fieldset>
            <p>
                <input type="submit" name="edit" value="Update data">
            </p>
        </form>
    </div>
    
</body>
</html>