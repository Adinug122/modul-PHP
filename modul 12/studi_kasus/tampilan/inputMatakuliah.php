<?php
require_once "../Database.php";
require_once "../Query/Matakuliah.php";

$db = (new Database())->connection();
$matakuliah = new Matakuliah($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $matakuliah->kodeMK =$_POST['kodeMK'] ?? null;
    $matakuliah->namaMK = $_POST['namaMK'];
    $matakuliah->SKS = $_POST['SKS'];
    $matakuliah->JAM = $_POST['JAM'] ;


    if(!empty($_POST['isEdit'])){
           $matakuliah->oldKodeMK = $_POST['oldKodeMK'];
        $matakuliah->update();
    }else{
        $matakuliah->create();
    }
    header("location:viewMatakuliah.php");
    exit;
}

$editData = null;

if (isset($_GET['edit'])){
    $editData = $matakuliah->cari($_GET['edit']);
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
        <input type="hidden" name="oldKodeMK" value="<?= $editData['kodeMK'] ?>">
    <?php endif; ?>

    <label>kodeMK:</label>
    <input type="text" name="kodeMK" value="<?= $editData['kodeMK'] ?? '' ?>" required>


        <label>Nama Matakuliah:</label>
        <input type="text" name="namaMK" value="<?php echo $editData['namaMK'] ?? '' ?>" required>

        <label>SKS:</label>
        <input type="text" name="SKS" value="<?php echo $editData['SKS'] ?? '' ?>" required>
        <label>JAM:</label>
        <input type="text" name="JAM" value="<?php echo $editData['JAM'] ?? '' ?>" required>
    

        <?php if ($editData): ?>
            <input type="hidden" name="isEdit" value="1">
        <?php endif; ?>

        <button type="submit"><?= $editData ? 'Update' : 'Simpan' ?></button>
    </form>

    <a href="viewMatakuliah.php">← Kembali ke daftar</a>
</body>
</html>
