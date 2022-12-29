<?php
    session_start(); //eksekusi session

    //menghapus semua session
    unset($_SESSION['id_user']);
    unset($_SESSION['email_user']);
    session_destroy();
    
    echo '<div class="alert alert-success">Berhasil Logout!</div>';
    header("Refresh: 2; URL=http://localhost/serkom-web/index.php");

    echo (
        '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">'
    );
?>