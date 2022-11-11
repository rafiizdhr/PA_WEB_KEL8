<?php 
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }

    require 'koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM film");
    $film = [];
    while($baris = mysqli_fetch_assoc($result)){
        $film[] = $baris;
    }
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
        <div class="navbar">
            <div class="tixid">TIX ID</div>
            <nav>
                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="tiket.php">Ticket</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="logout_user.php">Sign Out</a></li>
                </ul>
            </nav>
            <div class="menu-bar">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>

    <script>
    $(document).ready(function() {
        $(".menu-bar").click(function() {
            $('nav').toggleClass('active');
        })
    })
    </script>

    <section>
        <p>Film yang sedang tayang</p>
    </section>

    <section id="streaming">
        <?php 
            if(isset($film)){foreach($film as $film):
        ?>
        <div class="streaming">
            <div class="container-1">
                <div class="poster">
                    <div class="imeg">
                        <img src="1.jpg" alt="">
                    </div>
                </div>
                <div class="inside-streaming">
                    <span>NOW STREAMING</span>
                    <div class="line1"></div>
                    <h1><?php echo $film['nama_film']?></h1>
                    <p><?php echo $film['jenis_film']?></p>
                    <p>| 2018 | USA | 180 min</p>
                    <!-- <div class="btn1">
                        <a href="#"><i class="fas fa-play"></i>Watch Now</a>
                        <a href="#"><i class="fas fa-heart"></i>Watch Later</a>
                    </div> -->
                </div>
            </div>
        </div>
        <?php  
            endforeach; }
        ?>
    </section>
    <footer>
        <section class="footer">
            <div class="inside-footer">
                <div class="copyright">
                    <p>copyright &copy <span>TIX ID</span></p>
                </div>
                <!-- <div class="socials">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest"></i>
                </div> -->
            </div>
        </section>
    </footer>
</body>

</html>