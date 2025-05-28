<?php
require_once "../Database.php";
require_once "../Query/Matakuliah.php";

$db = (new Database())->connection();
$matakuliah = new Matakuliah ($db);

if (isset($_GET['delete'])) {
    $matakuliah->kodeMK = $_GET['delete'];
    $matakuliah->delete();
    header("location:viewMatakuliah.php");
    exit;
}
$data = $matakuliah->tampilkan();
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

    <h2>Matakuliah</h2>
    <a href="inputMatakuliah.php" class="button">Input</a>

    <table border="solid">
        <tr>
            <th>kodeMK</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>JAM</th>
        </tr>
        <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['kodeMK'] ?></td>
                <td><?php echo  $row['namaMK'] ?></td>
                <td><?php echo $row['SKS'] ?></td>
                <td><?php echo $row['JAM'] ?></td>
               <td class="action">
                <a href="inputMatakuliah.php?edit=<?php echo $row['kodeMK']; ?>">Edit</a>
                <a href="viewMatakuliah.php?delete=<?php echo $row['kodeMK']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            </tr>
        <?php endwhile;
        ?>
    </table>
</body>

</html>