<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
</head>
<style>
    body{
        margin: 0;
        text-align: center;
        background-color: PaleGoldenRod;
        font-family: arial;
    }
    #welcome{
        font-size: 28px;
        font-family: times;
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

    /* Content */
    #coverimage{
        display: flex;
        justify-content: center;
        flex-direction: row;
    }
    #coverimage h1{
        text-shadow: 2px 1px red;
    }
    #coverimage div{
        text-transform: uppercase;
        margin: 10px;
        width: fit-content;
    }
    #coverimage img{
        height: 450px;
        width: 300px;
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

    <!--Content-->
    <br>
    <p id="welcome">Halo <b> <?php echo $_SESSION['username'];?></b>! Selamat datang di PalShop. Disini, kami menjual berbagai produk Palembang. diantaranya : </p>
    <br>

    <div id="coverimage">
        <div>
            <h1>Pakaian Adat</h1>
            <img src="Terupload/PakaianAdat.jpg">
        </div>
        <div>
            <h1>Aksesoris</h1>
            <img src="Terupload/Aksesoris.jpeg">
        </div>
        <div>
            <h1>Alat Musik</h1>
            <img src="Terupload/AlatMusik.jpg">
        </div>
        <div>
            <h1>Kerajinan Tangan</h1>
            <img src="Terupload/KerajinanTangan.jpg">
        </div>
    </div>
    
    <br><a href="forget5.php">Ganti Password</a><br>
    <br><a href="logout.php">LOGOUT</a><br>
</body>
</html>