<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include('css/register.css');
    ?>
    </style>
    <title>Login Admin | TIX ID</title>

</head>

<body>
    <div class="tixid">TIX ID</div>
    <div class="container">
        <form action="" method="post" style="width: 100%;margin:auto">
            <h3>Login Admin</h3>
            <div class="line-1"></div>

            <!-- input username -->
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" name="user" placeholder="Username" autocomplete="off"
                    required><br><br>
            </div>

            <!-- input password -->
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" name="password" placeholder="Password" required><br><br>
            </div>

            <!-- tombol login -->
            <input class="btn" type="submit" name="login" value="Login" style="margin-top: 15px;">
        </form>
        <br>
        <!-- <span>belum punya akun admin
            <a href="register_admin.php">Registrasi</a>
        </span> -->
    </div>
</body>

</html>

<?php 
    session_start();
    require 'koneksi.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $query = "SELECT * FROM akun_admin
                WHERE username='$user' 
                OR email='$user'";   
            
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        $username = $row['username'];

        if(password_verify($password,$row['psw'])){
            $_SESSION['login'] = true;


            echo "<script>
                        alert('selamat datang $username');
                        document.location.href = 'main_page_admin.php';
                    </script>";
        }else{
            echo "<script>
                        alert('username dan password salah');
                </script>";
        }
    }
?>