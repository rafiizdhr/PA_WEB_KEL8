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
    <script src="js/script.js" defer></script>
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

    <!-- film card preview -->
    <section>
        <?php 
        if(isset($film)){foreach($film as $film):
        ?>
        <div class="container">
            <div class="products-container">
                <div class="product">
                    <img width="200px" src="gambar/<?php echo $film['gambar_1']; ?>" alt="">
                    <h3><?php echo $film['nama_film']?></h3>
                    <div class="price"><?php echo $film['jenis_film']?></div>
                </div>
            </div>
        </div>
        <div class="products-preview">
            <div class="preview">
                <i class="fas fa-times"></i>
                <table>
                    <tr>
                        <td>Nama film</td>
                        <td class="geser"><?php echo $film['nama_film']?></td>
                    </tr>
                    <tr>
                        <td>Jenis film</td>
                        <td class="geser">class="geser"<?php echo $film['jenis_film']?></td>
                    </tr>
                    <tr>
                        <td>Produser</td>
                        <td class="geser"><?php echo $film['produser']; ?></td>
                    </tr>
                    <tr>
                        <td>Sutradara</td>
                        <td class="geser"><?php echo $film['sutradara']; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td class="geser"><?php echo $film['penulis']; ?></td>
                    </tr>
                    <tr>
                        <td>Produksi</td>
                        <td class="geser"><?php echo $film['produksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Casts</td>
                        <td class="geser"><?php echo $film['casts']; ?></td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td class="geser"><?php echo $film['durasi']." menit"; ?></td>
                    </tr>
                    <tr>
                        <td>Penayangan</td>
                        <td class="geser"><?php echo $film['penayangan']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal tayang</td>
                        <td class="geser"><?php echo $film['tanggal_tayang']; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td class="geser"><?php echo $film['deskripsi']; ?></td>
                    </tr>
                </table>
                <div class="buttons">
                    <a href="#" class="buy">pesan tiket</a>
                </div>
            </div>
        </div>
        <?php  
            endforeach; }
        ?>
    </section>
    <footer>
        <section class=" footer">
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
