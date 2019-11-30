-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2019 pada 03.42
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaranperusahaan`
--

CREATE TABLE `anggaranperusahaan` (
  `kd_anggaranperusahaan` varchar(25) NOT NULL,
  `kd_jenisanggaran` varchar(25) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `status` enum('Y','T') NOT NULL,
  `jumlahanggaran` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaranperusahaan`
--

INSERT INTO `anggaranperusahaan` (`kd_anggaranperusahaan`, `kd_jenisanggaran`, `tanggal`, `tahun`, `status`, `jumlahanggaran`, `keterangan`) VALUES
('1', 'RK02', '2019-11-28 00:00:00', '2017', 'Y', 100, 'ss'),
('PSA2018', 'RK01', '2019-11-29 00:00:00', '2018', 'Y', 1111, 'km;l'),
('PSA2019', 'RK05', '2019-11-29 00:00:00', '2019', 'Y', 1222, 'egsg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailanggaran`
--

CREATE TABLE `detailanggaran` (
  `kd_anggaranperusahaan` varchar(25) NOT NULL,
  `kd_jenisanggaran` varchar(25) NOT NULL,
  `jumlahanggaranperusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_pegawai` varchar(25) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_pegawai`, `gaji`) VALUES
('pp2', 1800000),
('pp3', 1800000),
('pp4', 1800000),
('pp5', 1800000),
('pp6', 1800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisanggaran`
--

CREATE TABLE `jenisanggaran` (
  `kd_jenisanggaran` varchar(25) NOT NULL,
  `jenisanggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisanggaran`
--

INSERT INTO `jenisanggaran` (`kd_jenisanggaran`, `jenisanggaran`) VALUES
('RK01', 'Beban Pelatihan'),
('RK02', 'Beban Penggajian'),
('RK03', 'Beban Perusahaan'),
('RK04', 'Pendapatan'),
('RK05', 'Beban Lainnya'),
('RK13', 'Pajak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbesar`
--

CREATE TABLE `kasbesar` (
  `kd_kasbesar` varchar(25) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `kd_jenisanggaran` varchar(25) NOT NULL,
  `kd_pendapatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasbesar`
--

INSERT INTO `kasbesar` (`kd_kasbesar`, `tanggal`, `keterangan`, `debet`, `kredit`, `saldo`, `kd_jenisanggaran`, `kd_pendapatan`) VALUES
('TD00001', '2017-11-13 00:00:00', 'Modal Awal', 12500000, 0, 57500000, 'RK04', 'PDP2'),
('TD00002', '2017-11-13 00:00:00', 'Budget dari DISPERIN', 45000000, 0, 45000000, 'RK04', 'PDP1'),
('TD00003', '2017-11-16 00:00:00', 'Sewa Tempat Pelatihan Jahit', 0, 5200000, 52300000, 'RK01', 'PDP00000'),
('TD00004', '2017-11-16 00:00:00', 'Konsumsi Pelatihan Jahit', 0, 10800000, 41500000, 'RK01', 'PDP00000'),
('TD00005', '2017-11-21 00:00:00', 'Biaya Instruktur', 0, 1600000, 39900000, 'RK01', 'PDP00000'),
('TD00006', '2017-11-16 00:00:00', 'Meeting & Jamuan', 0, 3300000, 36600000, 'RK01', 'PDP00000'),
('TD00007', '2017-11-16 00:00:00', 'Pemeliharaan', 0, 1200000, 35400000, 'RK01', 'PDP00000'),
('TD00008', '2017-11-14 00:00:00', 'Mesin Jahit', 0, 7000000, 28400000, 'RK01', 'PDP00000'),
('TD00009', '2017-11-14 00:00:00', 'Perlengkapan Jahit Lainnya', 0, 3750000, 24650000, 'RK01', 'PDP00000'),
('TD10', '2017-11-14 00:00:00', 'ATK Pelatihan', 0, 2250000, 22400000, 'RK01', 'PDP00000'),
('TD11', '2017-11-14 00:00:00', 'Souvenir', 0, 1500000, 20900000, 'RK01', 'PDP00000'),
('TD12', '2017-11-21 00:00:00', 'Gaji Aldi Topan m', 0, 1800000, 19100000, 'RK02', 'PDP00000'),
('TD13', '2017-11-21 00:00:00', 'Gaji Dhini Mustika', 0, 1800000, 17300000, 'RK02', 'PDP00000'),
('TD14', '2017-11-21 00:00:00', 'Gaji Dadang Setiawan', 0, 1800000, 15500000, 'RK02', 'PDP00000'),
('TD15', '2017-11-21 00:00:00', 'Gaji Rifki Zulhakim', 0, 1800000, 13700000, 'RK02', 'PDP00000'),
('TD16', '2017-11-21 00:00:00', 'Gaji Deden Sumarna', 0, 1800000, 11900000, 'RK02', 'PDP00000'),
('TD17', '2017-12-22 00:00:00', 'Budget dari DINSOS', 50000000, 0, 61900000, 'RK04', 'PDP3'),
('TD18', '2017-12-22 00:00:00', 'Sewa Tempat Pelatihan Las', 0, 5200000, 56700000, 'RK01', 'PDP00000'),
('TD19', '2017-12-22 00:00:00', 'Konsumsi Pelatihan Las', 0, 9600000, 47100000, 'RK01', 'PDP00000'),
('TD20', '2017-12-22 00:00:00', 'ATK Pelatihan', 0, 3000000, 44100000, 'RK01', 'PDP00000'),
('TD21', '2017-12-22 00:00:00', 'Mesin Las', 0, 8295000, 35805000, 'RK01', 'PDP00000'),
('TD22', '2017-12-22 00:00:00', 'Perlengkapan Las Lainnya', 0, 4000000, 31805000, 'RK01', 'PDP00000'),
('TD23', '2017-12-22 00:00:00', 'Meeting & Jamuan', 0, 3300000, 28505000, 'RK01', 'PDP00000'),
('TD24', '2017-12-22 00:00:00', 'Pemeliharaan', 0, 1200000, 27305000, 'RK01', 'PDP00000'),
('TD25', '2017-12-22 00:00:00', 'Biaya Instruktur', 0, 2000000, 25305000, 'RK01', 'PDP00000'),
('TD26', '2017-12-22 00:00:00', 'Souvenir', 0, 2000000, 23305000, 'RK01', 'PDP00000'),
('TD27', '2017-12-24 00:00:00', 'Gaji Aldi Topan m', 0, 1800000, 21505000, 'RK02', 'PDP00000'),
('TD28', '2017-12-24 00:00:00', 'Gaji Dhini Mustika', 0, 1800000, 19705000, 'RK02', 'PDP00000'),
('TD29', '2017-12-24 00:00:00', 'Gaji Dadang Setiawan', 0, 1800000, 17905000, 'RK02', 'PDP00000'),
('TD30', '2017-12-24 00:00:00', 'Gaji Rifki Zulhakim', 0, 1800000, 16105000, 'RK02', 'PDP00000'),
('TD31', '2017-12-24 00:00:00', 'Gaji Deden Sumarna', 0, 1800000, 14305000, 'RK02', 'PDP00000'),
('TD32', '2019-11-29 00:00:00', 'Sewa Tempat Pelatihan 1 ballroom', 0, 100000, 14205000, 'RK01', 'PDP00000'),
('TD33', '2019-11-29 18:23:51', 'lutfi', 90000000, 0, 104205000, 'RK04', 'PDP10'),
('TD34', '2017-11-10 00:00:00', 'coba 7a', 0, 100000, 104105000, 'RK01', 'PDP00000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(25) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`) VALUES
('pp1', 'Laras Ayu Ramadhanti', 'Direktur'),
('pp2', 'Aldi Topan m', 'Penanggung Jawab adm Keuangan'),
('pp3', 'Dhini Mustika', 'Pelaksana adm Keuangan'),
('pp4', 'Dadang Setiawan', 'Penanggung Jawab Lapangan'),
('pp5', 'Rifki Zulhakim', 'Pelaksana Teknis'),
('pp6', 'Deden Sumarna', 'Pekerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `kd_pendapatan` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlahpendapatan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pengguna` varchar(25) NOT NULL,
  `tanggaldisetujui` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`kd_pendapatan`, `keterangan`, `jumlahpendapatan`, `tanggal`, `id_pengguna`, `tanggaldisetujui`) VALUES
('PDP1', 'Budget dari DISPERIN', 45000000, '2019-11-22 00:00:00', 'usr01', '2019-11-22 00:00:00'),
('PDP10', 'lutfi', 90000000, '2019-11-29 18:23:30', 'usr01', '2019-11-29 18:23:51'),
('PDP2', 'Modal Awal', 12500000, '2019-11-22 00:00:00', 'usr01', '2019-11-22 00:00:00'),
('PDP3', 'Budget dari DINSOS', 50000000, '2019-11-22 00:00:00', 'usr01', '2019-11-22 00:00:00'),
('PDP9', 'Budget dari DINSOS', 1000000, '2019-11-29 18:18:17', 'usr01', '2019-11-29 18:19:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(25) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(55) NOT NULL,
  `level` varchar(25) NOT NULL,
  `id_pegawai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `email`, `level`, `id_pegawai`) VALUES
('usr01', 'Laras', 'e1302dbd86ddbf7a353938d043e9ede7', 'larasayu84@gmail.com ', 'direktur', 'pp1'),
('usr02', 'Aldi', '69b731ea8f289cf16a192ce78a37b4f0', 'aldilb@gmail.com', 'penanggungjawabkeuangan', 'pp2'),
('usr03', 'Dhini', '21232f297a57a5a743894a0e4a801fc3', 'dhinimustika@gmail.com', 'pelaksanakeuangan', 'pp3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_pegawai` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahpotongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_pegawai`, `tanggal`, `jumlahpotongan`) VALUES
('pp2', '2017-11-29', 0),
('pp3', '2017-11-29', 0),
('pp4', '2017-11-29', 0),
('pp5', '2017-11-29', 0),
('pp2', '2017-12-30', 0),
('pp3', '2017-12-30', 0),
('pp4', '2017-12-30', 0),
('pp5', '2017-12-30', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 200000),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 200000),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 100000),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-29', 0),
('pp3', '2019-11-29', 0),
('pp4', '2019-11-29', 0),
('pp5', '2019-11-29', 0),
('pp6', '2019-11-29', 0),
('pp2', '2019-11-30', 0),
('pp3', '2019-11-30', 0),
('pp4', '2019-11-30', 0),
('pp5', '2019-11-30', 0),
('pp6', '2019-11-30', 0),
('pp2', '2019-11-30', 0),
('pp3', '2019-11-30', 0),
('pp4', '2019-11-30', 0),
('pp5', '2019-11-30', 0),
('pp6', '2019-11-30', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaranperusahaan`
--
ALTER TABLE `anggaranperusahaan`
  ADD PRIMARY KEY (`kd_anggaranperusahaan`),
  ADD KEY `kd_jenisanggaran` (`kd_jenisanggaran`);

--
-- Indeks untuk tabel `detailanggaran`
--
ALTER TABLE `detailanggaran`
  ADD KEY `kd_anggaranperusahaan` (`kd_anggaranperusahaan`),
  ADD KEY `kd_jenisanggaran` (`kd_jenisanggaran`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `jenisanggaran`
--
ALTER TABLE `jenisanggaran`
  ADD PRIMARY KEY (`kd_jenisanggaran`);

--
-- Indeks untuk tabel `kasbesar`
--
ALTER TABLE `kasbesar`
  ADD PRIMARY KEY (`kd_kasbesar`),
  ADD KEY `kd_jenisanggaran` (`kd_jenisanggaran`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`kd_pendapatan`),
  ADD KEY `pendapatan_ibfk_1` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailanggaran`
--
ALTER TABLE `detailanggaran`
  ADD CONSTRAINT `detailanggaran_ibfk_1` FOREIGN KEY (`kd_anggaranperusahaan`) REFERENCES `anggaranperusahaan` (`kd_anggaranperusahaan`),
  ADD CONSTRAINT `detailanggaran_ibfk_2` FOREIGN KEY (`kd_jenisanggaran`) REFERENCES `jenisanggaran` (`kd_jenisanggaran`);

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `kasbesar`
--
ALTER TABLE `kasbesar`
  ADD CONSTRAINT `kasbesar_ibfk_2` FOREIGN KEY (`kd_jenisanggaran`) REFERENCES `jenisanggaran` (`kd_jenisanggaran`);

--
-- Ketidakleluasaan untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
