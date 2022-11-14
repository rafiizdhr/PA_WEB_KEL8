<!-- create -->

<?php
    require "koneksi.php";
    $bioskop = [];
    
    if (isset($_POST['tambah'])){
        $kul = "SELECT * FROM bioskop";
        $result = mysqli_query($conn, $kul);
        $bioskop = [];
        while($row = mysqli_fetch_assoc($result)){
            $bioskop[] = $row;
        }

        $id_bioskop = count($bioskop)+1;
        $nama_bioskop = htmlspecialchars($_POST['nama_bioskop']);
        $jam_1 = htmlspecialchars($_POST['jam_1']);
        $jam_2 = htmlspecialchars($_POST['jam_2']);
        $jam_3 = htmlspecialchars($_POST['jam_3']);
        $hari = $_POST['hari'];
        $tanggal = $_POST['tanggal'];

        $sql = "INSERT INTO bioskop VALUES ('$id_bioskop','$nama_bioskop','$jam_1','$jam_2','$jam_3','$hari','$tanggal')";

        $result = mysqli_query($conn, $sql);
                
        if ($result){
            echo "
            <script> 
                alert ('data berhasil ditambah');
                document.location.href = 'bioskop.php';
            </script>";
        } else {
            echo "
            <script> 
                alert ('data gagal ditambah');
                document.location.href = 'add_bioskop.php';
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
                    <li><a href="bioskop.php">Bioskop</a></li>
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
                    <td>jam_1</td>
                    <td>:</td>
                    <td><input type="time" name="jam_1"></td>
                </tr>
                <tr>
                    <td>jam_2</td>
                    <td>:</td>
                    <td><input type="time" name="jam_2"></td>
                </tr>
                <tr>
                    <td>jam_3</td>
                    <td>:</td>
                    <td><input type="time" name="jam_3"></td>
                </tr>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td>
                        <select name="hari" id="">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" name="tambah">Kirim</button>
                        <button type="reset" name="reset">Reset</button>
                    </td>
                </tr>
                <!-- <input type="hidden" name="hari" value=<?=hari_ini();?>> -->
                <!-- <input type="hidden" name="tanggal" value=<?php strtotime("today");?>> -->
                </tr>
                </td>
                </tr>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>