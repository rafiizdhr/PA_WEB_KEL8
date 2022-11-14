<!-- update -->
<?php
    $id_bioskop = $_GET['id_bioskop'];

    if(isset($_POST['update'])){
        
        $nama_bioskop = htmlspecialchars($_POST['nama_bioskop']);
        $jam_1 = $_POST['jam_1'];
        $jam_2 = $_POST['jam_2'];
        $jam_3 = $_POST['jam_3'];
        $hari = htmlspecialchars($_POST['hari']);
        $tanggal = htmlspecialchars($_POST['tanggal']);

        if ($result){
            echo "
            <script> 
                alert ('data bioskop diubah');
                document.location.href = 'character.php';
            </script>";
        } else {
            echo "
            <script> 
                alert ('gagal diubah');
                document.location.href = 'update_char.php';
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update bioskop | TIX ID</title>
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
            <h3>Update Film</h3>
            <div class="line-1"></div>
            <table>
                <tr>
                    <td>Nama film</td>
                    <td>:</td>
                    <td><input type="text" name="nama_film" required></td>
                </tr>
                <tr>
                    <td>Jenis film</td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" id="jenis1" name="jenis_film" value="Drama">
                        <label for="jenis1"> Drama</label>
                        <input type="checkbox" id="jenis2" name="jenis_film" value="Comedy">
                        <label for="jenis2"> Comedy</label>
                        <input type="checkbox" id="jenis3" name="jenis_film" value="Horror">
                        <label for="jenis3"> Horror</label>
                        <input type="checkbox" id="jenis4" name="jenis_film" value="Sci-fi">
                        <label for="jenis4"> Sci-fi</label>
                        <input type="checkbox" id="jenis5" name="jenis_film" value="Action">
                        <label for="jenis5"> Action</label>
                        <input type="checkbox" id="jenis6" name="jenis_film" value="Documenter">
                        <label for="jenis6"> Documenter</label>
                        <input type="checkbox" id="jenis7" name="jenis_film" value="Animation">
                        <label for="jenis7"> Animation</label><br>
                        <input type="checkbox" id="jenis8" name="jenis_film" value="Fantasy">
                        <label for="jenis8"> Fantasy</label>
                        <input type="checkbox" id="jenis9" name="jenis_film" value="Thriller">
                        <label for="jenis9"> Thriller</label>
                        <input type="checkbox" id="jenis10" name="jenis_film" value="Musikal">
                        <label for="jenis10"> Musikal</label>
                    </td>
                </tr>
                <tr>
                    <td>Produser</td>
                    <td>:</td>
                    <td><input type="text" name="produser"></td>
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
                        <button type="submit" name="update">Update</button>
                        <button type="reset" name="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>