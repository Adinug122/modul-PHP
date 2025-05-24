<?php

include 'koneksi.php';

//mengecek apakah url ada dinilai get id dosen

if (isset($_GET['idDosen'])){

    $id = ($_GET["idDosen"]);

    //menampilkan data t_dosen dari database
    $query = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);
    //mengecek apakah query gagal

    if(!$result){
        die ("Query Error: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }
    // mengambil data dari database membuat variable data
    //variable ini akan ditampilkan di form
    $data = mysqli_fetch_assoc($result);
    $idDosen = $data["idDosen"];
    $namaDosen = $data["namaDosen"];
    $noHP = $data["noHP"];
}else{
    //apabila data tidak ada get id akan di redirect ke index.php

    header("location:viewdosen.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="proses_editdosen.php" id="form_mahasiswa" method="post">
            <fieldset>
                <legend>Edit Data Dosen</legend>
                <p>
                    <label for="idDosen">ID: </label>
                    <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                    <input type="text" name="idDosenDisabled" id="idDosenDisabled" value="<?php echo $idDosen?>"disabled>
                </p>
                <p>
                    <label for="namaDosen">Nama Dosen : </label>
                    <input type="text" name="namaDosen" id="namaDosen" value="<?php echo $namaDosen?>">
                </p>
                <p>
                    <label for="noHP">No HP : </label>
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