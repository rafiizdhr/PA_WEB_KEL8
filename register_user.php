<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form registrasi user | TIX ID</title>
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
            <h3>Registrasi User</h3>
            <div class="line-1"></div>
            <!-- input email -->
            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" name="email" placeholder="Email" autocomplete="off" required>
            </div>

            <!-- input username -->
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" name="username" placeholder="Username" autocomplete="off"
                    required>
            </div>

            <!-- input password -->
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" name="password" placeholder="Password" autocomplete="off"
                    required>
            </div>

            <!-- input confirm pass -->
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" name="konfirmasi" placeholder="Konfirmasi Password"
                    autocomplete="off" required>
            </div>

            <!-- tombol submit -->
            <input class="btn" type="submit" name="regis" value="Registrasi">
        </form>
        <br>
        <!-- ngarah ke login -->
        <div class="to-login">
            <p style="max-width: 500px;margin:auto;font-family:Arial, Helvetica, sans-serif;">
                <a href="login_user.php">Sudah memiliki akun?</a>
            </p>
        </div>
    </div>
</body>

</html>

<?php
    require 'koneksi.php';
    if(isset($_POST['regis'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        // cek username telah digunakan atau belum 
        $user = $db->query("SELECT * FROM akun_user WHERE username='$username'");

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('Username Telah digunakan, silahkan gunakan username lain');
                </script>";
        }else{
            // konfirmasi password udh benar atau belum
            if($password == $konfirmasi){

                $password = password_hash($password,PASSWORD_DEFAULT);

                $query = "INSERT INTO akun_user (email,username,psw)
                            VALUES ('$email','$username','$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                                alert('registrasi berhasil');
                                document.location.href = login_user.php
                            </script>";
                }else{
                    echo "<script>
                                alert('registrasi gagal');
                            </script";
                }
                
            }else{
                echo "<script>
                            alert('Konfirmasi password salah!');
                        </script>";
            }
        }

    }

?>