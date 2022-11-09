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
        
        
?>