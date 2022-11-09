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
        $deskripsi = $_POST['deskripsi'];
        $penayangan = $_POST['penayangan'];
        $tanggal_tayang = $_POST['tanggal_tayang'];
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
    <?php include('css/add_film.css');
    ?>
    </style>
</head>
<body>
    <div class="tixid">TIX ID</div>

    <div class="container">
        <form action="" method="post" style="width: 100%;margin:auto">
            <h3>Tambah Film</h3>
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
                        <!-- <select name="jenis_film">
                            <option value="Drama">Drama</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Horror">Horror</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Action">Action</option>
                            <option value="Documenter">Documenter</option>
                            <option value="Animation">Animation</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Musikal">Musikal</option>
                        </select> -->
                        <input type="checkbox" id="jenis1" name="jenis_film"  value="Drama">
                        <label for="jenis1"> Drama</label>
                        <input type="checkbox" id="jenis2" name="jenis_film"  value="Comedy">
                        <label for="jenis2"> Comedy</label>
                        <input type="checkbox" id="jenis3" name="jenis_film"  value="Horror">
                        <label for="jenis3"> Horror</label>
                        <input type="checkbox" id="jenis4" name="jenis_film"  value="Sci-fi">
                        <label for="jenis4"> Sci-fi</label>
                        <input type="checkbox" id="jenis5" name="jenis_film"  value="Action">
                        <label for="jenis5"> Action</label>
                        <input type="checkbox" id="jenis6" name="jenis_film"  value="Documenter">
                        <label for="jenis6"> Documenter</label>
                        <input type="checkbox" id="jenis7" name="jenis_film"  value="Animation">
                        <label for="jenis7"> Animation</label><br>
                        <input type="checkbox" id="jenis8" name="jenis_film"  value="Fantasy">
                        <label for="jenis8"> Fantasy</label>
                        <input type="checkbox" id="jenis9" name="jenis_film"  value="Thriller">
                        <label for="jenis9"> Thriller</label>
                        <input type="checkbox" id="jenis10" name="jenis_film"  value="Musikal">
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
                    <td><textarea name="description" id="" cols="20" rows="3"></textarea></td>
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
                    <td><input type="date" name="lama_tayang"></td>
                </tr>
                <tr>
                    <td>Poster 1</td>
                    <td>:</td>
                    <td><input type="file" name="gambar_1"></td>
                </tr>
                <tr>
                    <td>Poster 2</td>
                    <td>:</td>
                    <td><input type="file" name="gambar_2"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><textarea name="description" id="" cols="30" rows="5"></textarea></td>
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