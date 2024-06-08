<?php
include 'koneksi.php';
error_reporting(0);
session_start();
$conn = mysqli_connect($server, $username, $password, $database);

if(isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $file_path = 'Terupload/default.png';

    $sql = "Insert into user values ('$ID','$username', '$password', '$level', '$email', '$file_path')";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{
            margin: 0;
            background-color: #5DBB63;
        }
        .back{
            color: white;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form{
            text-align: center;
            background-color: lightgray;
            padding: 10px;
            display: flex;
            align-items: center;
            width: 300px;
            flex-direction: column;
            border-radius: 20px;
            border: solid 1px grey;
        }
        td{
            display: flex;
        }
        input, button{
            padding: 5px 20px;
            margin: 5px;
        }
        button[type="submit"]{
            background-color: lightgreen;
            border: solid 0.4px gray;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 1px 1px green;
        }
        button[type="submit"]:hover{
            background-color: transparent;
            color: green;
            transition: 0.3s all ease-in-out;
        }
        ::-webkit-scrollbar { 
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <a href="index.php">
        <div class="back"><i class="fa-solid fa-arrow-left"></i></div>
    </a>
    
    <div class="container">

    <form action="" method="POST">
        <h1>Register</h1>
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="number" name="ID" placeholder="Input ID" value="<?php echo $_POST['ID']; ?>" required>
                </td>
                <td>Username</td>
                <td>
                    <input type="text" name="username" placeholder="Input Username" value="<?php echo $_POST['username']; ?>" required>
                </td>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Input Password" value="<?php echo $_POST['password']; ?>" required>
                </td>
                <td>Level</td>
                <td>
                    <input type="text" name="level" placeholder="Input Level" value="<?php echo $_POST['level']; ?>" required>
                </td>
                <td>Email</td>
                <td>
                    <input type="email" name="email" placeholder="Input Email" value="<?php echo $_POST['email']; ?>" required>
                </td>
            </tr>
        </table>
        <button name="submit" type="submit"> Submit </button>
    </form>
    
    </div>

</body>
</html>