<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form registrasi admin | TIX ID</title>
</head>
<body>
    <h3>registrasi akun admin</h3>
    <form action="" method="post">
        
        <input type="text" name="email" placeholder="Email"><br><br>

        <input type="text" name="username" placeholder="Username"><br><br>

        <input type="password" name="password" placeholder="Password"><br><br>

        <input type="password" name="konfirmasi" placeholder="Confirm your Password"><br><br>

        <input type="submit" name="regis" value="Registrasi">
    </form>  
    
    <p>sudah punya akun?
        <a href="login_admin.php">login</a>
    </p>
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
        $user = $db->query("SELECT * FROM akun_admin WHERE username='$username'");

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('Username Telah digunakan, silahkan gunakan username lain');
                </script>";
        }else{
            // konfirmasi password udh benar atau belum
            if($password == $konfirmasi){

                $password = password_hash($password,PASSWORD_DEFAULT);

                $query = "INSERT INTO akun_admin (email,username,psw)
                            VALUES ('$email','$username','$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                                alert('registrasi berhasil');
                                document.location.href = login_admin.php
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