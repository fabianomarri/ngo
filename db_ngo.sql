-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Nov 2018 pada 16.38
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ngo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kementerian`
--

CREATE TABLE IF NOT EXISTS `tbl_kementerian` (
  `id_mitra` varchar(10) NOT NULL,
  `nama_kementerian` varchar(100) NOT NULL,
  `nama_menteri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kementerian`
--

INSERT INTO `tbl_kementerian` (`id_mitra`, `nama_kementerian`, `nama_menteri`) VALUES
('M1', 'Kementerian Dalam Negeri', 'Tjahjo Kumolo'),
('M10', 'Kementerian Lingkungan Hidup dan Kehutanan Indonesia', 'Siti Nurbaya Bakar'),
('M11', 'Kementerian Perhubungan Indonesia', 'Budi Karya Sumadi'),
('M12', 'Kementerian Kelautan dan Perikanan Indonesia', 'Susi Pudjiastuti'),
('M13', 'Kementerian Ketenagakerjaan Indonesia', 'Hanif Dhakiri'),
('M14', 'Kementerian Pekerjaan Umum dan Perumahan Rakyat Indonesia', 'Basuki Hadimuljono'),
('M15', 'Kementerian Kesehatan Indonesia', 'Nila Moeloek'),
('M16', 'Kementerian Pendidikan dan Kebudayaan Indonesia', 'Muhadjir Effendy'),
('M17', 'Kementerian Riset, Teknologi dan Pendidikan Tinggi Indonesia', 'M. Nasir'),
('M18', 'Kementerian Sosial Indonesia', 'Agus Gumiwang Kartasasmita'),
('M19', 'Kementerian Agama Indonesia', 'Lukman Hakim Saifuddin'),
('M2', 'Kementerian Luar Negeri', 'Retno Lestari Priansari Marsudi'),
('M20', 'Kementerian Komunikasi dan Informatika Indonesia', 'Rudiantara'),
('M21', 'Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi Indonesia', 'Eko Putro Sandjojo'),
('M22', 'Kementerian Agraria dan Tata Ruang Indonesia', 'Sofyan Djalil'),
('M23', 'Kementerian Sekretariat Negara Indonesia', 'Pratikno'),
('M24', 'Kementerian Koperasi dan Usaha Kecil dan Menengah Indonesia', 'A.A.G.N.Puspayoga'),
('M25', 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak Indonesia', 'Yohana Yembise'),
('M26', 'Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Indonesia', 'Asman Abnur'),
('M27', 'Kementerian Perencanaan Pembangunan Nasional Indonesia', 'Bambang P.S. Brodjonegoro'),
('M28', 'Kementerian Badan Usaha Milik Negara Indonesia', 'Rini Mariani Soemarno'),
('M29', 'Kementerian Pemuda dan Olahraga Indonesia', 'Imam Nahrawi'),
('M3', 'Kementerian Pertahanan Indonesia', 'Jend. TNI (Purn.) Ryamizard Ryacudu'),
('M30', 'Kementerian Pariwisata Indonesia', 'Arief Yahya'),
('M31', 'Kementerian Koordinator Bidang Politik, Hukum, dan Keamanan Indonesia', 'Jend. TNI (Purn.) Wiranto'),
('M32', 'Kementerian Koordinator Bidang Perekonomian Indonesia', 'Darmin Nasution'),
('M33', 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan', 'Puan Maharani'),
('M34', 'Kementerian Koordinator Bidang Kemaritiman Indonesia', 'Jend. TNI (Purn.) Luhut Binsar Panjaitan'),
('M35', 'Badan Kependudukan dan Keluarga Berencana Nasional', '-'),
('M36', 'Kementerian Perencanaan Pembangunan Nasional Republik Indonesia/Badan Perencanaan Pembangunan Nasion', '-'),
('M4', 'Kementerian Hukum dan Hak Asasi Manusia', 'Yasonna Laoly'),
('M5', 'Kementerian Keuangan Indonesia', 'Sri Mulyani'),
('M6', 'Kementerian Energi dan Sumber Daya Mineral Indonesia', 'Ignasius Jonan'),
('M7', 'Kementerian Perindustrian Indonesia', 'Airlangga Hartarto'),
('M8', 'Kementerian Perdagangan Indonesia', 'Enggartiasto Lukita'),
('M9', 'Kementerian Pertanian Indonesia', 'Amran Sulaiman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasi` (
  `id_lokasi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL,
  `nama_ibukota` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_provinsi`, `nama_ibukota`) VALUES
('LO_01', 'Nanggro Aceh Darussalam', 'Banda Aceh'),
('LO_02', 'Sumatera Utara', 'Medan'),
('LO_03', 'Sumatera Barat', 'Padang'),
('LO_04', 'Riau', 'Pekan Baru'),
('LO_05', 'Kepulauan Riau', 'Tanjung Pinang'),
('LO_06', 'Jambi', 'Jambi'),
('LO_07', 'Sumatera Selatan', 'Palembang'),
('LO_08', 'Bangka Belitung', 'Pangkal Pinang'),
('LO_09', 'Bengkulu', 'Bengkulu'),
('LO_10', 'Lampung', 'Bandar Lampung'),
('LO_11', 'DKI Jakarta', 'Jakarta'),
('LO_12', 'Jawa Barat', 'Bandung'),
('LO_13', 'Banten', 'Serang'),
('LO_14', 'Jawa Tengah', 'Semarang'),
('LO_15', 'Daerah Istimewa Yogyakarta', 'Yogyakarta'),
('LO_16', 'Jawa Timur', 'Surabaya'),
('LO_17', 'Bali', 'Denpasar'),
('LO_18', 'Nusa Tenggara Barat', 'Mataram'),
('LO_19', ' Nusa Tenggara Timur', 'Kupang'),
('LO_20', 'Kalimantan Barat', 'Pontianak'),
('LO_21', 'Kalimantan Tengah', 'Palangkaraya'),
('LO_22', 'Kalimantan Selatan', 'Banjarmasin'),
('LO_23', ' Kalimantan Timur', 'Samarinda'),
('LO_24', 'Kalimantan Utara', 'Tanjung Selor'),
('LO_25', 'Sulawesi Utara', 'Manado'),
('LO_26', 'Sulawesi Barat', 'Mamuju'),
('LO_27', 'Sulawesi Tengah', 'Palu'),
('LO_28', 'Sulawesi Tenggara', 'Kendari'),
('LO_29', 'Sulawesi Selatan', 'Makassar'),
('LO_30', 'Gorontalo', 'Gorontalo'),
('LO_31', 'Maluku', 'Ambon'),
('LO_32', 'Maluku Utara', 'Sofifi'),
('LO_33', 'Papua Barat', 'Manokwari'),
('LO_34', 'Papua', 'Jayapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasikegiatan`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasikegiatan` (
`id_lokkeg` int(5) NOT NULL,
  `id_ormas` varchar(5) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lokasikegiatan`
--

INSERT INTO `tbl_lokasikegiatan` (`id_lokkeg`, `id_ormas`, `id_lokasi`) VALUES
(1, 'or1', 2),
(2, 'or1', 28),
(3, 'or1', 19),
(4, 'or2', 12),
(5, 'or2', 13),
(6, 'or2', 14),
(7, 'or2', 15),
(8, 'or2', 16),
(9, 'or2', 17),
(10, 'or2', 29),
(11, 'or2', 25),
(12, 'or2', 2),
(13, 'or2', 4),
(14, 'or2', 3),
(15, 'ro3', 13),
(16, 'ro3', 12),
(17, 'ro3', 29),
(18, 'ro3', 21),
(19, 'ro3', 25),
(20, 'ro3', 19),
(21, 'ro4', 11),
(22, 'ro4', 30),
(23, 'or5', 1),
(24, 'or5', 9),
(25, 'or5', 3),
(26, 'or5', 4),
(27, 'or5', 20),
(28, 'or5', 14),
(29, 'or5', 21),
(30, 'or5', 18),
(31, 'or5', 34),
(32, 'or6', 1),
(34, 'ro6', 4),
(35, 'ro6', 6),
(36, 'ro6', 29),
(37, 'ro6', 7),
(38, 'ro6', 11),
(39, 'ro6', 12),
(40, 'ro6', 14),
(41, 'ro6', 15),
(42, 'ro6', 16),
(43, 'ro6', 17),
(44, 'ro6', 19),
(45, 'ro6', 18),
(46, 'ro6', 20),
(47, 'ro7', 15),
(48, 'ro7', 19),
(49, 'ro7', 24),
(50, 'ro8', 11),
(51, 'ro8', 12),
(52, 'ro8', 14),
(53, 'ro8', 15),
(54, 'ro8', 19),
(55, 'ro9', 10),
(56, 'ro9', 14),
(57, 'ro9', 16),
(58, 'ro9', 32),
(59, 'ro10', 2),
(60, 'ro10', 15),
(61, 'ro10', 26),
(62, 'ro11', 2),
(63, 'ro11', 3),
(64, 'ro11', 7),
(65, 'ro11', 13),
(66, 'ro11', 11),
(67, 'ro11', 12),
(68, 'ro11', 14),
(69, 'ro11', 16),
(70, 'ro11', 15),
(71, 'ro11', 17),
(72, 'ro11', 18),
(73, 'ro11', 23),
(74, 'ro11', 20),
(75, 'ro11', 25),
(76, 'ro11', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_negara`
--

CREATE TABLE IF NOT EXISTS `tbl_negara` (
  `id_negara` varchar(5) NOT NULL,
  `nama_negara` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_negara`
--

INSERT INTO `tbl_negara` (`id_negara`, `nama_negara`) VALUES
('ne1', 'Perancis'),
('ne10', 'Jepang'),
('ne11', 'Qatar'),
('ne12', 'Singapura'),
('ne13', 'Turki'),
('ne14', 'Belgia'),
('ne15', 'Afganistan'),
('ne16', 'Indonesia'),
('ne17', 'Malaysia'),
('ne18', 'Taiwan'),
('ne19', 'Thailand'),
('ne2', 'Jerman'),
('ne20', 'Spanyol'),
('ne3', 'Kanada'),
('ne4', 'Inggris'),
('ne5', 'Amerika Serikat'),
('ne6', 'Swiss'),
('ne7', 'Belanda'),
('ne8', 'Jerman'),
('ne9', 'Arab Saudi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ormas`
--

CREATE TABLE IF NOT EXISTS `tbl_ormas` (
  `id_ormas` varchar(5) NOT NULL,
  `nama_ormas` varchar(150) NOT NULL,
  `bidang_kegiatan` varchar(200) NOT NULL,
  `country_representative` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_disetujui` varchar(15) NOT NULL,
  `no_registrasi` varchar(15) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `id_negara` varchar(5) NOT NULL,
  `id_mitra` varchar(5) NOT NULL,
  `id_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ormas`
--

INSERT INTO `tbl_ormas` (`id_ormas`, `nama_ormas`, `bidang_kegiatan`, `country_representative`, `alamat`, `tgl_disetujui`, `no_registrasi`, `telepon`, `fax`, `id_negara`, `id_mitra`, `id_status`) VALUES
('or1', 'Agency for Technical Cooperation and Development (ACTED)', 'Program terpadu pembangunan masyarakat berbasis wilayah', 'Ginny Haythornthwaite', 'Jalan Penjernihan II No. 3C Bendungan Hilir  Jakarta Pusat', '31 Oktober 2008', '0814/11/TP/51', '021-2553 2000', ' 720 8654 ', 'ne1', 'M1', '1'),
('or10', 'John Hopkins Center For Communication Program', 'Program Keluarga Berencana', 'Hari Fitri Wahyuni', 'The CEO Building lt. 5, Jl. TB Simatupang 18 C, Jakarta Selatan', '1 Juni 2016', '1504/02/TP/51', '-', '-', 'ne5', 'M35', '2'),
('or11', 'Konrad Adenauer Stiftung e.V', 'Promosi nilai-nilai demokrasi ', 'Jan Senkyr', 'Gedung Plaza Aminta, Lt. 4, Jl. Letjen TB Simatupang Kav. 10, Jakarta 12310 ', '26 Agustus 2013', '1304/08/TP/51', '-', '-', 'ne2', 'M1', '3'),
('or12', 'Lutheran World Relief (LWR)', 'Peningkatan kesejahteraan sosial', 'Evi Esaly Kaban', 'Pondok Adessa, Jl. Nelayan No. 323, Banjar Canggu, Bali', '30 Juni 2008 ', '0809/08/TP/51', '-', '-', 'ne5', 'M10', '1'),
('or13', 'Muslim World League', 'Pemberdayaan masyarakat', 'Fahd Sanad Al Harbi', 'Jl. Taman Simanjuntak Barat No. 8, Cipinang Cempedak, Jakarta Timur', 'Januari 2015', '1501/04/TP/51', '-', '-', 'ne9', 'M19', '1'),
('or14', 'Natural Resource Governance Institute', 'Promosi sumber daya alam untuk pembangunan yang berkelanjutan', 'Emanuel Bria', 'Sampoerna Strategic Squere Lt. 30, Jl. Jend. Sudirman, Jakarta Selatan', 'Maret 2015', '1503/10/TP/51', '-', '-', 'ne5', 'M36', '2'),
('or15', 'Organization for Industrial, Spiritual and Culture Advancement (OISCA)', 'Pemberdayaan masyarakat', 'Muhamad Halid', ' Jl. Inayah No.18 Rt. 03/08 Kelapa Dua Wetan Ciracas Jakarta Timur', '26 Oktober 2009', '0924/10/TP/51', '-', '-', 'ne10', 'M1', '1'),
('or16', 'Project HOPE', 'Kesehatan pekerja perempuan di tempat kerja', 'Dr. Nasaruddin Sheldon, MD ', 'Golden Vienna II Blok C5 no. 9, BSD Sektor 12, Tangerang Selatan', '29-Nov-06', '0605/11/TP/51', '-', '-', 'ne5', 'M15', '1'),
('or17', 'Qatar Charity ', 'Sosial', 'Mr. Karam Zeinhom Hassan Aly', 'Gd. Grand Duren Tiga Ly.3, Jl. Duren Tiga Raya no. 9, Jakarta Selatan', '24-Nov-05', '0504/11/TP/51', '-', '-', 'ne11', 'M19', '2'),
('or18', 'Rare Animal Relief Effort (RARE)', 'Konservasi keanekaragaman hayati', 'Taufiq Alimi', 'Jl. Gunung Gede I No. 6, Bogor', '11 Juni 2009', '0912/06/TP/51', '-', '-', 'ne5', 'M10', '1'),
('or19', 'Singapore International Foundation', 'Pengembangan pendidikan dan budaya melalui pengiriman relawan', 'Fenny Ng', '60A Orchard Road, Singapore', 'Januari 2017', '', '-', '-', 'ne12', 'M16', '2'),
('or2', 'Bremen Overseas Research and Development Association (BORDA)', 'Promosi/pembangunan sistem sanitasi, pengelolaan limbah dan sampah, pengelolaan sumber air untuk meningkatkan kesehatan umum', 'Marine Brueckner Supriyono', 'Kayen no. 176 Jl Kaliurang km 66 Yogyakarta 55283  ', '26 Mei 2010 ', '1101/10/TP/51', '-', '-', 'ne8', 'M14', '3'),
('or20', 'The Aspinall Foundation ', 'Konservasi hewan langka', 'Made Wedana', 'Jl. Raya Rancabali KM12, Ciwidey, Bandung, Jawa Barat', '08-Sep-09', '0921/09/TP/51', '-', '-', 'ne4', 'M10', '1'),
('or21', 'Pacific Countries Social and Economical Solidarity Association (PASIAD)', 'Konservasi keanekaragaman hayati', 'Regina Frey', 'Jl. Wahid Hasyim no. 51/74 Medan Baru, Medan 20154 ', '23 Maret 2009', '0908/03/TP/51', '-', '-', 'ne13', 'M10', '1'),
('or22', 'United Cerebral Palsy – Wheels for Humanity (UCP-WH) ', 'Perlindungan dan penyelamatan lingkungan', 'Rizal Algamar', 'Graha Iskandarsyah Lantai 3 Jl. Iskandarsyah Raya No. 66 C Kebayoran Baru ', '27 Maret 2008  ', '0802/03/TP/51', '-', '-', 'ne5', 'M12', '1'),
('or23', 'Vredeseilanden-Coopibo Non-profit Association (Vredeseilanden/Veco)', 'Pemberdayaan masyarakat desa', 'Dominique Vanderhaeghen', 'Jl. Badak Agung X No. 22, Denpasar, Bali', '4 Februari 2009', '0905/02/TP/51', '-', '-', 'ne14', 'M1', '1'),
('or24', 'Winrock International Institute for Agricultural Development', 'Pengembangan kapasitas, pertanian berkelanjutan dan lingkungan', 'Michael Shea Naleid', 'Graha STR 2nd floor, Suite 208. Jl. Ampera Raya No. 11B Ragunan, Pasar Minggu', '30 Oktober 2012', '1206/10/TP/51', '-', '-', 'ne5', 'M1', '3'),
('or25', 'The Zoological Society of London (ZSL)', 'Riset terkait dengan konservasi fauna', 'Dolly Priatna', 'Jl. Gunung Gede I No. 11A, Bogor – Jawa Barat 16151', '4 Juni 2008', '0803/06/TP/51', '', '-', 'ne4', 'M10', '1'),
('or3', 'Care International', 'Program pembangunan terpadu', 'Helen Vanwel', 'Gedung TIFA, Lantai 10, Suite 1005, Jl. Kuningan Barat No.26, JakartaSelatan', '31 Oktober 2008', '0815/11/TP/51', '-', '-', 'ne3', 'M1', '1'),
('or4', 'Exceed', 'Pengembangan pendidikan ortotik prostetik dan capacity building', 'Lise Hjelmström ', 'Jurusan Ortotik Prostetik, Poltekkes Kemenkes Jakarta. Jl. Wijayakusuma Raya 48, CIlandak Barat, Jakarta Selatan.  ', '11-Sep-08', '0813/09/TP/51', '-', '-', 'ne4', 'M15', '1'),
('or5', 'Fauna and Flora International (FFI)', 'Perlindungan spesies yang dilindungi dan terancam punah, konservasi ekosistem dan pemanfaatan jasa lingkungan berbasis landscape', 'Darmawan Liswanto', 'Kampus Universitas Nasional Blok I Lantai 4, Jl. Sawo Manila no. 61, Pasar Minggu, Jakarta Selatan', '30 Juni 2008', '0804/06/TP/51', '-', '-', 'ne4', 'M10', '1'),
('or6', 'Ford Foundation', 'Pengembangan kesejahteraan masyarakat dan penguatan demokrasi', 'David Hulse', 'Sequis Center Lt. 11, Jl. Jend. Sudirman, Jakarta Selatan', '01-Nov-17', '0805/06/TP/51', '-', '-', 'ne5', 'M1', '2'),
('or7', 'Global Alliance For Improved Nutrition', 'Gizi, KIA', 'Ravi Menon', 'Menara Palma Lantai 5, #502-B\nJl. HR Rasuna Said Blok X-2, kav. 6\nJakarta 12950, Indonesia\n', '26 Agustus 2013', '1303/08/TP/51', '-', '-', 'ne6', 'M15', '1'),
('or8', 'Helen Keller International (HKI)', 'Penanggulangan gangguan penglihatan dan kebutaan', 'Pratek Gupta', 'Jl. Taman Margasatwa 26, Ragunan, Jakarta Selatan 12550 ', '17 Mei 2005', '0809/08/TP/51', '-', '-', 'ne5', 'M15', '1'),
('or9', 'Interchurch Organization for Development Cooperation (ICCO)', 'Program peningkatan kesejahteraan sosial masyarakat desa', 'Kees de Ruiter', 'Jl. Tukad Batang Hari IX No. 8, Panjer, Denpasar 80225\n', '26 Oktober 2009', '0923/10/TP/51', '-', '-', 'ne7', 'M1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id_status` varchar(5) NOT NULL,
  `nama_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `nama_status`) VALUES
('1', 'green'),
('2', 'yellow'),
('3', 'red');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kementerian`
--
ALTER TABLE `tbl_kementerian`
 ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
 ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_lokasikegiatan`
--
ALTER TABLE `tbl_lokasikegiatan`
 ADD PRIMARY KEY (`id_lokkeg`), ADD KEY `id_ormas` (`id_ormas`), ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tbl_negara`
--
ALTER TABLE `tbl_negara`
 ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `tbl_ormas`
--
ALTER TABLE `tbl_ormas`
 ADD PRIMARY KEY (`id_ormas`), ADD KEY `id_negara` (`id_negara`), ADD KEY `id_mitra` (`id_mitra`), ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
 ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lokasikegiatan`
--
ALTER TABLE `tbl_lokasikegiatan`
MODIFY `id_lokkeg` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
