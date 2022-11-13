<!-- delete -->
<?php
    require "koneksi.php";

    $id_film = $_GET['id_film'];

    $kim = mysqli_query($conn, "SELECT gambar_1 from film WHERE id_film=$id_film");
    $kun = mysqli_fetch_assoc($kim);
    unlink('gambar/'.$kun['gambar_1']);

    $result = mysqli_query($conn, "DELETE from film WHERE id_film=$id_film");

    if ($result){
        echo "
        <script> 
            alert ('data film dihapus');
            document.location.href = 'main_page_admin.php';
        </script>";
    } else {
        echo "
        <script> 
            alert ('data film gagal dihapus');
            document.location.href = 'main_page_admin.php';
        </script>";
    }
?>