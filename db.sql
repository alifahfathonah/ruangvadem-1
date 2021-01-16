-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jan 2021 pada 12.24
-- Versi server: 10.2.36-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oguw2144_ruangvadem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cookie`
--

CREATE TABLE `cookie` (
  `id_cookie` int(11) NOT NULL,
  `isi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `date_edit` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`id_document`, `gambar`, `tipe`, `urutan`, `date_added`, `date_edit`) VALUES
(21, '453GT1VlTms', 'video', 7, '2020-12-28 12:21:07', '2020-12-28 12:21:07'),
(24, 'film1.jpg', 'foto', 4, '2020-12-29 16:11:47', '2020-12-29 16:11:47'),
(23, 'filam1.jpg', 'foto', 3, '2020-12-29 16:11:31', '2020-12-29 16:11:31'),
(22, 'seni_per1.jpg', 'foto', 2, '2020-12-29 16:09:16', '2020-12-29 16:09:16'),
(17, 'pergera1.jpg', 'foto', 1, '2020-12-23 04:30:18', '2020-12-23 04:30:18'),
(25, 'LOm-HZwcTac', 'video', 10, '2020-12-29 16:15:00', '2020-12-29 16:15:00'),
(26, 'mwpnJ-IgWFk', 'video', 8, '2020-12-29 23:09:44', '2020-12-29 23:09:44'),
(38, 'slide1.jpg', 'slider', 11, '2021-01-16 02:43:05', '2021-01-16 02:43:05'),
(36, 'ffL-KvAo7VE', 'video', 13, '2021-01-11 12:20:07', '2021-01-11 12:20:07'),
(39, 'slidess.jpg', 'slider', 12, '2021-01-16 02:43:35', '2021-01-16 02:43:35'),
(40, 'wa.jpg', 'slider', 14, '2021-01-16 02:47:13', '2021-01-16 02:47:13'),
(41, 'DAA0pjHJJOM', 'video', 15, '2021-01-16 02:53:13', '2021-01-16 02:53:13'),
(42, 'bag.jpg', 'foto', 16, '2021-01-16 03:04:48', '2021-01-16 03:04:48'),
(43, 'ba.jpg', 'foto', 17, '2021-01-16 03:05:02', '2021-01-16 03:05:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_merchandise`
--

CREATE TABLE `gambar_merchandise` (
  `id_gambar_merchandise` int(11) NOT NULL,
  `id_merchandise` int(11) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `urutan` int(20) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_merchandise`
--

INSERT INTO `gambar_merchandise` (`id_gambar_merchandise`, `id_merchandise`, `gambar`, `urutan`, `date_add`, `date_edit`) VALUES
(1, 6, '1wass1.jpg', 1, '2021-01-11 04:17:54', '2021-01-02 02:28:20'),
(14, 6, '21.jpg', 2, '2021-01-11 04:18:18', '2021-01-11 03:35:49'),
(15, 12, 'sou1.jpg', 1, '2021-01-11 04:11:53', '2021-01-11 03:55:27'),
(16, 12, '2_s1.jpg', 2, '2021-01-11 04:11:06', '2021-01-11 03:58:19'),
(17, 12, '3s.jpg', 3, '2021-01-11 04:10:48', '2021-01-11 04:10:48'),
(18, 12, '4ss.jpg', 4, '2021-01-11 04:12:20', '2021-01-11 04:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_project`
--

CREATE TABLE `gambar_project` (
  `id_gambar_project` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_project`
--

INSERT INTO `gambar_project` (`id_gambar_project`, `id_project`, `judul_gambar`, `gambar`, `urutan`, `date_added`, `date_edit`) VALUES
(14, 20, 'Seni Rupa Pergerakan 1 Mural TK Dusun Munggur Desa  Munggung ', 'munggur_1.jpg', 1, '2021-01-06 07:44:12', '2021-01-06 07:44:12'),
(15, 24, 'img3', 'img_3.jpg', 1, '2021-01-06 07:44:15', '2021-01-06 07:44:15'),
(16, 21, 'img4', 'img_4.jpg', 1, '2021-01-06 07:44:16', '2021-01-06 07:44:16'),
(17, 22, 'Pameran Online INPINITI 2020', 'ss.jpg', 1, '2021-01-06 07:44:17', '2021-01-06 07:44:17'),
(18, 23, 'img6', 'img_6.jpg', 1, '2021-01-06 07:44:18', '2021-01-06 07:44:18'),
(19, 19, 'Seni Rupa Pergerakan 1 Mural TK Desa Jurug ', 'jurug_1.jpg', 1, '2021-01-06 07:44:21', '2021-01-06 07:44:21'),
(20, 22, 'Pengantar Pameran Online INPINITI 2020', 'asa.jpg', 2, '2021-01-11 02:51:29', '2021-01-11 02:51:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `judul_kategori` varchar(200) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `date_added`, `date_edit`) VALUES
(1, 'Pameran', '2020-12-18 09:47:32', '2020-12-18 09:47:32'),
(2, 'Pengabdian', '2020-12-18 09:47:46', '2020-12-18 09:47:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `home_deskripsi` text DEFAULT NULL,
  `project_deskripsi` text DEFAULT NULL,
  `document_deskripsi` text DEFAULT NULL,
  `merchant_deskripsi` text DEFAULT NULL,
  `team_deskripsi` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `tentang`, `deskripsi`, `home_deskripsi`, `project_deskripsi`, `document_deskripsi`, `merchant_deskripsi`, `team_deskripsi`, `email`, `alamat`, `icon`, `keywords`, `facebook`, `youtube`, `instagram`) VALUES
(1, '', 'Hotel Bumi Wiyata is a three stars hotel that located on Jl. Margonda Raya Depok 16423 West Java.Â \r\n\r\nHotel Bumi Wiyata has 13 ha areas and 91 Rooms which divided into six types of room; Standard Room, Superior Room, Deluxe Superior Room, Suite Room, Deluxe Suite Room & Executive Room.\r\n\r\nHotel Bumi Wiyata is the perfect choice for your business activity, gathering, wedding, outbound and family. With the concept of the greatest hotel for recreational meeting surrounding with traditional nature, various facilities and warm hospitality will makes all your event become a memorable one.', '<p><span style=\"font-size: 18px;\"><strong>(<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>\r\n<p><span style=\"font-size: 18px;\"><strong><img src=\"file:///C:/Users/ASUS/Documents/youtube/web/header.jpg\" alt=\"\" /></strong></span>Komunitas Non Profit Seni Rupa, Desain &amp; Multimedia Dengan Program Pameran Seni Rupa, Seni Rupa Pergerakan (Donasi Mural TK), Produksi Film Pendek, Bimbel Gambar, Desain dan Multimedia, Berbagi Berkah, Merchandise dll.</p>\r\n<pre id=\"tw-target-text\" class=\"tw-data-text tw-text-large XcVN5d tw-ta\" dir=\"ltr\" data-placeholder=\"Terjemahan\"><span lang=\"en\">Non-Profit Community Fine Arts, Design &amp; Multimedia <br />with Programs such as Fine Art Exhibitions, Art Movements <br />(Kindergarten Mural Donations), Short Film Production, <br />Drawing Courses, Design and Multimedia, Sharing Blessings, <br />Merchandise etc.</span></pre>\r\n<p>&nbsp;</p>', '<p><span style=\"font-size: 18px;\"><strong>RUANG VADEM (<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>', '<p><span style=\"font-size: 18px;\"><strong>RUANG VADEM (<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>\r\n<p>&nbsp;</p>', '<p><span style=\"font-size: 18px;\"><strong>RUANG VADEM (<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>', '<p><span style=\"font-size: 18px;\"><strong>RUANG VADEM (<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>', 'vadmartworkeducation@gmail.com', '<p><a title=\"Lokasi\" href=\"https://goo.gl/maps/8KVez4LuxzpSC1Dj7\" target=\"_blank\" rel=\"noopener\"><span style=\"font-size: 18px;\"><strong>MABES RUANG VADEM </strong></span></a></p>\r\n<p><span style=\"font-size: 18px;\"><strong>(<em>VISUAL ART DESIGN MULTIMEDIA EDUCATION</em>)</strong></span></p>\r\n<p>Jl. Puntodewo no. 38 RT 02, RW 02, Dukuh, Surodipo, Wayang, Pulung, Kabupaten Ponorogo, Jawa Timur 63481</p>\r\n<p>&nbsp;</p>', 'VADMREBORNt1.jpg', 'ruang vadem education seni rupa desain multimedia fotografi film pendidikan wirausaha', 'https://www.facebook.com/ruangvadem/', 'https://www.youtube.com/c/RuangVadem', 'https://www.instagram.com/ruangvadem/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `hari` date DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchandise`
--

CREATE TABLE `merchandise` (
  `id_merchandise` int(11) NOT NULL,
  `nama_merchandise` varchar(200) DEFAULT NULL,
  `harga_merchandise` int(100) DEFAULT NULL,
  `deskripsi_merchandise` text DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merchandise`
--

INSERT INTO `merchandise` (`id_merchandise`, `nama_merchandise`, `harga_merchandise`, `deskripsi_merchandise`, `date_added`) VALUES
(6, 'Kriya Wayang Khas Ponorogo', 250000, '<p>Wayang Khas Ponorogo merupakan inovasi terbaru kerajinan wayang berbahan dasar goni berkarakter Tokoh Reog Ponorogo. Kerajinan ini sebagai bentuk ekspresi milenial dalam melestarikan kebudayaan wayang dengan memadukan kesenian daerah. Alasan pemilihan tema wayang dalam kerajinan ini yaitu ingin memperkenalkan budaya kesenian Ponorogo agar semakin dikenal di era modern seperti saat sekarang.<br />Kerajinan 3 dimensi yang merupakan perpaduan dari bahan bekas ini bernilai ekonomis dan multifungsi, dimana salah satu fungsinya untuk meningkatkan nilai estetika dan dapat dijadikan sebagai barang terapan. Keunggulan dari karya ini adalah originalitas dari pencipta sehingga minim sekali unsur plagiasi dan bisa dibilang kerajinan ini 100% pertama dan belum pernah ada sebelumnya.</p>\r\n<p>Info Selanjutnya</p>\r\n<p>Wiwin +62 858-6070-2105</p>\r\n<p>Maris +62 822-3727-1726</p>', '2020-12-25 17:48:43'),
(12, 'Soul Bot', 15000, '<p>Souvenir Kelobot Ponoreyog adalah kerajinan tangan yang terbuat dari bahan dasar kelobot (kulit jagung) dan berkarakter tokoh-tokoh Reyog Ponorogo. Kami membuat inovasi dengan memanfaatkan kelobot sebagai bahan dasarnya karena kelobot banyak dijumpai di daerah kami dan jarang sekali yang mampu mengolahnya. Souvenir ini multiguna bisa dibuat untuk gantungan kunci, hiasan pensil/bolpoin dan masih banyak lagi. Souvenir ini lebih berkesan lucu, unik, menarik, dan tentunya ramah lingkungan karena terbuat dari serat alam.</p>\r\n<p>Info Selanjutnya :</p>\r\n<p>Retno +62 822-3405-3016</p>\r\n<p>Dita +62 838-4541-1045</p>', '2021-01-08 09:32:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `judul_project` varchar(255) DEFAULT NULL,
  `deskripsi_project` text DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `status_project` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `judul_project`, `deskripsi_project`, `tahun`, `status_project`, `urutan`, `created_at`, `updated_at`) VALUES
(21, 'Seni Rupa Pergerakan 3 Mural TK Dusun Sambi Desa Klepu Kec. Sooko Kab. Ponorogo', '<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Seni rupa pergerakan merupakan salah satu kegiatan dari komunitas ruang vadem. Seni rupa pergerakan merupakan sebuah kegiatan menggambar mural yang dilakukan di Sekolah Taman Kanak-kanak secara gratis, biaya diperoleh dari komunitas dan para donatur. Kali ini ruang vadem melakukan kegiatan seni rupa pergerakan di TK Dharma Wanita Dukuh Munggur Desa Munggung Kecamatan Pulung Kabupaten Ponorogo. Proses pengerjaan mural berlangsung pada tanggal 2 Desember 2020 hingga 4 Desember 2020.&nbsp;</span></p>\r\n<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Seni Rupa Pergerakan ini dilakukan dimasa pandemi di desa Klepu dusun Sambi kecamatan Sooko kabupaten Ponorogo dengan prosedur SOP Covid-19. </span><a class=\"\\&quot;yt-simple-endpoint\" dir=\"\\&quot;auto\\&quot;\" spellcheck=\"\\&quot;false\\&quot;\" href=\"\\&quot;https:/www.youtube.com/redirect?event=video_description&amp;v=mwpnJ-IgWFk&amp;q=https%3A%2F%2Fgoo.gl%2Fmaps%2Fqhwz1toZazJysv7o7%3Fentry%3Dyt&amp;redir_token=QUFFLUhqbUNYVDFwMFVEbm5IcUQ0bzhKbFZFTGVkcUZwZ3xBQ3Jtc0trRC1HU2xmWWxwR0lxeGwtWHRlTjF3c3N2bzJhVkRJZmFrVEJOT2FCYTl2WmVRNTZISjEtV3pnMlNBQkF0QUlWMjN2VXAwTG5IZzhyejhGdFc3RUQxQUFfT0YyYlRTU2MxVlBQWHFYM05sY05JSHVfVQ%3D%3D\\&quot;\" target=\"\\&quot;_blank\\&quot;\" rel=\"\\&quot;nofollow\">https://goo.gl/maps/qhwz1toZazJysv7o7</a></p>', 2020, 'Draft', 3, '2021-01-06 07:39:14', '2021-01-06 07:39:14'),
(22, 'Pameran Seni Rupa Online \"INPINIITI\"', '', 2020, 'Publish', 4, '2021-01-06 07:39:22', '2021-01-06 07:39:22'),
(23, 'Berbagi Berkah ', NULL, 2020, 'Draft', 5, '2021-01-06 07:39:29', '2021-01-06 07:39:29'),
(24, 'Bimbingan Belajar Gambar', NULL, 2020, 'Draft', 6, '2021-01-06 07:40:15', '2021-01-06 07:40:15'),
(20, 'Seni Rupa Pergerakan 2 Mural TK Dusun Munggur Desa  Munggung Kec. Pulung Kab. Ponorogo', '<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Seni rupa pergerakan merupakan salah satu kegiatan dari komunitas ruang vadem. Seni rupa pergerakan merupakan sebuah kegiatan menggambar mural yang dilakukan di Sekolah Taman Kanak-kanak secara gratis, biaya diperoleh dari komunitas dan para donatur. Kali ini ruang vadem melakukan kegiatan seni rupa pergerakan di TK Dharma Wanita Dukuh Munggur Desa Munggung Kecamatan Pulung Kabupaten Ponorogo. Proses pengerjaan mural berlangsung pada tanggal 22 Agustus 2020 hingga 23 Agustus 2020.&nbsp;</span></p>\r\n<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Seni Rupa Pergerakan ini dilakukan dimasa pandemi di desa Munggung dusun Munggur kecamatan Pulung kabupaten Ponorogo dengan prosedur SOP Covid-19. </span><a class=\"\\&quot;yt-simple-endpoint\" dir=\"\\&quot;auto\\&quot;\" spellcheck=\"\\&quot;false\\&quot;\" href=\"\\&quot;https:/www.youtube.com/redirect?event=video_description&amp;v=mwpnJ-IgWFk&amp;q=https%3A%2F%2Fgoo.gl%2Fmaps%2Fqhwz1toZazJysv7o7%3Fentry%3Dyt&amp;redir_token=QUFFLUhqbUNYVDFwMFVEbm5IcUQ0bzhKbFZFTGVkcUZwZ3xBQ3Jtc0trRC1HU2xmWWxwR0lxeGwtWHRlTjF3c3N2bzJhVkRJZmFrVEJOT2FCYTl2WmVRNTZISjEtV3pnMlNBQkF0QUlWMjN2VXAwTG5IZzhyejhGdFc3RUQxQUFfT0YyYlRTU2MxVlBQWHFYM05sY05JSHVfVQ%3D%3D\\&quot;\" target=\"\\&quot;_blank\\&quot;\" rel=\"\\&quot;nofollow\">https://goo.gl/maps/qhwz1toZazJysv7o7</a></p>', 2020, 'Publish', 2, '2021-01-06 07:39:05', '2021-01-06 07:39:05'),
(19, 'Seni Rupa Pergerakan 1 Mural TK Desa Jurug Kec. Sooko Kab. Ponorogo', '<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Program Ruang Vadem menggambar mural di sekolah Taman Kanak-kanak sekitar pinggiran Kabupaten Ponorogo merupakan kegiatan gratis tanpa biaya, karena pembiayaan menggambar mural tersebut diambilkan dari komunitas dan donasi dari anda. Kegiatan ini dilakukan oleh komunitas yang memiliki latar belakang multidisiplin mulai pendidikan Seni Rupa, DKV, Desain Interior, Fotografi, Multimedia, TV dan Film dll, serta Anak anak Sekolah. Pengerjaannya dilakukan 2 sampai 3 sekolah per tahunnya, dengan durasi waktu pengerjaan 3 hari dan diakhiri menggambar bersama anak-anak TK tersebut. Kegiatan ini bertujuan untuk membantu sekolah yang belum ada gambarnya. Sehingga dengan gambar tersebut membuat nyaman dan menarik sekolah TK tersebut, meskipun sekarang dimasa Pandemi COVID 19.&nbsp;</span></p>\r\n<p><span class=\"\\&quot;style-scope\" dir=\"\\&quot;auto\\&quot;\">Seni Rupa Pergerakan ini dilakukan sebelum masa pandemi di desa Jurug kecamatan Sooko kabupaten Ponorogo </span><a class=\"\\&quot;yt-simple-endpoint\" dir=\"\\&quot;auto\\&quot;\" spellcheck=\"\\&quot;false\\&quot;\" href=\"\\&quot;https:/www.youtube.com/redirect?redir_token=QUFFLUhqbl9ZcUtQWXJqODJ6YzhRYVFOUkZSQVd2akpjQXxBQ3Jtc0trTjZYYTRad1Nva1FxbVhGdXRoSEp1SWJOTW13ZGd1N2hYNUZmajg4T3hRN0E5b1FTV1lxUTU5amVFZmhEUkxJZVU1eVZONFl5NEFNYzlpSVh5TlBEd09MM0wtZWpWcmFvckVSLWVfbzA0VnlfbXNaWQ%3D%3D&amp;q=https%3A%2F%2Fgoo.gl%2Fmaps%2F9a9rmAArk6LEZhT29%3Fentry%3Dyt&amp;v=453GT1VlTms&amp;event=video_description\\&quot;\" target=\"\\&quot;_blank\\&quot;\" rel=\"\\&quot;nofollow\">https://goo.gl/maps/9a9rmAArk6LEZhT29</a></p>', 2020, 'Publish', 1, '2021-01-06 07:38:56', '2021-01-06 07:38:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `wa` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_edit` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `nama`, `foto`, `deskripsi`, `keahlian`, `jabatan`, `fb`, `wa`, `ig`, `date_added`, `date_edit`) VALUES
(11, 'Sandi Eko Rully Tristiawan', 'sa.jpg', '', 'Seni Rupa  & Education', 'Founder', 'https://www.facebook.com/sandiekorullytristiawan/', '081338177634', 'https://www.instagram.com/sandymainmain.id/', '2021-01-06 05:41:49', '2021-01-06 05:41:49'),
(12, 'Dayut Septian', 'yut.jpg', 'TIM 2012', 'Multimedia ', 'Ketua ', 'https://www.facebook.com/dayut.septian', '', 'https://www.instagram.com/dayut.id/', '2021-01-06 05:42:59', '2021-01-06 05:42:59'),
(13, 'Asmaul Nurul Hidayah', 'asmaul.jpg', 'TIM 2013', 'Desain Komunikasi Visual', 'Bendahara ', 'https://www.facebook.com/asmaul.nurulhidayah', '', 'https://www.instagram.com/bwabwama_/', '2021-01-06 05:46:29', '2021-01-06 05:46:29'),
(14, 'Septian Adi Kesuma', 'sept1.jpg', 'TIM 2014', 'Desain &  Multimedia', 'Ketua Pelaksana 1', 'https://www.facebook.com/septianadi.kesuma', '', 'https://www.instagram.com/kesumaja/', '2021-01-06 05:49:48', '2021-01-06 05:49:48'),
(15, 'Muhammad Aji Saputra', 'aji_m.jpg', 'TIM 2016', 'Desain &  Multimedia', 'Sekretaris Pelaksana 1', '', '', 'https://www.instagram.com/majisaputra_/', '2021-01-06 05:50:17', '2021-01-06 05:50:17'),
(16, 'Sepninda Dyah Widiyanti', 'sepni.jpg', 'TIM 2015', 'Konselor', 'Bendahara Pelaksana 1', 'https://www.facebook.com/sepninda.widianti', '', 'https://www.instagram.com/sepnindadyah/', '2021-01-06 07:33:37', '2021-01-06 07:33:37'),
(17, 'Diaz Ardian Alvianto', 'ava.png', 'TIM 2012', 'Multimedia & TI', 'IT', 'https://www.facebook.com/dizaralvino', '', 'https://www.instagram.com/diazardian/', '2021-01-06 07:33:45', '2021-01-06 07:33:45'),
(18, 'Rian Dwi Susanto', 'rian1.jpg', 'TIM 2014', 'Multimedia & TI', 'IT', 'https://www.facebook.com/rdwisusanto1', '085853858559', 'https://www.instagram.com/riandwisusanto/', '2021-01-06 07:33:52', '2021-01-06 07:33:52'),
(19, 'Sidiq Amanah', 'sidiq.jpg', 'TIM 2013', 'Seni Rupa  & Education', 'Seni Rupa', 'https://www.facebook.com/sidiq.amanah', '', 'https://www.instagram.com/sidiq_amanah/', '2021-01-11 02:00:21', '2021-01-11 02:00:21'),
(20, 'Dicky Hisbul W.', 'gsass.jpg', 'TIM 2013', 'Seni Rupa ', 'Seni Rupa', 'https://www.facebook.com/erdicka', '', 'https://www.instagram.com/dq.gsb/', '2021-01-11 02:03:04', '2021-01-11 02:03:04'),
(21, 'Ferari Mahardika', 'feee.jpg', 'TIM 2011', 'Sport & Entrepreneur', 'Humas', 'https://www.facebook.com/ferari.mahardika.9', '', 'https://www.instagram.com/m.ferrari_mahardika/', '2021-01-11 02:11:39', '2021-01-11 02:11:39'),
(22, 'Dede Bondan Kharisma Putra', 'bo.jpg', 'TIM 2011', 'Multimedia & Barista', 'Humas', 'https://www.facebook.com/ndon.gendon.1', '', 'https://www.instagram.com/bondandede/', '2021-01-11 02:25:08', '2021-01-11 02:25:08'),
(23, 'Renda Dewi Wastini', 'ren.jpg', 'TIM 2011', 'Desain Komunikasi Visual', 'Desain', 'https://www.facebook.com/renda.dewiw.1', '', 'https://www.instagram.com/rendadewy/', '2021-01-11 02:32:09', '2021-01-11 02:32:09'),
(24, 'Asfat Mohsin', 'as.jpg', 'TIM 2012', 'Sport & Education', 'Humas', 'https://www.facebook.com/ucufrenald.imfvolleyball', '', 'https://www.instagram.com/asfat_m/', '2021-01-11 02:41:31', '2021-01-11 02:41:31'),
(25, 'Nancy Indriastuti Misnan', 'na.jpg', 'TIM 2013', 'Manajemen Marketing', 'Sekretaris ', 'https://www.facebook.com/nancy.misnan', '', 'https://www.instagram.com/nancymisnan/', '2021-01-14 01:49:14', '2021-01-14 01:49:14'),
(26, 'Roni Nopianto', 'ron.jpg', 'Tim 2014', 'Multimedia & Fotografi', 'Fotografi Domunentasi', 'https://www.facebook.com/rony.tjahsrayu', '', 'https://www.instagram.com/rony__n/', '2021-01-15 15:30:46', '2021-01-15 15:30:46'),
(27, 'Intan Novita Sari Noer Qholby Maulidiyah', 'in.jpg', 'Tim 2015', 'Multimedia & TI', 'IT', 'https://www.facebook.com/IntanRehuellah', '', 'https://www.instagram.com/intannnovitaa/', '2021-01-15 16:04:58', '2021-01-15 16:04:58'),
(28, 'Ungga Putra Mahendra', 'ung.jpg', 'Tim 2016', 'Multimedia & TI', 'IT', 'https://www.facebook.com/unggaP', '', 'https://www.instagram.com/unggaputra/', '2021-01-15 16:14:29', '2021-01-15 16:14:29'),
(29, 'Ganjar Arie Sadewa', 'gan.jpg', 'Tim 2016', 'Seni Rupa ', 'Seni Rupa', 'https://www.facebook.com/arek.sentul.5', '', 'https://www.instagram.com/ganjarariesadewa/', '2021-01-15 16:21:40', '2021-01-15 16:21:40'),
(30, 'Lilin indah marianah', 'li.jpg', 'Tim 2015', 'Seni Rupa  & Education', 'Seni Rupa', 'https://www.facebook.com/lilinnhacx.cookoecllalue', '', 'https://www.instagram.com/lilinimaria/', '2021-01-15 16:31:12', '2021-01-15 16:31:12'),
(31, 'Edo Ramadhani Widianto', 'ed.jpg', 'Tim 2017', 'Desain &  Multimedia', 'Desain ', 'https://www.facebook.com/edhorawi.to', '', 'instagram.com/rawi.id/', '2021-01-15 16:41:21', '2021-01-15 16:41:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`id_cookie`);

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indeks untuk tabel `gambar_merchandise`
--
ALTER TABLE `gambar_merchandise`
  ADD PRIMARY KEY (`id_gambar_merchandise`);

--
-- Indeks untuk tabel `gambar_project`
--
ALTER TABLE `gambar_project`
  ADD PRIMARY KEY (`id_gambar_project`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indeks untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id_merchandise`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cookie`
--
ALTER TABLE `cookie`
  MODIFY `id_cookie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `gambar_merchandise`
--
ALTER TABLE `gambar_merchandise`
  MODIFY `id_gambar_merchandise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `gambar_project`
--
ALTER TABLE `gambar_project`
  MODIFY `id_gambar_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2380;

--
-- AUTO_INCREMENT untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id_merchandise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
