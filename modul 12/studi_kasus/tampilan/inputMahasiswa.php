<?php
require_once "../Database.php";
require_once "../Query/Mahasiswa.php";

$db = (new Database())->connection();
$mahasiswa = new Mahasiswa($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mahasiswa->npm = $_POST['npm'] ?? null;
    $mahasiswa->namaMHS = $_POST['namaMHS'];
    $mahasiswa->prodi = $_POST['prodi'];
    $mahasiswa->noHP = $_POST['noHP'] ;
    $mahasiswa->alamat = $_POST['alamat'] ;

    if(!empty($_POST['isEdit'])){
        $mahasiswa->update();
    }else{
        $mahasiswa->create();
    }
    header("location:viewMahasiswa.php");
    exit;
}

$editData = null;

if (isset($_GET['edit'])){
    $editData = $mahasiswa->cari($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
     <h2><?= $editData ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
    <form method="POST">
        
       <?php if ($editData): ?>
        <input type="hidden" name="oldNpm" value="<?= $editData['npm'] ?>">
    <?php endif; ?>

    <label>NPM:</label>
    <input type="text" name="npm" value="<?= $editData['npm'] ?? '' ?>" required>


        <label>Nama Mahasiswa:</label>
        <input type="text" name="namaMHS" value="<?php echo $editData['namaMHS'] ?? '' ?>" required>

        <label>No HP:</label>
        <input type="text" name="noHP" value="<?php echo $editData['noHP'] ?? '' ?>" required>
        <label>Prodi:</label>
        <input type="text" name="prodi" value="<?php echo $editData['prodi'] ?? '' ?>" required>
        <label>alamat:</label>
        <input type="text" name="alamat" value="<?php echo $editData['alamat'] ?? '' ?>" required>

        <?php if ($editData): ?>
            <input type="hidden" name="isEdit" value="1">
        <?php endif; ?>

        <button type="submit"><?= $editData ? 'Update' : 'Simpan' ?></button>
    </form>

    <a href="viewMahasiswa.php">← Kembali ke daftar</a>
</body>
</html>
