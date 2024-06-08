<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("location: index.php?pesan=gagal");
    exit();
}

include 'koneksi.php';
$conn = mysqli_connect($server, $username, $password, $database);

$id_barang = $_GET['ID'];

$query = mysqli_query($conn, "SELECT * FROM barang WHERE ID = $id_barang");
if(mysqli_num_rows($query) > 0) {
    $barang = mysqli_fetch_assoc($query);
    $nama_barang = $barang['NamaBarang'];
    $harga_barang = $barang['Harga'];
    $gambar_barang = $barang['GambarBarang'];
} else {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <style>
        body {
            margin: 0;
            text-align: center;
            background-color: PaleGoldenRod;
            font-family: arial;
        }

        form {
            margin-top: 50px;
            font-size: 18px;
        }

        label {
            font-size: 16px;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
            background-color: BurlyWood;
            border: none;
            cursor: pointer;
        }

        img {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        #barang{
            padding: 10px;
            background-color: white;
            width: fit-content;
        }
        #container{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h2>Order Form</h2>
    <div id="container">
    <div id="barang">
    <img src="<?php echo $gambar_barang; ?>" alt="Gambar Barang">
    <p>Nama Barang: <strong><?php echo $nama_barang; ?></strong></p>
    <p>Harga Barang: <FONT COLOR="#ff0000"><strong><?php echo $harga_barang; ?></strong></font></p>

    <form action="process_order.php" method="POST">
        
        <label for="jumlah">Jumlah:</label><br>
        <input type="number" id="jumlah" name="jumlah" min="1" required><br><br>

        <label for="alamat">Nama Pembeli:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="alamat">Alamat Pengiriman:</label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="keterangan">Keterangan:</label><br>
        <input type="text" id="keterangan" name="keterangan"><br><br>
        
        <label for="bukti_pembayaran">Unggah Bukti Pembayaran:</label><br>
    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".jpg, .jpeg, .png, .pdf" required><br><br>

        <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
        
        <input type="submit" value="Order">
        </form>
        </div>
        </div>
</body>
</html>
