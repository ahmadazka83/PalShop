<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            height: 100vh;
            margin: 0;
        }
        .container{
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            height: 100%;
        }
        .cover{
            font-family: cursive;
            width: 50%;
            background-color: #5DBB63;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 1px 1px black;
        }
        .cover h1{
            font-size: 72px;
            margin: 0;
        }
        .cover img{
            height: 300px;
            width: 350px;
        }
        .cover p{
            font-size: 32px;
        }
        .loginform{
            width: 50%;
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .loginform form{
            background-color: white;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            padding: 20px 10px;
            width: 300px;
            border-radius: 20px;
            border: solid 1px grey;
        }
        #judul{
            text-align: center;
            line-height: 15px;
            margin-bottom: 5px;
        }
        input{
            padding: 5px 20px;
            margin: 5px;
        }
        input[type="submit"]{
            background-color: lightgreen;
            border: solid 0.4px gray;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 1px 1px green;
        }
        input[type="submit"]:hover{
            background-color: transparent;
            color: green;
            transition: 0.3s all ease-in-out;
        }

         /* Media query for smaller screens */
        @media screen and (max-width: 768px) {
            .cover, .loginform {
                width: 100%;
            }
            .loginform form{
                margin: 30px 0;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="cover">
        <h1>PalShop</h1>
        <img src="asset/logo.png" alt="logo">
        <p>We sell all Palembang products </p>
    </div>

    <div class="loginform">
    <form action="coba_login.php" method="post">
    <div id="judul">
        <h1>Welcome</h1>
        <p>Please login your account<p>
    </div>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Input username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Input password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="log in"></td>
            </tr>
        </table>
        <p>Anda belum punya akun? <a href="register.php">Daftar</a> or <a href="register_mail.php">Daftar with email</a></p>
        <p>Lupa Password? <a href="forget.php">Lupa Password</a></p>
    </form>
    </div>
    
</div>
    
</body>
</html>