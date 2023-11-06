-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hc3_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_detail_penilaian`
--

CREATE TABLE `cs_detail_penilaian` (
  `csdp_id` int(11) NOT NULL,
  `csdp_csp_id` int(11) NOT NULL,
  `csdp_csi_id` int(11) NOT NULL,
  `csdp_nilai` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_detail_penilaian`
--

INSERT INTO `cs_detail_penilaian` (`csdp_id`, `csdp_csp_id`, `csdp_csi_id`, `csdp_nilai`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cs_indikator`
--

CREATE TABLE `cs_indikator` (
  `csi_id` int(11) NOT NULL,
  `csi_kode` varchar(10) NOT NULL,
  `csi_sub_kode` varchar(5) DEFAULT NULL,
  `csi_posisi` smallint(1) NOT NULL,
  `csi_place` smallint(1) NOT NULL,
  `csi_indikator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_indikator`
--

INSERT INTO `cs_indikator` (`csi_id`, `csi_kode`, `csi_sub_kode`, `csi_posisi`, `csi_place`, `csi_indikator`) VALUES
(2, 'A201A', '', 1, 1, 'Pada saat pembelian, apakah Bapak/Ibu saat itu dimintai informasi nama & no telp oleh petugas penjualan kami ?'),
(3, 'A201B', '', 1, 1, 'Apakah petugas menawarkan konsumen untuk menghubungi petugas apabila konsumen membutuhkan bantuan / jika ingin membeli di kemudian hari?');

-- --------------------------------------------------------

--
-- Table structure for table `cs_penilaian`
--

CREATE TABLE `cs_penilaian` (
  `csp_id` int(11) NOT NULL,
  `csp_dealer_id` int(11) NOT NULL,
  `csp_nama_penilai` varchar(100) DEFAULT NULL,
  `csp_notelp_penilai` varchar(15) NOT NULL,
  `csp_score` double DEFAULT NULL,
  `csp_predikat` varchar(50) DEFAULT NULL,
  `csp_status` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_penilaian`
--

INSERT INTO `cs_penilaian` (`csp_id`, `csp_dealer_id`, `csp_nama_penilai`, `csp_notelp_penilai`, `csp_score`, `csp_predikat`, `csp_status`, `created_at`) VALUES
(1, 5, 'Vera yovita', '081990290353', NULL, NULL, NULL, '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id_dealer` int(11) NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(225) NOT NULL,
  `dealer_id_distrik` int(11) NOT NULL,
  `jenis_dealer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id_dealer`, `kode_dealer`, `nama_dealer`, `dealer_id_distrik`, `jenis_dealer`) VALUES
(1, 7600, 'PT.AI-HSO', 4, 'H123'),
(2, 9645, 'CDN-SO.Arengka', 4, 'H123'),
(3, 2790, 'PT.Citra Honda Nst', 4, 'H123'),
(4, 13211, 'MPM - Pekanbaru', 4, 'H123'),
(5, 5566, 'CDN-SO.Tambusai', 4, 'H123'),
(6, 10285, 'PT. Tunas Dwipa Motor', 4, 'H123'),
(7, 10123, 'Mitra Motor Semesta', 4, 'H123'),
(8, 3478, 'CDN-SO.Bangkinang', 5, 'H123'),
(9, 3479, 'CDN-SO.Selat Panjang', 1, 'H123'),
(10, 3483, 'CDN-SO Air Molek', 3, 'H123'),
(11, 7590, 'CV.Surya Kuansing', 6, 'H123'),
(12, 6890, 'CDN-SO.Kandis', 9, 'H123'),
(13, 3487, 'CDN-SO Bagan Batu', 1, 'H123'),
(14, 3490, 'CDN-SO Ujung Batu', 8, 'H123'),
(15, 3845, 'CDN-SO.SKH', 4, 'H123'),
(16, 13152, 'CDN-SO. Flamboyan', 5, 'H123'),
(17, 13130, 'CDN-Perawang', 9, 'H123'),
(18, 7576, 'CDN-SO.Lipat Kain', 5, 'H123'),
(19, 6524, 'CDN-SO.Duri', 1, 'H123'),
(20, 13155, 'HMM-P.Reba', 3, 'H123'),
(21, 6415, 'CDN-SO.Sudirman', 4, 'H123'),
(22, 6888, 'CDN-SO Ujung Tanjung', 1, 'H123'),
(23, 16287, 'CDN-SO Pinggir', 1, 'H123'),
(24, 13154, 'PT. Global J P 2', 4, 'H123'),
(25, 6404, 'Jaya Indah Motor-Bengkalis', 1, 'H123'),
(26, 13151, 'CDN-SO. Kampar', 5, 'H123'),
(27, 7948, 'HoHo Marpoyan', 4, 'H123'),
(28, 6730, 'Prima Motor-Pasir. P', 8, 'H123'),
(29, 1552, 'HMM-Rengat', 3, 'H123'),
(30, 1872, 'Fadly Motor', 6, 'H123'),
(31, 7645, 'Karisma Jaya-Pasir. P', 8, 'H123'),
(32, 818, 'PT.BBI-Bagan Batu', 1, 'H123'),
(33, 7947, 'PT.Global J P', 4, 'H123'),
(34, 970, 'Andalas Motor-Bengkalis', 1, 'H123'),
(35, 8889, 'Putra Sakti Jaya', 8, 'H123'),
(36, 8719, 'CV.Zam Zam Motor', 6, 'H123'),
(37, 13153, 'Mitra Indo Motor', 5, 'H123'),
(38, 10052, 'Muara Pulau Artha Motor', 5, 'H123'),
(39, 239, 'SUZ-Dumai', 1, 'H123'),
(40, 6416, 'CV.Belilias Motorindo Mandiri', 3, 'H123'),
(41, 12672, 'CV Asia Motor', 1, 'H123'),
(42, 7853, 'HMM-Peranap', 3, 'H123'),
(43, 2791, 'HoHo-PBR', 4, 'H1'),
(44, 16863, 'PT.Kurnia Putra Mandiri', 4, 'H123'),
(45, 16278, 'PT. Riau Argo Perkasa', 4, 'H123'),
(46, 7320, 'CDN-SO. Suram-Tampung', 5, 'H1'),
(47, 5559, 'Sonic Motor', 5, 'H123'),
(48, 3961, 'HoHo- P.Kerinci', 10, 'H1'),
(49, 6892, 'HoHo- P.Ukui', 10, 'H1'),
(50, 8885, 'Amsar Motor', 8, 'H123'),
(51, 12666, 'CDN-S/R 2-Garoga', 1, 'H123'),
(52, 3488, 'CDN-SO Dumai', 1, 'H1'),
(53, 8886, 'Hondatama Mitra Cemerlang-DMI', 1, 'H123'),
(54, 8890, 'Hose Motor - BaganSiapiapi', 1, 'H1'),
(55, 12747, 'HoHo-Lubuk Dalam', 9, 'H1'),
(56, 17430, 'KPM Siak', 9, 'H123'),
(57, 3959, 'CV.Honda Mas Tembilahan', 2, 'H123'),
(58, 13129, 'CDN-Tembilahan', 2, 'H1'),
(59, 6891, 'CV.Honda Mas Sei Guntung', 2, 'H123'),
(60, 4088, 'CV.Honda Mas P.Kijang', 2, 'H123'),
(61, 10050, 'BMM-Selensen', 2, 'H123');

-- --------------------------------------------------------

--
-- Table structure for table `distrik`
--

CREATE TABLE `distrik` (
  `id_distrik` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distrik`
--

INSERT INTO `distrik` (`id_distrik`, `nama`) VALUES
(1, 'Bengkalis'),
(2, 'Inhil'),
(3, 'Inhu'),
(4, 'Pekanbaru'),
(5, 'kampar'),
(6, 'Kuansing'),
(7, 'Rohil'),
(8, 'Rohul'),
(9, 'Siak'),
(10, 'Pelalawan');

-- --------------------------------------------------------

--
-- Table structure for table `mc_area_penilaian`
--

CREATE TABLE `mc_area_penilaian` (
  `map_id` int(11) NOT NULL,
  `map_area_penilaian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mc_detail_penilaian`
--

CREATE TABLE `mc_detail_penilaian` (
  `mcdp_id` int(11) NOT NULL,
  `mcdp_mcp_id` int(11) NOT NULL,
  `mcdp_mci_id` int(11) NOT NULL,
  `mcdp_nilai` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc_detail_penilaian`
--

INSERT INTO `mc_detail_penilaian` (`mcdp_id`, `mcdp_mcp_id`, `mcdp_mci_id`, `mcdp_nilai`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 0),
(3, 1, 4, 0),
(4, 1, 9, 1),
(5, 1, 10, 0),
(6, 1, 11, 1),
(7, 1, 13, 0),
(8, 1, 18, 1),
(9, 1, 26, 1),
(10, 1, 27, 0),
(11, 1, 31, 1),
(12, 1, 32, 0),
(13, 2, 2, 1),
(14, 2, 3, 1),
(15, 2, 4, 1),
(16, 2, 9, 1),
(17, 2, 10, 1),
(18, 2, 11, 0),
(19, 2, 13, 1),
(20, 2, 18, 1),
(21, 2, 26, 1),
(22, 2, 27, 1),
(23, 2, 31, 0),
(24, 2, 32, 1),
(25, 3, 2, 0),
(26, 3, 3, 1),
(27, 3, 4, 1),
(28, 3, 9, 1),
(29, 3, 10, 1),
(30, 3, 11, 1),
(31, 3, 13, 1),
(32, 3, 18, 1),
(33, 3, 26, 0),
(34, 3, 27, 1),
(35, 3, 31, 1),
(36, 3, 32, 1),
(37, 1, 1, 1),
(38, 1, 2, 1),
(39, 1, 3, 1),
(40, 1, 4, 1),
(41, 1, 5, 1),
(42, 1, 6, 1),
(43, 1, 7, 1),
(44, 1, 8, 1),
(45, 1, 9, 1),
(46, 1, 10, 1),
(47, 1, 11, 1),
(48, 1, 12, 1),
(49, 1, 13, 1),
(50, 1, 14, 0),
(51, 1, 15, 0),
(52, 1, 16, 0),
(53, 1, 17, 0),
(54, 1, 18, 0),
(55, 1, 19, 1),
(56, 1, 20, 0),
(57, 1, 21, 1),
(58, 1, 22, 1),
(59, 1, 23, 1),
(60, 1, 24, 1),
(61, 1, 25, 1),
(62, 1, 26, 1),
(63, 1, 27, 1),
(64, 1, 28, 1),
(65, 1, 29, 1),
(66, 1, 30, 1),
(67, 1, 31, 1),
(68, 1, 32, 1),
(69, 1, 33, 0),
(70, 1, 34, 0),
(71, 1, 35, 1),
(72, 1, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mc_indikator`
--

CREATE TABLE `mc_indikator` (
  `mci_id` int(11) NOT NULL,
  `mci_map_id` int(11) NOT NULL,
  `mci_atribut` varchar(100) NOT NULL,
  `mci_penilaian` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc_indikator`
--

INSERT INTO `mc_indikator` (`mci_id`, `mci_map_id`, `mci_atribut`, `mci_penilaian`, `created_at`) VALUES
(1, 1, 'Percobaan telpon 1x langsung terhubung / terangkat', 1, '0000-00-00'),
(2, 1, 'Apakah petugas mengangkat telpon sebelum dering ke 3?', 1, '0000-00-00'),
(3, 1, 'Apakah petugas mengucapkan Salam Satu Hati?', 1, '0000-00-00'),
(4, 1, 'Apakah petugas mengucapkan salam cuaca?', 1, '0000-00-00'),
(5, 1, 'Apakah petugas memperkenalkan diri?', 1, '0000-00-00'),
(6, 1, 'Apakah petugas menawarkan bantuan?', 1, '0000-00-00'),
(7, 1, 'Apakah petugas menanyakan nama?', 1, '0000-00-00'),
(8, 1, 'Apakah petugas antusias? *Merespon apa yang dikatakan konsumen (secara verbal)', 2, '0000-00-00'),
(9, 1, 'Apa suara petugas terdengar ceria dan ramah (secara vocal)?', 2, '0000-00-00'),
(10, 1, 'Apakah petugas mengkonfirmasi kembali jawaban yang diberikan konsumen?', 2, '0000-00-00'),
(11, 2, 'Apakah petugas memberikan informasi harga motor?', 3, '0000-00-00'),
(12, 2, 'Apakah petugas menjelaskan fitur-fitur produk Honda Scoopy ?*Minimm 5 fitur utama / cirkhas dari pro', 3, '0000-00-00'),
(13, 2, 'Apakah petugas menjelaskan fitur-fitur produk dengan menjelaskan Ciscumstances dan Advantages Honda ', 3, '0000-00-00'),
(14, 2, 'Apakah petugas menjelaskan jaminan apa saja yang ditanggung oleh atpm (garansi mesin, kelistrikan,ra', 1, '0000-00-00'),
(15, 2, 'Apakah petugas menjelaskan jumlah KPB gratis, jadwal KPB tersebut, pick up service, ERA, dan booking', 1, '0000-00-00'),
(16, 2, 'Apakah petugas menginformasikan mengenai kegiatan-kegiatan komunitas?', 1, '0000-00-00'),
(17, 2, 'Apakah petugas menawarkan konsumen untuk datang ke dealer untuk melihat unit?', 4, '0000-00-00'),
(18, 2, 'Apakah petugas menawarkan konsumen untuk datang ke dealer untuk test ride?', 4, '0000-00-00'),
(19, 2, 'Apakah petugas menjelaskan accessories dan apparel?', 1, '0000-00-00'),
(20, 2, 'Apakah petugas menjelaskan customizing parts dan mofdifikasi seperti apa yang menghilangkan garansi?', 1, '0000-00-00'),
(21, 2, 'Apakah petugas memberikan simulasi kredit / pembayaran cash?', 1, '0000-00-00'),
(22, 2, 'Apakah petugas menjelaskan promo-promo yang berlangsung?', 1, '0000-00-00'),
(23, 2, 'Pakah petugas menjelaskan estimasi waktu untuk STNK / BPKB?', 1, '0000-00-00'),
(24, 2, 'Apakah petugas antusias? *Merespon apa yang dikatakan konsumen (secara verbal)', 2, '0000-00-00'),
(25, 2, 'Apa suara petugas terdengar ceria dan ramah (secera vocal)?', 2, '0000-00-00'),
(26, 3, 'Apakah petugas menanyakan identitas konsumen?', 1, '0000-00-00'),
(27, 3, 'Apa petugas memberi tahu tujuan meminta identitas konsumen? *Untuk keperluan informasi promo, follow', 1, '0000-00-00'),
(28, 3, 'Apakah petugas menawarkan konsumen untuk menghubungi petugas apabila konsumen membutuhkan bantuan / ', 4, '0000-00-00'),
(29, 3, 'Apakah petugas antusias? *Merespon apa yang dikatakan konsumen (secara verbal)', 2, '0000-00-00'),
(30, 3, 'Apa suara petugas terdengar ceria dan ramah (secera vocal)?', 2, '0000-00-00'),
(31, 4, 'Apa suara petugas terdengar ceria dan ramah (secera vocal)?', 1, '0000-00-00'),
(32, 4, 'Apa petugas mengucapkan \"ada yang bisa dibantu lagi pak / bu?\"', 1, '0000-00-00'),
(33, 4, 'Apakah petugas mengucapkan terimakasih?', 1, '0000-00-00'),
(34, 4, 'Apakah menyebutkan nama konsumen?', 2, '0000-00-00'),
(35, 4, 'Apa petugas mengucapkan Salam Satu Hati?', 1, '0000-00-00'),
(36, 4, 'Apakah petugas antusias? *Merespon apa yang dikatakan konsumen (secara verbal)', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mc_penilaian`
--

CREATE TABLE `mc_penilaian` (
  `mcp_id` int(11) NOT NULL,
  `mcp_dealer_id` int(11) NOT NULL,
  `mcp_nama_penilai` varchar(100) DEFAULT NULL,
  `mcp_score` double DEFAULT NULL,
  `mcp_predikat` varchar(50) DEFAULT NULL,
  `mcp_status` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc_penilaian`
--

INSERT INTO `mc_penilaian` (`mcp_id`, `mcp_dealer_id`, `mcp_nama_penilai`, `mcp_score`, `mcp_predikat`, `mcp_status`, `created_at`) VALUES
(1, 21, 'Jumadi ', 98.8425, 'Platinum', 'Complete', '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('dealer','admin') NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `dealer_id`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', '1', 'admin@admin.co.id', '025123456789', 'admin', 0, '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, '11950121750.jpg', 1),
(14, 'yolanda', '2', 'yola1217@gmail.com', '082345672345', 'dealer', 0, '$2y$10$ZqafkiWOKI35BLZiZXIc/.qcsInWqa2/xkzToRb6DqC/F6.JXDmAO', 1645501371, '11950121750.jpg', 1),
(15, 'Toko Suz', '239', 'yolandaenzawella@gmail.com', '082345672345', 'dealer', 0, '$2y$10$aMiMe2zUCcVQioXAcgnJVeC4teRGV/q3In50m5e6ipzuB6rO5MTe.', 1647256571, 'user.png', 1),
(17, 'Farras Alhafizh', 'farras', 'farras_hafizh09@yahoo.co.id', '081275127265', 'dealer', 2, '$2y$10$9mJf787FO3fSd5d1/vNeeuhYRGLjpfagZW4muO.ZzA47vaYBcOM32', 1653908968, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_detail_penilaian`
--
ALTER TABLE `cs_detail_penilaian`
  ADD PRIMARY KEY (`csdp_id`);

--
-- Indexes for table `cs_indikator`
--
ALTER TABLE `cs_indikator`
  ADD PRIMARY KEY (`csi_id`);

--
-- Indexes for table `cs_penilaian`
--
ALTER TABLE `cs_penilaian`
  ADD PRIMARY KEY (`csp_id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id_dealer`);

--
-- Indexes for table `distrik`
--
ALTER TABLE `distrik`
  ADD PRIMARY KEY (`id_distrik`);

--
-- Indexes for table `mc_area_penilaian`
--
ALTER TABLE `mc_area_penilaian`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `mc_detail_penilaian`
--
ALTER TABLE `mc_detail_penilaian`
  ADD PRIMARY KEY (`mcdp_id`);

--
-- Indexes for table `mc_indikator`
--
ALTER TABLE `mc_indikator`
  ADD PRIMARY KEY (`mci_id`);

--
-- Indexes for table `mc_penilaian`
--
ALTER TABLE `mc_penilaian`
  ADD PRIMARY KEY (`mcp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cs_detail_penilaian`
--
ALTER TABLE `cs_detail_penilaian`
  MODIFY `csdp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cs_indikator`
--
ALTER TABLE `cs_indikator`
  MODIFY `csi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cs_penilaian`
--
ALTER TABLE `cs_penilaian`
  MODIFY `csp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id_dealer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `distrik`
--
ALTER TABLE `distrik`
  MODIFY `id_distrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mc_area_penilaian`
--
ALTER TABLE `mc_area_penilaian`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mc_detail_penilaian`
--
ALTER TABLE `mc_detail_penilaian`
  MODIFY `mcdp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `mc_indikator`
--
ALTER TABLE `mc_indikator`
  MODIFY `mci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mc_penilaian`
--
ALTER TABLE `mc_penilaian`
  MODIFY `mcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
