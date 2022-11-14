<?php
    require "koneksi.php";
    $film = [];

    $result = mysqli_query($conn, "SELECT * FROM film");
    while($row = mysqli_fetch_assoc($result)){
    $film[] = $row;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket | TIX ID</title>
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
                    <li><a href="index.php">Home</a></li>
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

    <section style="margin:auto;width:80%;">
        <div class="tiket-table">
            <?php if(isset($film)){foreach($film as $film):?>

            <img width="180px" src="gambar/<?php echo $film['gambar_1']; ?>" alt="poster1">
            <h4><?php echo $film['nama_film']; ?></h4>
            <p><?php echo $film['jenis_film']; ?></p>
            <p><?php echo $film['durasi']." menit"; ?></p>
            <p><?php echo $film['deskripsi']; ?></p>

            <?php endforeach; }?>
        </div>
    </section>

    <footer>
        <section class="footer">
            <div class="inside-footer">
                <div class="copyright">
                    <p>copyright &copy <span>TIX ID</span></p>
                </div>
            </div>
        </section>
    </footer>
</body>

</html>