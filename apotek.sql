-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2018 at 10:15 AM
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
(1, 'Rama Aditya Maulana', 1301150034, '$2a$08$VbAn1/Z1lyOh7JIMICbDXO9qj8V6/PFx70Qu2sdsD1peKG0G1wb4G', 'Jakarta', 'admin'),
(3, 'Aziza Hayupratiwi', 1301150440, '$2a$08$wLImENP24ZD3a9P1i7yzo.s.3k4Xgb7Aoi2KVm7ZsoV233sxT.YZS', 'Kalimantan', 'apoteker'),
(5, 'Mahmud', 130311321, '$2a$08$oyMUQsuq995MzMgyR4lQ6eRvkX03h8B3gpEt3CcUXHFn3NKEbZdpq', 'Jepang', 'kasir');

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
  `ID_kategori` int(11) NOT NULL,
  `Nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_kategori`, `Nama_kategori`) VALUES
(1, 'OBAT KERAS'),
(2, 'OBAT GENERIK');

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
  `ID_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`ID_Obat`, `Jenis_obat`, `Nama_obat`, `stok`, `kadaluwarsa`, `hrg_obat`, `ID_kategori`) VALUES
(2, 'Obat Flu, Batuk dan Pilek', 'Dextral', 3, '2018-08-15', 12500, 2),
(3, 'Sakit Kepala', 'Paramex', 4, '0000-00-00', 5000, 2),
(4, 'Sakit Kepala', 'Decolgen', 0, '2018-05-24', 4000, 1),
(5, 'ads', 'asd', 12, '2018-05-05', 12000, 1),
(7, 'Pusing', 'Revanol', 7, '2018-08-22', 15000, 1),
(9, 'Flu', 'Panadol', 2, '2018-09-22', 8000, 1),
(11, 'puyer', 'Buyung upik jamu', 12, '2018-12-31', 15000, 2);

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
  `idObat` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL,
  `tglKadaluwarsa` date NOT NULL,
  `ID_apoteker` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idFakturbeli`, `tglPembelian`, `idObat`, `idKategori`, `Qty`, `hrg`, `total_hrg`, `tglKadaluwarsa`, `ID_apoteker`) VALUES
('1', '2018-06-30', 9, 1, 2, 8000, 8000, '2018-09-22', '1'),
('2', '2018-06-30', 11, 2, 12, 15000, 180000, '2018-12-31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idFakturjual` int(11) NOT NULL,
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
(1, '2018-05-07', 2, 'OBAT KERAS', 1, 3000, 3000, '1'),
(2, '2018-05-07', 2, 'OBAT KERAS', 50, 3000, 150000, '1'),
(3, '2018-05-07', 2, 'OBAT KERAS', 0, 3000, 0, '1'),
(4, '2018-05-07', 2, 'OBAT KERAS', 80, 3000, 240000, '1');

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
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`ID_kategori`) REFERENCES `kategori` (`ID_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
