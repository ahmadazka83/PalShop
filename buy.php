<?php
session_start();

include 'koneksi.php';
$conn = mysqli_connect($server, $username, $password, $database);

if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
}

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $kategori = $_GET['kategori'];
    
    if($kategori != ""){
        $data = mysqli_query($conn, "SELECT * FROM barang WHERE NamaBarang LIKE '%$cari%' AND Kategori = '$kategori'");
    } else { 
        $data = mysqli_query($conn, "SELECT * FROM barang WHERE NamaBarang LIKE '%$cari%'");
    }
}
else{
    $data = mysqli_query($conn, 'select * from barang order by ID ASC');
}

if(isset($_POST['add_to_cart'])){
    $id_barang = $_POST['id_barang'];
    mysqli_query($conn, "UPDATE barang SET keranjang = 'yes' WHERE ID = $id_barang");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembelian</title>
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

    /* Content */
    #cover-gallery{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }
    #gallery{
        background-color: rgb(241, 211, 132);
        padding: 20px;
        text-align: center;
        margin: 20px 50px;
        border: solid 1px rgb(219, 219, 219);
        border-radius: 10px;
        font-size: 18px;
        font-family: cursive;
        width: fit-content;
    }
    #gallery>img{
        height: 200px;
        width: 200px;
        border: solid 1px rgb(184, 184, 184);
    }
    #sejajar{
        display: flex;
        flex-direction: column;
    }

</style>
<body>
    <?php

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

    <!--body-->
    <br><br>
    <form action="buy.php" method="get">
	<label>Cari Produk:</label>
	<input type="text" name="cari">
    <label for="kategori">Kategori:</label>
    <select name="kategori" id="kategori" >
        <option value="">Semua Kategori</option>
        <option value="Alat Musik">Alat Musik</option>
        <option value="Pakaian">Pakaian</option>
        <option value="Kerajinan Tangan">Kerajinan Tangan</option>
        <option value="Aksesoris">Aksesoris</option>
    </select>
	<input type="submit" value="Cari">
    </form><br>

    <?php 
    
    $counter = 0;
    while(($d = mysqli_fetch_assoc($data))){  
        $counter++;
        if ($counter == 1) {
            $ID = '1'
    ?>
    <div id="cover-gallery">
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $d['ID']; ?>&nama=<?php echo $d['NamaBarang']; ?>&harga=<?php echo $d['Harga']; ?>&gambar=<?php echo $d['GambarBarang']; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 2) {
            $ID = '2'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 3) {
            $ID = '3'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <br>
        <?php
        }
        if ($counter == 4) {
            $ID = '4'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 5) {
            $ID = '5'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 6) {
            $ID = '6'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 7) {
            $ID = '7'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 8) {
            $ID = '8'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
        if ($counter == 9) {
            $ID = '9'
        ?>
        <div id="gallery">
            <img src="<?php echo $d['GambarBarang']?>">
            <p><?php echo $d['NamaBarang']; ?></p>
            <p>Price : <strong><?php echo $d['Harga']; ?></strong></p>
            <a href="detail.php?ID=<?php echo $ID; ?>"><button>Detail</button></a>
            <div id="sejajar">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?php echo $d['ID']; ?>">
                <button type="submit" name="add_to_cart">Add to cart</button>
            </form>
            <a href="order.php?ID=<?php echo $ID; ?>"><button>Buy</button></a>
            </div>
        </div>
        <?php
        }
    }
        ?>
    </div>
</body>
</html>