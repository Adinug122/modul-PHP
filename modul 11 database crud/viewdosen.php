<?php
require_once 'koneksi.php';

$db = new Database();


 $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

            if (!empty($keyword)) {
                echo "<p style='text-align:center; color:green;'>Menampilkan hasil pencarian untuk: <strong>" . htmlspecialchars($keyword) . "</strong></p>";
                $query = "SELECT * FROM t_dosen WHERE nameDosen LIKE ? ORDER BY idDosen ASC";
                $stmt = $db->prepare($query);
                $param = "%" . $keyword . "%";
                $stmt->bind_param("s", $param);

            } else {
                $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";

                $stmt = $db->prepare($query);
        }
        $stmt->execute();
        $hasil=$stmt->get_result();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 840px;
            margin: auto;
        }
        h1{
            text-align: center;
        }
        form{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Tabel Dosen</h1>
    <center><a href="input.php">Input Data</a></center>
    <form method="GET" action="viewdosen.php">
            <input type="text" name="keyword" placeholder="Cari Nama..." style="padding: 8px; width: 250px;" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <input type="submit" value="Cari" style="padding: 8px;">
          <a href="viewdosen.php" style="padding: 8px; background-color: #ccc; text-decoration: none; border-radius: 4px;">Reset</a>
        </form>
    <br/>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Dosen</th>
            <th>No HP</th>
            <th>Pilihan</th>
        </tr>
        <?php
          
        // hasil query akan disimpan dalam variable bentuyk array
        //kemudian akan dicetak dengan perulangan while

        while ($data = $hasil->fetch_assoc())
        {
            //mencetak data

            echo "<tr>";
            echo "<td>". htmlspecialchars($data['idDosen']) . "</td>"; //data id dosen
            echo "<td>". htmlspecialchars($data['namaDosen']). "</td>"; //data nama dosen
            echo "<td>". htmlspecialchars($data['noHP'])."</td>"; //data no hp dosen

            //membuat link mngedit dan menghapus dtaa

            echo '<td>
            <a href="editdosen.php?idDosen='.$data['idDosen'].'">Edit</a>
            <a href="hapusdosen.php?idDosen='.$data['idDosen'].'"
            onclick="return confirm(\'anda yakin akan menghapus data?\')">Hapus</a>
         </td>';
         echo "</tr>";
        }
        ?>
    </table>
</body>
</html>