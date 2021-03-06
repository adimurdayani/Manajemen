-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 08:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses_menu`
--

CREATE TABLE `tb_akses_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses_menu`
--

INSERT INTO `tb_akses_menu` (`id`, `user_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 2),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `spesialis` varchar(128) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_grup`
--

CREATE TABLE `tb_grup` (
  `user_id` int(11) NOT NULL,
  `nama_grup` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grup`
--

INSERT INTO `tb_grup` (`user_id`, `nama_grup`, `created_at`) VALUES
(1, 'Administrator', '31 Oct 2021'),
(2, 'User', '31 Oct 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_m` int(11) NOT NULL,
  `member_id` varchar(128) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `gol_darah` varchar(20) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `t_lahir` varchar(100) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_m`, `member_id`, `nik`, `nama`, `tgl_lahir`, `kelamin`, `gol_darah`, `agama`, `pekerjaan`, `alamat`, `email`, `username`, `password`, `no_hp`, `t_lahir`, `created_at`, `status`) VALUES
(1, 'M-0001', 0, 'Dewi Astuti', '', '', '', '', '', '', 'dewi@gmail.com', 'dewi', 'd80bb7c61f781ee38721285fdb65a1fd6390a5a0', '', '', '05 Nov 2021 13:20', 0),
(2, 'M-0002', 0, 'adi', '', '', '', '', '', '', 'adi@gmail.com', 'adi', '74e92d137df14c2f05a571ebf2dfc75145a69045', '', '', '05 Nov 2021', 1),
(8, 'M-0003', 2147483647, 'Adi Murdayani', 'asdfasdf', 'adfasdf', 'adfasdf', 'asdfasdf', 'adsfasdf', '', 'adimurdayani@gmail.com', 'adimurdayani', '538ccb720c36e5991c7cbe07092497e56100869c', 'asdfasdf', 'asdfasdf', '24 Nov 2021', 1),
(9, 'M-0004', 0, 'Dewi astuti', '', '', '', '', '', '', 'dewi@gmail.com', 'dewi', '1b3865747f2d705a26ddea0fe33090e4f87a8f9f', '09172398', '', '24 Nov 2021 17:11', 1),
(10, 'M-0005', 123123, 'Dewi astuti', '07/08/2001', 'Perempuan', 'Jashdfk', 'Jkahkdf', 'Kjhakdksf', 'Asdasd', 'dewi@gmail.com', 'dewiastuti', 'ee37d3186ea72a2e87cc6c2018d97cc755d46298', '08712368123', 'Adfas', '25 Nov 2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Modul'),
(3, 'User'),
(4, 'Menu'),
(5, 'Setting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien_rawat_inap`
--

CREATE TABLE `tb_pasien_rawat_inap` (
  `id` int(11) NOT NULL,
  `no_rekam_inap` varchar(50) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `umur` int(20) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `tgl_masuk` varchar(123) NOT NULL,
  `p_jawab` varchar(128) NOT NULL,
  `pekerjaan_p_jawab` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien_rawat_inap`
--

INSERT INTO `tb_pasien_rawat_inap` (`id`, `no_rekam_inap`, `nama_pasien`, `kelamin`, `alamat`, `phone`, `umur`, `pekerjaan`, `tgl_masuk`, `p_jawab`, `pekerjaan_p_jawab`, `keterangan`) VALUES
(1, 'N-00001RJ', 'Kjadshfkjh', 'Kdjkahsdfkj', 'Jaksdfhk', '5524353', 123, 'Kajsdhfk', '819723192', 'Jkasdhfj', 'Jaksdhfk', 'Sdgfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien_rawat_jalan`
--

CREATE TABLE `tb_pasien_rawat_jalan` (
  `id` int(11) NOT NULL,
  `no_rekam_jalan` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `umur` int(20) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `tgl_berobat` varchar(128) NOT NULL,
  `p_jawab` varchar(128) NOT NULL,
  `a_p_jawab` varchar(128) NOT NULL,
  `phone_p_jawab` varchar(12) NOT NULL,
  `pekerjaan_p_jawab` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien_rawat_jalan`
--

INSERT INTO `tb_pasien_rawat_jalan` (`id`, `no_rekam_jalan`, `nama_pasien`, `kelamin`, `alamat`, `phone`, `umur`, `pekerjaan`, `tgl_berobat`, `p_jawab`, `a_p_jawab`, `phone_p_jawab`, `pekerjaan_p_jawab`, `keterangan`) VALUES
(2, 'N-00002', 'asdfa', 'Laki_laki', 'asdasd', '12123', 1233, 'asdfasd', '2021-11-24', '', '', '', '', ''),
(3, 'N-00003RI', 'Jaksdhf', 'Kjahdsfk`', 'Ajdfkajsd', '82379124', 872, 'Jadkf', '981239', 'Jashdkf', 'Asdjfk', '552734', 'Ajsdfk', 'Jkadshkfas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `nama_penyakit` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `nama_penyakit`) VALUES
(2, 'asasdfasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(128) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`sub_id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'backend/admin', 'feather icon-home', 1),
(2, 4, 'Menu Manajemen', 'backend/menu', 'feather icon-folder', 1),
(3, 4, 'Submenu Manajemen', 'backend/menu/submenu', 'feather icon-folder', 1),
(4, 5, 'User Grup', 'backend/setting/grup', 'feather icon-users', 1),
(5, 5, 'User Setting', 'backend/setting', 'feather icon-user', 1),
(6, 3, 'Profile', 'backend/user', 'feather icon-user', 1),
(9, 3, 'Member', 'backend/user/member', 'feather icon-users', 1),
(11, 2, 'P. Rawat Jalan', 'backend/modul', 'feather icon-folder', 1),
(12, 2, 'P. Rawat Inap', 'backend/modul/pasienri', 'feather icon-folder', 1),
(13, 2, 'Ruangan', 'backend/modul/ruangan', 'feather icon-box', 1),
(14, 2, 'Penyakit', 'backend/modul/penyakit', 'feather icon-book', 1),
(15, 2, 'Dokter', 'backend/modul/dokter', 'feather icon-users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_active` int(1) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `user_active`, `nama`, `email`, `username`, `password`, `created_at`) VALUES
(1, 1, 1, 'Administrator', 'admin@gmail.com', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', '30 Okt 2021'),
(2, 2, 1, 'Admin', 'admin2@gmail.com', 'admin2', '7b902e6ff1db9f560443f2048974fd7d386975b0', '31 Oct 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pasien_rawat_inap`
--
ALTER TABLE `tb_pasien_rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasien_rawat_jalan`
--
ALTER TABLE `tb_pasien_rawat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pasien_rawat_inap`
--
ALTER TABLE `tb_pasien_rawat_inap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pasien_rawat_jalan`
--
ALTER TABLE `tb_pasien_rawat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
