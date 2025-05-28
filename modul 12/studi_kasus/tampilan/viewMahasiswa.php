<?php
require_once "../Database.php";
require_once "../Query/Mahasiswa.php";

$db = (new Database())->connection();
$mahasiswa = new Mahasiswa($db);

if (isset($_GET['delete'])) {
    $mahasiswa->npm = $_GET['delete'];
    $mahasiswa->delete();
    header("location:viewMahasiswa.php");
    exit;
}
$data = $mahasiswa->tampilkan();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #eee;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        background: white;
        margin-top: 30px;
    }

    th tr td {
        background-color: white;
        text-align: center;
    }
    a{
        text-decoration: none; 
    
    }
      a.button {
            padding: 8px 12px;
            background:rgb(59, 40, 167);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a.button:hover {
            background:rgb(110, 33, 136);
        }

        .aksi a {
            margin-left: 10px;
        }
 
</style>

<body>

    <h2>Mahasiswa</h2>
    <a href="inputMahasiswa.php" class="button">Input</a>

    <table border="solid">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Prodi</th>
        </tr>
        <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['npm'] ?></td>
                <td><?php echo  $row['namaMHS'] ?></td>
                <td><?php echo $row['noHP'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['prodi'] ?></td>
               <td class="action">
                <a href="inputMahasiswa.php?edit=<?php echo $row['npm']; ?>">Edit</a>
                <a href="viewMahasiswa.php?delete=<?php echo $row['npm']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            </tr>
        <?php endwhile;
        ?>1
    </table>
</body>

</html>