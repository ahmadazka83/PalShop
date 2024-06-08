<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
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
            <li class="nav-link"><a href="buy.php">Shop</a></li>
            <li class="nav-link"><a href="cart.php">Cart</a></li>
            <li class="nav-link"><a href="#Contact">Contact</a></li>
            <li class="nav-link"><a href="maps.php">Maps</a></li>
        </ul>
    </nav>

    <!--Content-->
    <h1>Alamat Kami</h1>
    <hr>
    <p>JL Kenten Permai 1 Blok A NO 32</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.566586598711!2d104.76712257366007!3d-2.9400862396674077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b769688e9f687%3A0x2319354e07cc2db8!2sJl.%20Kenten%20Permai%20l%2C%20Bukit%20Sangkal%2C%20Kec.%20Kalidoni%2C%20Kota%20Palembang%2C%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1715443493475!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</body>
</html>