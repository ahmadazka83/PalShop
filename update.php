<?php
include 'koneksi.php';
error_reporting(0);
session_start();
$conn = mysqli_connect($server, $username, $password, $database);

if(isset($_POST['submit'])){
    $ID = @$_GET['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];

    $update = mysqli_query($conn, "update user set ID='$ID', username='$username', password='$password', level='$level', email='$email' where ID='$ID' ");
    if($update){
        echo "<script>alert('Selamat, data berhasil diupdate!')</script>";
    }
    else{
        echo "Data gagal diupdate!";
    }
}
?>

<a href="login_admin.php">Back</a>