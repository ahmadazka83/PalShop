<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
</head>
<style>
    body{
        margin: 0;
        text-align: center;
        background-color: PaleGoldenRod;
        font-family: arial;
    }
    p{
        font-size: 18px;
    }

    /* NAVIGATION */

    /* logo */
    #nav-img{
        display: flex;
        align-items: center;
        height: 100px;
        width: 100px;
        margin-left: 10px;
    }
    #nav-logo{
        font-size: 22px;
        margin-left: 10px;
        color: white;
        text-shadow: 1px 1px black;
    }

    /* nav */
    .wrapper{
        width: 100%;
        display: flex;
        justify-content: space-between;
        background-color: BurlyWood;
        padding: 5px 0;
    }
    .wrapper ul{
        margin: 0;
        list-style-type: none;
        display: flex;
        align-items: center;
    }
    .wrapper ul li a{
        list-style-type: none;
        font-size: 24px;
        color: white;
        padding: 23px;
        text-decoration: none;
    }

    /* CONTENT */

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
        background-color: darksalmon;
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
<body>
    <?php
    session_start();

    //cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }

    ?>

    <!--Navigation-->
    <nav class="wrapper">
        <ul id="logo">
            <li><img src="asset/logo.png" id="nav-img" alt="logo"></li>
            <li id="nav-logo"> <h1>PalShop</h1></li>
        </ul>
        <ul id="navigation">
            <li class="nav-link"><a href="login_user.php">Home</a></li>
            <li class="nav-link"><a href="buy.php">Shop</a></li>
            <li class="nav-link"><a href="cart.php">Cart</a></li>
            <li class="nav-link"><a href="completeOrder.php">Order</a></li>
            <li class="nav-link"><a href="maps.php">Maps</a></li>
        </ul>
    </nav>

    <br>
    <table>
    <tr>
        <th>ID</th>
        <th>ID Barang</th>
        <th>Nama Pengirim</th>
        <th>Alamat Pengiriman</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Bukti Pembayaran</th>
        <th>Status</th>
        <th>Tanggal Pesan</th>
    </tr>

    <?php

    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);
    $ID = @$_GET['ID'];
    $data = mysqli_query($conn, "SELECT * FROM pesanan");


    while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo $d['id']; ?></td>
            <td><?php echo $d['id_barang']; ?></td>
            <td><?php echo $d['nama_pengirim']; ?></td>
            <td><?php echo $d['alamat_pengiriman']; ?></td>
            <td><?php echo $d['jumlah']; ?></td>
            <td><?php echo $d['keterangan']; ?></td>
            <td><img src="<?php echo $d['bukti_pembayaran']; ?>" width="200" height="180"></td>
            <td><?php echo $d['status']; ?></td>
            <td><?php echo $d['tanggal_pesan']; ?></td>
        </tr>
        <?php
        }
    ?>
    </table>

</body>

</html>