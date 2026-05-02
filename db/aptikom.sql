-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Apr 2026 pada 18.34
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
-- Database: `aptikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `description`, `image`, `date`, `category`, `order`, `createdAt`, `updatedAt`) VALUES
(1, 'Juara 1 Kompetisi Inovasi Nasional', 'Anggota APTIKOM Jatim berhasil meraih juara pertama dalam ajang kompetisi inovasi teknologi tingkat nasional.', 'https://images.unsplash.com/photo-1579389083046-e3df9c2b3325?auto=format&fit=crop&q=80', '2023-11-20', 'Penghargaan Nasional', 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(2, 'Sertifikasi Internasional Terbanyak', 'Jawa Timur mencatatkan rekor sebagai pengelola sertifikasi kompetensi IT terbanyak di Indonesia tahun 2023.', 'https://images.unsplash.com/photo-1567427018141-0584f1ea1b8a?auto=format&fit=crop&q=80', '2023-08-15', 'Sertifikasi', 2, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(3, 'Kolaborasi Riset Institusi Teraktif', 'Kerja sama riset antar kampus di Jawa Timur mendapat apresiasi sebagai kolaborasi paling produktif.', 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80', '2023-05-10', 'Riset', 3, '2026-04-21 16:14:45', '2026-04-21 16:14:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `adminId` int(11) UNSIGNED DEFAULT NULL,
  `action` enum('create','update','delete','login','logout') NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Additional details about the action' CHECK (json_valid(`details`)),
  `createdAt` datetime NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `module` varchar(50) NOT NULL COMMENT 'posts, events, banners, users, etc.',
  `recordId` int(11) DEFAULT NULL COMMENT 'ID of the affected record',
  `ipAddress` varchar(45) DEFAULT NULL,
  `userAgent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `isActive` tinyint(1) DEFAULT 1,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `role`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'admin', 'admin@aptikom.org', '$2y$12$1mNkqF.XM7w2Pkbp6nLZxOH54QdILiHr1AX/h4hKklRsCVLHbfkYi', 'superadmin', 1, '2026-04-11 17:39:27', '2026-04-11 17:39:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Banner`
--

CREATE TABLE `Banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `backgroundImage` varchar(255) DEFAULT NULL,
  `buttonText` varchar(255) DEFAULT NULL,
  `buttonLink` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `isActive` tinyint(1) DEFAULT 1,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `backgroundImage` varchar(255) DEFAULT NULL,
  `buttonText` varchar(100) DEFAULT NULL,
  `buttonLink` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `backgroundImage`, `buttonText`, `buttonLink`, `order`, `image`, `link`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'Asosiasi Pendidikan Tinggi Informatika dan Komputer', 'Membangun talenta digital Indonesia yang unggul dan berdaya saing global melalui kolaborasi dan standar mutu pendidikan tinggi informatika.', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80', 'Bergabung Sekarang', 'https://dias.aptikom.org/', 1, 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80', 'https://dias.aptikom.org/', 1, '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(2, 'Konferensi Nasional Informatika APTIKOM Jatim 2026', 'Daftarkan diri Anda sekarang dan bergabung bersama ratusan akademisi dan praktisi terbaik di bidang informatika.', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80', 'Daftar Sekarang', '/events', 2, 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80', '/events', 1, '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(3, 'Asosiasi Pendidikan Tinggi Informatika dan Komputer (APTIKOM Jatim)', 'Membangun talenta digital Indonesia yang unggul dan berdaya saing global melalui kolaborasi dan standar mutu pendidikan tinggi informatika.', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80', 'Bergabung Sekarang', 'https://dias.aptikom.org/', 1, 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80', 'https://dias.aptikom.org/', 1, '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(4, 'Konferensi Nasional Informatika APTIKOM Jatim 2026', 'Daftarkan diri Anda sekarang dan bergabung bersama ratusan akademisi dan praktisi terbaik di bidang informatika.', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80', 'Daftar Sekarang', '/events', 2, 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80', '/events', 1, '2026-04-13 22:38:15', '2026-04-13 22:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `board_members`
--

CREATE TABLE `board_members` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `period` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `board_members`
--

INSERT INTO `board_members` (`id`, `name`, `position`, `department`, `period`, `image`, `description`, `order`, `createdAt`, `updatedAt`) VALUES
(3, 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.', 'Ketua Umum', 'Leader', NULL, 'https://randomuser.me/api/portraits/men/60.jpg', 'Guru Besar Ilmu Komputer Universitas Indonesia. Memimpin APTIKOM Jatim sejak 2018 dan telah berhasil meningkatkan kualitas pendidikan informatika nasional.', 1, '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(4, 'Dr. Rina Wulandari, M.Kom.', 'Sekretaris Jenderal', 'Leader', NULL, 'https://randomuser.me/api/portraits/women/45.jpg', 'Dosen senior di bidang Sistem Informasi, Universitas Gadjah Mada. Bertanggung jawab atas koordinasi operasional dan administrasi APTIKOM Jatim.', 2, '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(5, 'Dr. Agus Santoso, M.T.', 'Ketua Departemen Kurikulum', 'Kurikulum', '2024-2027', 'https://randomuser.me/api/portraits/men/32.jpg', 'Ahli kurikulum informatika.', 3, '2026-04-13 23:45:25', '2026-04-13 23:45:25'),
(6, 'Dr. Linda Sari, M.Kom.', 'Ketua Departemen Kerjasama Internasional', 'Kerjasama', NULL, 'https://randomuser.me/api/portraits/women/32.jpg', 'Fokus pada kerjasama global.', 11, '2026-04-13 23:45:25', '2026-04-13 23:45:25'),
(7, 'Ir. Bambang Wijaya, Ph.D.', 'Ketua Departemen Riset dan Inovasi', 'Riset', NULL, 'https://randomuser.me/api/portraits/men/44.jpg', 'Mendorong inovasi teknologi.', 12, '2026-04-13 23:45:25', '2026-04-13 23:45:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `officeName` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postalCode` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `weekdayHours` varchar(100) DEFAULT NULL,
  `weekendHours` varchar(100) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_info`
--

INSERT INTO `contact_info` (`id`, `type`, `value`, `label`, `createdAt`, `updatedAt`, `officeName`, `address`, `city`, `province`, `postalCode`, `phone`, `email`, `weekdayHours`, `weekendHours`, `latitude`, `longitude`, `facebook`, `twitter`, `instagram`, `linkedin`) VALUES
(1, '', '', NULL, '2026-04-11 22:12:27', '2026-04-21 16:16:45', 'APTIKOM Jatim', 'Kampus STIMATA Malang', 'Malang', 'Jawa Timur', '55283', '+62 274 884201', 'sekretariat@aptikomjatim.or.id', 'Senin – Jumat: 08.00 – 16.00 WIB', 'Sabtu – Minggu: Tutup', '-7.75466', '110.40712', 'https://facebook.com/aptikom', 'https://twitter.com/aptikom', 'https://instagram.com/aptikom', 'https://linkedin.com/company/aptikom'),
(2, '', '', NULL, '2026-04-13 22:38:15', '2026-04-13 22:38:15', 'APTIKOM Jatim', 'Jl. AMIKOM No. 1, Condongcatur', 'Sleman, Yogyakarta', 'Daerah Istimewa Yogyakarta', '55283', '+62 274 884201', 'sekretariat@aptikom.org', 'Senin – Jumat: 08.00 – 16.00 WIB', 'Sabtu – Minggu: Tutup', '-7.75466', '110.40712', 'https://facebook.com/aptikom', 'https://twitter.com/aptikom', 'https://instagram.com/aptikom', 'https://linkedin.com/company/aptikom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `isRead`, `createdAt`, `updatedAt`) VALUES
(1, 'Ahmad Fauzi', 'ahmad.fauzi@univ.ac.id', 'Pertanyaan Keanggotaan Institusi', 'Salam hormat. Kami dari Universitas Nusantara ingin mendaftarkan institusi kami sebagai anggota APTIKOM. Mohon informasi mengenai prosedur dan persyaratan pendaftaran.', 1, '2026-04-11 22:12:27', '2026-04-11 23:25:32'),
(2, 'Dewi Lestari', 'dewi.lestari@prodi.ac.id', 'Informasi Seminar Nasional', 'Kami tertarik untuk berpartisipasi dalam Seminar Nasional APTIKOM 2026. Bisakah kami mendapatkan informasi lebih lanjut mengenai pendaftaran abstrak dan jadwal presentasi?', 1, '2026-04-10 22:12:27', '2026-04-11 23:25:43'),
(3, 'Ahmad Fauzi', 'test@university.ac.id', 'Pertanyaan tentang keanggotaan', 'Kami ingin mendaftarkan institusi sebagai anggota APTIKOM, mohon informasi prosedurnya.', 1, '2026-04-11 22:34:45', '2026-04-11 23:21:07'),
(4, 'Valid Name', 'test@example.com', 'XSS Test', '&#60;script&#62;alert(&#39;XSS&#39;)&#60;/script&#62;', 1, '2026-04-12 00:31:33', '2026-04-12 00:34:06'),
(5, 'Ahmad Fauzi', 'ahmad.fauzi@univ.ac.id', 'Pertanyaan Keanggotaan Institusi', 'Salam hormat. Kami dari Universitas Nusantara ingin mendaftarkan institusi kami sebagai anggota APTIKOM Jatim. Mohon informasi mengenai prosedur dan persyaratan pendaftaran.', 1, '2026-04-13 22:38:15', '2026-04-21 16:05:27'),
(6, 'Dewi Lestari', 'dewi.lestari@prodi.ac.id', 'Informasi Seminar Nasional', 'Kami tertarik untuk berpartisipasi dalam Seminar Nasional APTIKOM Jatim 2026. Bisakah kami mendapatkan informasi lebih lanjut mengenai pendaftaran abstrak dan jadwal presentasi?', 1, '2026-04-12 22:38:15', '2026-04-21 16:05:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `documents`
--

INSERT INTO `documents` (`id`, `title`, `category`, `fileUrl`, `size`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Panduan Kurikulum OBE Program Studi Informatika 2026', 'Panduan', 'https://drive.google.com/file/d/sample1', '2.4 MB', 'Panduan lengkap implementasi kurikulum berbasis Outcome-Based Education (OBE) untuk program studi Informatika, Sistem Informasi, dan Teknik Komputer.', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(2, 'Edaran Digitalisasi Administrasi Akademik No. 04/APTIKOM Jatim/2026', 'Edaran', 'https://drive.google.com/file/d/sample2', '856 KB', 'Surat edaran resmi mengenai standar digitalisasi administrasi akademik untuk seluruh perguruan tinggi anggota APTIKOM Jatim.', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(3, 'Panduan Kurikulum OBE Program Studi Informatika 2026', 'Panduan', 'https://drive.google.com/file/d/sample1', '2.4 MB', 'Panduan lengkap implementasi kurikulum berbasis Outcome-Based Education (OBE) untuk program studi Informatika, Sistem Informasi, dan Teknik Komputer.', '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(4, 'Edaran Digitalisasi Administrasi Akademik No. 04/APTIKOM Jatim/2026', 'Edaran', 'https://drive.google.com/file/d/sample2', '856 KB', 'Surat edaran resmi mengenai standar digitalisasi administrasi akademik untuk seluruh perguruan tinggi anggota APTIKOM Jatim.', '2026-04-13 22:38:15', '2026-04-13 22:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'open',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `location`, `type`, `description`, `link`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 'Workshop Akreditasi Program Studi Informatika LAMDIK', '2026-04-25', 'Zoom Meeting (Daring)', 'Workshop', 'Workshop intensif membahas persiapan akreditasi program studi informatika berdasarkan instrumen LAMDIK terbaru. Peserta akan mendapatkan panduan langkah demi langkah dalam menyusun borang akreditasi.', 'https://aptikom.org/workshop-akreditasi', 'open', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(3, 'Konferensi Nasional Informatika APTIKOM Jatim 2026', '2026-05-13', 'Bali Nusa Dua Convention Center', 'Konferensi', 'Konferensi tahunan yang mempertemukan akademisi, peneliti, dan praktisi di bidang informatika dari seluruh Indonesia. Akan ada sesi presentasi makalah, panel diskusi, dan pameran inovasi teknologi.', 'https://aptikom.org/konferensi-2026', 'open', '2026-04-13 22:38:15', '2026-04-13 22:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `study_program` varchar(150) DEFAULT NULL,
  `role` enum('Mahasiswa','Dosen','Umum') DEFAULT 'Mahasiswa',
  `notes` text DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `registered_at` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `event_id`, `full_name`, `institution`, `email`, `phone`, `study_program`, `role`, `notes`, `status`, `registered_at`, `updatedAt`) VALUES
(1, 1, 'M. Taufiq', 'STIKOM PGRI Banyuwangi', 'mtaufiq39@yahoo.com', '085746794674', 'D3 Manajemen Informatika', 'Dosen', 'Saya daftar pribadi', 'confirmed', '2026-04-11 23:53:05', '2026-04-11 23:55:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `individual_members`
--

CREATE TABLE `individual_members` (
  `id` int(11) UNSIGNED NOT NULL,
  `employeeNumber` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `affiliation` varchar(255) NOT NULL,
  `studyProgram` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `validityPeriod` date NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `individual_members`
--

INSERT INTO `individual_members` (`id`, `employeeNumber`, `name`, `affiliation`, `studyProgram`, `role`, `province`, `validityPeriod`, `createdAt`, `updatedAt`) VALUES
(1, 'NPP-2026-001', 'Dr. Budi Santoso, M.T.', 'Institut Teknologi Bandung', 'Teknik Informatika', 'Dosen', 'Jawa Barat', '2026-12-31', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(2, 'NPP-2026-002', 'Dr. Siti Rahayu, M.Cs.', 'Universitas Gadjah Mada', 'Sistem Informasi', 'Dosen', 'DI Yogyakarta', '2026-12-31', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(3, 'NPP-2026-001', 'Dr. Budi Santoso, M.T.', 'Institut Teknologi Bandung', 'Teknik Informatika', 'Dosen', 'Jawa Barat', '2026-12-31', '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(4, 'NPP-2026-002', 'Dr. Siti Rahayu, M.Cs.', 'Universitas Gadjah Mada', 'Sistem Informasi', 'Dosen', 'DI Yogyakarta', '2026-12-31', '2026-04-13 22:38:15', '2026-04-13 22:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Journal`
--

CREATE TABLE `Journal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_institutions`
--

CREATE TABLE `member_institutions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member_institutions`
--

INSERT INTO `member_institutions` (`id`, `name`, `type`, `province`, `logo`, `website`, `createdAt`, `updatedAt`) VALUES
(1, 'Institut Teknologi Bandung', 'PTN', 'Jawa Barat', 'https://upload.wikimedia.org/wikipedia/id/thumb/b/b0/Institut_Teknologi_Bandung_logo.svg/1200px-Institut_Teknologi_Bandung_logo.svg.png', 'https://www.itb.ac.id', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(2, 'Universitas Gadjah Mada', 'PTN', 'DI Yogyakarta', 'https://upload.wikimedia.org/wikipedia/id/thumb/7/7c/UGM_logo.svg/1200px-UGM_logo.svg.png', 'https://www.ugm.ac.id', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(3, 'Institut Teknologi Bandung', 'PTN', 'Jawa Barat', 'https://upload.wikimedia.org/wikipedia/id/thumb/b/b0/Institut_Teknologi_Bandung_logo.svg/1200px-Institut_Teknologi_Bandung_logo.svg.png', 'https://www.itb.ac.id', '2026-04-13 22:38:15', '2026-04-13 22:38:15'),
(4, 'Universitas Gadjah Mada', 'PTN', 'DI Yogyakarta', 'https://upload.wikimedia.org/wikipedia/id/thumb/7/7c/UGM_logo.svg/1200px-UGM_logo.svg.png', 'https://www.ugm.ac.id', '2026-04-13 22:38:15', '2026-04-13 22:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-04-11-161407', 'App\\Database\\Migrations\\CreateAdminsTable', 'default', 'App', 1775929165, 1),
(2, '2026-04-11-161408', 'App\\Database\\Migrations\\CreateAchievementsTable', 'default', 'App', 1775929165, 1),
(3, '2026-04-11-161409', 'App\\Database\\Migrations\\CreateActivityLogsTable', 'default', 'App', 1775929165, 1),
(4, '2026-04-11-161409', 'App\\Database\\Migrations\\CreateBannersTable', 'default', 'App', 1775929165, 1),
(5, '2026-04-11-161409', 'App\\Database\\Migrations\\CreateContactInfoTable', 'default', 'App', 1775929165, 1),
(6, '2026-04-11-161410', 'App\\Database\\Migrations\\CreateContactMessagesTable', 'default', 'App', 1775929165, 1),
(7, '2026-04-11-161410', 'App\\Database\\Migrations\\CreatePartnersTable', 'default', 'App', 1775929165, 1),
(8, '2026-04-11-170001', 'App\\Database\\Migrations\\CreatePostsTable', 'default', 'App', 1775929165, 1),
(9, '2026-04-11-170002', 'App\\Database\\Migrations\\CreateEventsTable', 'default', 'App', 1775929165, 1),
(10, '2026-04-11-170003', 'App\\Database\\Migrations\\CreateIndividualMembersTable', 'default', 'App', 1775929165, 1),
(11, '2026-04-11-170004', 'App\\Database\\Migrations\\CreateMemberInstitutionsTable', 'default', 'App', 1775929165, 1),
(12, '2026-04-11-170005', 'App\\Database\\Migrations\\CreateDocumentsTable', 'default', 'App', 1775929165, 1),
(13, '2026-04-11-173000', 'App\\Database\\Migrations\\UpdateContactInfoExtended', 'default', 'App', 1775929165, 1),
(14, '2026-04-11-190000', 'App\\Database\\Migrations\\CreateBoardMembersTable', 'default', 'App', 1775929877, 2),
(15, '2026-04-11-175142', 'App\\Database\\Migrations\\AddSlugToPosts', 'default', 'App', 1775929961, 3),
(16, '2026-04-11-175143', 'App\\Database\\Migrations\\AddBannerFields', 'default', 'App', 1775929961, 3),
(17, '2026-04-12-121000', 'App\\Database\\Migrations\\AddDepartmentAndPeriodToBoardMembers', 'default', 'App', 1775972961, 4),
(18, '2026-04-14-004318', 'App\\Database\\Migrations\\AddMissingFieldsToOrganizationProfile', 'default', 'App', 1776127447, 5),
(19, '2026-04-21-160130', 'App\\Database\\Migrations\\AddStatusToEvents', 'default', 'App', 1776787307, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `OrganizationProfile`
--

CREATE TABLE `OrganizationProfile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'APTIKOM',
  `fullName` varchar(255) NOT NULL DEFAULT 'Asosiasi Pendidikan Tinggi Informatika dan Komputer',
  `abbreviation` varchar(255) DEFAULT 'APTIKOM',
  `establishedDate` date DEFAULT NULL,
  `legalStatus` varchar(255) DEFAULT NULL,
  `registrationNumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `chairperson` varchar(255) DEFAULT NULL,
  `secretary` varchar(255) DEFAULT NULL,
  `treasurer` varchar(255) DEFAULT NULL,
  `totalMembers` int(11) DEFAULT 0,
  `totalInstitutions` int(11) DEFAULT 0,
  `history` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `goals` text DEFAULT NULL,
  `objectives` text DEFAULT NULL,
  `structure` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `updatedAt` datetime NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `weekdayHours` varchar(100) DEFAULT NULL,
  `weekendHours` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `OrganizationProfile`
--

INSERT INTO `OrganizationProfile` (`id`, `name`, `fullName`, `abbreviation`, `establishedDate`, `legalStatus`, `registrationNumber`, `email`, `phone`, `address`, `city`, `province`, `postalCode`, `website`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `chairperson`, `secretary`, `treasurer`, `totalMembers`, `totalInstitutions`, `history`, `vision`, `mission`, `goals`, `objectives`, `structure`, `logo`, `updatedAt`, `latitude`, `longitude`, `weekdayHours`, `weekendHours`) VALUES
(1, 'APTIKOM Jatim', 'Asosiasi Pendidikan Tinggi Informatika dan Komputer Jawa Timur', 'APTIKOM Jatim', '2000-11-20', 'Perkumpulan Terdaftar', 'AHU-0000000.AH.01.07.TAHUN 2026', 'sekretariat@aptikomjatim.or.id', '081234567890', 'STIMATA Malang', 'Malang', 'Jawa Timur', '60231', 'https://aptikomjatim.or.id', 'https://facebook.com/aptikomjatim', 'https://twitter.com/aptikomjatim', 'https://instagram.com/aptikomjatim', 'https://linkedin.com/company/aptikomjatim', 'https://youtube.com/aptikomjatim', 'Yoyon Arie Budi S. M.Kom', 'Dr. Husni Teja Sukmana, S.T., M.Sc.', 'Prof. Dr. Ema Utami, S.Si, M.Kom', 1600, 100, 'APTIKOM Jatim didirikan untuk menjawab tantangan perkembangan teknologi informasi yang semakin pesat di Indonesia. Para pendiri menyadari perlunya sebuah wadah yang dapat menyatukan perguruan tinggi di bidang informatika untuk saling berkolaborasi.\n\nBeberapa dekade selanjutnya, APTIKOM Jatim berhasil mendorong standar akreditasi dan integrasi kompetensi digital ke seluruh pelosok tanah air.', 'Menjadi wadah berhimpunnya perguruan tinggi informatika dan komputer yang unggul dan berdaya saing global.', '<ul><li>Meningkatkan kualitas sumber daya manusia di bidang informatika.</li><li>Mendorong kegiatan riset dan inovasi.</li><li>Memperkuat kolaborasi antar anggota dan pihak industri.</li></ul>', '<ul><li>Menyusun standar kurikulum nasional berbasis OBE.</li><li>Memfasilitasi akreditasi internasional bagi program studi.</li></ul>', 'Meningkatkan indeks daya saing talenta digital Indonesia secara global.', '<ul><li>Dewan Penasihat</li><li>Ketua Umum</li><li>Sekretaris Jenderal</li><li>Bendahara</li><li>Divisi-Divisi Program Kerja</li></ul>', NULL, '0000-00-00 00:00:00', '-7.75466', '110.40712', 'Senin – Jumat: 08:00 – 16:00', 'Sabtu – Minggu: Tutup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Partner`
--

CREATE TABLE `Partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE `partners` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `displayOrder` int(11) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `website`, `displayOrder`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'Microsoft', 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg', 'https://microsoft.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(2, 'Google', 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg', 'https://google.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(3, 'Cisco', 'https://upload.wikimedia.org/wikipedia/commons/0/08/Cisco_logo_blue_2016.svg', 'https://cisco.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(4, 'AWS', 'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg', 'https://aws.amazon.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(5, 'Intel', 'https://upload.wikimedia.org/wikipedia/commons/7/7d/Intel_logo_%282020%29.svg', 'https://intel.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45'),
(6, 'IBM', 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg', 'https://ibm.com', 0, 1, '2026-04-21 16:14:45', '2026-04-21 16:14:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `excerpt` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'published',
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `excerpt`, `status`, `image`, `category`, `createdAt`, `updatedAt`) VALUES
(1, 'APTIKOM Jatim Selenggarakan Seminar Nasional Transformasi Digital 2026', 'aptikom-seminar-nasional-transformasi-digital-2026', '<p>APTIKOM Jatim kembali menyelenggarakan Seminar Nasional Transformasi Digital yang diikuti oleh lebih dari 500 peserta dari seluruh perguruan tinggi anggota. Seminar ini menghadirkan pembicara dari industri teknologi terkemuka di Indonesia.</p><p>Acara berlangsung selama dua hari di Jakarta Convention Center dan membahas topik-topik strategis seperti kecerdasan buatan, komputasi awan, dan keamanan siber.</p>', 'APTIKOM Jatim menyelenggarakan Seminar Nasional Transformasi Digital dengan 500+ peserta dari seluruh perguruan tinggi anggota.', 'published', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80', 'Kegiatan', '2026-04-11 22:12:27', '2026-04-11 22:12:27'),
(2, 'Pembaruan Panduan Kurikulum OBE untuk Program Studi Informatika', 'pembaruan-panduan-kurikulum-obe-informatika', '<p>APTIKOM Jatim menerbitkan panduan kurikulum terbaru berbasis Outcome-Based Education (OBE) yang disesuaikan dengan kebutuhan industri dan standar internasional tahun 2026. Panduan ini menjadi acuan bagi seluruh program studi informatika di Indonesia.</p><p>Dokumen ini dapat diunduh melalui portal resmi APTIKOM Jatim dan mencakup template silabus, rubrik penilaian, serta panduan implementasi OBE.</p>', 'APTIKOM Jatim menerbitkan panduan kurikulum OBE terbaru yang menjadi acuan bagi seluruh program studi informatika di Indonesia.', 'published', 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80', 'Publikasi', '2026-04-08 22:12:27', '2026-04-08 22:12:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_admin_id` (`adminId`),
  ADD KEY `activity_logs_module` (`module`),
  ADD KEY `activity_logs_action` (`action`),
  ADD KEY `activity_logs_created_at` (`createdAt`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indeks untuk tabel `Banner`
--
ALTER TABLE `Banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `board_members`
--
ALTER TABLE `board_members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_event` (`event_id`),
  ADD KEY `idx_email` (`email`);

--
-- Indeks untuk tabel `individual_members`
--
ALTER TABLE `individual_members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Journal`
--
ALTER TABLE `Journal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member_institutions`
--
ALTER TABLE `member_institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `OrganizationProfile`
--
ALTER TABLE `OrganizationProfile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Partner`
--
ALTER TABLE `Partner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `Banner`
--
ALTER TABLE `Banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `individual_members`
--
ALTER TABLE `individual_members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Journal`
--
ALTER TABLE `Journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member_institutions`
--
ALTER TABLE `member_institutions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `OrganizationProfile`
--
ALTER TABLE `OrganizationProfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `Partner`
--
ALTER TABLE `Partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
