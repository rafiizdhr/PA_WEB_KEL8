<!-- logout pake delete modal di w3school -->

<?php 
    session_start();
    session_unset();
    session_destroy();

    // echo"<script>
    //         alert('anda telah logout');
    //         document.location.href = 'login_user.php'
    //     </script>";
    header("Location: login_user.php");
?>