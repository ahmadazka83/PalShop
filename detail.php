<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<style>
    body{
        margin: 0;
        text-align: center;
        background-color: PaleGoldenRod;
        font-family: arial;
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
        color: white;
        margin-left: 10px;
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

    /* Body */
    .container{
        display: flex;
        flex-direction: row;
    }
    #product-cover{
        display: flex;
        justify-content: center;
    }
    #product-details{
        background-color: white;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .column>img{
        height: 350px;
        width: 450px;
        border: solid 2px black;
    }
    #nameProduct{
        font-size: 48px;
        line-height: 0.2;
    }
    .column>button{
        font-size: 18px;
        background-color: lightgreen;
        border: solid 1px gray;
    }
    .kecil{
        width: 520px;
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
            <li class="nav-link"><a href="#Home">Home</a></li>
            <li class="nav-link"><a href="#About">About</a></li>
            <li class="nav-link"><a href="#Contact">Contact</a></li>
        </ul>
    </nav>

    <!--body-->
    <h1>Detail Produk</h1>
    
    <?php
    include 'koneksi.php';
    $conn = mysqli_connect($server, $username, $password, $database);
    $ID = $_GET['ID'];
    $data = mysqli_query($conn, "SELECT * FROM barang WHERE ID = '$ID'");
    
    // Fetch the row from the result
    $row = mysqli_fetch_assoc($data);

    // Assign values to variables
    $GambarBarang = $row['GambarBarang'];
    $KodeBarang = $row['KodeBarang'];
    $NamaBarang = $row['NamaBarang'];
    $Kategori = $row['Kategori'];
    $Harga = $row['Harga'];
    $Deskripsi = $row['Deskripsi'];

    ?>

    <div id="product-cover">
    <section id="product-details">
        <div class="container">
            <div class="column"> 
                <img src="<?php echo $GambarBarang; ?>">
            </div>
            <div class="column kecil"> 
                <h1 id="nameProduct"><?php echo $NamaBarang; ?></h1>
                <h3>Harga: <strong><FONT COLOR="#ff0000"><?php echo $Harga; ?></strong></font></h3>
                <p>Kode Barang: <?php echo $KodeBarang; ?></p>
                <p>Kategori: <?php echo $Kategori; ?></p>
                <p>Deskripsi Produk:</p>
                <p><?php echo $Deskripsi; ?></p>
                <button>Add to Cart</button>
                <button>Buy</button>
            </div>
        </div>
    </section>
    </div>

</body>
</html>