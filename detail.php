<?php
    include "proses/koneksi.php"; //menyisipkan file koneksi.php
    session_start(); //eksekusi session

    //tombol login akan mengeksekusi file login.php
    if(isset($_POST['btn-login'])) {
        require "proses/login.php";
    }
 
    //tombol signup akan mengeksekusi file signup.php
    if(isset($_POST['btn-signup'])) {
        require "proses/signup.php";
    }

    $id_tiket = $_GET['id'];

    //menampilkan data pada tabel pesan_tiket berdasarkan id_tiket
    $sql = "SELECT * FROM pesan_tiket WHERE id_tiket ='$id_tiket'";
    $query = $conn->query($sql);
    $data = mysqli_fetch_assoc($query);
    
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Bus AKAP | Detail Pesanan</title>

        <!-- memanggil style -->
        <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time();?>">
        
    </head>
    

    <body>
        <!-- navigation bar -->
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
                        <?php
                            //kondisi jika session id_user kosong akan membuka modal login
                            if (empty($_SESSION["id_user"])) {
                                echo '<a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Pesan Tiket</a>';
                            }
                            //jika tidak, membuka hal web pesan_tiket.php
                            else {
                                echo '<a class="nav-link" href="pesan_tiket.php">Pesan Tiket</a>';   
                            }
                        ?>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Daftar Pesanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="semua_pesanan.php">Semua Pesanan</a>
                            <div class="dropdown-divider"></div>
                            <?php
                                //jika session id_user kosong akan membuka modal login
                                if (empty($_SESSION["id_user"])) {
                                    echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Pesanan Saya</a>';
                                }
                                //jika tidak, membuka hal web pesanan_saya.php
                                else {
                                    echo '<a class="dropdown-item" href="pesanan_saya.php">Pesanan Saya</a>';   
                                }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grafik Pesanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="semua_grafik.php">Semua Grafik</a>
                            <div class="dropdown-divider"></div>
                            <?php
                                //kondisi jika session id_user kosong akan membuka modal login
                                if (empty($_SESSION["id_user"])) {
                                    echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Grafik Saya</a>';
                                }
                                //jika tidak, membuka hal web grafik_saya.php
                                else {
                                    echo '<a class="dropdown-item" href="grafik_saya.php">Grafik Saya</a>';   
                                }
                            ?>
                        </div>
                    </li>
                    </ul>
                    <div class="navbar-nav ml-auto">
                        <?php
                            //kondisi jika session id_user kosong, tombol digunakan untuk login
                            if (empty($_SESSION["id_user"])) {
                                echo '<button class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#loginModal">Login</button>';
                            }
                            //jika tidak, tombol digunakan untuk logout
                            else {
                                echo '<button class="btn btn-outline-light btn-sm" onclick=location.href="proses/logout.php">Logout</button>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <br>
            <h3 class="text-center mb-0">DETAIL</h3>
            <h3 class="text-center mb-0">PESANAN TIKET</h3>
            <br><br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                        <?php
                            //fungsi merubah angka menjadi bentuk rupiah
                            function rupiah($angka){
	
                                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                                return $hasil_rupiah;
                            }
                        ?>
                            <!-- menampilkan data berdasarkan id_tiket -->
                            <tr>
                                <td>Nama Lengkap</th>
                                <td><?php echo $data['nama'];?></th>
                            </tr>
                            <tr>
                                <td>Nomor Identitas</th>
                                <td><?php echo $data['no_identitas'];?></th>
                            </tr>
                            <tr>
                                <td>Nomor Handphone</th>
                                <td><?php echo $data['no_hp'];?></th>
                            </tr>
                            <tr>
                                <td>Kelas Bus</th>
                                <td><?php echo $data['kelasp'];?></th>
                            </tr>
                            <tr>
                                <td>Jadwal Berangkat</th>
                                <td><?php echo $data['jadwal'];?></th>
                            </tr>
                            <tr>
                                <td>Penumpang</th>
                                <td><?php echo $data['pnonlansia'];?></th>
                            </tr>
                            <tr>
                                <td>Penumpang Lansia</th>
                                <td><?php echo $data['plansia'];?></th>
                            </tr>
                            <tr>
                                <td>Total Bayar</th>
                                <td><?php echo rupiah($data['total']);?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- pop up atau modal login -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" minlength="12" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                                </div>
                                <button type="submit" name="btn-login" class="btn btn-info btn-block btn-round">Login</button>
                            </form>
                            <div class="modal-footer d-flex justify-content-center" style="margin-top: 60px">
                                <div class="signup-section">Tidak punya akun? <a href="#" data-toggle="modal" data-target="#signupModal" class="text-info" data-dismiss="modal" aria-label="Close"> Sign Up</a></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pop up atau modal signup -->
        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Sign Up</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" minlength="12" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                                </div>
                                <button type="submit" name="btn-signup" class="btn btn-info btn-block btn-round">Sign Up</button>
                            </form>
                            <div class="modal-footer d-flex justify-content-center" style="margin-top: 60px">
                                <div class="signup-section">Sudah punya akun? <a href="#" data-toggle="modal" data-target="#loginModal" class="text-info" data-dismiss="modal" aria-label="Close"> Login</a></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
       
    </body>
</html>