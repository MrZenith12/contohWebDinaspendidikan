-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2023 pada 16.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinaspendidikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokument` int(50) NOT NULL,
  `nama_dokumen` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `download` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokument`, `nama_dokumen`, `file`, `tanggal`, `download`) VALUES
(1, 'PPDB SMK 2 Langsa', 'Aplikasi Manajemen Surat.pdf', '2023-09-23 14:54:07', 2),
(3, 'PPDB SD 3 Langsa', 'Template Surat Pernyataan1_2.pdf', '2023-09-23 14:54:07', 2),
(4, 'PPDB SMP 3 Langsa', 'HUT RI 78_Template_Banner Vertikal 1x3.pdf', '2023-09-23 14:54:07', 2),
(5, 'PPDB SMP 2 Langsa', 'STRUKTUR-DINAS-2022-1.pdf', '2023-09-23 14:54:07', 2),
(6, 'Penerapan Kurikulum Merdeka', '204-Article Text-3726-1-10-20190607.pdf', '2023-09-23 14:54:07', 2),
(7, 'belajar merdeka', 'CARA_MEMBUAT_DUA_PRIMARY_KEY_PADA_SATU_T.pdf', '2023-10-03 14:18:17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `NIP` int(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `foto`, `NIP`, `nama`, `jabatan`, `bidang`) VALUES
(1, 'pegawai.jpg', 1346251753, 'Davva', 'pegawai', 'tik'),
(2, 'pegawai1.jpg', 1346251, 'Nuzul', 'Bendahara', 'tik'),
(3, 'pegawai.jpg', 2147483647, 'Aripin', 'Bendahara', 'tik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul_banner` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `urutan` int(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `gambar`, `judul_banner`, `status`, `urutan`, `keterangan`) VALUES
(4, 'course_details_thumb.jpg', 'bergerak', 'Aktif', 1, 'bagus'),
(5, 'images (1).jpg', 'bergerak bersama', 'Aktif', 2, 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_dimasukkan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `deskripsi`, `gambar`, `tanggal_dimasukkan`) VALUES
(12, 'Hari Guru Nasional 2', 'Memperingati hari guru nasional ', 'Hari-Guru-Nasional.jpeg', '2023-09-20 03:26:35'),
(16, 'Juara Umum Kompetisi', 'Juara umum kompetisi KOSN SMA Negeri 3 Langsa', 'images (1).jpg', '2023-09-20 03:28:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(30) NOT NULL,
  `jumlah_pegawai` int(50) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `judul_galeri` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `image`, `judul_galeri`, `deskripsi`, `tanggal`) VALUES
(1, 'sekolah.jpg', 'belajar bersamaa', 'Belajar bersama sd MIN 2 Langsa', '2023-09-23 11:59:56'),
(3, 'images (1).jpg', 'pembekalan Bersama', 'Foto Bersama', '2023-09-22 02:41:32'),
(5, 'sekolah.jpg', 'pembekalan Bersama Dinas ', 'bagus dengan kebersamaan anak anak sd', '2023-09-15 14:18:15'),
(7, 'coursesauthor3.png', 'pembekalan Bersama', 'bagus', '2023-10-02 15:36:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '12345', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `id_menuutama` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `urutan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `id_menuutama`, `nama_menu`, `status`, `urutan`) VALUES
(3, 2, 'Pendaftaran', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menuutama`
--

CREATE TABLE `tbl_menuutama` (
  `id_menuutama` int(11) NOT NULL,
  `nama_menuutama` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `urutan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_menuutama`
--

INSERT INTO `tbl_menuutama` (`id_menuutama`, `nama_menuutama`, `status`, `urutan`) VALUES
(2, 'PPID', 'Aktif', 2),
(3, 'Formulir', 'Aktif', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pejabat`
--

CREATE TABLE `tbl_pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `nama_pejabat` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_pejabat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pejabat`
--

INSERT INTO `tbl_pejabat` (`id_pejabat`, `nama_pejabat`, `posisi`, `keterangan`, `gambar_pejabat`) VALUES
(1, 'nuzul ikhram', 'kadis', 'bagus', 'pegawai.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `bidang` varchar(25) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `jam_kerja` varchar(50) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `no_tlpn` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `nama_profil`, `alamat`, `bidang`, `logo`, `jam_kerja`, `facebook`, `instagram`, `youtube`, `no_tlpn`, `email`) VALUES
(1, 'DINAS PENDIDIKAN', 'seuriget,langsa,aceh', 'PENDIDIKAN', 'dinaspendidikan1.png', 'Senin - Jumat : 08:00 - 17:00', 'https://m.facebook.com/profile.php?id=300129650125065', 'https://www.instagram.com/p/Cdv1iZHh9m4/', 'https://www.youtube.com/c/DINASPENDIDIKANACEH/videos', '+62895344280791', 'dinaspendidikandankebudayaan@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_strukturorganisasi`
--

CREATE TABLE `tbl_strukturorganisasi` (
  `id_organisasi` int(11) NOT NULL,
  `gambar_organisasi` varchar(255) NOT NULL,
  `tahun` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_strukturorganisasi`
--

INSERT INTO `tbl_strukturorganisasi` (`id_organisasi`, `gambar_organisasi`, `tahun`, `deskripsi`) VALUES
(4, 'Struktur_BPKD.png', '2023-09-22', 'organisasi dinas pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(30) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `urutan` int(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_visimisi`
--

CREATE TABLE `tbl_visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_visimisi`
--

INSERT INTO `tbl_visimisi` (`id_visimisi`, `gambar`, `visi`, `misi`) VALUES
(1, '651c24e610c1a.jpg', '<p>jhhjuyj</p>', '<p>yjuyjyuj</p>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokument`);

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menuutama` (`id_menuutama`);

--
-- Indeks untuk tabel `tbl_menuutama`
--
ALTER TABLE `tbl_menuutama`
  ADD PRIMARY KEY (`id_menuutama`);

--
-- Indeks untuk tabel `tbl_pejabat`
--
ALTER TABLE `tbl_pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indeks untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tbl_strukturorganisasi`
--
ALTER TABLE `tbl_strukturorganisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indeks untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tbl_visimisi`
--
ALTER TABLE `tbl_visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokument` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_menuutama`
--
ALTER TABLE `tbl_menuutama`
  MODIFY `id_menuutama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pejabat`
--
ALTER TABLE `tbl_pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_strukturorganisasi`
--
ALTER TABLE `tbl_strukturorganisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_visimisi`
--
ALTER TABLE `tbl_visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
