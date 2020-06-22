-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 11.19
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_listrik`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p003` (OUT `tahun` INT)  SELECT COUNT(*) INTO tahun FROM penggunaan WHERE penggunaan.tahun='2019'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p03` (OUT `tahun` INT)  SELECT COUNT(*) INTO tahun FROM penggunaan WHERE pelanggan.tahun='2019'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p1` ()  SELECT pelanggan.id_pelanggan, pelanggan.nometer, tagihan.bulan, 
tagihan.jumlahmeter, tagihan.status FROM pelanggan, tagihan
WHERE tagihan.id_pelanggan=pelanggan.id_pelanggan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p2` (IN `namap` VARCHAR(55))  SELECT pelanggan.nama, pelanggan.kodetarif, tagihan.status FROM pelanggan, tagihan
WHERE tagihan.id_pelanggan=pelanggan.id_pelanggan AND pelanggan.nama=namap$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p3` (OUT `tahun` INT)  SELECT COUNT(*) INTO tahun FROM penggunaan WHERE tahun='2019'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id_bukti` int(11) NOT NULL,
  `tagihan_id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `bank` varchar(55) NOT NULL,
  `norek` varchar(55) NOT NULL,
  `bank_tuju` varchar(55) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Aldiansah', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nometer` varchar(20) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `kodetarif` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nometer`, `nama`, `alamat`, `kodetarif`) VALUES
(1, '9887897687', 'Aldiansah', 'Depok', 'k01'),
(2, '7879879798', 'Dian', 'Cilodong', 'k02'),
(3, '0987887698', 'Anto', 'Cilodong', 'k03'),
(4, '002289187', 'devan suryavijaya', 'cilodong', 'k01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulanbayar` varchar(55) NOT NULL,
  `biayaadmin` int(11) NOT NULL,
  `totalbayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pelanggan`, `tanggal`, `bulanbayar`, `biayaadmin`, `totalbayar`) VALUES
(2, 2, '2019-12-02', 'juni', 1500, 0),
(3, 3, '2019-12-03', 'mei', 1500, 0),
(5, 2, '2020-01-31', 'January', 2000, 1002000),
(6, 1, '2020-02-01', 'February', 2500, 602500),
(7, 1, '2020-02-02', 'February', 2500, 202500),
(8, 1, '2020-02-10', 'February', 2500, 402500),
(9, 1, '2020-02-13', 'February', 2500, 302500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meterawal` int(11) NOT NULL,
  `meterakhir` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meterawal`, `meterakhir`, `status`) VALUES
(1, 1, 'Desember', 2019, 300, 1400, 1),
(2, 2, 'Juli', 2018, 200, 700, 1),
(3, 3, 'Juni', 2019, 100, 2000, 1),
(4, 1, 'february', 2020, 100, 700, 1),
(5, 4, 'february', 2020, 100, 500, 0),
(6, 3, 'Januari', 2021, 900, 980, 0),
(7, 1, 'maret', 2020, 100, 500, 1),
(8, 1, 'april', 2020, 200, 400, 1),
(9, 1, 'Mei', 2020, 200, 900, 1),
(10, 1, 'November', 2020, 100, 200, 1),
(11, 1, 'Desember', 2020, 200, 500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_penggunaan` int(11) NOT NULL,
  `bulan` varchar(55) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlahmeter` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_pelanggan`, `id_penggunaan`, `bulan`, `tahun`, `jumlahmeter`, `status`) VALUES
(8, 3, 3, 'Juni', 2019, 1900, 0),
(9, 2, 2, 'Juli', 2018, 500, 1),
(10, 1, 1, 'Desember', 2019, 1100, 1),
(11, 1, 4, 'february', 2020, 600, 1),
(12, 1, 8, 'april', 2020, 200, 1),
(13, 1, 7, 'maret', 2020, 400, 1),
(14, 1, 9, 'Mei', 2020, 700, 0),
(15, 1, 10, 'November', 2020, 100, 0),
(16, 1, 11, 'Desember', 2020, 300, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `kodetarif` varchar(20) NOT NULL,
  `daya` varchar(55) NOT NULL,
  `tarifperkwh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`kodetarif`, `daya`, `tarifperkwh`) VALUES
('k01', '401kwh', 1000),
('k02', '1500kwh', 2000),
('k03', '500kwh', 1500);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `valamat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `valamat` (
`nama` varchar(55)
,`bulan` varchar(20)
,`meterawal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `valmat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `valmat` (
`nama` varchar(55)
,`bulan` varchar(20)
,`meterawal` int(11)
,`alamat` varchar(55)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpelanggan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpelanggan` (
`nama` varchar(55)
,`id_bayar` int(11)
,`tanggal` date
,`biayaadmin` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtarif`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtarif` (
`nama` varchar(55)
,`kodetarif` varchar(20)
,`daya` varchar(55)
,`tarifperkwh` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `valamat`
--
DROP TABLE IF EXISTS `valamat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `valamat`  AS  select `pelanggan`.`nama` AS `nama`,`penggunaan`.`bulan` AS `bulan`,`penggunaan`.`meterawal` AS `meterawal` from (`pelanggan` join `penggunaan`) where ((`penggunaan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) and (`pelanggan`.`alamat` = 'cilodong')) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `valmat`
--
DROP TABLE IF EXISTS `valmat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `valmat`  AS  select `pelanggan`.`nama` AS `nama`,`penggunaan`.`bulan` AS `bulan`,`penggunaan`.`meterawal` AS `meterawal`,`pelanggan`.`alamat` AS `alamat` from (`pelanggan` join `penggunaan`) where ((`penggunaan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) and (`pelanggan`.`alamat` = 'cilodong')) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpelanggan`
--
DROP TABLE IF EXISTS `vpelanggan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpelanggan`  AS  select `pelanggan`.`nama` AS `nama`,`pembayaran`.`id_bayar` AS `id_bayar`,`pembayaran`.`tanggal` AS `tanggal`,`pembayaran`.`biayaadmin` AS `biayaadmin` from (`pelanggan` join `pembayaran`) where (`pembayaran`.`id_pelanggan` = `pelanggan`.`id_pelanggan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtarif`
--
DROP TABLE IF EXISTS `vtarif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtarif`  AS  select `pelanggan`.`nama` AS `nama`,`tarif`.`kodetarif` AS `kodetarif`,`tarif`.`daya` AS `daya`,`tarif`.`tarifperkwh` AS `tarifperkwh` from (`pelanggan` join `tarif`) where (`pelanggan`.`kodetarif` = `tarif`.`kodetarif`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_tagihan` (`tagihan_id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `kodetarif` (`kodetarif`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`kodetarif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `bukti_pembayaran_ibfk_1` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihan` (`id_tagihan`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`kodetarif`) REFERENCES `tarif` (`kodetarif`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
