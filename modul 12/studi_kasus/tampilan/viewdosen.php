<?php
require_once "../Database.php";
require_once "../Query/Dosen.php";

$db = (new Database())->connection();
$dosen = new Dosen($db);

if (isset($_GET['delete'])) {
    $dosen->idDosen = $_GET['delete'];
    $dosen->delete();
    header("location:viewdosen.php");
    exit;
}
$data = $dosen->readAll();
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

    <h2>Dosen</h2>
    <a href="inputDosen.php" class="button">Input</a>

    <table border="solid">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['idDosen'] ?></td>
                <td><?php echo  $row['namaDosen'] ?></td>
                <td><?php echo $row['noHp'] ?></td>
               <td class="action">
                <a href="inputDosen.php?edit=<?php echo $row['idDosen']; ?>">Edit</a>
                <a href="viewdosen.php?delete=<?php echo $row['idDosen']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            </tr>
        <?php endwhile;
        ?>
    </table>
</body>

</html>