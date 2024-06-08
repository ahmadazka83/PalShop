<?php
include 'koneksi.php';

if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $conn = mysqli_connect($server, $username, $password, $database);
    
    // Update nilai kolom 'Keranjang' menjadi kosong
    $query = "UPDATE barang SET Keranjang='' WHERE ID='$ID'";
    
    if(mysqli_query($conn, $query)) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "ID tidak ditemukan.";
}
?>
