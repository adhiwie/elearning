-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2013 at 01:24 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahp_aggregated`
--

CREATE TABLE `ahp_aggregated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bobot` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ahp_result`
--

CREATE TABLE `ahp_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bobot` text NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Conception/Design'),
(2, 'Learning Process');

-- --------------------------------------------------------

--
-- Table structure for table `column_sum`
--

CREATE TABLE `column_sum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elearning`
--

CREATE TABLE `elearning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `desc` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `elearning`
--

INSERT INTO `elearning` (`id`, `name`, `desc`) VALUES
(1, 'BeSmart', 'BeSmart');

-- --------------------------------------------------------

--
-- Table structure for table `metric`
--

CREATE TABLE `metric` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `proc_id` int(11) NOT NULL,
  `metric` text NOT NULL,
  `question` text NOT NULL,
  `recommendation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `metric`
--

INSERT INTO `metric` (`id`, `cat_id`, `proc_id`, `metric`, `question`, `recommendation`) VALUES
(1, 1, 1, 'Keberadaan tujuan instruksional', 'Apakah setiap materi pembelajaran mencantumkan tujuan instruksional secara eksplisit?', 'Cantumkan tujuan instruksional secara eksplisit pada setiap materi pembejalaran'),
(2, 1, 1, 'Kejelasan tujuan instruksional', 'Apakah tujuan instruksional yang tercantum dalam materi pembelajaran menunjukkan pengetahuan/teknik yang akan dipelajari?', 'Tunjukkan pengetahuan/teknik yang akan dipelajari pada tujuan instruksional yang tercantum dalam materi'),
(3, 1, 2, 'Kuantitas materi pembelajaran', 'Apakah jumlah meteri pembelajaran tiap mata kuliah sesuai dengan kurikulum/standar SAP minimal 80% dari jumlah pertemuan keseluruhan?', 'Tambah jumlah materi pembelajaran tiap mata kuliah agar sesuai dengan kurikulum/standar SAP minimal 80% dari jumlah pertemuan keseluruhan'),
(4, 1, 2, 'Kualitas akurasi materi pembelajaran', 'Apakah sistem e-learning menyediakan fitur referensi utama dan referensi pendukung untuk tiap materi pembelajaran?', 'Sediakan fitur referensi utama dan referensi pendukung untuk tiap materi pembelajaran'),
(5, 1, 3, 'Keberadaan studi kasus', 'Apakah materi pembelajaran yang terdapat pada e-learning ini disertai contoh studi kasus untuk mempermudah pemahaman materi?', 'Sertakan contoh studi kasus pada materi pembelajaran'),
(6, 1, 3, 'Variasi strategi pembelajaran', 'Apakah e-learning ini menampilkan berbagai (lebih dari satu) bentuk strategi pembelajaran? (Misal : diskusi/tanya jawab, probel based learning, collaborative learning, student review/summary, informais visual, contoh dan analogi, online discussion)', 'Tambahkan strategi pembelajaran pada materi yang ada'),
(7, 1, 3, 'Keberadaan referensi/materi bersifat obyektif', 'Apaakh materi pembelajaran yang terdapat pada e-learning ini isertai dengan sumber referensinya?', 'Sertakan sumber referensi pada setiap materi pembelajaran'),
(8, 1, 4, 'Pembagian materi pembelajaran jelas', 'Apakah outline materi pembelajaran tercantum dengan jelas?', 'Perjelas outline materi pembelajaran'),
(9, 1, 4, 'Organisasi/pengaturan materi pembelajaran jelas', 'Apakah materi pembelajaran dibuat per topik atau per pertemuan sesuai dengan SAP?', 'Atur materi pembelajaran per topik atau per pertemuan agar sesuai dengan SAP'),
(10, 1, 4, 'Sistematika materi pembelajaran: introduction', 'Apakah setiap materi pembelajaran sudah mengandung introduction (kata pembuka, bisa pula ditambahkan outline materi) ?', 'Tambahkan introduction (kata pembuka, bisa pula berupa outline materi) pada setiap materi pembelajaran'),
(11, 1, 4, 'Sistematika materi pembealjaran: summary', 'Apakah setiap materi pembelajaran sudah mengandung summary (rangkuman) ?', 'Tambahkan rangkuman pada setiap materi pembelajaran'),
(12, 1, 4, 'Sisttematika materi pembelajaran: assessment/assignment', 'Apakah setiap materi pembelajaran sudah mengandung assignment dan assessment?', 'Tambahkan assignment dan assessment pada setiap materi pembelajaran'),
(13, 1, 5, 'Link dan menu berfungsi dengan baik', 'Apakah menu dan link yang terdapat pada sistem e-learning tidak ada yang broken(semua menu bisa diakses) ?', 'Periksa menu dan link yang terdapat pada sistem e-learning agar semua bisa diakses'),
(14, 1, 5, 'Navigasi tampil jelas dan mudah dipahami', 'Apakah nivgasi antar halaman tampil jelas (mudah dipahami) ?', 'Buat navigasi antar halaman agar tampil jelas dan mudah dipahami?'),
(15, 1, 6, 'Terdapat fasilitas untuk melakukan komunikasi dan interaksi', 'Apakah e-learning ini menampilkan (lebih dari satu) fasilitas interaksi dan komunikasi antar user? (contoh : diskusi/chat, forum diskusi, personal message, newsgroup', 'Tambahkan lebih dari satu fasilitas interaksi dan komunikasi antar user'),
(16, 1, 6, 'Terdapat fasilitas pencarian', 'Apakah e-learning ini menampilkan fasilitas pencarian?', 'Sediakan fasilitas pencarian pada e-learning ini'),
(17, 1, 6, 'Terdapat fasilitas download materi', 'Apakah materi pembelajaran dapat didownload?', 'Sediakan fasilitas untuk mendownload materi pembelajaran'),
(18, 1, 6, 'Terdapat fasilitas penunjang proses download', 'Apakah e-learning menyediakan software untuk mempercepat proses download?', 'Sediakan software untuk mempercepat proses download pada e-learning'),
(19, 1, 7, 'Vaariasi media pembelajaran', 'Apakah materi pembelajaran disampaikan dengan menggunakan berbagai (lebih dari satu) format? (misal : ppt, pdf, doc, dll)', 'Sampaikan materi pembelajaran dalam format yang bervariasi (misal : pdf,ppt, doc, dll)'),
(20, 1, 8, 'Grafis dan teks saling menunjang untuk mempermudah pemahaman materi', 'Apakah dalam materi pembelajaran selain dijelaskan dengan teks, juga ditampilkan dengan menggunakan grafik untuk menambah kemudahan pemahaman materi?', 'Tambahkan grafik atau gambar pada materi pembelajaran'),
(21, 1, 8, 'Desain animasi menunjukkan informasi yang jelas', 'Apakah dalam materi pembelajaran selain dijelaskan dengan teks, juga ditampilkan dengan menggunakan animasi untuk menambah kemudahan pemahaman materi?', 'Tambahkan animasi pada materi pembelajaran untuk menambah kemudahan pemahaman materi'),
(22, 1, 9, 'Terdapat fasilitas evaluasi hasil pembelajaran', 'Apakah sistem e-learning menyediakan fasilitas latihan soal-soal untuk mengevaluasi materi pembelajaran?', 'Sediakan fasilitas latihan soal-soal untuk evaluasi'),
(23, 1, 9, 'Model evaluasi mampu menunjukkan tingkat kompetensi', 'Apakah evaluasi hasil pembelajaran tiap materi dilakukan lebih dari 1x?', 'Tambahkan evaluasi hasil pembelajaran untuk tiap materi agar lebih dari 1x'),
(24, 1, 10, 'sistem menyediakan fitur untuk mengetahui skenario pembelajaran pada periode sebelumnya', 'Apakah e-learning ini menyimpan skenario pembelajaran pada periode sebelumnya?', 'Sediakan informasi mengenai skenario pembelajaran pada periode sebelumnya'),
(25, 2, 11, 'Sistem menyediakan panduan administrasi pendaftaran', 'Apaakh sistem meyediakan panduan administrasi untuk pendaftaran user', 'Sediakan panduan administrasi untuk proses pendaftaran user'),
(26, 2, 11, 'Sistem menyediakan informasi konsultasi bagi siswa terkait dengan sistem pembelajaran untuk menyelesaikan degree program', 'Apakah sistem menyediakan informasi konsultasi bagi siswa terkait dengan sistem pembelajaran untuk menyelesaikan degree program?', 'Sediakan informasi konsultasi bagi siswa terkait dengan sistem pembelajaran untuk meyleseaikan degree program'),
(27, 2, 11, 'Program flexibility', 'Apakah user dapat secara fleksibel menentukan mata kuiah apa asja yang diambilnya untuk menyelesaikan degree program', 'Sediakan menu agar user fleksibel dalam menentukan matakuliah apa saja yang diambilnya'),
(28, 2, 12, 'Terdapat mekanisme penilaian pembelajaran', 'Apakah e-learning menampilkan panduan/mekanisme/aturan penilaian?', 'Sediakan panduan/mekanisme/aturan penilaian'),
(29, 2, 12, 'Terdapat mekanisme penilaian tugas', 'Apakah e-learning menampilkan panduan/mekanisme/aturan pengumpulan tugas?', 'Tampilkan panduan/mekanisme/aturan pengumpulan tugas'),
(30, 2, 13, 'Terdapat bentuk evaluasi kompetensi berupa pre-test', 'Apakah di setiap materi pembelajaran terdapat fisiltas pre-test?', 'Sediakan fasilitas pre-test pada setiap materi pembelajaran'),
(31, 2, 13, 'Terdapat bentuk evaluasi kompetensi berupa final exam', 'Apakah setiap materi pembelajaran menyediakan evaluasi hasil belajar yang berupa final exam?', 'Sediakan evaluasi hasil belajar pada setiap materi pembelajaran dalam bentuk final exam');

-- --------------------------------------------------------

--
-- Table structure for table `normalized_table`
--

CREATE TABLE `normalized_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
  `value` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proc_name` varchar(45) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `proc_name`, `cat_id`) VALUES
(1, 'Learning Objectives', 1),
(2, 'Concepts of Content', 1),
(3, 'Didactical Concept', 1),
(4, 'Organizational Concept', 1),
(5, 'Technical Concept', 1),
(6, 'Concept for Media and Interaction Design', 1),
(7, 'Media Concept', 1),
(8, 'Communication Concept', 1),
(9, 'Concept for Test and Evaluation', 1),
(10, 'Concept of Maintenance', 1),
(11, 'Administration', 2),
(12, 'Activities', 2),
(13, 'Review of Competency Levels', 2);

-- --------------------------------------------------------

--
-- Table structure for table `random_index`
--

CREATE TABLE `random_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n` int(11) NOT NULL,
  `R` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `random_index`
--

INSERT INTO `random_index` (`id`, `n`, `R`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0.58),
(4, 4, 0.9),
(5, 5, 1.12),
(6, 6, 1.24),
(7, 7, 1.32),
(8, 8, 1.41),
(9, 9, 1.45),
(10, 10, 1.49),
(11, 11, 1.51),
(12, 12, 1.48),
(13, 13, 1.56),
(14, 14, 1.57),
(15, 15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `raw_table`
--

CREATE TABLE `raw_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
  `value` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elearning_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `score_process` text,
  `recommendation` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elearning_id_idx` (`elearning_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `role`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@aol.com', 0, 0),
(2, 'adhi', '092bcc1028d905aa6c2c30ebe833f90f', 'adhi', 'adhi@aol.com', 2, 0),
(3, 'wica', '4593b4f992ef550397b7fe63b6c3fd88', 'wica', 'wica@aol.com', 2, 0),
(4, 'sono', '4179bfaf174de35ac247edf34184942f', 'sono', 'sono@aol.com', 2, 0),
(5, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi', 'budi@aol.com', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `elearning_id` FOREIGN KEY (`elearning_id`) REFERENCES `elearning` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
