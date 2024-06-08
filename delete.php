<?php
include 'koneksi.php';
session_start();
$conn = mysqli_connect($server, $username, $password, $database);

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];

    $delete = mysqli_query($conn, "DELETE FROM user WHERE ID='$ID'");
    if($delete){
        echo "<script>alert('Data berhasil dihapus!')</script>";
        header("location: login_admin.php");
    } else {
        echo "Data gagal dihapus!";
    }
} else {
    echo "Invalid request!";
}
?>