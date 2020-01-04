-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 04:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('8b8dd690-042a-4794-8d15-fb8bd401232d', 'Rahman', 'Penyakit Kelamin', 'Jl. Sawangan', '021212121'),
('f7d27cc9-e48b-4d42-b7b8-3a7178878102', 'Yogi', 'Dokter Bedah', 'Jl. H. Buang', '021123456');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) DEFAULT NULL,
  `ket_obat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('4674f225-9e27-11e9-b77f-0492260d9830', 'Paracetamol 2', 'Obat Panas 2'),
('4a2752aa-9e18-11e9-b77f-0492260d9830', 'Paramex', 'Obat Panas Test'),
('c5be412c-9e25-11e9-b77f-0492260d9830', 'Oskadon', 'Obat'),
('c5be4efa-9e25-11e9-b77f-0492260d9830', 'UltraFlu', 'Obat Flu'),
('df042efd-9e25-11e9-b77f-0492260d9830', 'Komix', 'Obat Batuk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','p') DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('39b4ede5-f236-48a2-bd8c-e649293aa957', '55415251', 'Yogi', 'L', 'JL. H. Buang', '021123456'),
('842cc3e7-5540-498b-ba1e-b3ad269bdd19', '55411255', 'Roger', 'L', 'JL. One Piece', '01234511'),
('94464031-ba87-414d-b910-eaeb7eba4c41', '54152111', 'Melia10', 'L', 'Jl. Dilun', '021145151');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('09c46cd1-e3bd-4d90-8d07-fd3684bac603', '20', '20'),
('129a09ec-207f-4308-8fe3-961a9dbd2fe2', '16', '16'),
('1a94297a-d25a-4f9f-9a0e-6e5fa196b2c9', '3', '3'),
('1d78fe9c-55b7-444b-a883-7cd21930cf60', '15', '15'),
('314d6735-fc60-41eb-9549-f654af6c45d1', '14', '14'),
('4e434635-cfb2-4adf-ae78-f72d1497c339', 'Poli D', 'K. lt.3'),
('523dccf4-eed8-448c-a017-066d74d5f4f9', '10', '10'),
('5e380575-4b92-4a63-b4c3-e57a8917ba7f', 'Poli Z', 'F . lt 5'),
('605a4021-243a-4e6a-9cc5-1e486139528e', '19', '19'),
('62f0d469-d8b6-4547-bf24-a7c3594bcf47', '4', '4'),
('66f6f3b6-59b2-4609-aa0a-13d54c80844b', '11', '11'),
('83b81ae2-6065-454d-aa69-4b169d745d9b', '13', '13'),
('908f7088-d1c0-47bd-9059-37c066e50cbf', 'Poli E', 'K. lt.4'),
('9a57e747-57a6-42a6-b169-eebfcc544b7a', '6', '6'),
('9e0392b8-553a-4deb-90c0-2b2ec9c3b4bd', '7', '7'),
('c3354d64-a7dd-48c3-9408-58ecc379f5f3', '9', '9'),
('cc2cd236-8e31-4471-9ab2-fead88322bc9', '17', '17'),
('cc6fd410-5541-478d-9ef5-b60fdbafba10', '2', '2'),
('daa93daf-9e15-43d3-bff4-e5365c30485e', 'Poli B', 'E. lt.'),
('e77a4bf0-097b-4678-aebd-bdf266e998cd', '8', '8'),
('f6567ce3-0ffa-4761-8797-5cdb772b1414', '12', '12'),
('fb3bae73-690c-48ef-9e32-64e290af50b3', '18', '18'),
('fcce4f87-8792-4dda-84c6-12403d9a462a', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('169c8e1e-4fc6-43ff-88c4-a1523b636f11', '842cc3e7-5540-498b-ba1e-b3ad269bdd19', 'Sakit Mata', 'f7d27cc9-e48b-4d42-b7b8-3a7178878102', 'Mines', 'c3354d64-a7dd-48c3-9408-58ecc379f5f3', '2019-07-08'),
('95e4196a-a5cf-4eab-86dd-ebd0c12e9e24', '94464031-ba87-414d-b910-eaeb7eba4c41', 'Sakit', 'f7d27cc9-e48b-4d42-b7b8-3a7178878102', 'Sakit Juga', '908f7088-d1c0-47bd-9059-37c066e50cbf', '2019-07-07'),
('dabcb573-aacf-4c3a-bd99-1a0c574c64cc', '842cc3e7-5540-498b-ba1e-b3ad269bdd19', 'Sakit Mata', 'f7d27cc9-e48b-4d42-b7b8-3a7178878102', 'Mines', '5e380575-4b92-4a63-b4c3-e57a8917ba7f', '2019-07-07'),
('faa05d71-0fb4-4ed2-aa69-340e14199012', '842cc3e7-5540-498b-ba1e-b3ad269bdd19', 'Batuk', '8b8dd690-042a-4794-8d15-fb8bd401232d', 'TBC', '4e434635-cfb2-4adf-ae78-f72d1497c339', '2019-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(3, 'dabcb573-aacf-4c3a-bd99-1a0c574c64cc', '4a2752aa-9e18-11e9-b77f-0492260d9830'),
(4, 'dabcb573-aacf-4c3a-bd99-1a0c574c64cc', 'c5be412c-9e25-11e9-b77f-0492260d9830'),
(5, 'dabcb573-aacf-4c3a-bd99-1a0c574c64cc', 'c5be4efa-9e25-11e9-b77f-0492260d9830'),
(6, '95e4196a-a5cf-4eab-86dd-ebd0c12e9e24', '4674f225-9e27-11e9-b77f-0492260d9830'),
(7, '95e4196a-a5cf-4eab-86dd-ebd0c12e9e24', '4a2752aa-9e18-11e9-b77f-0492260d9830'),
(8, '95e4196a-a5cf-4eab-86dd-ebd0c12e9e24', 'c5be412c-9e25-11e9-b77f-0492260d9830'),
(9, '95e4196a-a5cf-4eab-86dd-ebd0c12e9e24', 'c5be4efa-9e25-11e9-b77f-0492260d9830'),
(10, 'faa05d71-0fb4-4ed2-aa69-340e14199012', '4a2752aa-9e18-11e9-b77f-0492260d9830'),
(11, 'faa05d71-0fb4-4ed2-aa69-340e14199012', 'c5be412c-9e25-11e9-b77f-0492260d9830'),
(12, 'faa05d71-0fb4-4ed2-aa69-340e14199012', 'c5be4efa-9e25-11e9-b77f-0492260d9830'),
(13, '169c8e1e-4fc6-43ff-88c4-a1523b636f11', 'c5be4efa-9e25-11e9-b77f-0492260d9830'),
(14, '169c8e1e-4fc6-43ff-88c4-a1523b636f11', 'df042efd-9e25-11e9-b77f-0492260d9830');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('c9cb956d-9d72-11e9-b77f-0492260d9830', 'Yogi Ermanto', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`);

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
