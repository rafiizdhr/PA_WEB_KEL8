<?php session_start(); 
        
    if(isset($_POST['submit_admin'])){
        
        $admin = array('admin' => '123');
        
        
        $Username = isset($_POST['username_admin']) ? $_POST['username_admin'] : '';
        $Password = isset($_POST['password_admin']) ? $_POST['password_admin'] : '';
        
        if (isset($admin[$Username]) && $admin[$Username] == $Password){
                
                $_SESSION['UserData']['Username']=$admin[$Username];
                header("location:main_page_admin.php");
                exit;
        } else {
                $failed = true;
        }
    }
?>

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
        <form action="" method="post" name="login_admin" style="width: 100%;margin:auto">
            <h3>Login Admin</h3>
            <div class="line-1"></div>

            <!-- input username -->
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" name="username_admin" placeholder="Username" autocomplete="off"
                    required><br><br>
            </div>

            <!-- input password -->
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" name="password_admin" placeholder="Password"
                    required><br><br>
            </div>

            <!-- tombol login -->
            <input class="btn" type="submit" name="submit_admin" value="Login" style="margin-top: 15px;">
        </form>
        <br>
    </div>
    <span><a class="switch-login" href="login_user.php">Masuk Sebagai User</a></span>
</body>

</html>