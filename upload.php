<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<style>
    body{
        margin: 0;
        background-color: #5DBB63;
        height: 100vh;
    }
    h1{
        text-align: center;
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
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
    .back{
        color: white;
    }
</style>

<body>

<a href="login_admin.php">
    <div class="back"><i class="fa-solid fa-arrow-left"></i></div>
</a>

    <h1>Upload Data</h1>

    <?php
    session_start();
    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);
    $ID = @$_GET['ID'];
    $data = mysqli_query($conn, "select * from user where ID='$ID' ");
    $d = mysqli_fetch_array($data);
    ?>

<div class="container">
    <form action="upload2.php?ID=<?php echo $ID ?>" method="post" enctype="multipart/form-data">
        <label>ID</label>
        <input type="number" name="ID" value="<?php echo $d['ID']; ?>">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $d['username'] ?>">
        <label>Password</label>
        <input type="text" name="password" value="<?php echo $d['password'] ?>">
        <label>Level</label>
        <input type="text" name="level" value="<?php echo $d['level'] ?>">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $d['email'] ?>">
        <label>File</label>
        <input type="file" name="berkas">
    <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>