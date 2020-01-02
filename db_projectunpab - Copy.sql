-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2019 pada 04.11
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectunpab`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_diriPeneDikti` (IN `Nidn` VARCHAR(100))  NO SQL
select COUNT(B.Nidn) AS Jumlah from ta_penelitian A inner join 
ta_anggota_penelitian B ON A.Kd_Penelitian = B.Kd_Penelitian inner JOIN
ta_staff C on B.Nidn = C.Nidn
where B.Jabatan = 'Ketua' and C.Role = 2 and B.Nidn = Nidn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_test` (`var1` INT)  BEGIN   
    DECLARE start  INT unsigned DEFAULT 1;  
    DECLARE finish INT unsigned DEFAULT 10;

    SELECT  var1, start, finish;

    SELECT * FROM places WHERE place BETWEEN start AND finish; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_user`
--

CREATE TABLE `ap_user` (
  `id_user` int(11) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Date_Create` datetime NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ap_user`
--

INSERT INTO `ap_user` (`id_user`, `Level`, `username`, `password`, `email`, `Status`, `Date_Create`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(4, 'sa', 'sa', '$2y$10$qzT0g7.gi4PflSm.SWKO7O1yqBWIuUI79kNPxaDGXNFQmUdjl1KcO', 'admin@gmail.com', '1', '2019-10-30 05:44:51', NULL, NULL, NULL, NULL),
(8, 'User', 'lofty', '$2y$10$8a3yZ5yPtmkDpAB3zxj2uO33Lc7aSUd7vzG0Kzuw0DmT59LilB0pC', 'lighting.pcs@gmail.com', '1', '2019-12-04 03:50:30', '2019-12-04 03:50:30', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_fakultas`
--

CREATE TABLE `ref_fakultas` (
  `Tahun` varchar(50) NOT NULL,
  `Kd_Fakultas` varchar(50) NOT NULL,
  `Nama_Fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_fakultas`
--

INSERT INTO `ref_fakultas` (`Tahun`, `Kd_Fakultas`, `Nama_Fakultas`) VALUES
('2019', '1', 'Fakultas Komputer'),
('2019', '2', 'Fakultas Ilmu atau Sains Pertanian'),
('2019', '3', 'Fakultas Hukum'),
('2019', '4', 'Fakultas Ekonomi'),
('2019', '5', 'Pertanian'),
('2019', '6', 'Fakultas Agama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_programstudi`
--

CREATE TABLE `ref_programstudi` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Kd_Fakultas` varchar(50) NOT NULL,
  `Kd_Prodi` varchar(50) NOT NULL,
  `Nama_Prodi` varchar(255) NOT NULL,
  `Jenjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_programstudi`
--

INSERT INTO `ref_programstudi` (`Id`, `Tahun`, `Kd_Fakultas`, `Kd_Prodi`, `Nama_Prodi`, `Jenjang`) VALUES
(1, '2019', '1', '1', 'Ilmu Komputer atau Informatika', 'S-1'),
(2, '2019', '1', '2', 'Kecerdasan Buatan', 'S-1'),
(3, '2019', '1', '3', 'Rekayasa Perangkat Lunak', 'S-1'),
(4, '2019', '1', '4', 'Rekayasa Sistem Komputer', 'S-1'),
(5, '2019', '1', '5', 'Sistem Informasi', 'S-1'),
(6, '2019', '1', '6', 'Sistem dan Teknologi Informasi', 'S-1'),
(7, '2019', '1', '7', 'Teknologi Informasi', 'S-1'),
(8, '2019', '3', '1', 'Ilmu Hukum', 'S-1'),
(9, '2019', '3', '2', 'Magister Hukum', 'S-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_tahun`
--

CREATE TABLE `ref_tahun` (
  `Id` int(11) NOT NULL,
  `Tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_tahun`
--

INSERT INTO `ref_tahun` (`Id`, `Tahun`) VALUES
(1, 1980),
(2, 1981),
(3, 1982),
(4, 1983),
(5, 1984),
(6, 1985),
(7, 1986),
(8, 1987),
(9, 1988),
(10, 1989),
(11, 1990),
(12, 1991),
(13, 1992),
(14, 1993),
(15, 1994),
(16, 1995),
(17, 1996),
(18, 1997),
(19, 1998),
(20, 1999),
(21, 2000),
(22, 2001),
(23, 2002),
(24, 2003),
(25, 2004),
(26, 2005),
(27, 2006),
(28, 2007),
(29, 2008),
(30, 2009),
(31, 2010),
(32, 2011),
(33, 2012),
(34, 2013),
(35, 2014),
(36, 2015),
(37, 2016),
(38, 2017),
(39, 2018),
(40, 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_anggota_penelitian`
--

CREATE TABLE `ta_anggota_penelitian` (
  `No_Id` int(11) NOT NULL,
  `Kd_Penelitian` int(11) NOT NULL,
  `Nidn` varchar(225) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_anggota_penelitian`
--

INSERT INTO `ta_anggota_penelitian` (`No_Id`, `Kd_Penelitian`, `Nidn`, `Nama`, `Jabatan`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, 20192, '311047508', 'Dr. Rusiadi, SE., M.Si', 'Ketua', '2019-11-13 09:55:36', '4', NULL, NULL),
(2, 20192, '3110040015', 'Rahmat Hidayat, SE., MM', 'Anggota', '2019-11-13 09:55:51', '4', '2019-11-13 12:03:37', '4'),
(4, 20195, '311042079', 'Henni Ramadani', 'Ketua', '2019-11-27 10:13:38', '4', NULL, NULL),
(5, 20194, '311042077', 'Tirza Ramadani', 'Ketua', '2019-11-27 10:14:07', '4', NULL, NULL),
(6, 20196, '311047508', 'Dr. Rusiadi, SE., M.Si', 'Ketua', '2019-11-27 10:23:15', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_anggota_pengabdian`
--

CREATE TABLE `ta_anggota_pengabdian` (
  `No_Id` int(11) NOT NULL,
  `Kd_Pengabdian` int(11) NOT NULL,
  `Nidn` varchar(225) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_anggota_pengabdian`
--

INSERT INTO `ta_anggota_pengabdian` (`No_Id`, `Kd_Pengabdian`, `Nidn`, `Nama`, `Jabatan`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, 20191, '311047508', 'Dr. Rusiadi, SE., M.Si', 'Ketua', '2019-11-16 09:03:48', '4', NULL, NULL),
(2, 20192, '311047508', 'Dr. Rusiadi, SE., M.Si', 'Ketua', '2019-11-16 09:16:49', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_buku`
--

CREATE TABLE `ta_buku` (
  `Id_Buku` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Nidn` varchar(100) NOT NULL,
  `Pencipta` varchar(225) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `Jml_Hal` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Source` varchar(100) NOT NULL COMMENT '1 = Penelitian, 2 = Pengabdian',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_buku`
--

INSERT INTO `ta_buku` (`Id_Buku`, `Tahun`, `Nidn`, `Pencipta`, `Judul`, `ISBN`, `Jml_Hal`, `Penerbit`, `Dokumen`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(3, '2019', '311047508', 'Dr. Rusiadi, SE., M.Si', 'Contoh Judul Buku Penelitian 1', '9929', '18', 'Percoban', 'lorem-ipsum1.pdf', '1', '2019-11-19 09:33:15', '4', '2019-11-19 10:08:56', '4'),
(5, '2019', '311047508', 'Dr. Rusiadi, SE., M.Si', 'Judul Buku Pengabdian 1', '827', '12', 'USU Press', 'lorem-ipsum_-_Copy.pdf', '2', '2019-11-20 08:37:51', '4', '2019-11-20 08:42:37', '4');

--
-- Trigger `ta_buku`
--
DELIMITER $$
CREATE TRIGGER `trg_buku` BEFORE DELETE ON `ta_buku` FOR EACH ROW delete from ta_penulis_buku where Id_Buku = old.Id_Buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_fasilitas_pendukung`
--

CREATE TABLE `ta_fasilitas_pendukung` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(10) NOT NULL,
  `No_Surat` varchar(225) NOT NULL,
  `Nama_Unit` varchar(225) NOT NULL,
  `Fasilitas` varchar(225) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `Dokumen` varchar(225) DEFAULT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_fasilitas_pendukung`
--

INSERT INTO `ta_fasilitas_pendukung` (`Id`, `Tahun`, `No_Surat`, `Nama_Unit`, `Fasilitas`, `Status`, `Keterangan`, `Dokumen`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(6, '2019', '145/02/R/2011', 'Sentra Jurnal Internasional', 'Fasilitator dalam Pengajuan Jurnal Internasional', 'Aktif', 'Untuk Mempermudah dalam pengajuan jurnal internasional yang terindeks', 'lorem-ipsum_-_Copy.pdf', NULL, NULL, '2019-11-16 11:03:37', '4'),
(7, '2019', '218/02/R/2012', 'LPP Sentra HKI UNPAB', 'Fasilitator dalam Proses Pendaftaran HKI', 'Aktif', 'Untuk Mempermudah dalam pendaftaran Hak Kekayaan Intelektual', NULL, NULL, NULL, NULL, NULL),
(8, '2019', '182/02/RT/2011', 'Usaha Kecil Menengah (UKM) Center Universitas Pembangunan Panca Budi', 'Memiliki Usaha, Kantor, dan beberapa fasilitas kantor', 'Aktif', 'Memfasilitasi Kemandirian Kewirausahaan dan Implementasi dari Pengabdian Maysarakat dari Tri Dharmaperguruan tinggi\r\nFasilitas: \r\n1. Tempat Coaching/Training The Real Enterpreneur\r\n2. Akses Modal Hibah/Bergulis Dari Kerja Sama UKM Dengan Pihak Ketiga', NULL, NULL, NULL, '2019-11-16 10:58:03', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_hak_hki`
--

CREATE TABLE `ta_hak_hki` (
  `Id` int(11) NOT NULL,
  `Id_Hki` varchar(100) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Nidn` varchar(225) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Urut` varchar(100) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_hak_hki`
--

INSERT INTO `ta_hak_hki` (`Id`, `Id_Hki`, `Tahun`, `Nidn`, `Nama`, `Urut`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(2, '3', '2019', '311047508', 'Dr. Rusiadi, SE., M.Si', '1', '2019-11-20 10:49:45', '4', '2019-11-20 11:01:33', '4'),
(3, '5', '2019', '311042072', 'Suheri., S.Kom,. M.Kom', '2', '2019-11-20 11:55:50', '4', '2019-11-20 11:55:56', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_hki`
--

CREATE TABLE `ta_hki` (
  `Id_Hki` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Judul` varchar(225) NOT NULL,
  `Jenis` varchar(100) NOT NULL,
  `No_Pendaftaran` varchar(250) NOT NULL,
  `No_Sertifikat` varchar(250) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Source` varchar(100) NOT NULL COMMENT '1 = Penelitian, 2 = Pengabdian',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_hki`
--

INSERT INTO `ta_hki` (`Id_Hki`, `Tahun`, `Judul`, `Jenis`, `No_Pendaftaran`, `No_Sertifikat`, `Status`, `Dokumen`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(3, '2019', 'Judul HKI Penelitian 12', 'HKI', '001/Regis', '001/Sertifikat', 'Terdaftar', 'lorem-ipsum.pdf', '1', '2019-11-20 09:14:55', '4', '2019-11-20 09:23:31', '4'),
(5, '2019', 'Judul HKI Pengabdian 1', 'HKI', '01/No', '01/No', 'Terdaftar', NULL, '2', '2019-11-20 11:54:48', '4', NULL, NULL);

--
-- Trigger `ta_hki`
--
DELIMITER $$
CREATE TRIGGER `trg_hki` BEFORE DELETE ON `ta_hki` FOR EACH ROW delete from ta_hak_hki where Id_Hki = old.Id_Hki
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_jurnal`
--

CREATE TABLE `ta_jurnal` (
  `Kd_Jurnal` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Jurnal` varchar(100) NOT NULL,
  `ISSN` varchar(100) NOT NULL,
  `Volume` varchar(100) NOT NULL,
  `Nomor` varchar(50) NOT NULL,
  `Halaman` varchar(100) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Publikasi` varchar(150) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Source` varchar(50) NOT NULL COMMENT '1 = Penelitian, 2 = Pengabdian',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_jurnal`
--

INSERT INTO `ta_jurnal` (`Kd_Jurnal`, `Tahun`, `Judul`, `Jurnal`, `ISSN`, `Volume`, `Nomor`, `Halaman`, `Url`, `Publikasi`, `Dokumen`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, '2019', 'Jurnal Penelitian 1', 'BMS', '2157 - 6068', '7', '4', '102-120', 'http://marketing.ekpertjoumals.com', 'Jurnal Internasional', 'lorem-ipsum_-_Copy_-_Copy.pdf', '1', '2019-11-18 10:02:38', '4', '2019-11-18 10:43:31', '4'),
(4, '2019', 'Jurnal Pengabdian 1', 'SMS', '100-123', '3', '18', '108', 'fb.com', 'Jurnal Nasional Terakreditasi', 'lorem-ipsum.pdf', '2', '2019-11-18 14:37:59', '4', '2019-11-18 14:38:43', '4');

--
-- Trigger `ta_jurnal`
--
DELIMITER $$
CREATE TRIGGER `trg_delete` BEFORE DELETE ON `ta_jurnal` FOR EACH ROW delete from ta_penulis_jurnal where Kd_Jurnal = old.Kd_Jurnal
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_karyailmiah`
--

CREATE TABLE `ta_karyailmiah` (
  `Id_Karya` int(11) NOT NULL,
  `Tahun` varchar(100) NOT NULL,
  `Nidn` varchar(225) NOT NULL,
  `Nama` text NOT NULL,
  `Judul` varchar(225) NOT NULL,
  `Institusi` varchar(225) NOT NULL,
  `Halaman` varchar(100) NOT NULL,
  `Tempat` varchar(250) NOT NULL,
  `Forum` varchar(255) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Status` varchar(100) NOT NULL,
  `Publikasi` varchar(150) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_karyailmiah`
--

INSERT INTO `ta_karyailmiah` (`Id_Karya`, `Tahun`, `Nidn`, `Nama`, `Judul`, `Institusi`, `Halaman`, `Tempat`, `Forum`, `Dokumen`, `Status`, `Publikasi`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, '2019', '0013127108', 'Dr Abdiyanto S.E., M.Si', 'Alat Pengontrol Baru untuk Mesin Air Otomatis Berbasis Arduino dengan Smartphone', 'FT UISU Medan', '1-15', 'Gedung Aula Yayasan UISU', 'Seminar Nasional', 'lorem-ipsum.pdf', 'Pemakalah', 'Tingkat Nasional', '1', NULL, NULL, '2019-11-20 16:07:38', '4'),
(2, '2019', '311040043', 'Abdul Khaliq S.Kom', 'Judul Makalah 1', 'FT USU Medan', '1-2', 'Medan', 'Seminar Nasional', NULL, 'Pemakalah', 'Tingkat Nasional', '1', '2019-11-20 16:09:13', '4', NULL, NULL),
(4, '2019', '311040090', 'Isnar Sumartono S.Kom, M.Kom', 'Pengabdian Makalah 1', 'Unpab', '1-4', 'Gedung A', 'UnpabPress', NULL, 'Pemakalah', 'Tingkat Internasional', '2', '2019-11-21 09:04:37', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kegiatan`
--

CREATE TABLE `ta_kegiatan` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Tingkat_Forum` varchar(255) NOT NULL,
  `Nama_Keg` varchar(255) NOT NULL,
  `Kd_Fakultas` varchar(100) NOT NULL,
  `Kd_Prodi` varchar(100) NOT NULL,
  `Mitra` varchar(255) NOT NULL,
  `Tempat` varchar(255) NOT NULL,
  `Tgl_Start` date NOT NULL,
  `Tgl_End` date NOT NULL,
  `Narasumber` varchar(255) DEFAULT NULL,
  `Source` varchar(150) NOT NULL COMMENT '1 = Penelitian, 2 = Pengabdian',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_kegiatan`
--

INSERT INTO `ta_kegiatan` (`Id`, `Tahun`, `Tingkat_Forum`, `Nama_Keg`, `Kd_Fakultas`, `Kd_Prodi`, `Mitra`, `Tempat`, `Tgl_Start`, `Tgl_End`, `Narasumber`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(5, '2019', 'Internasional', 'Dosen Prodi Teknik Arsitektur Mengikuti International Seminar on Livable Space sebagai pembicara', '1', '2', 'Fakultas Teknik Universitas Trisakti', 'Museum Nasional Indonesia, Jakarta', '2019-11-01', '2019-11-09', 'Narasumber I', '1', '2019-11-23 09:39:34', '4', '2019-11-23 10:26:14', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kerjasama`
--

CREATE TABLE `ta_kerjasama` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Unit` varchar(225) NOT NULL,
  `Nama_Keg` varchar(250) NOT NULL,
  `Institusi_Mitra` varchar(225) NOT NULL,
  `No_Kontrak` varchar(220) NOT NULL,
  `Nilai_Kontrak` bigint(20) NOT NULL,
  `Dokumen` varchar(225) DEFAULT NULL,
  `Source` varchar(50) NOT NULL COMMENT '1 = MoU / MoA, 2 = Hasil Riset',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_kerjasama`
--

INSERT INTO `ta_kerjasama` (`Id`, `Tahun`, `Unit`, `Nama_Keg`, `Institusi_Mitra`, `No_Kontrak`, `Nilai_Kontrak`, `Dokumen`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, '2019', 'Lembaga Penelitian dan Pengabdian Kepada Masyarakat', 'Bimbingan Teknis Anggota dan Sekretariat DPRD Kabupaten Langkat Agustus 2016', 'Sekeretariat DPRD Kabupaten Langkat', '183.3-1318/Set.DPRD/2016', 2620000000, 'lorem-ipsum.pdf', '1', NULL, NULL, '2019-11-25 09:23:41', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pedoman`
--

CREATE TABLE `ta_pedoman` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Nama_Pedoman` varchar(255) NOT NULL,
  `No_Surat` varchar(255) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Source` varchar(100) NOT NULL COMMENT '1 = Penelitian, 2 = Pengabdian',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_pedoman`
--

INSERT INTO `ta_pedoman` (`Id`, `Tahun`, `Nama_Pedoman`, `No_Surat`, `Dokumen`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, '2019', 'Standar Mutu Penelitian', '001/LPPM/2019', 'lorem-ipsum1.pdf', '2', NULL, NULL, NULL, NULL),
(3, '2019', 'Pedoman Penelitian 1', '001/Pedoman/Penelitian-2019', 'lorem-ipsum.pdf', '1', '2019-12-03 05:16:05', '4', '2019-12-03 05:33:38', '4'),
(4, '2019', 'Pedoman Pengabdian 1', '002/Pedoman-pengabdian/2019', 'lorem-ipsum_-_Copy.pdf', '2', '2019-12-03 05:45:31', '4', '2019-12-03 05:45:39', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pendukung_pengabdian`
--

CREATE TABLE `ta_pendukung_pengabdian` (
  `No_Id` int(11) NOT NULL,
  `Kd_Pengabdian` int(11) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_pendukung_pengabdian`
--

INSERT INTO `ta_pendukung_pengabdian` (`No_Id`, `Kd_Pengabdian`, `Nama`, `Jabatan`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, 20191, 'Pendukung 8', 'Staff Lppm', '2019-11-16 09:04:02', '4', NULL, NULL),
(2, 20192, 'Pendukung 9', 'Staff Lppm', '2019-11-16 09:17:02', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_penelitian`
--

CREATE TABLE `ta_penelitian` (
  `Kd_Penelitian` varchar(100) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Judul` varchar(250) NOT NULL,
  `Skema` varchar(100) NOT NULL,
  `Kd_Fakultas` varchar(50) NOT NULL,
  `Kd_Prodi` varchar(50) NOT NULL,
  `Sumber_Dana` varchar(255) NOT NULL,
  `Dana` bigint(20) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Date_Create` datetime NOT NULL,
  `Source` varchar(50) NOT NULL COMMENT '1 = Ristekdikti, 2 = Internal, 3 = Asing',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL,
  `No_Urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_penelitian`
--

INSERT INTO `ta_penelitian` (`Kd_Penelitian`, `Tahun`, `Judul`, `Skema`, `Kd_Fakultas`, `Kd_Prodi`, `Sumber_Dana`, `Dana`, `Dokumen`, `Date_Create`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`, `No_Urut`) VALUES
('20191', 2019, 'Judul Penelitian Asing 1', 'Hibah Dikti', '1', '2', 'Lainnya', 15000000, 'lorem-ipsum_-_Copy.pdf', '2019-11-12 11:13:28', '3', '2019-11-12 11:13:28', '4', '2019-11-13 09:22:42', '4', 1),
('20192', 2019, 'Judul Penelitian Asing 2', 'Hibah Dikti', '1', '3', 'Lainnya', 15000000, NULL, '2019-11-13 09:52:31', '3', '2019-11-13 09:52:31', '4', NULL, NULL, 2),
('20193', 2019, 'Penelitian Ristekdikti 1', 'Hibah Dikti', '1', '2', 'Ristekdikti', 25000000, 'lorem-ipsum_-_Copy1.pdf', '2019-11-15 10:13:44', '1', '2019-11-15 10:13:44', '4', '2019-11-15 10:14:03', '4', 3),
('20194', 2019, 'Penelitian Internal Perguruan Tinggi 1', 'Hibah Internal', '1', '3', 'Internal Perguruan Tinggi', 200000000, 'lorem-ipsum_-_Copy_-_Copy.pdf', '2019-11-15 10:19:29', '2', '2019-11-15 10:19:29', '4', '2019-11-15 10:20:09', '4', 4),
('20195', 2019, 'Judul Penelitian Ristekdikti 2', 'Hibah Dikti', '1', '3', 'Ristekdikti', 10000000, NULL, '2019-11-21 09:47:48', '1', '2019-11-21 09:47:48', '4', NULL, NULL, 5),
('20196', 2019, 'penelitian internal 1', 'Hibah Dikti', '1', '1', 'Ristekdikti', 1000000, NULL, '2019-11-27 10:22:45', '2', '2019-11-27 10:22:45', '4', NULL, NULL, 6);

--
-- Trigger `ta_penelitian`
--
DELIMITER $$
CREATE TRIGGER `trg_penelitian1` BEFORE DELETE ON `ta_penelitian` FOR EACH ROW BEGIN
	Delete from ta_anggota_penelitian where Kd_Penelitian = old.Kd_Penelitian;
    
    Delete from ta_tim_pendukung where Kd_Penelitian = old.Kd_Penelitian;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pengabdian`
--

CREATE TABLE `ta_pengabdian` (
  `Kd_Pengabdian` varchar(100) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Judul` varchar(250) NOT NULL,
  `Skema` varchar(100) NOT NULL,
  `Kd_Fakultas` varchar(50) NOT NULL,
  `Kd_Prodi` varchar(50) NOT NULL,
  `Sumber_Dana` varchar(255) NOT NULL,
  `Dana` bigint(20) NOT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  `Date_Create` datetime NOT NULL,
  `Source` varchar(50) NOT NULL COMMENT '1 = Ristekdikti, 2 = Internal',
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL,
  `No_Urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_pengabdian`
--

INSERT INTO `ta_pengabdian` (`Kd_Pengabdian`, `Tahun`, `Judul`, `Skema`, `Kd_Fakultas`, `Kd_Prodi`, `Sumber_Dana`, `Dana`, `Dokumen`, `Date_Create`, `Source`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`, `No_Urut`) VALUES
('20191', '2019', 'Pengabdian Masyarakat 1', 'Hibah Dikti', '1', '1', 'Internal Perguruan Tinggi', 80000000, 'lorem-ipsum.pdf', '2019-11-16 09:02:52', '1', '2019-11-16 09:02:52', '4', NULL, NULL, 1),
('20192', '2019', 'Pengabdian Internal 1', 'Hibah Dikti', '1', '3', 'Internal Perguruan Tinggi', 25000000, 'lorem-ipsum1.pdf', '2019-11-16 09:16:38', '2', '2019-11-16 09:16:38', '4', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_penulis_buku`
--

CREATE TABLE `ta_penulis_buku` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Id_Buku` varchar(225) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `Urut` varchar(50) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_penulis_buku`
--

INSERT INTO `ta_penulis_buku` (`Id`, `Tahun`, `Id_Buku`, `Nama`, `Urut`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(6, '2019', '3', 'Nama 12', '1', '2019-11-19 11:51:55', '4', '2019-11-19 11:56:39', '4'),
(7, '2019', '3', 'Nama 2', '3', '2019-11-19 11:52:01', '4', NULL, NULL),
(11, '2019', '5', 'Nama 2 ', '2', '2019-11-20 08:40:31', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_penulis_ilmiah`
--

CREATE TABLE `ta_penulis_ilmiah` (
  `Id` int(11) NOT NULL,
  `Tahun` varchar(100) NOT NULL,
  `Id_Karya` varchar(220) NOT NULL,
  `Nama_Penulis` varchar(250) NOT NULL,
  `Urut` varchar(100) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_penulis_ilmiah`
--

INSERT INTO `ta_penulis_ilmiah` (`Id`, `Tahun`, `Id_Karya`, `Nama_Penulis`, `Urut`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(3, '2019', '2', 'Penulis 1-1', '1', NULL, NULL, NULL, NULL),
(5, '2019', '4', 'Penulis 1', 'Ke 1', '2019-11-21 09:04:49', '4', NULL, NULL),
(6, '2019', '4', 'Penulis', 'Ke II', '2019-11-21 09:05:06', '4', NULL, NULL),
(7, '2019', '1', 'Penulis 1 ke', 'ke 12', '2019-11-22 08:47:16', '4', '2019-11-22 08:47:40', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_penulis_jurnal`
--

CREATE TABLE `ta_penulis_jurnal` (
  `Id` int(11) NOT NULL,
  `Kd_Jurnal` varchar(100) NOT NULL,
  `Nidn` varchar(100) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_penulis_jurnal`
--

INSERT INTO `ta_penulis_jurnal` (`Id`, `Kd_Jurnal`, `Nidn`, `Nama`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(6, '1', '311040090', 'Isnar Sumartono S.Kom, M.Kom', '2019-11-22 08:31:48', '4', NULL, NULL),
(7, '4', '311042072', 'Suheri., S.Kom,. M.Kom', '2019-11-22 08:36:38', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_staff`
--

CREATE TABLE `ta_staff` (
  `id` int(11) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Nidn` varchar(255) DEFAULT NULL,
  `Nip` varchar(100) DEFAULT NULL,
  `Nama` varchar(225) NOT NULL,
  `Jk` varchar(20) NOT NULL,
  `Jabatan` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Jenjang` varchar(10) DEFAULT NULL,
  `Kd_Fakultas` varchar(50) DEFAULT NULL,
  `Kd_Prodi` varchar(50) DEFAULT NULL,
  `Role` int(11) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_staff`
--

INSERT INTO `ta_staff` (`id`, `Tahun`, `Nidn`, `Nip`, `Nama`, `Jk`, `Jabatan`, `Unit`, `Jenjang`, `Kd_Fakultas`, `Kd_Prodi`, `Role`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(14, 2019, NULL, '0104067508', 'Dr. Rusiadi, SE., M.Si.', 'Laki-Laki', 'Ketua LPPM', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-2', NULL, NULL, 1, '2019-11-08 04:50:26', '4', NULL, NULL),
(15, 2019, NULL, '110040015', 'Rahmat Hidayat, SE., MM', 'Laki-Laki', 'Kaur Pengabdi dan Desa Binaan', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-2', NULL, NULL, 1, '2019-11-08 04:53:38', '4', NULL, NULL),
(16, 2019, NULL, '110040043', 'Jiker Pohan, SH', 'Laki-Laki', 'Kaur Penelitian dan Pusat Studi', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-1', NULL, NULL, 1, '2019-11-11 08:14:05', '4', NULL, NULL),
(17, 2019, NULL, '1110040090', 'Ayumi Kartika Sari, SH', 'Perempuan', 'Bendahara', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-2', NULL, NULL, 1, '2019-11-11 08:14:48', '4', NULL, NULL),
(18, 2019, NULL, '3110042072', 'Merry Agnes, SH', 'Perempuan', 'Administrasi', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-1', NULL, NULL, 1, '2019-11-11 08:15:34', '4', NULL, NULL),
(20, 2019, '311047508', NULL, 'Dr. Rusiadi, SE., M.Si', 'Laki-Laki', NULL, NULL, 'S-3', '1', '1', 2, '2019-11-11 08:39:20', '4', NULL, NULL),
(21, 2019, '3110040015', NULL, 'Rahmat Hidayat, SE., MM', 'Laki-Laki', NULL, NULL, 'S-2', '1', '2', 2, '2019-11-11 09:09:24', '4', NULL, NULL),
(22, 2019, '311040043', NULL, 'Abdul Khaliq S.Kom', 'Laki-Laki', NULL, NULL, 'S-1', '1', '3', 2, '2019-11-11 09:17:11', '4', NULL, NULL),
(23, 2019, '311040090', NULL, 'Isnar Sumartono S.Kom, M.Kom', 'Laki-Laki', NULL, NULL, 'S-2', '1', '5', 2, '2019-11-11 09:18:15', '4', '2019-11-11 11:15:25', '4'),
(25, 2019, NULL, '1110042072', 'Azima Nurul Amrul, SE', 'Perempuan', 'Adminstrasi', 'Lembaga Penelitian (Lemlit) / LPPM', 'S-2', NULL, NULL, 1, '2019-11-11 09:23:49', '4', '2019-11-11 17:03:46', '4'),
(26, 2019, '311042072', NULL, 'Suheri., S.Kom,. M.Kom', 'Laki-Laki', NULL, NULL, 'S-2', '1', '6', 2, '2019-11-11 09:32:23', '4', NULL, NULL),
(28, 2019, '311042073', NULL, 'Nanda Syahputra S.Kom', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-11-21 09:21:16', '4', NULL, NULL),
(29, 2019, '311042074', NULL, 'Lofty Razani S.Kom', 'Laki-Laki', NULL, NULL, 'S-1', '1', '2', 2, '2019-11-21 09:21:42', '4', NULL, NULL),
(30, 2019, '311042075', NULL, 'Suraji Hariyadi', 'Laki-Laki', NULL, NULL, 'S-1', '1', '3', 2, '2019-11-21 09:24:34', '4', NULL, NULL),
(31, 2019, '311042076', NULL, 'Erma Dani Lubis', 'Perempuan', NULL, NULL, 'S-1', '3', '1', 2, '2019-11-21 09:24:53', '4', NULL, NULL),
(33, 2019, '311042077', NULL, 'Tirza Ramadani', 'Perempuan', NULL, NULL, 'S-1', '3', '1', 2, '2019-11-21 09:45:36', '4', NULL, NULL),
(34, 2019, '311042078', NULL, 'Rama Aditia', 'Laki-Laki', NULL, NULL, 'S-2', '1', '7', 2, '2019-11-21 09:46:03', '4', NULL, NULL),
(35, 2019, '311042079', NULL, 'Henni Ramadani', 'Perempuan', NULL, NULL, 'S-2', '1', '5', 2, '2019-11-21 09:46:33', '4', NULL, NULL),
(36, 2019, '3112019001', NULL, 'Abraham', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:30:26', '4', NULL, NULL),
(37, 2019, '3112019002', NULL, 'Alexander', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:30:50', '4', NULL, NULL),
(38, 2019, '3112019003', NULL, 'Adrian', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:31:12', '4', NULL, NULL),
(39, 2019, '3112019004', NULL, 'Affandi', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:31:56', '4', NULL, NULL),
(40, 2019, '3112019005', NULL, 'Bambang', 'Laki-Laki', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:32:33', '4', NULL, NULL),
(41, 2019, '3112019006', NULL, 'Lisa', 'Perempuan', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:33:50', '4', NULL, NULL),
(42, 2019, '3112019007', NULL, 'Fatimah', 'Perempuan', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:34:18', '4', NULL, NULL),
(43, 2019, '3112019008', NULL, 'Elyana', 'Perempuan', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:35:54', '4', NULL, NULL),
(44, 2019, '3112019009', NULL, 'Feby', 'Perempuan', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:36:32', '4', NULL, NULL),
(45, 2019, '3112019010', NULL, 'Flavia', 'Perempuan', NULL, NULL, 'S-1', '1', '1', 2, '2019-12-09 02:37:06', '4', NULL, NULL),
(46, 2019, '3112019011', NULL, 'Nova', 'Perempuan', NULL, NULL, 'S-1', '1', '2', 2, '2019-12-09 02:37:40', '4', NULL, NULL),
(47, 2019, '3112019012', NULL, 'David', 'Laki-Laki', NULL, NULL, 'S-2', '1', '2', 2, '2019-12-09 02:38:28', '4', NULL, NULL),
(48, 2019, '3112019013', NULL, 'Edwin', 'Laki-Laki', NULL, NULL, 'S-2', '1', '2', 2, '2019-12-09 02:39:38', '4', NULL, NULL),
(49, 2019, '3112019014', NULL, 'Edward', 'Laki-Laki', NULL, NULL, 'S-2', '1', '2', 2, '2019-12-09 02:40:25', '4', NULL, NULL),
(50, 2019, '3112019015', NULL, 'Kirana', 'Perempuan', NULL, NULL, 'S-1', '1', '4', 2, '2019-12-09 02:40:53', '4', NULL, NULL),
(51, 2019, '3112019016', NULL, 'Yoshiro', 'Laki-Laki', NULL, NULL, 'S-2', '1', '7', 2, '2019-12-09 02:42:15', '4', NULL, NULL),
(52, 2019, '3112019017', NULL, 'Rachael', 'Perempuan', NULL, NULL, 'S-2', '3', '2', 2, '2019-12-09 02:43:16', '4', NULL, NULL),
(53, 2019, '3112019018', NULL, 'Tamika', 'Perempuan', NULL, NULL, 'S-2', '3', '1', 2, '2019-12-09 02:43:56', '4', NULL, NULL),
(54, 2019, '3112019019', NULL, 'Sakura', 'Perempuan', NULL, NULL, 'S-2', '1', '6', 2, '2019-12-09 02:44:32', '4', NULL, NULL),
(55, 2019, '3112019020', NULL, 'Tania', 'Perempuan', NULL, NULL, 'S-2', '1', '5', 2, '2019-12-09 02:45:13', '4', NULL, NULL),
(56, 2019, '3112019021', NULL, 'Agnes', 'Perempuan', NULL, NULL, 'S-2', '1', '4', 2, '2019-12-09 02:45:54', '4', NULL, NULL),
(57, 2019, '311201022', NULL, 'Ulfa', 'Perempuan', NULL, NULL, 'S-2', '1', '5', 2, '2019-12-09 02:46:17', '4', NULL, NULL),
(58, 2019, '3112019023', NULL, 'Miya', 'Perempuan', NULL, NULL, 'S-2', '1', '3', 2, '2019-12-09 02:46:44', '4', NULL, NULL),
(59, 2019, '3112019024', NULL, 'Neisya', 'Perempuan', NULL, NULL, 'S-2', '1', '6', 2, '2019-12-09 02:47:28', '4', NULL, NULL),
(60, 2019, '3112019025', NULL, 'Naimah', 'Perempuan', NULL, NULL, 'S-2', '1', '2', 2, '2019-12-09 02:48:06', '4', NULL, NULL),
(61, 2019, '3112019026', NULL, 'Halimah', 'Perempuan', NULL, NULL, 'S-1', '1', '2', 2, '2019-12-09 04:21:29', '4', NULL, NULL),
(62, 2019, NULL, '2112019001', 'Fina', 'Perempuan', 'Staff', 'BPSI', 'S-1', NULL, NULL, 1, '2019-12-09 05:45:48', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_tim_pendukung`
--

CREATE TABLE `ta_tim_pendukung` (
  `No_Id` int(11) NOT NULL,
  `Kd_Penelitian` int(11) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `Tgl_Input` datetime DEFAULT NULL,
  `User_Input` varchar(100) DEFAULT NULL,
  `Tgl_Update` datetime DEFAULT NULL,
  `User_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_tim_pendukung`
--

INSERT INTO `ta_tim_pendukung` (`No_Id`, `Kd_Penelitian`, `Nama`, `Jabatan`, `Tgl_Input`, `User_Input`, `Tgl_Update`, `User_Update`) VALUES
(1, 20192, 'Pendukung 1', 'Staff Lppm', '2019-11-13 10:19:06', '4', NULL, NULL),
(2, 20192, 'Pendukung 2', 'Mahasiwa Aktif', '2019-11-13 10:19:14', '4', NULL, NULL),
(4, 20192, 'Pendukung 3', 'Staff Lppm', '2019-11-13 10:41:45', '4', '2019-11-13 12:03:48', '4'),
(5, 20195, 'Indra Gunawan', 'Staff Lppm', '2019-11-21 09:48:45', '4', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ap_user`
--
ALTER TABLE `ap_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `ref_fakultas`
--
ALTER TABLE `ref_fakultas`
  ADD UNIQUE KEY `Kd_Fakultas` (`Kd_Fakultas`);

--
-- Indeks untuk tabel `ref_programstudi`
--
ALTER TABLE `ref_programstudi`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ref_tahun`
--
ALTER TABLE `ref_tahun`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_anggota_penelitian`
--
ALTER TABLE `ta_anggota_penelitian`
  ADD PRIMARY KEY (`No_Id`);

--
-- Indeks untuk tabel `ta_anggota_pengabdian`
--
ALTER TABLE `ta_anggota_pengabdian`
  ADD PRIMARY KEY (`No_Id`);

--
-- Indeks untuk tabel `ta_buku`
--
ALTER TABLE `ta_buku`
  ADD PRIMARY KEY (`Id_Buku`);

--
-- Indeks untuk tabel `ta_fasilitas_pendukung`
--
ALTER TABLE `ta_fasilitas_pendukung`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_hak_hki`
--
ALTER TABLE `ta_hak_hki`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_hki`
--
ALTER TABLE `ta_hki`
  ADD PRIMARY KEY (`Id_Hki`);

--
-- Indeks untuk tabel `ta_jurnal`
--
ALTER TABLE `ta_jurnal`
  ADD PRIMARY KEY (`Kd_Jurnal`);

--
-- Indeks untuk tabel `ta_karyailmiah`
--
ALTER TABLE `ta_karyailmiah`
  ADD PRIMARY KEY (`Id_Karya`);

--
-- Indeks untuk tabel `ta_kegiatan`
--
ALTER TABLE `ta_kegiatan`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_kerjasama`
--
ALTER TABLE `ta_kerjasama`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_pedoman`
--
ALTER TABLE `ta_pedoman`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_pendukung_pengabdian`
--
ALTER TABLE `ta_pendukung_pengabdian`
  ADD PRIMARY KEY (`No_Id`);

--
-- Indeks untuk tabel `ta_penelitian`
--
ALTER TABLE `ta_penelitian`
  ADD PRIMARY KEY (`Kd_Penelitian`);

--
-- Indeks untuk tabel `ta_pengabdian`
--
ALTER TABLE `ta_pengabdian`
  ADD PRIMARY KEY (`Kd_Pengabdian`);

--
-- Indeks untuk tabel `ta_penulis_buku`
--
ALTER TABLE `ta_penulis_buku`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_penulis_ilmiah`
--
ALTER TABLE `ta_penulis_ilmiah`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_penulis_jurnal`
--
ALTER TABLE `ta_penulis_jurnal`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `ta_staff`
--
ALTER TABLE `ta_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nidn` (`Nidn`);

--
-- Indeks untuk tabel `ta_tim_pendukung`
--
ALTER TABLE `ta_tim_pendukung`
  ADD PRIMARY KEY (`No_Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ap_user`
--
ALTER TABLE `ap_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ref_programstudi`
--
ALTER TABLE `ref_programstudi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `ref_tahun`
--
ALTER TABLE `ref_tahun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `ta_anggota_penelitian`
--
ALTER TABLE `ta_anggota_penelitian`
  MODIFY `No_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ta_anggota_pengabdian`
--
ALTER TABLE `ta_anggota_pengabdian`
  MODIFY `No_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ta_buku`
--
ALTER TABLE `ta_buku`
  MODIFY `Id_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ta_fasilitas_pendukung`
--
ALTER TABLE `ta_fasilitas_pendukung`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ta_hak_hki`
--
ALTER TABLE `ta_hak_hki`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ta_hki`
--
ALTER TABLE `ta_hki`
  MODIFY `Id_Hki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ta_jurnal`
--
ALTER TABLE `ta_jurnal`
  MODIFY `Kd_Jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ta_karyailmiah`
--
ALTER TABLE `ta_karyailmiah`
  MODIFY `Id_Karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ta_kegiatan`
--
ALTER TABLE `ta_kegiatan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ta_kerjasama`
--
ALTER TABLE `ta_kerjasama`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ta_pedoman`
--
ALTER TABLE `ta_pedoman`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ta_pendukung_pengabdian`
--
ALTER TABLE `ta_pendukung_pengabdian`
  MODIFY `No_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ta_penulis_buku`
--
ALTER TABLE `ta_penulis_buku`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ta_penulis_ilmiah`
--
ALTER TABLE `ta_penulis_ilmiah`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ta_penulis_jurnal`
--
ALTER TABLE `ta_penulis_jurnal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ta_staff`
--
ALTER TABLE `ta_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `ta_tim_pendukung`
--
ALTER TABLE `ta_tim_pendukung`
  MODIFY `No_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
