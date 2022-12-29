<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    // perintah menampilkan email dan password pada tabel user
    $query = "SELECT * FROM user WHERE email='$email' and password='$password'";

    //membaca hasil query di database
    $result = $conn->query($query) or die($conn->error.__LINE__);

    //jika hasil query yang dicari ada
    if($result->num_rows > 0) {
        //Mengubah data pada suatu hasil query kedalam bentuk array
        $data = mysqli_fetch_assoc($result);

        //menyimpan session id_user dan email
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['email_user'] = $email;
        echo (
            //menampilkan alert
            "<div class='alert alert-warning alert-server'>Berhasil Login!</div>
            <meta http-equiv='refresh' content='2'>"
        );
    } else {
        echo (
            "<div class='alert alert-warning alert-server'>Email atau Password salah!</div>
            <meta http-equiv='refresh' content='2'>"
        );
    }
?>