-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2022 pada 05.29
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_bus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `kelas_bus` varchar(45) NOT NULL,
  `harga_bus` int(11) NOT NULL,
  `deskripsi_bus` longtext NOT NULL,
  `gambar_bus` varchar(15) NOT NULL,
  `gambar_kabin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `kelas_bus`, `harga_bus`, `deskripsi_bus`, `gambar_bus`, `gambar_kabin`) VALUES
(1, 'Ekonomi', 35000, 'Kelas ekonomi dari suatu bus terbagi lagi menjadi dua, yaitu ekonomi AC dan non AC. Konfigurasi kursi bus ekonomi biasanya 3-2, 3 kursi di sebelah kanan dengan 2 kursi di sebelah kiri. Namun di Sumatera dan beberapa PO di pulau lain, bus ekonomi tetap menggunakan kursi 2-2. Biasanya, konfigurasi 3-2 pada bus ekonomi bisa memuat hingga 59 orang, 56 orang jika memiliki toilet. Atau kalau menggunakan konfigurasi 2-2, tanpa toilet bisa memuat hingga 45-50 orang penumpang.', 'ekonomi.jpg', 'kabin-ekonomi.jpg'),
(2, 'Bisnis', 50000, 'Bus kelas bisnis hampir semuanya menggunakan AC. Dibanding Ekonomi, bus bisnis biasanya lebih cepat prosesnya dan Bus bisnis biasanya tidak menaikkan penumpang di jalan.Konfigurasi kursinya biasa menggunakan konfigurasi 2-2, 2 di kiri dan 2 di kanan. Ketimbang konfigurasi 3-2, konfigurasi 2-2 jelasnya lebih nyaman karena kursinya lebih lebar dan tidak empet-empetan. Kapasitasnya biasanya 36 hingga 39 orang, tergantung kebijakan PO dan ketersediaan toilet atau tidak.', 'bisnis.jpg', 'kabin-bisnis.jpg'),
(3, 'Eksekutif', 80000, 'Bus kelas eksektif Fasilitas yang diberikan biasanya lebih banyak dibanding bus kelas bisnis, seperti legrest, bantal, selimut, dan lain sebagainya. Hampir semua bus eksekutif sudah memakai AC. Konfigurasi kursi biasanya tetap 2-2 seperti bisnis, namun kapasitasnya biasanya lebih sedikit, paling banyak mungkin hanya sekitar 34-36 kursi penumpang, banyak juga yang hanya 28 penumpang dengan legrest dan legroom lebih lega.', 'eksekutif.jpg', 'kabin-eksekutif.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tiket`
--

CREATE TABLE `pesan_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_identitas` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `kelasp` varchar(45) NOT NULL,
  `jadwal` date NOT NULL,
  `pnonlansia` int(45) NOT NULL,
  `plansia` int(45) NOT NULL,
  `harga_tiket` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_tiket`
--

INSERT INTO `pesan_tiket` (`id_tiket`, `id_user`, `nama`, `no_identitas`, `no_hp`, `kelasp`, `jadwal`, `pnonlansia`, `plansia`, `harga_tiket`, `total`) VALUES
(32, 1, 'Zidan', '001', '082324684842', 'Bisnis', '2023-01-05', 2, 0, 50000, 100000),
(33, 1, 'Maulana Izul', '002', '081321412410', 'Ekonomi', '2023-01-03', 1, 2, 35000, 98000),
(34, 3, 'Lionel Messi', '003', '082313167131', 'Eksekutif', '2022-12-31', 3, 1, 80000, 312000),
(35, 3, 'Alice', '004', '082563899221', 'Bisnis', '2023-01-04', 3, 0, 50000, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'zidan@gmail.com', 'zidan123'),
(3, 'zidan08@gmaill.com', 'zidan123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
