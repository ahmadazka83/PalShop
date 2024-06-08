<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        body{
            margin: 0;
            text-align: center;
            background-color: lightgreen;
            font-family: arial;
        }
        p{
            font-size: 18px;
        }
        h1{
            font-size: 32px;
            padding: 15px;
            margin-top: 0px;
            background-color: #5DBB63;
            color: white;
            text-shadow: 1px 1px black;
        }
        table{
            border-collapse: collapse;
            display: flex;
            justify-content: center;
        }
        td, th{
            border: solid 1px black;
            padding: 10px;
        }
        th{
            background-color: #04AA6D;
            color: white;
            text-shadow: 0.5px 0.5px black;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tr:nth-child(odd){
            background-color: lightgrey;
        }
        td a{
            text-decoration: none;
        }

    </style>
</head>
<body>
    <?php 
    session_start();

    //cek apakah yang mengakses ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan==gagal");
        exit();
    }

    ?>

    <h1>Halaman Admin </h1>
    <p>Selamat <b> <?php echo $_SESSION['username']; ?> </b> Anda telah login sebagai <b> <?php echo $_SESSION['level']; ?> </b></p>
    <br>
    <h2>Data User dan Admin </h2>
    <a href="tambah_data.php">Tambah Data</a><br><br>

    <form action="login_admin.php" method="get">
	<label>Cari Data:</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
    </form><br>
    
    <?php 
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
    }

    ?>

    <table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Email</th>
        <th>Profile Picture</th>
        <th>Action</th>
    </tr>

    <?php

    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);

    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn, "select * from user where username like '%".$cari."%'");				
	}else{
        $data = mysqli_query($conn, 'select * from user order by ID ASC');
    }
    while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo $d['ID']; ?></td>
            <td><?php echo $d['username']; ?></td>
            <td><?php echo $d['password']; ?></td>
            <td><?php echo $d['level']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><img src="<?php echo $d['file_path']; ?>" width="200" height="180"></td>
            <td>
                <a href="edit.php?ID=<?php echo $d['ID']; ?>">EDIT</a>
                <a href="javascript:del(ID=<?php echo $d['ID']; ?>)">DELETE</a>
                <a href="upload.php?ID=<?php echo $d['ID']; ?>">UPLOAD</a>
                <a href="download.php?url=<?php echo ($d['file_path']); ?>">DOWNLOAD</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>

    <br><a href="forget5.php">Ganti Password</a><br>
    <br><a href="logout.php">LOGOUT</a><br>
    
</body>
<script>
    function del(id) {
        var r = confirm("Apakah anda yakin ingin menghapus user ini?");
        if (r == true) {
            window.location.href = "delete.php?ID=" + id;
        }
    }
</script>
</html>