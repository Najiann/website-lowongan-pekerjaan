-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2024 at 05:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id_applicant` int NOT NULL,
  `Id_User` int DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone_Number` int DEFAULT NULL,
  `Date_Regist` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id_applicant`, `Id_User`, `Name`, `Phone_Number`, `Date_Regist`) VALUES
(1, 3, 'Rajaskara Companny', 989098, '2024-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `application_pool`
--

CREATE TABLE `application_pool` (
  `Id_application_pool` int NOT NULL,
  `Id_Applicant` int DEFAULT NULL,
  `Id_Job` int DEFAULT NULL,
  `Date_Apply` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `Id_Apply` int NOT NULL,
  `Name_Applicant` varchar(255) NOT NULL,
  `Place_of_Birth` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `No_Telephone` varchar(20) DEFAULT NULL,
  `Work_Experience` text,
  `Last_Education` varchar(255) NOT NULL,
  `Capabilities` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`Id_Apply`, `Name_Applicant`, `Place_of_Birth`, `Address`, `Email`, `No_Telephone`, `Work_Experience`, `Last_Education`, `Capabilities`) VALUES
(1, 'Hegar Aditya Ladzuard', 'Bandung', '123 Jalan Merah, Bandung', 'hegar.ladzuard@email.com', '123450', '2 years in design', 'Bachelor\'s in Visual Communication', 'Creativity, teamwork'),
(2, 'Amaiiisann', 'Jakarta', '456 Jalan Hijau, Jakarta', 'amaiiisann@email.com', '234901', '1 year in social media management', 'Diploma in Digital Marketing', 'Social media, content creation'),
(3, 'Reiga Saskara', 'Surabaya', '789 Jalan Biru, Surabaya', 'reiga.saskara@email.com', '345672', '3 years in software development', 'Bachelor\'s in Computer Science', 'Programming, problem-solving'),
(4, 'Baskara Putra', 'Yogyakarta', '101 Jalan Kuning, Yogyakarta', 'baskara.putra@email.com', '450123', '4 years in journalism', 'Bachelor\'s in Journalism', 'Writing, research'),
(5, 'Ananta Pradipta', 'Semarang', '202 Jalan Ungu, Semarang', 'ananta.pradipta@email.com', '567234', '2 years in project management', 'Master\'s in Business Administration', 'Leadership, planning'),
(6, 'Kalandra Aldiba', 'Denpasar', '303 Jalan Putih, Denpasar', 'kalandra.aldiba@email.com', '678905', '5 years in finance', 'Bachelor\'s in Accounting', 'Financial analysis, budgeting'),
(7, 'Bumi Pramana', 'Makassar', '404 Jalan Abu-Abu, Makassar', 'bumi.pramana@email.com', '789056', '1 year in teaching', 'Bachelor\'s in Education', 'Teaching, curriculum development'),
(8, 'Langit Pramuda', 'Medan', '505 Jalan Coklat, Medan', 'langit.pramuda@email.com', '8904567', '3 years in data analysis', 'Master\'s in Data Science', 'Data analysis, critical thinking'),
(9, 'Semesta Langkara', 'Palembang', '606 Jalan Emas, Palembang', 'semesta.langkara@email.com', '901278', '2 years in marketing', 'Bachelor\'s in Business', 'Marketing strategy, communication'),
(10, 'Jinan Sungkara', 'Solo', '707 Jalan Perak, Solo', 'jinan.sungkara@gmail.com', '1239860', '4 years in customer service', 'Bachelor\'s in Psychology', 'Customer relations, empathy'),
(11, 'Reiga Artha Saskara', 'Yogyakarta', 'Solo', 'reiga@gmail.com', '8121314', 'CEO', 's3 informatika', 'banyak'),
(14, 'MIng Hao', 'China', 'Korea', 'MInghaomiksu@gmail.com', '912813193', 'idol', 's3 permiksuan', 'banyak'),
(15, 'Alana Alvarendra', 'Jakarta', 'jakarta pusat', 'alana@gmail.com', '081210136998', 'ceo', 's3', 'mantap'),
(16, 'jihan aulia', 'depok', 'jl raya bogor', 'jiannala@gmail.com', '081210136992', 'Joki coding + blender', 's3 master informatika', 'banyak aammin'),
(17, 'anaskara', 'Yogyakarta', 'Indonesia', 'anaskara@gmail.com', '0912813193', 'ceo', 'S3 Marketing', 'bnyk'),
(18, 'anaskara', '', 'Indonesia', '', '0919321438648`', 'ceo', 's3 master informatika', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id_Company` int NOT NULL,
  `Name_Company` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email_Company` varchar(255) NOT NULL,
  `Phone_Company` int NOT NULL,
  `Deskripsi_Company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `id_job` int NOT NULL,
  `id_company` int DEFAULT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `job_desk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `job_requirement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_User` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` int NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_User`, `email`, `password`, `role`) VALUES
(1, 'admin@jobportal.com', 111111, 'Admin'),
(2, 'support@jobportal.com', 222222, 'Admin'),
(3, 'company1@business.com', 333333, 'Company'),
(4, 'company2@business.com', 444444, 'Company'),
(5, 'company3@business.com', 555555, 'Company'),
(6, 'company4@business.com', 666666, 'Company'),
(7, 'company5@business.com', 777777, 'Company'),
(8, 'company6@business.com', 888888, 'Company'),
(9, 'hegar.ladzuard@gmail.com', 123123, 'Applicant'),
(10, 'amaiiisann@gmail.com', 234234, 'Applicant'),
(11, 'reiga.saskara@gmail.com', 345345, 'Applicant'),
(12, 'baskara.putra@gmail.com', 456456, 'Applicant'),
(13, 'ananta.pradipta@gmail.com', 567567, 'Applicant'),
(14, 'kalandra.aldiba@gmail.com', 678678, 'Applicant'),
(15, 'bumi.pramana@gmail.com', 789789, 'Applicant'),
(16, 'langit.pramuda@gmail.com', 890890, 'Applicant'),
(17, 'semesta.langkara@gmail.com', 901901, 'Applicant'),
(18, 'jinan.sungkara@gmail.com', 912912, 'Applicant'),
(19, 'jokorich@gmail.com', 21323, 'Applicant'),
(20, 'jokoricht2@gmail.com', 524214, 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id_applicant`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `application_pool`
--
ALTER TABLE `application_pool`
  ADD PRIMARY KEY (`Id_application_pool`),
  ADD KEY `Id_Applicant` (`Id_Applicant`),
  ADD KEY `Id_Job` (`Id_Job`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`Id_Apply`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id_Company`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `Id_Company` (`id_company`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id_applicant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_pool`
--
ALTER TABLE `application_pool`
  MODIFY `Id_application_pool` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `Id_Apply` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id_Company` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id_job` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `tb_user` (`id_User`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `application_pool`
--
ALTER TABLE `application_pool`
  ADD CONSTRAINT `application_pool_ibfk_1` FOREIGN KEY (`Id_Applicant`) REFERENCES `apply` (`Id_Apply`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_pool_ibfk_2` FOREIGN KEY (`Id_Job`) REFERENCES `job_vacancy` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD CONSTRAINT `job_vacancy_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`Id_Company`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
