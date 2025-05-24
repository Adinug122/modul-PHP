<?php
if (isset($_POST['edit'])) {
    include("koneksi.php");

    // Pastikan sama dengan name di form (case sensitive)
  $npm_lama = $_POST['npm_lama'];  // NPM lama dari hidden field
    $npm = $_POST['npm'];  
    $namaMahasiswa = $_POST['namaMHS'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    $query = "UPDATE t_mahasiswa SET 
                npm = '$npm',
                namaMHS = '$namaMahasiswa', 
                prodi = '$prodi', 
                alamat = '$alamat',  
                noHP = '$noHP' 
              WHERE npm = '$npm_lama'";

    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    // Redirect setelah berhasil update
    header("Location: viewMahasiswa.php");
    exit;
} else {
    // Jika akses langsung ke file tanpa submit form
    header("Location: viewMahasiswa.php");
    exit;
}
?>
