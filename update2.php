<?php
include('koneksi.php');
session_start();
$conn = mysqli_connect($server, $username, $password, $database);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordbaru = $_POST['passwordbaru'];
    $email = $_POST['email'];

    // Check if the current username exists
    $checkUser = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($checkUser) > 0) {
        // Update the password and email for the specified user
        $updateQuery = "UPDATE user SET password = '$passwordbaru', email = '$email' WHERE username = '$username'";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            echo "<script>alert('Password berhasil diubah')</script>";
            if ($_SESSION['level'] == "admin") {
                header("location:login_admin.php");
            } else if ($_SESSION['level'] == "user") {
                header("location:login_user.php");
            } else {
                echo "<h1> Login failed. Invalid user level. </h1>";
            }
        } else {
            echo "<script>alert('Gagal mengubah password')</script>";
        }
    } else {
        echo "<script>alert('User tidak ditemukan')</script>";
    }
}
?>
