<?php
    include "proses/koneksi.php"; //menyisipkan file koneksi.php
    session_start(); //eksekusi session

    if(isset($_POST['btn-pesan'])){ //POST diambil dari data yang diisikan
        require "proses/pesan.php";
    }
    
    //jika session kosong akan dialihkan ke halaman index.php
    if (empty($_SESSION["id_user"])) {
        header("Location:index.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Bus AKAP | Pesan Tiket</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="pesan_tiket.php">Pesan Tiket <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
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
            <h3 class="text-center mb-0">PESAN</h3>
            <h3 class="text-center mb-0">TIKET BUS</h3>
            <br><br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-12">
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas" class="col-sm-3 control-label">Nomor Identitas</label>
                            <div class="col-sm-12">
                                <input type="text" name="no_identitas" class="form-control" placeholder="Masukan Nomor Identitas Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-sm-3 control-label">Nomor HP</label>
                            <div class="col-sm-12">
                                <input type="text" name="no_hp" class="form-control" placeholder="Masukan Nomor HP Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelasp" class="col-sm-3 control-label">Kelas Penumpang</label>
                            <div class="col-sm-12 col-xs-12">
                                <select name="kelasp" class="form-control" onchange="hitungTotal()">
                                    <option value="Ekonomi">Kelas Ekonomi</option>
                                    <option value="Bisnis">Kelas Bisnis</option>
                                    <option value="Eksekutif">Kelas Eksekutif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jadwal" class="col-sm-12 control-label">Jadwal Keberangkatan</label>
                            <div class="col-sm-12">
                                <input type="date" name="jadwal"class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pnonlansia" class="col-sm-3 control-label">Jumlah Penumpang</label>
                            <div class="col-sm-12">
                                <input type="number" name="pnonlansia" class="form-control" placeholder="Bukan Lansia (Usia < 60)" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="plansia" class="col-sm-12 control-label">Jumlah Penumpang Lansia</label>
                            <div class="col-sm-12">
                                <input type="number" name="plansia" class="form-control" placeholder="Usia 60 tahun ke atas" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="checkbox"required>
                                <h9>&ensp; Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.</h9>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-12">
                                <button type="submit" name="btn-pesan" class="btn btn-info btn-block btn-round">Pesan Tiket Bus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
       
    </body>

</html>