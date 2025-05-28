<?php
require_once "../Database.php";
require_once "../Query/Dosen.php";

$db = (new Database())->connection();
$dosen = new Dosen($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dosen->idDosen = $_POST['idDosen'] ?? null;
    $dosen->namaDosen = $_POST['namaDosen'];
    $dosen->noHP = $_POST['noHP'] ;

    if(!empty($_POST['isEdit'])){
        $dosen->update();
    }else{
        $dosen->create();
    }
    header("location:viewdosen.php");
    exit;
}

$editData = null;

if (isset($_GET['edit'])){
    $editData = $dosen->cari($_GET['edit']);
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
     <h2><?= $editData ? 'Edit' : 'Tambah' ?> Dosen</h2>
    <form method="POST">
        <?php if ($editData): ?>
            <input type="hidden" name="idDosen" value="<?= $editData['idDosen'] ?>">
        <?php endif; ?>

        <label>Nama Dosen:</label>
        <input type="text" name="namaDosen" value="<?= $editData['namaDosen'] ?? '' ?>" required>

        <label>No HP:</label>
        <input type="text" name="noHP" value="<?= $editData['noHP'] ?? '' ?>" required>

        <?php if ($editData): ?>
            <input type="hidden" name="isEdit" value="1">
        <?php endif; ?>

        <button type="submit"><?= $editData ? 'Update' : 'Simpan' ?></button>
    </form>

    <a href="viewDosen.php">← Kembali ke daftar</a>
</body>
</html>
