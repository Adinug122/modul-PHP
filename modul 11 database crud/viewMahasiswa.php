<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
            word-wrap: break-word;
        }

        table th {
            background-color: #2e86de;
            color: #fff;
            font-weight: 600;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #2e86de;
            text-decoration: none;
            margin-right: 10px;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        .center {
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h1>Tabel Mahasiswa</h1>
    <center>
        <form method="GET" action="viewMahasiswa.php">
            <input type="text" name="keyword" placeholder="Cari Nama..." style="padding: 8px; width: 250px;" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <input type="submit" value="Cari" style="padding: 8px;">
          <a href="viewMahasiswa.php" style="padding: 8px; background-color: #ccc; text-decoration: none; border-radius: 4px;">Reset</a>
        </form>

        <br>
        <a href="inputMahasiswa.php">Input Data</a>
    </center>
    <br />
    <div class="container">
        <table border="1">
            <tr>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Pilihan</th>
            </tr>
            <?php
            // jalankan query menampilkan data
             $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

            if (!empty($keyword)) {
                echo "<p style='text-align:center; color:green;'>Menampilkan hasil pencarian untuk: <strong>" . htmlspecialchars($keyword) . "</strong></p>";
                $query = "SELECT * FROM t_mahasiswa 
                          WHERE namaMHS LIKE '%$keyword%' 
                          ORDER BY npm ASC";
            } else {
                $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
            }

            // ✅ JALANKAN QUERY DI SINI
            $result = mysqli_query($link, $query);

            // CEK ERROR
            if (!$result) {
                die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
            }
            // hasil query akan disimpan dalam variable bentuyk array
            //kemudian akan dicetak dengan perulangan while

            while ($data = mysqli_fetch_assoc($result)) {
                //mencetak data

                echo "<tr>";
                echo "<td>$data[npm]</td>";
                echo "<td>$data[namaMHS]</td>";
                echo "<td>$data[prodi]</td>";
                echo "<td>$data[alamat]</td>";
                echo "<td>$data[noHP]</td>";

                //membuat link mngedit dan menghapus dtaa

                echo '<td>
            <a href="editmahasiswa.php?npm=' . $data['npm'] . '">Edit</a>
            <a href="hapusmahasiswa.php?npm=' . $data['npm'] . '"
            onclick="return confirm(\'anda yakin akan menghapus data?\')">Hapus</a>
         </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>