-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2025 at 02:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pengalaman` text,
  `skill` text,
  `cv_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `nama`, `tempat_lahir`, `alamat`, `no_hp`, `pendidikan`, `pengalaman`, `skill`, `cv_file`) VALUES
(1, 3, 'Kalandra Aldiba Prasetyo', 'Kota Depok', 'Jl.raya Gamon, Ayo move on. No:34, jakarta ', '099878876545', 'Bimba kelas A', 'Pernah bantuin kaka jian ngoding', 'bisa ngambek', 'uploads/cv/3_1748068854.pdf'),
(2, 7, 'jihan', 'Depok', 'jl.raya isekai 23', '099878876545', 'a', 'a', 'a', 'uploads/cv/7_1748171416.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `job_id` int NOT NULL,
  `tanggal_lamar` date DEFAULT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `applicant_id`, `job_id`, `tanggal_lamar`, `status`) VALUES
(1, 1, 1, '2025-05-25', 'Menunggu'),
(2, 1, 2, '2025-05-25', 'Menunggu'),
(10, 2, 1, '2025-05-25', 'Menunggu'),
(11, 2, 2, '2025-05-25', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `email_perusahaan` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `nama_perusahaan`, `alamat`, `email_perusahaan`, `no_telp`, `deskripsi`, `logo`) VALUES
(1, 4, 'Jovean Tech', 'jakarta barat nomor 23', 'jovean_id@gmail.com', '087234567992', 'JOVEAN TECH adalah perusahaan yang berjalan di bidang technologi pembuatan website serta oembuatan aplikasi mobile', 'images/maven.jpg'),
(2, 5, 'Indie Tech', 'Jl Pahlawan Revolusi No. 1 Jakarta', 'info@indi.tech', '082122086938', 'Providing IT solutions and digital platforms for your needs. Crafting an awesome and useful digital products that grow your business.', 'images/navtan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies`
--

CREATE TABLE `job_vacancies` (
  `id` int NOT NULL,
  `company_id` int NOT NULL,
  `judul_pekerjaan` varchar(255) NOT NULL,
  `deskripsi` text,
  `syarat` text,
  `gaji` decimal(12,2) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tanggal_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_vacancies`
--

INSERT INTO `job_vacancies` (`id`, `company_id`, `judul_pekerjaan`, `deskripsi`, `syarat`, `gaji`, `lokasi`, `tanggal_post`) VALUES
(1, 1, 'Machine Learning Engginer', 'Mencari Machine Learning Engginer FRESH GRADUATE', '1. Bisa mengoperasikan sistem linux\r\n2. Bisa bekerja dalam Team\r\n3. Bisa menerima masukan dan saran\r\n', '34000000.00', 'WFH', '2025-05-25'),
(2, 2, '3D Design JS', 'Mencari seseorang yang bisa menggunakan 3js dengan baik untuk website dan mobile.', '1. Memiliki akal sehat\r\n2. Rajin Sholat\r\n3. Bisa mengoperasikan Linux\r\n4. Mempunyai Skill Design 3D', '20000000.00', 'Jl Pahlawan Revolusi No. 1 Jakarta', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `applicant_id`, `linkedin`, `instagram`, `created_at`) VALUES
(1, 1, 'linkedin.com/in/jihan-aulia-a25b7634b/', 'https://www.instagram.com/jiannnala/', '2025-05-23 11:21:59'),
(2, 2, 'linkedin.com/in/jihan-aulia-a25b7634b/', 'https://www.instagram.com/jiannnala/', '2025-05-25 15:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Applicant','Company') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'nala', 'jiannala@gmail.com', '123', 'Applicant', '2025-05-23 07:06:57'),
(2, 'admin_joko', 'admin_joko@gmail.com', '123', 'Admin', '2025-05-23 07:07:36'),
(3, 'kala', 'kala@gmail.com', '123', 'Applicant', '2025-05-23 10:47:07'),
(4, 'Jovean_company', 'jovean_id@gmail.com', '123', 'Company', '2025-05-25 09:19:00'),
(5, 'IndieTech', 'indietech@gmail.com', '123', 'Company', '2025-05-25 10:00:07'),
(7, 'nalan', 'annala@gmail.com', '123', 'Applicant', '2025-05-25 11:09:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job_vacancies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD CONSTRAINT `job_vacancies_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_media`
--
ALTER TABLE `social_media`
  ADD CONSTRAINT `social_media_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
