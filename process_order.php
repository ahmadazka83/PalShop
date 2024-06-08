<?php
session_start();

include 'koneksi.php';
$conn = mysqli_connect($server, $username, $password, $database);

if(!isset($_SESSION['username'])) {
    header("location: index.php?pesan=gagal");
    exit();
}

$id_barang = $_POST['id_barang'];
$nama_pengirim = $_POST['nama'];
$alamat_pengiriman = $_POST['alamat'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$bukti_pembayaran = $_FILES['bukti_pembayaran']['name']; 

$target_dir = "asset/"; 
$target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);

$query = "INSERT INTO pesanan (id_barang, nama_pengirim, alamat_pengiriman, jumlah, keterangan, bukti_pembayaran) VALUES ('$id_barang', '$nama_pengirim', '$alamat_pengiriman', '$jumlah', '$keterangan', '$bukti_pembayaran')";
$result = mysqli_query($conn, $query);

if($result) {
    move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file);
    header("location: completeOrder.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
