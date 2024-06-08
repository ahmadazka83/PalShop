<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "toko_online";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// echo "Koneksi Berhasil";
mysqli_close($conn);

?>