<?php
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $kelasp = $_POST['kelasp'];
    $jadwal = $_POST['jadwal'];
    $pnonlansia = $_POST['pnonlansia'];
    $plansia = $_POST['plansia'];

    //percabangan untuk menentukan harga pada kelas bus
    if ($kelasp == "Ekonomi") {
        $harga_tiket = 35000;
    } else if($kelasp == "Bisnis") {
        $harga_tiket = 50000;
    } else if($kelasp == "Eksekutif") {
        $harga_tiket = 80000;
    }

    //perhitungan total bayar
    $total_pnonlansia = $harga_tiket * $pnonlansia;
    $total_plansia = $harga_tiket * $plansia;
    $total_harga = $total_pnonlansia + $total_plansia;
    $potongan = ($harga_tiket * 0.1) * $plansia;
    $total_bayar= $total_harga - $potongan;

    //perintah menambahkan data pada tabel pesan_tiket
    $sql="INSERT INTO pesan_tiket (id_user, nama, no_identitas, no_hp, kelasp, jadwal, pnonlansia, plansia, harga_tiket, total) VALUES ('$id_user', '$nama', '$no_identitas', '$no_hp', '$kelasp', '$jadwal', '$pnonlansia', '$plansia', '$harga_tiket', '$total_bayar')";
    $result = $conn->query($sql) or die($conn->error.__LINE__);
    if ($result){
        echo (
            "<div class='alert alert-warning alert-server'>Tiket berhasil dipesan!</div>
            <meta http-equiv='refresh' content='2'>"
        );
    } else {
        echo (
            "<div class='alert alert-warning alert-server'>Tiket gagal dipesan!</div>
            <meta http-equiv='refresh' content='2'>"
        );
    }
?>