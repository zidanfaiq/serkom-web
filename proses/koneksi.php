<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tiket_bus";

    // membuat koneksi database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // mengecek koneksi
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>