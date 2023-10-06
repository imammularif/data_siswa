-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 18.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(2, 'VII A'),
(3, 'VII B'),
(4, 'VII C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `pelajaran` varchar(30) NOT NULL,
  `nip` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_pelajaran`, `pelajaran`, `nip`) VALUES
(4, 'Matematika', 102030),
(5, 'Fisika', 121212),
(6, 'Olahraga', 111111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `tugas` varchar(3) NOT NULL,
  `uts` varchar(3) NOT NULL,
  `uas` varchar(3) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pelajaran`, `nis`, `tugas`, `uts`, `uas`, `nilai`) VALUES
(3, 4, 19213, '82', '83', '84', '82.9'),
(6, 4, 121233, '20', '50', '60', '41'),
(7, 5, 111456, '100', '99', '90', '96.7'),
(9, 4, 111456, '90', '80', '86', '85.8'),
(10, 5, 19213, '80', '83', '94', '85.1'),
(11, 6, 111456, '82', '83', '88', '84.1'),
(12, 6, 188122, '80', '89', '90', '85.7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hp` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `status`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `hp`, `alamat`, `photo`) VALUES
(102030, 'Arsyad', 'Aktif', 'Laki-Laki', 'FDASFS', '1999-02-03', 'AFDADFSFA', 'asdfasdfasf', 'banjir1.jpg'),
(111111, 'ryu', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-04-20', '08121221232', 'afsfewfaw', 'bakwan_jagung.jpg'),
(121212, 'Doni', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-04-13', '08121221232', 'gfdcghcgh', 'es_semangka.png'),
(123123, 'Debri', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-03-25', '08121221232', 'asdfsadf', 'banjir.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hp_siswa` varchar(20) NOT NULL,
  `hp_ortu` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_kelas`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `hp_siswa`, `hp_ortu`, `alamat`, `photo`) VALUES
(19213, 'Udin', 2, 'Laki-Laki', 'Pekanbaru', '2002-01-23', '11111111112', '2222222222', 'sdfsdfsd', 'vaksin1.jpg'),
(111456, 'Sinta', 3, 'Perempuan', 'Pekanbaru', '2022-04-13', '08564322', '08865', 'hjgjfvjycuy', 'bakwan_jagung.jpg'),
(121233, 'Ronal', 2, 'Laki-Laki', 'Pekanbaru', '2009-02-11', '(031) 23123123', '(031) 23123123', 'Jl. Guna Karya', 'banjir.jpg'),
(188122, 'ratu', 3, 'Perempuan', 'Pekanbaru', '2022-04-22', '08675567', '8976895987', 'jhjfh', 'tela_tela.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(17, '123123', '$2y$10$E8pVFvjwpZ7ryL1b5nPN9uDRKOVfQUocWzoEqDDe3AdMF9mccVofu', 'TU', '2022-03-18 16:22:34'),
(18, '102030', '$2y$10$KcKHyADSijhFDvAy8Z2XGeMEaU9P4BiWpZvAnBfqJtg9gnCtv4gGS', 'Guru', '2022-03-18 16:24:56'),
(22, '19213', '$2y$10$KcKHyADSijhFDvAy8Z2XGeMEaU9P4BiWpZvAnBfqJtg9gnCtv4gGS', 'SISWA', '2022-03-18 16:57:51'),
(23, '121233', '$2y$10$H2vspzCEZGwuzS.eI8wJ2OcjCH4DgfE.lsejY/LufuPhLZh/h0OQK', 'SISWA', '2022-04-09 01:37:02'),
(24, '121212', '$2y$10$x/kPz6v7DhtoFNG/CITbYevWcLpXU.q0wNIrE9r.EGtBPvKlm97Ke', 'Guru', '2022-04-15 10:06:23'),
(25, '111456', '$2y$10$muEzKlf9aKkspSt2AfOyie4nIj6WWxTURyORs6Z1zfqglkvTyXYn6', 'SISWA', '2022-04-15 10:08:08'),
(26, '111111', '$2y$10$FLBTiEOtZRinXaQnf/Cy9e0T7Eyk2qIn8S7eOPm7F.gwWx6mrEtoS', 'Guru', '2022-04-15 15:16:54'),
(27, '188122', '$2y$10$V1faHLvadMAN6l8jRmxOk.gKufeFTgZbSWaDSUdf.rMUd9w0SCMN2', 'SISWA', '2022-04-15 15:17:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelajaran` (`id_pelajaran`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
