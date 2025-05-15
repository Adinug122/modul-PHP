<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploada gambar</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label for="">Pilih Gambar yang akan diuplod: </label> <br>
            <input type="file" name="gambar" value="pilih gambar" id="gambar1">
        </p>
    <input type="submit" value="upload image" name="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {
        $target_dir = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadok = 1;
        $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // CEK APAKAH ADA KIRIMAN DATA DENGAN METHODE POST
        if(isset($_POST["submit"])) {
            // CHECK APAKAH FILE BERUPA GAMBAR
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if($check !== false) {
                echo "files berupa gambar - " . $check["mime"] .".";
                $uploadok = 1;
                // SIMPAN KE FOLDER GAMBAR
            } else {
                echo "file bukan gambar";
                $uploadok = 0;
            }
        }

        // deteksi apakah ada file dengan nama yang sama
        if(file_exists($target_file)) {
            echo "sorry, file already exists .";
            $uploadok = 0;
        }

        // check file size
        if($_FILES["gambar"]["size"] > 10000000000) {
        echo "sorry, file anda terlalu besar."; 
        $uploadok = 0;
        }

        // filter format
        if($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg" && $tipeGambar != "gif") {
            echo "sorry, hanya file jpg, jpeg, png & gif .";
            $uploadok = 0;
        }
        
        // check if $uploadaok telah sesuai dengan kriteria
        if ($uploadok == 0) {
            echo "Maaf, file tidak dapat diupload.<br>";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diupload.<br>";
            } else {
                echo "Maaf, ada error saat upload.<br>";
            }
        }
    }
    ?>
</body>
</html>