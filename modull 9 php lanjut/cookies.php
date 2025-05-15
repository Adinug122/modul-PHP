<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if(isset($_POST['submit'])){
    $nama = htmlspecialchars($_POST['nama']);
    setcookie("identitas_pengguna",$nama,time()+60);
    $_COOKIE['identitas_pengguna'] = $nama;
    echo "data diperbarui <br>";
}

if(isset($_COOKIE['identitas_pengguna'])){
    echo "haiii ".$_COOKIE['identitas_pengguna'];
}
?>

<form method="post" action="">
    <label for="nama">Masukan nama anda:</label> <br>
    <input type="text" id="nama" name="nama" value="<?php echo isset($_COOKIE['identitas_pengguna']) ? $_COOKIE['identitas_pengguna']: '';?>" required>
    <button type="submit" name="submit">Simpan</button>
</form>
</body>
</html>