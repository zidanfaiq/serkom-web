<?php
    include "proses/koneksi.php"; //menyisipkan file koneksi.php
    session_start(); //eksekusi session

    //jika session kosong akan dialihkan ke halaman index.php
    if (empty($_SESSION["id_user"])) {
        header("Location:index.php");
    }

    
    $id_user = $_SESSION['id_user'];

    //menampilkan data pesan_tiket secara descending berdasarkan id_user
    $qtiket = "SELECT * FROM pesan_tiket WHERE id_user='$id_user' ORDER BY id_tiket DESC";
    $data_tiket = $conn->query($qtiket);
    $nomor = 0;
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Bus AKAP | Pesanan Saya</title>
        <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time();?>">
        
    </head>
    

    <body>
        <nav class="navbar navbar-expand-xl navbar-dark bg-secondary sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">BUS AKAP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="harga_tiket.php">Harga Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesan_tiket.php">Pesan Tiket</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Daftar Pesanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="semua_pesanan.php">Semua Pesanan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pesanan_saya.php">Pesanan Saya</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grafik Pesanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="semua_grafik.php">Semua Grafik</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="grafik_saya.php">Grafik Saya</a>
                        </div>
                    </li>
                    </ul>
                    <div class="navbar-nav ml-auto">
                        <button class="btn btn-outline-light btn-sm" onclick="location.href='proses/logout.php'">Logout</button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <br>
            <h3 class="text-center mb-0">DAFTAR</h3>
            <h3 class="text-center mb-0">PESANAN SAYA</h3>
            <br><br>
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle">No.</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">No. Identitas</th>
                                <th class="align-middle">No. HP</th>
                                <th class="align-middle">Kelas Bus</th>
                                <th class="align-middle">Jadwal Berangkat</th>
                                <th class="align-middle">Penumpang Non Lansia</th>
                                <th class="align-middle">Penumpang Lansia</th>
                                <th class="align-middle">Harga Tiket</th>
                                <th class="align-middle">Total Bayar</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //fungsi merubah angka menjadi bentuk rupiah
                            function rupiah($angka){
	
                                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                                return $hasil_rupiah;
                            }
                            
                            //perulangan untuk menampilkan data dalam bentuk array
                            foreach($data_tiket as $index => $value){
                                $nomor++;
                        ?>
                            <tr class="text-center">
                                <td><?php echo $nomor?></th>
                                <td><?php echo $value['nama'];?></th>
                                <td><?php echo $value['no_identitas'];?></th>
                                <td><?php echo $value['no_hp'];?></th>
                                <td><?php echo $value['kelasp'];?></th>
                                <td><?php echo $value['jadwal'];?></th>
                                <td><?php echo $value['pnonlansia'];?></th>
                                <td><?php echo $value['plansia'];?></th>
                                <td><?php echo rupiah($value['harga_tiket']);?></th>
                                <td><?php echo rupiah($value['total']);?></th>
                                <td style="text-align: center;">
                                    <a href="detail.php?id=<?php echo $value['id_tiket'] ?>" type="button">
                                        <span class="fa fa-eye fa" style="color: black;">&ensp;</span>
                                    </a>
                                    <a href="ubah_data.php?id=<?php echo $value['id_tiket'] ?>" type="button">
                                        <span class="fa fa-pencil fa" style="color: black;">&ensp;</span>
                                    </a>
                                    <a href="proses/hapus.php?id=<?php echo $value['id_tiket'] ?>" type="button">
                                        <span class="fa fa-trash fa" style="color: red;"></span>
                                    </a> 
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
       
    </body>
</html>