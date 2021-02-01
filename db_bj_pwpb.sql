-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 11:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bj_pwpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nama`, `alamat`, `email`, `jurusan`, `gambar`) VALUES
(1, 1234567890, 'Bagus Java', 'JL.PONDOK INDAH 74  RT2 / RW7 GENENGAN, PAKISAJI, MALANG', 'bagusjava7@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fba4c121563e.jpg'),
(2, 1234567891, 'Eka Rifut Nur Mustaqim  aaa', 'Jl.Raya Kanjuruhan', 'ekarifut@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fba4c7b7574e.jpg'),
(4, 1234567892, 'Prayudi Lestantyo', 'Jl.Perum Permata Jingga', 'prayudi@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fba4c2a9646c.jpg'),
(5, 1234567893, 'Nico Pradana', 'Jl.Raya Talangagung', 'nico@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fbba3c9b9fcc.jpg'),
(6, 1234567894, 'Puad Siswahyudi', 'Jl.Raya Tajinan', 'Puad@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fbba431ee4eb.jpg'),
(7, 1234567895, 'Henry Cahyo Nugroho', 'Jl.Raya Gondanglegi', 'henry@gmail.com', 'TEKNIK KOMPUTER JARINGAN', '5fbba4be484c0.jpg'),
(8, 1234567896, 'Wahyudi Harianto', 'Jl.Raya Pakisaji', 'wahyudi@gmail.com', 'REKAYASA PERANGKAT LUNAK', '5fbba5f87e140.jpg'),
(9, 1234567897, 'aa', 'aa', 'aa@aa.com', 'a', '5fbde7868535c.png'),
(11, 2147483647, 'ratna123', 'ratna123', 'ratna123', 'ratna123', '600e56c1e69d1.jpg'),
(12, 23423, 'acil123', 'acil123', 'acil123', 'acil123', '600e68fdc1cfa.jpg'),
(13, 212, 'anjely', 'anjely', 'anjely', 'anjely', '600fb8cd0b947.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'bagusjava', '$2y$10$SS9XT0RtC9eXSe.NR19qEORSI/Ypa97qDm1MrnPNrjtuo4//xYUFe'),
(2, 'fanesa', '$2y$10$lO4tUFH6RLkm5MdxfFT1M.gCP5jTyWN4MlKRL.KwV4i.uxc9Fb2cu'),
(3, 'yuan1234', '$2y$10$lJq/DIlVS9MEXMENF3JYqOwL1AD1kLpv3l444vbqQ6nZD4aim6zAq'),
(4, 'ratna123', '$2y$10$9uj3YFJMq.hF.6Q/2JfFve0CdoESYLBiqDxlksSvbarK4NuXS/5PO'),
(5, 'acil123', '$2y$10$8CBOv161A/5mNxS0ES2f4eBLacuoSPePnOBi9f10nl2SJEhDrtxlS'),
(6, 'anjely', '$2y$10$/IpDh0mR53YnQ2BzjFqZYeHdy62VD3hB6UjaS3ifQa0CvlvY./ohi'),
(7, 'veren123', '$2y$10$7tmkpA9xunJX7LG.arcug.LxOcPUnJRidm9hPHSxykYOOfVdzKREm'),
(8, 'alfin123', '$2y$10$a8Z.O9GbV28G/dUO.FGQAeMfpSzJPGE0TQvOPvZhyeo8PIgBzoTy.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
