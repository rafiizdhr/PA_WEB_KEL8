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
        <div class="tixid">TIX ID</div>
        <nav>
            <ul>
                <li><a href="#Home">Home</a></li>
                <li><a href="#Ticket">Ticket</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Contact">Contact</a></li>
                <li><a href="logout_user.php">Logout</a></li>
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
    <div class="kosong"></div>
    <div class="container">
        <h3>Daftar Film</h3>
        <a href="add_film.php" class="tambahdata"><i style="font-size: 24px;" class="fa-solid fa-plus"></i></a>
        <table>
            <?php if(isset($film)){foreach($film as $film):?>
            <tr>
                <td>Id film</td>
                <td>:</td>
                <td><?php echo $film['id']; ?></td>
            </tr>
            <tr>
                <td>Nama film</td>
                <td>:</td>
                <td><?php echo $film['nama_film']; ?></td>
            </tr>
            <tr>
                <td>Jenis film</td>
                <td>:</td>
                <td><?php echo $film['jenis_film']; ?></td>
            </tr>
            <tr>
                <td>Produser</td>
                <td>:</td>
                <td><?php echo $film['produser']; ?></td>
            </tr>
            <tr>
                <td>Sutradara</td>
                <td>:</td>
                <td><?php echo $film['sutradara']; ?></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>:</td>
                <td><?php echo $film['penulis']; ?></td>
            </tr>
            <tr>
                <td>Produksi</td>
                <td>:</td>
                <td><?php echo $film['produksi']; ?></td>
            </tr>
            <tr>
                <td>Casts</td>
                <td>:</td>
                <td><?php echo $film['casts']; ?></td>
            </tr>
            <tr>
                <td>Durasi</td>
                <td>:</td>
                <td><?php echo $film['durasi']; ?></td>
            </tr>
            <tr>
                <td>Penayangan</td>
                <td>:</td>
                <td><?php echo $film['penayangan']; ?></td>
            </tr>
            <tr>
                <td>Lama tayang</td>
                <td>:</td>
                <td><?php echo $film['lama_tayang']; ?></td>
            </tr>
            <tr>
                <td>Poster 1</td>
                <td>:</td>
                <td><img width="100px" src="gambar/<?php echo $film['gambar_1']; ?>" alt=""></td>
            </tr>
            <tr>
                <td>Poster 2</td>
                <td>:</td>
                <td><img width="100px" src="gambar/<?php echo $film['gambar_2']; ?>" alt=""></td>
            </tr>
            <tr>
                <td align="center">
                    <a href="update_film.php?id=<?php echo $film['id_film'];?>"><i class="fa-solid fa-pen"></i></a>
                    <a href="delete_item.php?id=<?php echo $film['id_film'];?>"><i class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; }?>
        </table>
    </div>
    <!-- <footer>
        <p>masih kosong</p>
    </footer> -->
</body>

</html>