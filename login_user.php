<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User | TIX ID</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include('css/register.css');
    ?>
    </style>
</head>

<body>
    <div class="tixid">TIX ID</div>

    <div class="container">
        <form action="" method="post" style="width: 100%;margin:auto">
            <h3>Login User</h3>
            <div class="line-1"></div>

            <!-- input username -->
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" name="user" placeholder="Username or Email" autocomplete="off"
                    required><br><br>
            </div>

            <!-- input password -->
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" name="password" placeholder="Password" autocomplete="off"
                    required><br><br>
            </div>

            <!-- tombol login -->
            <input class="btn" type="submit" name="login" value="Login"></input>
        </form>
        <br>
        <h4><span>Atau</span></h4>
        <!-- <input type="submit" class="btn-reg" value="Buat Akun Baru"> -->
        <a class="btn-reg" href="register_user.php">Buat Akun Baru</a>
    </div>
    <span><a class="switch-login" href="login_admin.php">Masuk Sebagai Admin</a></span>
</body>

</html>

<?php 
    require 'koneksi.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $query = "SELECT * FROM akun_user 
                WHERE username='$user' 
                OR email='$user'";   
        
        $result = $conn->query($query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            if(password_verify($password,$row['psw'])){
                session_start();
                $_SESSION['login'] = true;
    
                echo "<script>
                        alert('selamat datang $username');
                        document.location.href = 'index.php';
                    </script>";
            }
        }else{
            echo "<script>
                    alert('username dan password salah');
                </script>";
        }

    }
?>