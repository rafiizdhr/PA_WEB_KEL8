<?php 
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }
    // session_start();
    // if(!isset($_SESSION['login'])){
    //     echo "<script>
    //             alert('akses ditolak, silahkan login dulu');
    //             </script>";
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIX ID</title>
    <script src="https://kit.fontawesome.com/6ce21f9da1.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <style>
    <?php include('css/style.css');
    ?>
    </style>
</head>

<body>
    <header>
        <div class="tixid">TIX ID</div>
        <nav>
            <ul>
                <li><a href="#Home">Home</a></li>
                <li><a href="#Ticket">Ticket</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Contact">Contact</a></li>
                <li><a href="logout_user.php">Sign Out</a></li>
            </ul>
        </nav>
        <div class="menu-bar">
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>

    <script>
    $(document).ready(function() {
        $(".menu-bar").click(function() {
            $('nav').toggleClass('active');
        })
    })
    </script>

    <p>Film yang sedang tayang</p>

    <footer>
        <p>masih kosong</p>
    </footer>
</body>

</html>