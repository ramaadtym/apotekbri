-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 03:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `ID_apoteker` int(10) NOT NULL,
  `Nama_apoteker` varchar(25) NOT NULL,
  `induk` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `user_level` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`ID_apoteker`, `Nama_apoteker`, `induk`, `pass`, `Alamat`, `user_level`) VALUES
(1, 'Rama Aditya Maulana', 1301150034, '$2a$08$VbAn1/Z1lyOh7JIMICbDXO9qj8V6/PFx70Qu2sdsD1peKG0G1wb4G', 'Jakarta', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` varchar(25) NOT NULL,
  `nmDokter` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `nmDokter`, `gender`, `Alamat`) VALUES
('SMG', 'Sumanang', 'Laki-Laki', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `jadwaldokter`
--

CREATE TABLE `jadwaldokter` (
  `jam` time NOT NULL,
  `hari` varchar(8) NOT NULL,
  `idDokter` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_kategori` varchar(25) NOT NULL,
  `Nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_kategori`, `Nama_kategori`) VALUES
('01', 'OBAT KERAS'),
('02', 'OBAT GENERIK');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `idLab` varchar(25) NOT NULL,
  `jnsPemeriksaan` varchar(100) NOT NULL,
  `nilaiRujukan` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `idPasien` varchar(25) NOT NULL,
  `idDokter` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`idLab`, `jnsPemeriksaan`, `nilaiRujukan`, `satuan`, `idPasien`, `idDokter`) VALUES
('12', 'Penyakit', '374', '10', 'PAS1', 'SMG'),
('apa', 'HAMIL', '12', '9', 'PAS1', 'SMG');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `ID_Obat` int(10) NOT NULL,
  `Jenis_obat` varchar(50) NOT NULL,
  `Nama_obat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `kadaluwarsa` date NOT NULL,
  `hrg_obat` int(11) NOT NULL,
  `ID_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`ID_Obat`, `Jenis_obat`, `Nama_obat`, `stok`, `kadaluwarsa`, `hrg_obat`, `ID_kategori`) VALUES
(2, 'Obat Flu, Batuk dan Pilek', 'Dextral', 0, '0000-00-00', 3000, '01'),
(3, 'Sakit Kepala', 'Paramex', 0, '0000-00-00', 5000, '02'),
(4, 'Sakit Kepala', 'Decolgen', 0, '2018-05-24', 4000, '01');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idPasien` varchar(25) NOT NULL,
  `nmPasien` varchar(100) NOT NULL,
  `umur` int(15) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `noTelp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idPasien`, `nmPasien`, `umur`, `gender`, `Alamat`, `noTelp`) VALUES
('PAS1', 'Munaroh', 21, 'Laki-Laki', 'Bandung', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idFakturbeli` varchar(25) NOT NULL,
  `tglPembelian` date NOT NULL,
  `idObat` varchar(25) NOT NULL,
  `idKategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idFakturjual` varchar(25) NOT NULL,
  `tglPenjualan` date NOT NULL,
  `idObat` int(11) NOT NULL,
  `namaKategori` varchar(255) NOT NULL,
  `Qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL,
  `ID_apoteker` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idFakturjual`, `tglPenjualan`, `idObat`, `namaKategori`, `Qty`, `harga`, `total_hrg`, `ID_apoteker`) VALUES
('1', '2018-04-25', 2, 'OBAT KERAS', 1, 1, 1, '1'),
('2', '2018-04-25', 2, 'OBAT KERAS', 1, 1, 1, '1'),
('3', '2018-04-25', 4, 'OBAT KERAS', 3, 5000, 15000, '1'),
('4', '2018-04-25', 2, 'OBAT KERAS', 1, 3000, 3000, '1'),
('5', '2018-04-25', 3, 'OBAT GENERIK', 1, 5000, 5000, '1'),
('6', '2018-04-25', 2, 'OBAT KERAS', 5, 3000, 15000, '1'),
('7', '2018-04-25', 3, 'OBAT GENERIK', 4, 5000, 20000, '1'),
('8', '2018-04-25', 2, 'OBAT KERAS', 8, 3000, 24000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `kdPoli` varchar(10) NOT NULL,
  `jenisPoli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `radiologi`
--

CREATE TABLE `radiologi` (
  `idRadio` varchar(25) NOT NULL,
  `jnsPemeriksaan` varchar(100) NOT NULL,
  `idPasien` varchar(25) NOT NULL,
  `idDokter` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekammedis`
--

CREATE TABLE `rekammedis` (
  `kdRekamMedis` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `anamnesa` varchar(10000) NOT NULL,
  `diagnosa` varchar(10000) NOT NULL,
  `terapi` varchar(10000) NOT NULL,
  `idPasien` varchar(25) NOT NULL,
  `idDokter` varchar(25) NOT NULL,
  `idPoli` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `idResep` varchar(25) NOT NULL,
  `Dosis` varchar(20) NOT NULL,
  `tglResep` date NOT NULL,
  `idPasien` varchar(25) NOT NULL,
  `idDokter` varchar(25) NOT NULL,
  `idObat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`ID_apoteker`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`idDokter`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_kategori`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`idLab`),
  ADD KEY `fk_id_dokter` (`idDokter`),
  ADD KEY `fk_id_pasien` (`idPasien`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_Obat`),
  ADD KEY `fk_obat` (`ID_kategori`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idPasien`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idFakturbeli`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idFakturjual`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`kdPoli`);

--
-- Indexes for table `radiologi`
--
ALTER TABLE `radiologi`
  ADD PRIMARY KEY (`idRadio`);

--
-- Indexes for table `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`kdRekamMedis`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`idResep`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD CONSTRAINT `fk_id_dokter` FOREIGN KEY (`idDokter`) REFERENCES `dokter` (`idDokter`),
  ADD CONSTRAINT `fk_id_pasien` FOREIGN KEY (`idPasien`) REFERENCES `pasien` (`idPasien`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`ID_kategori`) REFERENCES `kategori` (`ID_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
