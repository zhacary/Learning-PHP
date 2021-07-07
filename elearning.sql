-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2021 at 02:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `kode_materi` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kode_jurusan` varchar(25) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `jam` time NOT NULL,
  `ID_User` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `kode_materi`, `nip`, `nim`, `nama_siswa`, `kode_jurusan`, `tanggal_upload`, `jam`, `ID_User`) VALUES
(2, 'M0013', 'N001', '08766467865', 'anggi aulia ramadhani', 'KA212', '2020-01-06', '00:49:00', '27'),
(3, 'M0013', 'N001', '958938', 'Gunawan', 'KA212', '2021-01-07', '00:50:00', '39'),
(4, 'TS001', 'N001', '08766467865', 'anggi aulia ramadhani', 'KA212', '2020-01-08', '07:30:00', '27'),
(5, 'SFH009', 'SFH001', '141251345345', 'sakianh', 'TI411', '2021-02-02', '05:48:58', '48'),
(8, 'C003', 'N001', '180441180033', 'chandra ariadi pratama', 'TI411', '2021-02-17', '20:55:32', '26'),
(9, 'SFH009', 'SF001', '180441180033', 'chandra ariadi pratama', 'TI411', '2021-02-17', '21:03:45', '26');

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(11) NOT NULL,
  `nama_apk` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `nama_apk`, `logo`) VALUES
(2, 'E-Learning', '');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nama_dosen` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ID_User` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nama_dosen`, `ttl`, `tempat`, `jk`, `nip`, `matkul`, `gambar`, `ID_User`) VALUES
('Ninik Diah', '2020-11-08', 'Solo', 'Perempuan', 'N001', 'Matematika', '5faa6821c92ce.jpg', '31'),
('shafa haniah', '2020-11-09', 'Bogor', 'Perempuan', 'SF001', 'Biologi', '5fa95de8f2e01.jpg', '38');

-- --------------------------------------------------------

--
-- Table structure for table `jawab_essay`
--

CREATE TABLE `jawab_essay` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `kode_essay` varchar(25) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `j_essay` varchar(50) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `ID_User` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawab_essay`
--

INSERT INTO `jawab_essay` (`id`, `nama_siswa`, `kode_essay`, `kode_jurusan`, `j_essay`, `tanggal_upload`, `ID_User`, `nilai`) VALUES
(1, 'anggi aulia ramadhani', 'T001', 'KA212', '5fc5ea2432502.docx', '2020-11-02', 27, '70'),
(2, 'Gunawan ', 'T001', 'KA212', 'SURAT_PENGANTAR_CHANDRA_ARIADI_TI411.pdf', '2021-02-02', 39, '80'),
(9, 'Gunawan ', 'TY986', 'KA212', 'lihat_nilai.php.pdf', '2021-02-12', 39, '70');

-- --------------------------------------------------------

--
-- Table structure for table `jawab_pg`
--

CREATE TABLE `jawab_pg` (
  `id` int(11) NOT NULL,
  `kode_pg` varchar(25) NOT NULL,
  `ID_User` varchar(11) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `nilai_pg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawab_pg`
--

INSERT INTO `jawab_pg` (`id`, `kode_pg`, `ID_User`, `nama_siswa`, `nilai_pg`) VALUES
(3, 'kjnsdkjffzskjd573', '27', 'anggi aulia ramadhani', '25.0'),
(4, 'jhs52256', '26', 'chandra ariadi pratama', '37.5'),
(5, 'kjnsdkjffzskjd573', '39', 'Gunawan ', '12.5');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_materi`
--

CREATE TABLE `komentar_materi` (
  `id` int(11) NOT NULL,
  `kode_materi` varchar(50) NOT NULL,
  `isi_komentar` longtext NOT NULL,
  `ID_User` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_materi`
--

INSERT INTO `komentar_materi` (`id`, `kode_materi`, `isi_komentar`, `ID_User`, `tanggal`, `jam`, `hari`, `status`) VALUES
(28, 'M0013', 'hallo', '31', '2021-01-27', '18:01:44', 'Senin', 'Belum di baca'),
(30, 'M0013', 'ada orang kah', '31', '2021-01-27', '13:44:00', 'Wednesday', 'Sudah di Baca'),
(31, 'TS001', 'hai', '31', '2021-01-27', '13:48:00', 'Wednesday', 'Belum di baca'),
(35, 'M0013', 'ada bu', '27', '2021-01-27', '14:00:00', 'Wednesday', 'Sudah di baca'),
(36, 'M0013', 'bagus klu begituh', '31', '2021-01-28', '06:44:00', 'Thursday', 'Sudah di baca'),
(37, 'TS001', 'di sinih ada orang ?', '31', '2021-01-31', '16:42:00', 'Sunday', 'Belum di baca'),
(44, 'TR5433', 'dffg', '31', '2021-02-13', '17:46:00', 'Saturday', 'Belum di baca'),
(45, 'TS001', 'hallo ?', '31', '2021-02-13', '23:21:00', 'Saturday', 'Belum di baca'),
(46, 'TS001', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '31', '2021-02-13', '23:21:00', 'Saturday', 'Belum di baca'),
(47, 'jfvhwjgjefgjerh', 'hai', '39', '2021-02-13', '23:44:00', 'Saturday', 'Belum di baca'),
(48, 'jfvhwjgjefgjerh', 'hallo', '39', '2021-02-13', '23:45:00', 'Saturday', 'Belum di baca'),
(49, 'C003', 'hai', '31', '2021-02-15', '20:40:00', 'Monday', 'Belum di baca'),
(50, 'M0013', 'hkjsgkjsghkjs', '39', '2021-03-01', '22:00:00', 'Monday', 'Belum di baca'),
(51, 'M0013', 'sgsfgsdf', '39', '2021-03-01', '22:00:00', 'Monday', 'Belum di baca');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(25) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ID_User` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_siswa`, `ttl`, `tempat`, `jk`, `jurusan`, `kode_jurusan`, `telp`, `email`, `gambar`, `ID_User`) VALUES
('08766467865', 'anggi aulia ramadhani', '2020-11-06', 'Jakarta', 'Perempuan', 'Komputerisasi Akutansi', 'KA212', '3', '', '5faa6d17c2369.jpg', '27'),
('12939', 'Shakinah mawadah', '2021-02-02', 'Banjar', 'Perempuan', 'Teknik Informatika', 'TI411', '6', '', '6018d9ac50924.jpeg', '48'),
('144939968', 'Fajri habiebie', '2021-02-14', 'Bogor', 'Perempuan', 'Administrasi Perkantoran', 'AP122', '89765654309', 'fajri@mail.com', '6028b2c4046cf.jpeg', '49'),
('180441180033', 'chandra ariadi pratama', '2020-01-09', 'Bogor', 'Laki-laki', 'Teknik Informatika', 'TI411', '08988436575', 'cpratama828@gmail.com', '5fcf2cee5e553.jpg', '26'),
('958938', 'Gunawan ', '2020-12-08', 'Sukoharjo', 'Laki-laki', 'Komputerisasi Akutansi', 'KA212', '+6282249495157', 'gunawan@mail.com', 'gunawan foto.jpg', '39');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `nip` varchar(25) NOT NULL,
  `materi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `kode_materi` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`nip`, `materi`, `tanggal`, `kode_jurusan`, `kode_materi`, `jam`, `hari`) VALUES
('N001', 'CV.chandra ariadi pratama.docx', '2021-03-05', 'AP122', 'AP56', '14:52:27', 'KAMIS'),
('N001', 'Surat Permohonan Magang Pt.Puniar Jaya.pdf', '2021-02-11', 'TI411', 'C003', '06:48:00', 'KAMIS'),
('SF001', 'SURAT_PENGANTAR_CHANDRA_ARIADI_TI411.pdf', '2021-03-16', 'TI411', 'GT65', '20:06:20', 'SENIN'),
('SF001', '.pdf', '2021-01-29', 'KA212', 'iijfdg;ljs', '11:02:00', 'SENIN'),
('SF001', 'SURAT_PENGANTAR_CHANDRA_ARIADI_TI411.pdf', '2021-03-04', 'KA212', 'jfvhwjgjefgjerh', '11:13:00', 'SENIN'),
('D001', '30652971b970ac5f5322ee3b99f286ed', '2020-10-15', 'TI411', 'M001', '20:30:00', 'SENIN'),
('N001', '5fad2a2381b6b.pdf', '2020-11-12', 'KA212', 'M0013', '19:27:00', 'KAMIS'),
('D001', 'hari ini kita libur lagih dan lagih', '2020-10-08', 'TI411', 'MA002', '13:00:00', 'JUMAT'),
('SF001', '5fcbc3ed7c25d.docx', '2020-12-06', 'KA212', 'SF004', '01:32:00', 'KAMIS'),
('SF001', '.pdf', '2021-01-30', 'TI411', 'SFH009', '10:58:00', 'SENIN'),
('N001', 'lihat_nilai.php.pdf', '2021-02-12', 'TI411', 'TR5433', '18:02:40', 'RABU'),
('N001', '5fcd9f2c8f4d0.docx', '2020-01-08', 'KA212', 'TS001', '23:19:00', 'SENIN');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(25) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama_matku` varchar(255) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE `pg` (
  `kode_pg` varchar(25) NOT NULL,
  `judul_pg` varchar(25) NOT NULL,
  `kode_jurusan` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pg`
--

INSERT INTO `pg` (`kode_pg`, `judul_pg`, `kode_jurusan`, `nip`, `tanggal`, `jam`, `hari`) VALUES
('jhs52256', 'pg1', 'TI411', 'N001', '2021-02-22', '16:59:37', 'SENIN'),
('kjnsdkjffzskjd573', 'ksergiusk75374', 'KA212', 'N001', '2021-02-22', '17:05:30', 'KAMIS');

-- --------------------------------------------------------

--
-- Table structure for table `table_pg`
--

CREATE TABLE `table_pg` (
  `id_pg` int(11) NOT NULL,
  `kode_pg` varchar(25) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_pg`
--

INSERT INTO `table_pg` (`id_pg`, `kode_pg`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `tanggal`) VALUES
(2, 'jhs52256', 'jshgksjhgkjs', 'mmanabfma,dbf,ma', 'adbjbf,mnsb', ',jnsfkjanfkjasjnf', 'kkaksjfjkasj', 'c', '2021-02-22'),
(3, 'jhs52256', 'ngll eijh', 'h rther', 'jygjj', 'hh erhr', 'h terre', 'b', '2021-02-22'),
(4, 'jhs52256', 'hrj tutyutu', ' turet rth ', ' rtsry rtr', 'lkhiblhj', 'lkjnokjblkh', 'd', '2021-02-24'),
(5, 'jhs52256', 'ij hnv fenfi vnljknsjk', 'ljkfva hjhakjfh kb hvkh', ' hrrvggfhkv jkh vfhb', 'kkuhvbkbfhvBBRHHH', 'hdskjhf ksbjghish', 'a', '2021-02-24'),
(6, 'kjnsdkjffzskjd573', 'xxh skdhfdhfcaj', 'nbvghjsvjhvh fjsdfv', 'vg vihfvjksvjhfkjdsfjs', 'dgfvjkgfvkjdgfvkjsgfkgfk', 'fgvsdfu vkgfvkjsfgv ksdjgf', 'a', '2021-03-01'),
(7, 'kjnsdkjffzskjd573', 'jgj sahgfshdgfjjbdjfb asjf', 'j gsjdf fjsdhf jdsfgdfvuhf', 'ks fksjadf fdb ,ndbdb', ' g bhhfsh fkjfbkgfbhj', 's sfakskd jb sb jsbsj', ' c', '2021-03-01'),
(8, 'kjnsdkjffzskjd573', ',,mkj dshkzjncijBkjBkcddj khjdsfhjD', 'js gfsjgjk hgfhjgfdhvznbvchgsdvhgfgh', 'hhxcnVfnsdghgfjhGJHGFJ', 'jxdhgkdhgkjdfhgkjdfhgklsjhgkjdfgjkdhfkjghdkjfghkj', 'xjjhbshfvushskjvkj', 'b', '2021-03-01'),
(9, 'kjnsdkjffzskjd573', 'kvhh kjhkjbvnxcv', 'n gklsgkjgoshgjdfnkbjdnfkgmnfmgn,sngkjsfn', 'fkkjskjdvn.n,mzcnvn,mnvknv,mzbv', 'mnxbNXcbNXZbcm,zxbcmnBmnbmnzbmzn', 'fhjagjhgsajdSJdhkjlShdkjhdkJAHsd', 'c', '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_essay`
--

CREATE TABLE `tugas_essay` (
  `kode_essay` varchar(25) NOT NULL,
  `essay` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_essay`
--

INSERT INTO `tugas_essay` (`kode_essay`, `essay`, `tanggal`, `jam`, `hari`, `nip`, `kode_jurusan`) VALUES
('gjcfghhfghf', 'SURAT_PENGANTAR_CHANDRA_ARIADI_TI411.pdf', '2021-01-30', '11:38:00', 'SENIN', 'N001', 'TI411'),
('T001', '5fc5e6e932bc2.docx', '2020-11-18', '14:46:00', 'KAMIS', 'N001', 'KA212'),
('TG987', '5fcda34f4465b.docx', '2020-01-08', '23:36:00', 'SENIN', 'SF001', 'KA212'),
('TY986', 'SURAT_PENGANTAR_CHANDRA_ARIADI_TI411.pdf', '2021-02-12', '11:25:00', 'SELASA', 'N001', 'KA212');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Password`, `Level`) VALUES
(26, 'chandra ariadi', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(27, 'anggi', 'caf1a3dfb505ffed0d024130f58c5cfa', 'mahasiswa'),
(28, 'pratama ', '202cb962ac59075b964b07152d234b70', 'dosen'),
(31, 'Ninik', '202cb962ac59075b964b07152d234b70', 'dosen'),
(35, 'johan', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(38, 'shafa', '202cb962ac59075b964b07152d234b70', 'dosen'),
(39, 'Gun', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(40, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(47, 'nina', '202cb962ac59075b964b07152d234b70', 'dosen'),
(48, 'sakinah', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(49, 'fajri', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(51, 'irsan', '202cb962ac59075b964b07152d234b70', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jawab_essay`
--
ALTER TABLE `jawab_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawab_pg`
--
ALTER TABLE `jawab_pg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_materi`
--
ALTER TABLE `komentar_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `pg`
--
ALTER TABLE `pg`
  ADD PRIMARY KEY (`kode_pg`);

--
-- Indexes for table `table_pg`
--
ALTER TABLE `table_pg`
  ADD PRIMARY KEY (`id_pg`);

--
-- Indexes for table `tugas_essay`
--
ALTER TABLE `tugas_essay`
  ADD PRIMARY KEY (`kode_essay`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawab_essay`
--
ALTER TABLE `jawab_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jawab_pg`
--
ALTER TABLE `jawab_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar_materi`
--
ALTER TABLE `komentar_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `table_pg`
--
ALTER TABLE `table_pg`
  MODIFY `id_pg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
