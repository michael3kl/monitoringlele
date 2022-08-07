-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2022 pada 08.32
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringlele`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_a` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kode_customer` varchar(30) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `nama_kolam` varchar(50) NOT NULL,
  `kode_kolam` varchar(20) NOT NULL,
  `kode_bibit` varchar(30) NOT NULL,
  `bibit` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tg` varchar(2) NOT NULL,
  `bl` varchar(2) NOT NULL,
  `th` varchar(4) NOT NULL,
  `jam_mulai` varchar(2) NOT NULL,
  `jam_selesai` varchar(2) NOT NULL,
  `selesai` enum('0','1') NOT NULL,
  `status_mati` text NOT NULL,
  `jumlah_pakan` float DEFAULT NULL,
  `tgl` varchar(30) NOT NULL,
  `tinggi_air` float NOT NULL,
  `antibiotik` varchar(20) DEFAULT 'Tidak',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_a`, `email`, `kode_customer`, `nama_customer`, `nama_kolam`, `kode_kolam`, `kode_bibit`, `bibit`, `hari`, `tg`, `bl`, `th`, `jam_mulai`, `jam_selesai`, `selesai`, `status_mati`, `jumlah_pakan`, `tgl`, `tinggi_air`, `antibiotik`, `keterangan`) VALUES
(1, 'user@monitoring.com', 'mb', 'michaelbinsar', '0', '', 'cc', 'Cacing', 'Sabtu', '28', '05', '2022', '1', '2', '1', '3', NULL, '2022-05-28', 0, 'Tidak', '-'),
(4, 'user@monitoring.com', 'timothyhenan', 'timothy henan', 'Kolam B', 'b', 'cc', 'Cacing', 'Jumat', '05', '08', '2022', '2', '2', '0', '10', NULL, '2022-08-05', 0, 'Tidak', ''),
(5, 'user@monitoring.com', 'michaeljoseph', 'michael joseph', 'Kolam E', 'e', 'plt', 'Pelet', 'Selasa', '02', '08', '2022', '1', '1', '0', '11', NULL, '2022-08-02', 0, 'Tidak', 'Pakannya kebanyakan'),
(6, 'user@monitoring.com', 'timothyhenan', 'timothy henan', 'Kolam C', 'c', 'plt', 'Pelet', 'Sabtu', '06', '08', '2022', '2', '2', '0', '13', NULL, '2022-08-06', 0, 'Tidak', 'Airnya ketinggian'),
(7, 'user@monitoring.com', 'timothyhenan', 'timothy henan', 'Kolam C', 'c', 'plt', 'Pelet', 'Sabtu', '13', '08', '2022', '2', '2', '0', '18', 1.8, '2022-08-13', 0, 'Tidak', 'Pakan dinaikkan'),
(8, 'user@monitoring.com', 'timothyhenan', 'timothy henan', 'Kolam C', 'c', 'plt', 'Pelet', 'Sabtu', '06', '08', '2022', '2', '2', '0', '18', 1.8, '2022-08-06', 0, 'Tidak', 'Pakannya nambah'),
(9, 'user@monitoring.com', 'timothyhenan', 'timothy henan', 'Kolam C', 'c', 'plt', 'Pelet', 'Sabtu', '11', '08', '2022', '2', '2', '0', '5', 1.8, '2022-08-11', 20, 'Ya', 'Karena banyak yang mati, maka diberi antibiotik\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bibit`
--

CREATE TABLE `tb_bibit` (
  `bibit` varchar(50) NOT NULL,
  `kode_bibit` varchar(20) NOT NULL,
  `id_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bibit`
--

INSERT INTO `tb_bibit` (`bibit`, `kode_bibit`, `id_b`) VALUES
('Cacing', 'cc', 1),
('Pelet', 'plt', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_c` int(11) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `kode_bibit` varchar(20) NOT NULL,
  `no hp` varchar(20) NOT NULL,
  `kode_customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_c`, `nama_customer`, `kode_bibit`, `no hp`, `kode_customer`) VALUES
(1, 'michael binsar', 'cc', '082273797797', 'michaelbinsar'),
(2, 'michael joseph', 'cc', '082273797798', 'michaeljoseph'),
(3, 'nazir jimin', 'cc', '082273797799', 'nazirjimin'),
(4, 'timothy henan', 'cc', '082273797798', 'timothyhenan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_i` int(11) NOT NULL,
  `npsn` varchar(20) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_i`, `npsn`, `nama_instansi`, `alamat`, `logo`) VALUES
(1, '1101110', 'Institut Teknologi Del', 'Depan gerbang Institut Teknologi Del, Sitoluama, Kec. Balige, Toba, Sumatera Utara 22381', 'Del.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_j` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kode_bibit` varchar(50) NOT NULL,
  `jam_mulai` varchar(2) NOT NULL,
  `jam_selesai` varchar(2) NOT NULL,
  `pukul_mulai` varchar(25) NOT NULL,
  `pukul_selesai` varchar(25) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `kode_customer` varchar(20) NOT NULL,
  `kode_kolam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_j`, `email`, `kode_bibit`, `jam_mulai`, `jam_selesai`, `pukul_mulai`, `pukul_selesai`, `hari`, `kode_customer`, `kode_kolam`) VALUES
(24, 'user@monitoring.com', 'plt', '1', '1', '09.30', '11.00', 'Selasa', 'michaeljoseph', 'e'),
(25, 'user@monitoring.com', 'plt', '1', '1', '09.30', '11.00', 'Jumat', 'nazirjimin', 'f'),
(26, 'user@monitoring.com', 'cc', '2', '2', '15.00', '17.00', 'Jumat', 'timothyhenan', 'b'),
(27, 'user@monitoring.com', 'plt', '1', '1', '09.30', '11.00', 'Kamis', 'michaelbinsar', 'a'),
(28, 'user@monitoring.com', 'plt', '2', '2', '15.00', '17.00', 'Sabtu', 'timothyhenan', 'c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jammonitoring`
--

CREATE TABLE `tb_jammonitoring` (
  `id_jm` int(11) NOT NULL,
  `jam_ke` varchar(2) NOT NULL,
  `pukul_mulai` varchar(20) NOT NULL,
  `pukul_selesai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jammonitoring`
--

INSERT INTO `tb_jammonitoring` (`id_jm`, `jam_ke`, `pukul_mulai`, `pukul_selesai`) VALUES
(1, '1', '09.30', '11.00'),
(2, '2', '15.00', '17.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kolam`
--

CREATE TABLE `tb_kolam` (
  `id_k` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_kolam` varchar(50) NOT NULL,
  `kode_kolam` varchar(15) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `Jumlah_ikan` int(11) NOT NULL,
  `status_mati` int(11) NOT NULL,
  `jumlah_pakan` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kolam`
--

INSERT INTO `tb_kolam` (`id_k`, `email`, `nama_kolam`, `kode_kolam`, `tgl_masuk`, `Jumlah_ikan`, `status_mati`, `jumlah_pakan`, `keterangan`) VALUES
(1, 'user@monitoring.com', 'Kolam A', 'a', '2022-08-04', 10, 0, 2, '0'),
(2, 'user@monitoring.com', 'Kolam B', 'b', '2022-08-23', 0, 0, NULL, '0'),
(3, 'user@monitoring.com', 'Kolam C', 'c', '2022-08-25', 67, 20, NULL, '0'),
(7, 'user@monitoring.com', 'Kolam D', 'd', '2022-08-17', 38, 0, NULL, '0'),
(9, 'user@monitoring.com', 'Kolam E', 'e', '2022-08-21', 12, 0, NULL, '0'),
(14, 'user@monitoring.com', 'Kolam F', 'f', '2022-08-05', 10, 5, NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pakan`
--

CREATE TABLE `tb_pakan` (
  `id_ck` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jumlah_pakan` int(11) NOT NULL,
  `usia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pakan`
--

INSERT INTO `tb_pakan` (`id_ck`, `email`, `jumlah_pakan`, `usia`) VALUES
(1, 'user@monitoring.com', 1, 30),
(2, 'user@monitoring.com', 2, 60),
(3, 'user@monitoring.com', 3, 90),
(4, 'user@monitoring.com', 4, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemakai`
--

CREATE TABLE `tb_pemakai` (
  `id_p` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `kode_bibit` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(50) NOT NULL,
  `wa` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('3','2','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemakai`
--

INSERT INTO `tb_pemakai` (`id_p`, `email`, `password`, `status`, `nama`, `nip`, `kode_bibit`, `alamat`, `hp`, `wa`, `foto`, `level`) VALUES
(1, 'admin@monitoring.com', '$2y$10$dt7Y00b/eiSmSe1H2w33X.yDLnx9nXXkChcHFeKVDnrqb91TV1sB6', '1', 'administrator', '11419012', 'cc', 'Jln. Sitoluama', '082273797797', '082273797797', 'michael.JPG', '1'),
(2, 'user@monitoring.com', '$2y$10$dt7Y00b/eiSmSe1H2w33X.yDLnx9nXXkChcHFeKVDnrqb91TV1sB6', '1', 'user', '11419000', 'cc', 'Jln. bijaksana', '0811602848', '0811602848', 'michael.JPG', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_a`);

--
-- Indeks untuk tabel `tb_bibit`
--
ALTER TABLE `tb_bibit`
  ADD PRIMARY KEY (`id_b`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_c`);

--
-- Indeks untuk tabel `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_i`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_j`);

--
-- Indeks untuk tabel `tb_jammonitoring`
--
ALTER TABLE `tb_jammonitoring`
  ADD PRIMARY KEY (`id_jm`);

--
-- Indeks untuk tabel `tb_kolam`
--
ALTER TABLE `tb_kolam`
  ADD PRIMARY KEY (`id_k`);

--
-- Indeks untuk tabel `tb_pakan`
--
ALTER TABLE `tb_pakan`
  ADD PRIMARY KEY (`id_ck`);

--
-- Indeks untuk tabel `tb_pemakai`
--
ALTER TABLE `tb_pemakai`
  ADD PRIMARY KEY (`id_p`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_bibit`
--
ALTER TABLE `tb_bibit`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_j` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_jammonitoring`
--
ALTER TABLE `tb_jammonitoring`
  MODIFY `id_jm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kolam`
--
ALTER TABLE `tb_kolam`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_pemakai`
--
ALTER TABLE `tb_pemakai`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
