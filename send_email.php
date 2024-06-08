<?php

session_start();

include 'koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMAILER\PHPMAILER\SMTP;
use PHPMAILER\PHPMAILER\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$conn = mysqli_connect($server, $username, $password, $database);

if(isset($_POST['email']))
{
    $body = "Klik link berikut untuk reset Password : <a href='localhost/toko_online/forget5.php'>Link</a> ";
    $mail -> isSMTP();
    $mail -> SMTPDebug = 1;
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;

    //email dan password pengirim
    $mail -> Username = 'akunnyabuzzer@gmail.com';
    $mail -> Password = 'coghvfeqvvkjmgou';
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;
    $mail -> From ='akunnyabuzzer@gmail.com';
    $mail -> FromName= 'layanan reset password';
    $mail -> addAddress($_POST['email'], 'User Sistem');
    $mail -> Subject = 'Reset Password';
    $mail -> isHTML(true);
    $mail -> MsgHTML($body);

    if($mail->send()){
        echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset');
        window.location = 'index.php' </script> ";
    }
    else{
        echo "Mail Error - >".$mail->ErrorInfo;
    }
}
else{
    echo "<script> alert('Email anda tidak terdaftar di sistem'); </script>";
}
echo 'Message has been sent';

?>