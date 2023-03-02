-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Mar 2023 pada 09.26
-- Versi server: 5.7.33
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_history`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_service` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_service`, `keterangan`, `created_at`) VALUES
(1, 38, 'admin menambah service', '0000-00-00 00:00:00'),
(2, 39, 'admin menambah service', '2023-02-27 12:07:30'),
(3, 40, 'riqza menambah service', '2023-02-27 12:13:09'),
(4, 41, 'riqza menambah riwayat service', '2023-02-27 12:15:34'),
(5, 42, 'riqza menambah riwayat service Monitor', '2023-02-27 12:17:43'),
(10, 43, 'riqza menambah riwayat service sdvsvs unit ', '2023-02-27 14:27:59'),
(11, 44, 'riqza menambah riwayat service sd unit TU', '2023-02-27 14:28:43'),
(12, 32, 'riqza mengahapus riwayat service nndfgnn', '2023-02-27 14:32:49'),
(13, 42, 'riqza mengahapus riwayat service Monitor unit BAAK', '2023-02-27 14:33:36'),
(14, 24, 'admin mengahapus riwayat service PC unit Puskom', '2023-02-27 15:27:17'),
(15, 26, 'admin mengahapus riwayat service dnhdfndfn unit TU', '2023-02-27 15:27:29'),
(16, 43, 'admin mengahapus riwayat service sdvsvs unit BAAK', '2023-02-27 15:27:39'),
(17, 45, 'admin menambah riwayat service hrthtrh unit Puskom', '2023-02-28 10:21:36'),
(18, 44, 'admin mengupdate status riwayat service sd unit BAAK', '2023-02-28 11:25:02'),
(19, 44, 'admin mengupdate riwayat service sd unit BAAK', '2023-02-28 11:25:37'),
(20, 44, 'admin mengupdate status, riwayat service sd unit BAAK', '2023-02-28 11:28:04'),
(21, 44, 'admin mengupdate riwayat service sd unit BAAK', '2023-02-28 11:29:39'),
(22, 44, 'admin mengupdate status riwayat service sd unit BAAK', '2023-02-28 11:36:12'),
(23, 44, 'admin mengupdate status riwayat service sd unit BAAK menjadi selesai', '2023-02-28 11:41:31'),
(24, 44, 'admin mengupdate status riwayat service sd unit BAAK menjadi proses', '2023-02-28 11:42:20'),
(25, 44, 'admin mengupdate riwayat service sd unit BAAK', '2023-02-28 11:42:32'),
(26, 44, 'admin mengupdate riwayat service sd unit BAAK', '2023-02-28 11:43:12'),
(27, 44, 'admin mengahapus riwayat service sd unit BAAK', '2023-02-28 11:43:29'),
(28, 25, 'admin mengupdate status riwayat service hdfh unit Puskom menjadi selesai', '2023-03-01 08:22:21'),
(29, 25, 'admin mengupdate status riwayat service hdfh unit Puskom menjadi proses', '2023-03-01 08:22:40'),
(30, 25, 'admin mengupdate riwayat service hdfh unit Puskom', '2023-03-01 08:29:50'),
(31, 25, 'admin mengupdate status service hdfh unit TU menjadi selesai', '2023-03-01 08:31:44'),
(32, 25, 'admin mengupdate service \'hdfh\' unit TU', '2023-03-01 08:32:23'),
(33, 25, 'admin mengupdate service \'hdfh\' unit TU', '2023-03-01 08:34:50'),
(34, 25, 'admin mengupdate status service \'hdfh\' unit Puskom menjadi proses', '2023-03-01 08:45:36'),
(35, 25, 'admin mengupdate service \'hdfh\' unit Puskom', '2023-03-01 08:54:49'),
(36, 25, 'admin mengupdate service \'hdfh\' unit BAAK', '2023-03-01 08:55:10'),
(37, 46, 'admin menambah service \'PC\' unit puskom2', '2023-03-01 09:23:03'),
(38, 46, 'admin mengupdate status service \'PC\' unit puskom2 menjadi selesai', '2023-03-01 09:23:50'),
(39, 46, 'admin mengupdate service \'PC\' unit puskom2', '2023-03-02 09:54:26'),
(40, 45, 'admin mengupdate status service \'hrthtrh\' unit Puskom menjadi selesai', '2023-03-02 15:00:48'),
(41, 46, 'admin mengupdate status service \'PC\' unit puskom2 menjadi proses', '2023-03-02 15:02:43'),
(42, 46, 'admin mengupdate status service \'PC\' unit puskom2 menjadi selesai', '2023-03-02 15:02:50'),
(43, 47, 'admin menambah service \'vvafafsf\' unit TU', '2023-03-02 16:17:54'),
(44, 48, 'admin menambah service \'wdwdw\' unit Puskom', '2023-03-02 16:19:46'),
(45, 48, 'admin mengahapus riwayat service wdwdw unit Puskom', '2023-03-02 16:20:35'),
(46, 41, 'admin mengahapus riwayat service gergher unit BAAK', '2023-03-02 16:21:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id_notes` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl` date DEFAULT NULL,
  `foto_pendukung` tinytext NOT NULL,
  `catatan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`id_notes`, `judul`, `tgl`, `foto_pendukung`, `catatan`, `created_at`, `update_at`) VALUES
(8, 'asd', NULL, '', 'asdasdadasd asdasdasd asd asdasdasd asdasdasdasdasd asd asddd asdsad as sd asdasdas as d asdas s asd asdasd asd as d ad asd asdasdasdas a adasdaasdadas', '2023-02-17 11:51:36', '2023-02-17 04:51:36'),
(9, 'lorem ipsum', NULL, '', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', '2023-02-17 11:52:06', '2023-02-17 04:52:06'),
(17, 'ewfefe', NULL, 'e2860fe4d41043cbfe269b6e67799fae.jpeg', 'fwefwefwef', '2023-02-21 14:58:42', '2023-02-22 07:50:15'),
(18, 'dsa', NULL, 'c6944d3f9b5bfcf29ea6ed64de63c508.jpg', 'bhdrhrehgdrfsefefsefse fewfef', '2023-02-21 15:00:30', '2023-02-22 07:29:05'),
(26, 'rgerg', NULL, '', 'ergergsegrgr', '2023-02-22 14:51:48', '2023-02-22 07:51:48'),
(27, 'fefweff', NULL, 'd26b166ef3d07dea9b626a4cf59e4718.jpeg', 'wefggergjrg gahgrug aerghag rgkuagrg rguhrg ergreghre ergerugher gergurgh ergerg ergserghserufgh leg sergarg gu rgharlguerh lg rg erlighaguergh uier afgujm avriegv dvferbgl aweifyhefg eriugha vgrg bfr', '2023-02-23 11:10:47', '2023-02-23 04:10:47'),
(28, 'gergeg', NULL, '', 'egesgsege', '2023-03-02 16:03:43', '2023-03-02 09:03:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penempatan`
--

CREATE TABLE `penempatan` (
  `id_penempatan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `barang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` tinytext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penempatan`
--

INSERT INTO `penempatan` (`id_penempatan`, `id_unit`, `tanggal`, `barang`, `keterangan`, `foto`, `created_at`, `update_at`) VALUES
(4, 82, '2023-02-28', 'fefgef', 'efefefe', '9c730fc0da87cf0850d4fb153ebf8d66.jpeg', '2023-03-02 09:25:07', '2023-03-02 09:25:07'),
(5, 83, '2023-03-01', 'gaegge', 'ueg erhr wo rprir rorhr oihg eroir rorgjkhrgikr jhrg khurg ir\r\nr rirjr rgjrkr khaekrg', '3469a31d0d4a01ad27fd35dff5ebc194.jpeg', '2023-03-02 09:31:35', '2023-03-02 09:55:32'),
(7, 1, '2023-03-02', 'dbdbd', 'bdbdvdvdvdv', 'af211a47a2c47b73e5c647b8ada9a9af.jpg', '2023-03-02 10:55:53', '2023-03-02 10:55:53'),
(8, 83, '2023-03-01', 'uyfyudf', 'rgwsdy', 'c1f643f02ff21aecd6b79b3ff5afdc5e.jpeg', '2023-03-02 16:09:51', '2023-03-02 16:09:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_barang_service` varchar(50) NOT NULL,
  `status_barang` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'diganti atau tidak',
  `keterangan_barang_diganti` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status_service` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = proses, 1 = selesai',
  `tempat_perbaikan` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = puskom, 1 = ditempat',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id_service`, `tanggal`, `id_unit`, `nama_barang_service`, `status_barang`, `keterangan_barang_diganti`, `keterangan`, `foto`, `status_service`, `tempat_perbaikan`, `created_at`, `update_at`) VALUES
(19, '2023-02-13', 83, 'Printer', '1', 'tinta', 'kajrg walkjughr grughreg aer4gyerg\'gerghu ere\r\nr ruirgjh weiurhg erguhe eriguhr aeigth4iyeg ertukger 3kwue4gh eukye4f w4jyhvgf ergh', '17786933744970a5775f2eced9928d5a.jpg', '1', '0', '2023-02-15 10:04:38', '2023-02-27 03:01:30'),
(21, '2023-02-15', 82, 'laptop', '1', 'kgrgrroagrgh rgluikhrgr serguiherguli rgrguigr erg lorem ipsum', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, ', '0db7b7ebd21d4ee82044715f9b728456.jpeg', '1', '0', '2023-02-15 11:09:59', '2023-02-27 03:02:30'),
(25, '2023-02-16', 82, 'hdfh', '0', '', 'fgnhnh', 'a2ff264bf2513b390d3ab7cfa309445a.jpeg', '0', '0', '2023-02-22 14:17:23', '2023-03-01 01:55:10'),
(27, '2023-02-16', 82, 'ndnd', '0', '', 'ndndndn', '4497ed7d5f1ab7c06462f1b1fb9020db.jpeg', '0', '0', '2023-02-23 14:15:27', '2023-02-23 07:15:27'),
(28, '2023-01-31', 1, 'dndndn', '1', 'mtsrmnrtmntrnjtrntrntn', 'dnnnrmntn', '25fd2f93c2cfd409a28704aaec721adc.jpeg', '0', '0', '2023-02-23 14:15:43', '2023-02-23 07:15:43'),
(29, '2023-02-08', 82, 'ndndnngfn', '0', '', 'nntnsdrtngfnfcgn', 'fda0e00cd22fcb96938e82d7dbe84fc0.jpeg', '0', '0', '2023-02-23 14:15:58', '2023-02-23 07:15:58'),
(30, '2022-12-07', 83, 'nmtrnrtdntnt', '0', '', 'nydmm', '09a67821a0d3fb0c72f36e41e6ef2808.jpg', '0', '0', '2023-02-23 14:16:10', '2023-02-23 07:16:10'),
(31, '2023-02-01', 1, 'nsnn', '1', 'dmmngnnh hrseh ehreh h frthsh she h', 'fdgndxntrnjrtdnjrhn', 'b128699660914bf5ba188a90e2162a73.jpeg', '0', '0', '2023-02-23 14:16:29', '2023-02-23 07:16:29'),
(33, '2023-02-06', 83, 'nhdendndn', '1', 'bdnbdf bdfb fbd bbsehntjtj ,kuf z  zh reherh', 'fnfnfnf bd b fbdbs bbhr sbhfb b srgb s', '91dd3128aedbbd7623f97c30706aa5fe.jpeg', '0', '0', '2023-02-23 14:17:28', '2023-02-23 07:17:28'),
(36, '2023-02-09', 82, 'fweafasefvsedvse', '0', '', 'esefgwefe', 'fc63cfd6231bc210b676f9391e7bee36.jpeg', '1', '0', '2023-02-27 09:11:43', '2023-02-27 03:01:23'),
(38, '2023-02-07', 83, 'zdrbhrbh', '0', '', 'frgrgsgdgd', '2cebc73f9880a00f919cc8adf7ff09b0.jpg', '0', '0', '2023-02-27 12:05:38', '2023-02-27 05:05:38'),
(39, '2023-02-01', 1, 'qwerty', '0', '', 'hshrhsrhh', '77a85014e92c5ff1a926933e9da3c0f8.jpg', '0', '1', '2023-02-27 12:07:30', '2023-02-27 05:07:30'),
(40, '2023-02-07', 83, 'bbs', '0', '', 'bvsbsbsbsb', '3c99bcec2cd22b45c52de400057926ec.jpeg', '0', '0', '2023-02-27 12:13:09', '2023-02-27 05:13:09'),
(45, '2023-02-06', 1, 'hrthtrh', '0', '', 'htrhthrt', '61ab5e291427cd1c82f289b04ae184e8.jpeg', '1', '1', '2023-02-28 10:21:36', '2023-03-02 08:00:48'),
(46, '2023-03-01', 84, 'PC', '1', 'psu harus diganti', 'psu', '5a191b574f5fea0529eaa8c91c5bdf35.jpeg', '1', '1', '2023-03-01 09:23:03', '2023-03-02 08:02:50'),
(47, '2023-03-02', 83, 'vvafafsf', '0', '', 'fasfasfasfsafsaf', '712ebd464615adfaac37c273d6ad96b8.jpeg', '1', '1', '2023-03-02 16:17:54', '2023-03-02 09:17:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `code_unit` varchar(10) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `code_unit`, `nama_unit`, `created_at`, `update_at`) VALUES
(1, '001', 'Puskom', '2023-01-31 08:21:13', '2023-02-20 07:40:47'),
(82, '003', 'BAAK', '2023-02-08 11:14:36', '2023-02-21 04:17:45'),
(83, '004', 'TU', '2023-02-14 10:03:15', '2023-02-17 01:57:14'),
(84, '002', 'puskom2', '2023-03-01 09:20:47', '2023-03-01 02:20:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `nama_user`, `password`, `created_at`, `update_at`) VALUES
(37, 'Riqza Muqtada', 'riqza', '$2y$10$4V.QP1FTsXPH6BlvjErUzej6GExppZycrNKBKhm/quQBLVqkOsV0i', '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(42, 'asdasdasdasd', 'asd', '$2y$10$8u40r3DbC8QBK.P1teGpQeBngc/1mgJ.tWz76rwdk8TO1Zi4jrnlC', '2023-02-07 08:51:57', '2023-02-10 03:21:28'),
(46, 'admin1', 'admin', '$2y$10$EF65v7Ae2yO60AaasoS1bufAuwF0lOyp/iqU/0Hhi1fsKtbXE3fpS', '2023-02-14 14:16:36', '2023-02-22 07:52:33'),
(47, 'Vahad Khusaini', 'vahadkhusaini', '$2y$10$bAJlxKO/Jnw7s8fpBkBBBONWojMxytHaa1TBC2V19Vcqtkjb2olx.', '2023-02-21 11:20:29', '2023-02-21 04:20:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_service` (`id_service`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`);

--
-- Indeks untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_penempatan`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD CONSTRAINT `penempatan_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
