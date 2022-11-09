<!-- create -->

<?php
    require "koneksi.php";
    $film = [];
    
    if (isset($_POST['tambah'])){
        $kul = "SELECT * FROM characters";
        $result = mysqli_query($conn, $kul);
        $film = [];
        while($row = mysqli_fetch_assoc($result)){
            $film[] = $row;
        }

        $id_film = count($film)+1;
        $nama_film = $_POST['nama_film'];
        $jenis_film = $_POST['jenis_film'];
        $produser = $_POST['produser'];
        $sutradara = $_POST['sutradara'];
        $penulis = $_POST['penulis'];
        $produksi = $_POST['produksi'];
        $casts = $_POST['casts'];
        $durasi = $_POST['durasi'];
        $penayangan = $_POST['penayangan'];
        $lama_tayang = $_POST['lama_tayang'];
        $gambar_1 = $_POST['gambar_1'];
        $gambar_2 = $_POST['gambar_2'];

        // gambar1
        $format_file = $_FILES['gambar_1']['name'];
        $tmp_name = $_FILES['gambar_1']['tmp_name'];
        $size = $_FILES['gambar_1']['size'];
        $type = explode('.',$format_file);
        $type2 = $type[1];
        $rename = "$nama.$type2";
        $format_foto = array('jpg', 'png', 'jpeg');
        $max_size = 3000000;

        // gambar2
        $format_file2 = $_FILES['gambar_2']['name'];
        $tmp_name2 = $_FILES['gambar_2']['tmp_name'];
        $size2 = $_FILES['gambar_2']['size'];
        $type2 = explode('.',$format_file);
        $type22 = $type[1];
        $rename2 = "$nama.$type2";
        $format_foto2 = array('jpg', 'png', 'jpeg');
        $max_size2 = 3000000;

        // gambar1
        if($size < $max_size){
            move_uploaded_file($tmp_name, 'gambar/'.$rename);
            move_uploaded_file($tmp_name2, 'gambar/'.$rename2);
            $sql = "INSERT INTO film VALUES ('$id_film','$nama_film','$jenis_film','$produser','$sutradara','$penulis','$produksi','$casts','$durasi','$penayangan','$lama_tayang','$rename','$rename2')";
            $result = mysqli_query($conn, $sql);

        if ($result){
            echo "
            <script> 
                alert ('data berhasil ditambah');
                document.location.href = 'main_page_admin.php';
            </script>";
        } else {
            echo "
            <script> 
                alert ('data gagal ditambah');
                document.location.href = 'add_film.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List film | TIX ID</title>
    <style>
    <?php include('css/admin.css');
    ?>
    </style>
</head>
<body>
    <div class="tixid">TIX ID</div>

    <div class="container-table">
        <form action="" method="post" style="width: 100%;margin:auto">
            <h3>Tambah Film</h3>
            <table>
                <tr>
                    <td>Nama film</td>
                    <td>:</td>
                    <td><input type="text" name="nama_film"></td>
                </tr>
                <tr>
                    <td>Jenis film</td>
                    <td>:</td>
                    <td><input type="text" name="jenis_film"></td>
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
                    <td>Produks</td>
                    <td>:</td>
                    <td><input type="text" name="produksi"></td>
                </tr>
                <tr>
                    <td>Casts</td>
                    <td>:</td>
                    <td><input type="text" name="casts"></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td><input type="text" name="durasi"></td>
                </tr>
                <tr>
                    <td>Penayangan</td>
                    <td>:</td>
                    <td><input type="text" name="penayangan"></td>
                </tr>
                <tr>
                    <td>Lama tayang</td>
                    <td>:</td>
                    <td><input type="text" name="lama_tayang"></td>
                </tr>
                <tr>
                    <td>Poster 1</td>
                    <td>:</td>
                    <td><input type="text" name="gambar_1"></td>
                </tr>
                <tr>
                    <td>Poster 2</td>
                    <td>:</td>
                    <td><input type="text" name="gambar_2"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>