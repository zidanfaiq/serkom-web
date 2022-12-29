<?php
    $email= $_POST['email'];
    $password=$_POST['password'];

    //perintah menampilkan data berdasarkan email pada tabel user
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query) or die($conn->error.__LINE__);

    //jika data email belum ada pada database
    if($result->num_rows < 1) {
        //memasukan data pada tabel user yaitu email dan password
        $insert = "INSERT INTO user (email, password) VALUES ('$email','$password')";
        if($conn->query($insert)){
            echo (
                "<div class='alert alert-warning alert-server'>Berhasil mendaftar, silahkan Login!</div>
                <meta http-equiv='refresh' content='2'>"
            );
        } else {
            //daftar gagal
            echo (
                "<div class='alert alert-warning alert-server'>Daftar gagal, silahkan coba lagi!</div>
                <meta http-equiv='refresh' content='2'>"
            );
        }
    }
    else {
        //jika email sudah ada pada tabel user
        echo (
            "<div class='alert alert-warning alert-server'>Email sudah terdaftar!</div>
            <meta http-equiv='refresh' content='2'>"
        );
    }
?>