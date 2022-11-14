<!-- create -->

<?php
    require "koneksi.php";
    $film = [];
    
    if (isset($_POST['tambah'])){
        $kul = "SELECT * FROM film";
        $result = mysqli_query($conn, $kul);
        $film = [];
        while($row = mysqli_fetch_assoc($result)){
            $film[] = $row;
        }

        $id_film = count($film)+1;
        $nama_bioskop = htmlspecialchars($_POST['nama_bioskop']);
        $jam_1 = htmlspecialchars($_POST['jam_1']);
        $jam_2 = htmlspecialchars($_POST['jam_2']);
        $jam_3 = htmlspecialchars($_POST['jam_3']);
        $hari = htmlspecialchars($_POST['hari']);
        $tanggal = $_POST['tanggal'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film | TIX ID</title>
    <script src="https://kit.fontawesome.com/6ce21f9da1.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <style>
    <?php include('css/add_film.css');
    ?>
    </style>
</head>

<body>
    <!-- <div class="tixid">TIX ID</div> -->
    <header>
        <div class="navbar">
            <div class="tixid">TIX ID</div>
            <nav>
                <ul>
                    <li><a href="main_page_admin.php">Home</a></li>
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
        <form action="" method="post" enctype="multipart/form-data" style="width: 100%;margin:auto">
            <h3>Tambah Film</h3>
            <div class="line-1"></div>
            <table>
                <tr>
                    <td>Nama Bioskop</td>
                    <td>:</td>
                    <td><input type="text" name="nama_bioskop" required></td>
                </tr>
                <tr>

                    <td>Produser</td>
                    <td>:</td>
                    <td><input type="time" name="produser"></td>
                </tr>
                <tr>
                    <td>Sutradara</td>
                    <td>:</td>
                    <td><input type="text" name="sutradara"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td>:</td>
                    <td><input type="text" name="penulis"></td>
                </tr>
                <tr>
                    <td>Produksi</td>
                    <td>:</td>
                    <td><input type="text" name="produksi"></td>
                </tr>
                <tr>
                    <td>Casts</td>
                    <td>:</td>
                    <td><input type="text" name="casts"></input></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td><input type="number" name="durasi"></td>
                </tr>
                <tr>
                    <td>Penayangan</td>
                    <td>:</td>
                    <td><input type="text" name="penayangan"></td>
                </tr>
                <tr>
                    <td>Tanggal tayang</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_tayang"></td>
                </tr>
                <tr>
                    <td>Poster film</td>
                    <td>:</td>
                    <td><input type="file" name="gambar_1"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><input type="text" name="deskripsi"></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" name="tambah">Kirim</button>
                        <button type="reset" name="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>