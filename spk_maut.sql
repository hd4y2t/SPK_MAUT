-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 06:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_maut`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE IF NOT EXISTS `akademik` (
`id_akademik` int(12) NOT NULL,
  `tahun` int(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `tahun`) VALUES
(1, 2019),
(2, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`id_jurusan` int(12) NOT NULL,
  `jurusan` varchar(21) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(3, 'Pendidikan B. Indones'),
(4, 'Pendidikan Matematika'),
(5, 'Pendidikan Agama Isla'),
(6, 'Pendidikan Biologi'),
(7, 'Kimia'),
(8, 'TIK'),
(9, 'Pendidikan B. Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(10) NOT NULL,
  `nama_kriteria` text NOT NULL,
  `bobot` int(10) NOT NULL,
  `normalisasi` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `normalisasi`) VALUES
(1, 'Akrteditasi', 70, 0.259),
(2, 'Prestasi Akademik', 80, 0.296),
(3, 'Prestasi Non Akademik', 65, 0.241),
(4, 'Jalur Seleksi ', 55, 0.204);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `id_nilai_akhir` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir`
--

CREATE TABLE IF NOT EXISTS `nilai_akhir` (
`id_nilai_akhir` int(10) NOT NULL,
  `id_universitas` int(10) NOT NULL,
  `id_jurusan` int(12) NOT NULL,
  `id_akademik` int(12) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_nilai_akhir`, `id_universitas`, `id_jurusan`, `id_akademik`, `nilai_akhir`) VALUES
(10, 4, 5, 2, 0.494),
(11, 4, 3, 2, 0.5),
(12, 4, 9, 2, 0.395),
(13, 4, 4, 2, 0.13),
(14, 4, 6, 2, 0.5),
(15, 4, 7, 2, 0.796),
(16, 4, 8, 2, 0.723);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_utility`
--

CREATE TABLE IF NOT EXISTS `nilai_utility` (
`id_utility` int(10) NOT NULL,
  `id_nilai_akhir` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai_kriteria` float NOT NULL,
  `nilai_utility` float NOT NULL,
  `nilai_normalisasi` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `nilai_utility`
--

INSERT INTO `nilai_utility` (`id_utility`, `id_nilai_akhir`, `id_kriteria`, `nilai_kriteria`, `nilai_utility`, `nilai_normalisasi`) VALUES
(32, 10, 1, 3, 0.5, 0.13),
(33, 10, 2, 3, 1, 0.296),
(34, 10, 3, 1, 0, 0),
(35, 10, 4, 2, 0.333, 0.068),
(37, 11, 1, 2, 0, 0),
(38, 11, 2, 3, 1, 0.296),
(39, 11, 3, 1, 0, 0),
(40, 11, 4, 4, 1, 0.204),
(41, 12, 1, 4, 1, 0.259),
(42, 12, 2, 2, 0, 0),
(43, 12, 3, 1, 0, 0),
(44, 12, 4, 3, 0.667, 0.136),
(45, 13, 1, 3, 0.5, 0.13),
(46, 13, 2, 2, 0, 0),
(47, 13, 3, 1, 0, 0),
(48, 13, 4, 1, 0, 0),
(49, 14, 1, 2, 0, 0),
(50, 14, 2, 3, 1, 0.296),
(51, 14, 3, 1, 0, 0),
(52, 14, 4, 4, 1, 0.204),
(53, 15, 1, 4, 1, 0.259),
(54, 15, 2, 3, 1, 0.296),
(55, 15, 3, 4, 1, 0.241),
(56, 15, 4, 1, 0, 0),
(57, 16, 1, 3, 0.5, 0.13),
(58, 16, 2, 3, 1, 0.296),
(59, 16, 3, 3, 0.667, 0.161),
(60, 16, 4, 3, 0.667, 0.136);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id_pegawai` int(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(21) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(21) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `jabatan`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_telp`, `password`) VALUES
(3, '1111', 'Delta Sri Maharani S.Kom', 'Admin', 'Wanita', '1990-12-30', 'jalan setunggal lorong sekolah', '081322453788', 'b59c67bf196a4758191e42f76670ceba'),
(5, '2222', 'Siswa 1', 'Siswa', 'Laki-Laki', '2003-12-08', 'perumahan griya damai indah 2', '083123456432', '934b535800b1cba8f96a5d72f72f1611');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE IF NOT EXISTS `universitas` (
`id_universitas` int(21) NOT NULL,
  `nama_universitas` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `nama_universitas`) VALUES
(4, 'Universitas Sriwijaya Palembang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
 ADD PRIMARY KEY (`id_akademik`), ADD KEY `id_akademik` (`id_akademik`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`), ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `id_nilai` (`id_nilai`,`id_kriteria`,`id_nilai_akhir`), ADD KEY `id_kriteria` (`id_kriteria`), ADD KEY `id_nilai_akhir` (`id_nilai_akhir`);

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
 ADD PRIMARY KEY (`id_nilai_akhir`), ADD KEY `id_nilai_akhir` (`id_nilai_akhir`,`id_universitas`,`id_jurusan`,`id_akademik`), ADD KEY `id_jurusan` (`id_jurusan`), ADD KEY `id_akademik` (`id_akademik`), ADD KEY `id_universitas` (`id_universitas`);

--
-- Indexes for table `nilai_utility`
--
ALTER TABLE `nilai_utility`
 ADD PRIMARY KEY (`id_utility`), ADD KEY `id_utility` (`id_utility`,`id_nilai_akhir`,`id_kriteria`), ADD KEY `id_nilai_akhir` (`id_nilai_akhir`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`), ADD KEY `id_pegawai` (`id_pegawai`), ADD KEY `id_pegawai_2` (`id_pegawai`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
 ADD PRIMARY KEY (`id_universitas`), ADD KEY `id_universitas` (`id_universitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
MODIFY `id_akademik` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `id_jurusan` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
MODIFY `id_nilai_akhir` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nilai_utility`
--
ALTER TABLE `nilai_utility`
MODIFY `id_utility` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
MODIFY `id_universitas` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_nilai_akhir`) REFERENCES `nilai_akhir` (`id_nilai_akhir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
ADD CONSTRAINT `nilai_akhir_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_akhir_ibfk_2` FOREIGN KEY (`id_akademik`) REFERENCES `akademik` (`id_akademik`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_akhir_ibfk_3` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_utility`
--
ALTER TABLE `nilai_utility`
ADD CONSTRAINT `nilai_utility_ibfk_1` FOREIGN KEY (`id_nilai_akhir`) REFERENCES `nilai_akhir` (`id_nilai_akhir`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_utility_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
