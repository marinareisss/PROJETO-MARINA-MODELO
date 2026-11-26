-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2026 at 11:30 PM
-- Server version: 10.11.19-MariaDB
-- PHP Version: 8.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribuidora`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `login`, `senha`, `perfil`) VALUES
(1, 'wellington', 'wellingtonteste', '$2y$10$vzCeJ2exvw/b.Ed3Re6AJ.AFNCDAJaXAtYMIznfKkEBZc7QX2Ggve', 'admin'),
(2, 'Wellington Nascimento', 'WellingtonLoS', '$2y$10$TQhmUzI1msCMbJTnvvCRseQ.TydKMSboaX7cjI4/ykXipqOX08.BS', 'Professor'),
(3, 'Wellington Ribeiro', 'WellingtonTB', '$2y$10$yR/5F7XwnSFyatw9DaEWsuIvD6GQvk9SWL.tbXR1hjp8tnnE8M4e6', 'aluno'),
(4, 'Wellington Teste', 'WellingtonLoSTeste', '$2y$10$O8YCY4N1fxf5WIWZZqMrr.ThDBcMLbxBpJTBZXfOKNAHO/NvBDHUG', 'professor'),
(5, 'Wellington Ribeiro', 'Wellteste2026', '$2y$10$YLBlonvQsTikKg5GFxzbKu8RL8sU4nUmnfFmgc/CsFZsdXfCqFOe.', 'usuario'),
(6, 'teste do teste do wellington', 'testedoprof', '$2y$10$qhz7I4exBtAeIE5Swhaw2OKhHT.NRfvIOIm2Pzf2tbJ8o4FWDBRUy', 'usuario'),
(7, 'Wellington Turma F', 'wellturmaf', '$2y$10$tReuAeRwO2Qj.lh.K1IOc.Mr7lLnkrNKrCGJ71r.mzRYJwniagUwO', 'aluno'),
(8, 'Wellington StarLord', 'WellStarLord', '$2y$10$d7G0UNUNY7DlOk8Q.EH7TuJyvjpfQB5YvVQlPcbi.9pAKHGD4Tbiu', 'admin'),
(9, 'Wellington Teste Numero Sei lá', 'wellingtonsei_la', '$2y$10$2W1IgRIlLeSokxK8/IfWz.fTT8DtWmXa2XYGh.Zd4lcDdAzHp1h6.', 'admin'),
(10, 'Ribeiro ', 'ribeirowell', '$2y$10$cme8EndMIyPLQeoZWg4Biuqc/8k3j12fT/PS/ha6GYSqqBo2Ci/oS', 'admin'),
(11, 'LuckskyWalker Nascimento', 'Luckskywalker', '$2y$10$Yj5PBvbcTOE9lZByk8393.1okpz5AIlkDH7c.PTOYyWO7r9wSbVWm', 'admin'),
(12, 'Berserk o Dinamarques', 'Berserk2026', '$2y$10$09xNLolrvbfFf9hnqKBn4eXF6G/AL.Mf2Xjpm9Om9PO/ShAKkaYe.', 'admin'),
(14, 'Wellington Teste 1000', 'wellingtonmil', '$2y$10$y6.yA6DDfL3UtNk5nJTt1epo9jjtlXs7FF6N.ujmuywkXHZTPUqru', 'admin'),
(15, 'lucas', 'lucasteste', '$2y$12$YyAclbJYBXtyOmlv2ZwtAeju5gqES40mXDabtQuCNY/f4CA5olcq2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
