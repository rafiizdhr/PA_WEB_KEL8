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

    <section>
        <p class="sedangtayang">Film yang sedang tayang</p>
    </section>

    <!-- film card preview -->
    <section id="streaming">
        <?php 
        $i=1;
        if(isset($film)){foreach($film as $flm):
        ?>
        <div class="container">
            <div class="products-container">
                <div class="product" data-name=<?php echo $i ?>>
                    <img width="200px" src="gambar/<?php echo $flm['gambar_1']; ?>" alt="" class="bentuk-poster">
                    <h3><?php echo $flm['nama_film']?></h3>
                    <div class="price"><?php echo $flm['jenis_film']?></div>
                </div>
            </div>
        </div>
        <?php $i++; endforeach;} ?>
        <div class="products-preview">
            <?php  $i=1; if(isset($film)){foreach($film as $flm): ?>
            <div class=" preview" data-target=<?php echo $i ?>>
                <i class="fas fa-times"></i>
                <table>
                    <tr>
                        <td>Nama film</td>
                        <td class="geser"><?php echo $flm['nama_film']?></td>
                    </tr>
                    <tr>
                        <td>Jenis film</td>
                        <td class="geser"><?php echo $flm['jenis_film']?></td>
                    </tr>
                    <tr>
                        <td>Produser</td>
                        <td class="geser"><?php echo $flm['produser']; ?></td>
                    </tr>
                    <tr>
                        <td>Sutradara</td>
                        <td class="geser"><?php echo $flm['sutradara']; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td class="geser"><?php echo $flm['penulis']; ?></td>
                    </tr>
                    <tr>
                        <td>Produksi</td>
                        <td class="geser"><?php echo $flm['produksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Casts</td>
                        <td class="geser"><?php echo $flm['casts']; ?></td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td class="geser"><?php echo $flm['durasi']." menit"; ?></td>
                    </tr>
                    <tr>
                        <td>Penayangan</td>
                        <td class="geser"><?php echo $flm['penayangan']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal tayang</td>
                        <td class="geser"><?php echo $flm['tanggal_tayang']; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td class="geser"><?php echo $flm['deskripsi']; ?></td>
                    </tr>
                </table>
                <div class="buttons">
                    <a href="#" class="buy">pesan tiket</a>
                </div>
            </div>

            <?php  
            $i++;
            endforeach; }
        ?>
        </div>
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