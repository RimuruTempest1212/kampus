-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2024 at 01:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_aldi_s`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `pk_jenis_beasiswa_id` int NOT NULL,
  `jenis_beasiswa` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`pk_jenis_beasiswa_id`, `jenis_beasiswa`, `keterangan`) VALUES
(1, 'Beasiswa JFLS ', 'bertujuan untuk menyiapkan generasi muda Jawa Barat sebagai calon pemimpin di masa depan yang memiliki jiwa kepemimpinan dan kewirausahaan. Setiap mahasiswa nantinya akan menerima manfaat berupa bantuan biaya pendidikan serta program pendampingan di setiap tahunnya.'),
(3, 'Beasiswa BCA Finance', 'Beasiswa pertama yang bisa kamu coba adalah Beasiswa BCA Finance. BCA sebagai salah satu bank swasta di Indonesia memberikan kesempatan kepada mahasiswa/mahasiswi berprestasi yang sedang menempuh pendidikan di jenjang Sarjana (S1) semua jurusan di Perguruan Tinggi Negeri ataupun Perguruan Tinggi Swasta. Beasiswa BCA Finance yang diberikan berlaku selama mahasiswa menempuh pendidikan dalam rentang waktu normal yaitu 8 semester.\r\n\r\nDalam menentukan penerima beasiswa, BCA melakukan proses seleksi yang ketat terhadap para pendaftar agar beasiswa yang diberikan dapat diterima oleh mahasiswa yang benar-benar membutuhkan. Syarat untuk mendapatkan beasiswa BCA Finance adalah IPK minimal 3,00 untuk PTN dan minimal 3,40 untuk PTS.'),
(4, 'Beasiswa Bidikmisi', 'elanjutnya adalah beasiswa Bidikmisi. Jenis beasiswa ini merupakan bantuan biaya pendidikan bagi calon mahasiswa yang tidak mampu secara ekonomi dan memiliki potensi akademik baik untuk menempuh pendidikan di perguruan tinggi pada program studi unggulan sampai lulus tepat waktu. Beasiswa Bidikmisi diberikan sejak mahasiswa ditetapkan sebagai penerima Bidikmisi di perguruan tinggi.\r\n\r\nUntuk S1 atau Diploma IV beasiswa diberikan hingga 8 semester, D3 maksimal 6 semester, D2 maksimal 4 semester, dan D1 maksimal 2 semester. Selain itu diberikan juga beasiswa untuk program profesi, diantaranya dokter maksimal 4 semester, dokter gigi maksimal 4 semester, dokter hewan maksimal 4 semester, serta Ners dan Apoteker maksimal 4 semester.'),
(5, 'Beasiswa KIP Kuliah', 'Ada lagi nih kawan, beasiswa KIP kuliah yang juga bisa kamu manfaatkan ketika kamu ingin masuk ke perguruan tinggi. Program KIP-K atau Program Kartu Indonesia Pintar Kuliah merupakan program bantuan biaya pendidikan dari Pemerintah melalui Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemdikbudristek) yang bekerjasama dengan berbagai perguruan tinggi baik negeri maupun swasta.\r\n\r\nSalah satu tujuan diadakannya program KIP Kuliah ini yaitu meningkatkan perluasan akses dan kesempatan belajar di Perguruan Tinggi (PT) bagi mahasiswa Warga Negara Indonesia (WNI) yang tidak mampu secara ekonomi.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `pk_login_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`pk_login_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$pjkUbDzZBDb5pVdHT1Kd0exmi6L/i809x/lpv/go/zrvhVbVI3m36', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `pk_mahasiswa_id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `pk_pendaftaran_id` int NOT NULL,
  `fk_mahasiswa_id` int NOT NULL,
  `semester` int NOT NULL,
  `berkas` varchar(200) NOT NULL,
  `fk_jenis_beasiswa_id` int NOT NULL,
  `status_ajuan` enum('belum di verifikasi','Diverifikasi','lulus','gagal') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transkrip_nilai`
--

CREATE TABLE `transkrip_nilai` (
  `pk_nilai_id` int NOT NULL,
  `nilai_semester1` float NOT NULL,
  `nilai_semester2` float NOT NULL,
  `nilai_semester3` float NOT NULL,
  `nilai_semester4` int NOT NULL,
  `nilai_semester5` int NOT NULL,
  `nilai_semester6` int NOT NULL,
  `nilai_semester7` int NOT NULL,
  `nilai_semester8` int NOT NULL,
  `fk_mahasiswa_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transkrip_nilai`
--

INSERT INTO `transkrip_nilai` (`pk_nilai_id`, `nilai_semester1`, `nilai_semester2`, `nilai_semester3`, `nilai_semester4`, `nilai_semester5`, `nilai_semester6`, `nilai_semester7`, `nilai_semester8`, `fk_mahasiswa_id`) VALUES
(1, 3.3, 3.3, 3.3, 0, 0, 0, 0, 0, 0),
(2, 3.4, 4.4, 3.4, 0, 0, 0, 0, 0, 0),
(3, 3.2, 3.2, 3.2, 0, 0, 0, 0, 0, 0),
(4, 3.4, 4.4, 3.4, 0, 0, 0, 0, 0, 0),
(5, 3.2, 4.4, 3.2, 0, 0, 0, 0, 0, 0),
(6, 80, 90, 90, 90, 90, 90, 90, 90, 0),
(7, 123, 123, 123, 0, 0, 0, 0, 0, 0),
(8, 232, 232, 232, 0, 0, 0, 0, 0, 0),
(9, 1233, 12312, 12312, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 12),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 14),
(13, 223, 231, 3, 3123, 123, 133, 2133, 123, 15),
(14, 121, 212, 12, 1212, 212, 121, 121, 121, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`pk_jenis_beasiswa_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`pk_login_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`pk_mahasiswa_id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`pk_pendaftaran_id`),
  ADD KEY `fk_mahasiswa_id` (`fk_mahasiswa_id`),
  ADD KEY `fk_jenis_beasiswa_id` (`fk_jenis_beasiswa_id`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  ADD PRIMARY KEY (`pk_nilai_id`),
  ADD KEY `fk_mahasiswa_id` (`fk_mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `pk_jenis_beasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `pk_login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `pk_mahasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `pk_pendaftaran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  MODIFY `pk_nilai_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`fk_mahasiswa_id`) REFERENCES `mahasiswa` (`pk_mahasiswa_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`fk_jenis_beasiswa_id`) REFERENCES `jenis_beasiswa` (`pk_jenis_beasiswa_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`semester`) REFERENCES `transkrip_nilai` (`pk_nilai_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
