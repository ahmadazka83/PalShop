<?php 

session_start();

include 'koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMAILER\PHPMAILER\SMTP;
use PHPMAILER\PHPMAILER\Exception;

require 'vendor/autoload.php';

$conn = mysqli_connect($server, $username, $password, $database);

//$token = $_GET['t'];
$mail = new PHPMailer(true);
$mail -> SMTPDebug = 0; /* 1 untuk lihat informasi */
$mail -> isSMTP();
$mail -> Host = 'smtp.gmail.com';
$mail -> SMTPAuth = true;

//email dan password pengirim
$mail -> Username = 'akunnyabuzzer@gmail.com';
$mail -> Password = 'coghvfeqvvkjmgou';
$mail -> SMTPSecure = 'tls';
$mail -> Port = 587;
$mail -> setFrom('akunnyabuzzer@gmail.com');
$mail -> addAddress($_POST['email'],"Layanan Email Activation");
$mail -> isHTML(true);
$mail -> Subject = "Aktivasi pendaftaran";
$mail -> Body = "Selamat, Anda berhasil membuat akun. klik link berikut untuk login.
<a href='http://localhost/toko_online/index.php'>link</a>";
$mail -> send();
echo 'Message has been sent!';

if (isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];

    $sql = "Insert into user values ('$ID','$username', '$password', '$level', '$email')";
    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Selamat, Registrasi Berhasil')</script>";
            $_POST['ID']="";
            $_POST['username']="";
            $_POST['password']="";
            $_POST['level']="";
            $_POST['email']="";
        }
        else{
            echo "<script>alert('Register Gagal')</script>";
        }
}

?>