<?php
    $id_tiket = $_GET['id'];
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

    //menghitung total bayar
    $total_pnonlansia = $harga_tiket * $pnonlansia;
    $total_plansia = $harga_tiket * $plansia;
    $total_harga = $total_pnonlansia + $total_plansia;
    $potongan = ($harga_tiket * 0.1) * $plansia;
    $total_bayar= $total_harga - $potongan;

    //perintah mengubah data pada tabel pesan_tiket berdasarkan id_tiket
    $sql = "UPDATE pesan_tiket SET nama = '$nama', no_identitas = '$no_identitas', no_hp = '$no_hp', kelasp = '$kelasp', jadwal= '$jadwal', pnonlansia = '$pnonlansia', plansia = '$plansia', harga_tiket = '$harga_tiket', total = '$total_bayar' WHERE id_tiket ='$id_tiket'";
    $result = $conn->query($sql) or die($conn->error.__LINE__);

    if ($result){
        echo '<div class="alert alert-success alert-server">Pesanan tiket berhasil diubah!</div>';
        header("Refresh: 2; URL=http://localhost/serkom-web/pesanan_saya.php");
    } else {
        echo '<div class="alert alert-success alert-server">Pesanan tiket gagal diubah!</div>';
        header("Refresh: 2; URL=http://localhost/serkom-web/pesanan_saya.php");
    }
?>