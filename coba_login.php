<?php

    session_start();
    include 'koneksi.php';
    
    $conn = mysqli_connect($server, $username, $password, $database);
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $login = mysqli_query($conn, "select * from user where username='$username' and password='$password' ");
    $cek = mysqli_num_rows($login);
    
    if($cek>0){
        $data = mysqli_fetch_assoc($login);
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if ($_SESSION['level'] == "admin") {
            header("location:login_admin.php");
        } else if ($_SESSION['level'] == "user") {
            header("location:login_user.php");
        } else {
            echo "<h1> Login failed. Invalid user level. </h1>";
        }
    } else {
        echo "<h1> Login failed. Invalid username or password. </h1>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainpage</title>
    <style>
        body{
            background-color: darkred;
            text-align: center;
            color: white;    
            text-shadow: 1px 1px black;   
        }
        button{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <button type="button">
        <a href="index.php">Back</a>
    </button>
</body>
</html>