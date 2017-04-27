-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16 Apr 2017 pada 11.07
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saringanUjianMhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `idAdmin` varchar(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nm_admin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`idAdmin`, `username`, `password`, `email`, `nm_admin`) VALUES
('Adm0001', 'mahasiswa', 'ujianmasuk', 'pandhuw58@gmail.com', 'Pandhu Wibowo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cln_mhs`
--

CREATE TABLE `cln_mhs` (
  `noClnMhs` varchar(30) NOT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ujian`
--

CREATE TABLE `detail_ujian` (
  `id_tes` varchar(10) DEFAULT NULL,
  `id_soal` varchar(10) DEFAULT NULL,
  `jwbn_soal` text,
  `nilai_ujian` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` varchar(15) NOT NULL,
  `jml_diskon` varchar(10) DEFAULT NULL,
  `nilai_ujian` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `jml_diskon`, `nilai_ujian`) VALUES
('1', '20%', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_bayar`
--

CREATE TABLE `informasi_bayar` (
  `id_informasi` varchar(10) NOT NULL,
  `id_tes` varchar(10) DEFAULT NULL,
  `id_diskon` varchar(15) DEFAULT NULL,
  `jml_bayar` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(10) NOT NULL,
  `isi_soal` text,
  `bobot_nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `isi_soal`, `bobot_nilai`) VALUES
('1', 'asdasd', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_tes` varchar(10) NOT NULL,
  `noClnMhs` varchar(30) DEFAULT NULL,
  `tgl_tes` date DEFAULT NULL,
  `waktu_tes` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `cln_mhs`
--
ALTER TABLE `cln_mhs`
  ADD PRIMARY KEY (`noClnMhs`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `informasi_bayar`
--
ALTER TABLE `informasi_bayar`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_tes`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
