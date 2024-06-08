<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
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

</script>

    <?php
    session_start();
    include('koneksi.php');
    $conn = mysqli_connect($server, $username, $password, $database);
    $username = @$_GET['username'];
    $data = mysqli_query($conn, "select * from user where username = '$username' ");
    $d = mysqli_fetch_array($data);
    ?>

<h1>Ganti Password</h1> <br>
<div class="container">

        <form action="update2.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Input Username" required>
                    </td>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Input Password" required>
                    </td>
                    <td>Konfirm Password baru</td>
                    <td>
                        <input type="text" name="passwordbaru" placeholder="Input Level" required>
                    </td>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" placeholder="Input Email" required>
                    </td>
                </tr>
            </table>
            <button name="submit" type="submit"> Submit </button>
        </form>
</div>

</body>
</html>