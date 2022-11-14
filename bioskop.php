<?php

require "koneksi.php";
$bioskop = [];

if(isset($_GET['search'])){
    $keyword = $_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM bioskop WHERE nama_bioskop LIKE '%$keyword%'");
    while($row = mysqli_fetch_assoc($result)){
        $bioskop[] = $row;
    }
}
else{
    $result = mysqli_query($conn, "SELECT * FROM bioskop");
    while($row = mysqli_fetch_assoc($result)){
        $bioskop[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bioskop | TIX ID</title>
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

    <div class="container">
        <h3>Daftar Bioskop <a href="add_bioskop.php" class="tambahdata">
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
            <table>
                <?php if(isset($bioskop)){foreach($bioskop as $bios):?>
                <tr>
                    <td>Id Bioskop</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['id_bioskop']; ?></td>
                </tr>
                <tr>
                    <td>Nama bioskop</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['nama_bioskop']; ?></td>
                </tr>
                <tr>
                    <td>Jam ke-1</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['jam_1']; ?></td>
                </tr>
                <tr>
                    <td>Jam ke-2</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['jam_2']; ?></td>
                </tr>
                <tr>
                    <td>Jam ke-3</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['jam_3']; ?></td>
                </tr>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['hari']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td class="geser"><?php echo $bios['tanggal']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="center">
                        <a class="icon" href="update_bioskop.php?id_film=<?php echo $film['id_film'];?>">
                            <i style="font-size: 20px;" class="fa-solid fa-pen"></i>
                        </a>
                        <a class="icon" href="delete_bioskop.php?id_film=<?php echo $film['id_film'];?>">
                            <i style="font-size: 20px;" class="fa-solid fa-trash"></i>
                        </a>
                        <br><br><br>
                    </td>
                </tr>
                <?php endforeach; }?>
            </table>
        </div>
    </div>
</body>

</html>