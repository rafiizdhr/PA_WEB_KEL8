<?php 
    require "koneksi.php";
    $film = [];
    // $result = mysqli_query($conn, "SELECT * FROM film");
    // while($row = mysqli_fetch_assoc($result)){
    //     $film[] = $row;
    // }
    
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * FROM film WHERE nama_film LIKE '%$keyword%' OR jenis_film LIKE '%$keyword%'");
        while($row = mysqli_fetch_assoc($result)){
            $film[] = $row;
        }
    }
    else{
        $result = mysqli_query($conn, "SELECT * FROM film");
        while($row = mysqli_fetch_assoc($result)){
            $film[] = $row;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | TIX ID</title>
    <script src="https://kit.fontawesome.com/6ce21f9da1.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <style>
    <?php include('css/admin.css');
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
                    <li><a href="logout_admin.php">Logout</a></li>
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
    <div class="kosong"></div>
    <div class="container">
        <h3>Daftar Film <a href="add_film.php" class="tambahdata">
                <i style="font-size: 20px;" class="fa-solid fa-plus"></i>
            </a>
        </h3>
        <div class="search">
            <form action="" method="GET">
                <table>
                    <tr>
                        <td>
                            <div class="form-outline">
                                <input type="text" name="keyword" id="keyword" class="form_control">
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-secondary" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="table">
            <table style="margin:auto;width:80%;">
                <?php if(isset($film)){foreach($film as $film):?>
                <tr>
                    <td>Id film</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['id_film']; ?></td>
                </tr>
                <tr>
                    <td>Nama film</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['nama_film']; ?></td>
                </tr>
                <tr>
                    <td>Jenis film</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['jenis_film']; ?></td>
                </tr>
                <tr>
                    <td>Produser</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['produser']; ?></td>
                </tr>
                <tr>
                    <td>Sutradara</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['sutradara']; ?></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['penulis']; ?></td>
                </tr>
                <tr>
                    <td>Produksi</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['produksi']; ?></td>
                </tr>
                <tr>
                    <td>Casts</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['casts']; ?></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['durasi']." menit"; ?></td>
                </tr>
                <tr>
                    <td>Penayangan</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['penayangan']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal tayang</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['tanggal_tayang']; ?></td>
                </tr>
                <tr>
                    <td>Poster film</td>
                    <td>:</td>
                    <td class="geser"><img width="180px" src="gambar/<?php echo $film['gambar_1']; ?>" alt="poster1">
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td class="geser"><?php echo $film['deskripsi']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="center">
                        <a class="icon" href="update_film.php?id_film=<?php echo $film['id_film'];?>">
                            <i style="font-size: 20px;" class="fa-solid fa-pen"></i>
                        </a>
                        <a class="icon" href="delete_film.php?id_film=<?php echo $film['id_film'];?>">
                            <i style="font-size: 20px;" class="fa-solid fa-trash"></i>
                        </a>
                        <br><br><br>
                    </td>
                </tr>
                <?php endforeach; }?>
            </table>
        </div>
    </div>
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