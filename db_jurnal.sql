-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2019 pada 19.05
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurnal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_guru` enum('Admin','Guru') NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `username`, `password`, `level_guru`, `status`) VALUES
(1, 'Iwan Safrudin', 'admin', 'admin', 'Admin', '1'),
(2, 'Muhammad Abdul Latif', 'abulLatif', 'guru', 'Guru', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `level_guru` enum('Admin','Guru') NOT NULL,
  `guru` enum('0','1') NOT NULL,
  `hari` enum('0','1') NOT NULL,
  `jam` enum('0','1') NOT NULL,
  `jurnal` enum('0','1') NOT NULL,
  `kelas` enum('0','1') NOT NULL,
  `mapel` enum('0','1') NOT NULL,
  `jadwal` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`level_guru`, `guru`, `hari`, `jam`, `jurnal`, `kelas`, `mapel`, `jadwal`) VALUES
('Admin', '1', '1', '1', '1', '1', '1', '1'),
('Guru', '0', '0', '0', '1', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hari`
--

INSERT INTO `tbl_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'SENIN'),
(2, 'SELASA'),
(3, 'RABU'),
(4, 'KAMIS'),
(5, 'JUMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_guru`, `id_hari`, `id_kelas`, `id_mapel`, `id_jam`) VALUES
(1, 1, 1, 1, 1, 11),
(6, 1, 1, 3, 3, 14),
(5, 2, 1, 2, 2, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `id_jam` int(11) NOT NULL,
  `jam_ke` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jam`
--

INSERT INTO `tbl_jam` (`id_jam`, `jam_ke`) VALUES
(11, '07.00-07.45'),
(12, '07.45-08.30'),
(13, '08.30-09.15'),
(14, '09.15-10.00'),
(15, '10.00--10.15'),
(16, '10.15-11.00'),
(17, '11.00-11.45'),
(18, '11.45-12.30'),
(19, '12.30-13.00'),
(20, '13.00-13.45'),
(21, '13.45-14.30'),
(22, '14.30-15.15'),
(23, '15.15-16.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurnal`
--

CREATE TABLE `tbl_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `htgl` date NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `indikator_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurnal`
--

INSERT INTO `tbl_jurnal` (`id_jurnal`, `htgl`, `id_jam`, `id_kelas`, `id_guru`, `id_mapel`, `indikator_materi`) VALUES
(1, '2019-06-16', 11, 1, 1, 1, 'belajar abcd'),
(8, '2019-06-16', 12, 2, 2, 2, 'Dasar Pemrograman'),
(9, '2019-06-16', 14, 3, 1, 3, 'belajar bahasa pemrograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '11 RPL 1'),
(2, '11 RPL 2'),
(3, '10 RPL 1'),
(4, '10 RPL 2'),
(5, '12 RPL 1'),
(6, '12 RPL 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'PBO'),
(2, 'PEMROGRAMAN WEB'),
(3, 'PEMROGRAMAN DASAR'),
(4, 'PEMROGRAMAN WEB BERBASIS OBJEK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`level_guru`);

--
-- Indeks untuk tabel `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `id_guru` (`id_guru`,`id_hari`,`id_kelas`,`id_mapel`,`id_jam`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_jam` (`id_jam`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `tbl_jurnal`
--
ALTER TABLE `tbl_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`,`id_guru`,`id_mapel`),
  ADD UNIQUE KEY `id_jam` (`id_jam`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurnal`
--
ALTER TABLE `tbl_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `tbl_hari` (`id_hari`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_4` FOREIGN KEY (`id_jam`) REFERENCES `tbl_jam` (`id_jam`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tbl_jurnal`
--
ALTER TABLE `tbl_jurnal`
  ADD CONSTRAINT `tbl_jurnal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_jadwal` (`id_kelas`),
  ADD CONSTRAINT `tbl_jurnal_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `tbl_jadwal` (`id_guru`),
  ADD CONSTRAINT `tbl_jurnal_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_jadwal` (`id_mapel`),
  ADD CONSTRAINT `tbl_jurnal_ibfk_5` FOREIGN KEY (`id_jam`) REFERENCES `tbl_jadwal` (`id_jam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
