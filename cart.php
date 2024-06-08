<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang User</title>
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
    <h2> Keranjang Anda : </h2>
    <table>
    <tr>
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Gambar Barang</th>
        <th>Action</th>
    </tr>

    <?php

    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);
    $data = mysqli_query($conn, 'select * from barang where Keranjang="yes" order by ID ASC'); 
   
    while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo $d['ID']; ?></td>
            <td><?php echo $d['KodeBarang']; ?></td>
            <td><?php echo $d['NamaBarang']; ?></td>
            <td><?php echo $d['Kategori']; ?></td>
            <td><?php echo $d['Harga']; ?></td>
            <td><img src="<?php echo $d['GambarBarang']; ?>" width="200" height="180"></td>
            <td>
                <a href="detail.php?ID=<?php echo $d['ID']; ?>">DETAIL</a>
                <a href="javascript:del(ID=<?php echo $d['ID']; ?>)">ORDER</a>
                <a href="javascript:confirmDelete(<?php echo $d['ID']; ?>)">DELETE</a>
            </td>
        </tr>
        <?php
        }
    ?>
    </table>

</body>

<script>
    function confirmDelete(ID) {
        if (confirm("Apakah Anda yakin ingin menghapus barang dari keranjang?")) {
            window.location.href = "deleteCart.php?ID=" + ID;
        }
    }
</script>


</html>