<?php
session_start();

//ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

//tentukan lokasi file yang akan dipindahkan
$dirUpload = "Terupload/";

//pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload){
    echo "Selamat, Upload Data Berhasil<br>";

    // Simpan path file ke database
    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);

    $ID = $_GET['ID'];
    $path = $dirUpload . $namaFile;

    // Update path file dalam database
    $query = "UPDATE user SET file_path = '$path' WHERE ID = $ID";
    mysqli_query($conn, $query);

    mysqli_close($conn);
}
else{
    echo "Upload Gagal";
}
?>
<a href="login_admin.php">Back</a>