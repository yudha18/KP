-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2018 pada 10.18
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_guru`
--

CREATE TABLE `absensi_guru` (
  `Id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Thn_ajaran` varchar(10) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Kd_jadwal` varchar(10) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_guru`
--

INSERT INTO `absensi_guru` (`Id_absen`, `tanggal`, `Thn_ajaran`, `Semester`, `Kd_jadwal`, `NIP`, `status`) VALUES
(5, '2013-12-19', '2013', 'ganjil', '201331123', '123', 'izin'),
(6, '2013-12-19', '2013', 'ganjil', '201332123', '123', 'absen'),
(7, '2013-12-19', '2013', 'ganjil', '2013316666', '6666', 'izin'),
(8, '2013-12-20', '2013/2014', 'ganjil', '2013/20145', '196909211995031002', 'absen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `Id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Thn_ajaran` varchar(10) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Id_kelas` int(10) NOT NULL,
  `NIS` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`Id_absen`, `tanggal`, `Thn_ajaran`, `Semester`, `Id_kelas`, `NIS`, `status`) VALUES
(2, '2013-12-20', '2013/2014', 'Ganjil', 5, '22902', 'sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `NIP` varchar(20) NOT NULL,
  `Nama_guru` varchar(30) NOT NULL,
  `Tmpt_lahir` varchar(20) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `JK` varchar(10) NOT NULL,
  `Agama` varchar(10) NOT NULL,
  `Jabatan` varchar(20) NOT NULL,
  `Id_matapelajaran` int(11) NOT NULL,
  `TMT_guru` date NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`NIP`, `Nama_guru`, `Tmpt_lahir`, `Tgl_lahir`, `JK`, `Agama`, `Jabatan`, `Id_matapelajaran`, `TMT_guru`, `Alamat`, `Telp`) VALUES
('195512301982121002', 'Drs. Ardi S', 'Bantul', '1955-12-30', 'Pria', 'Islam', 'Guru', 1, '1982-12-01', 'Jl. Gajah Mada bantul', '4567'),
('195811231991072002', 'Dra. Asmiati, MM', 'yogyakarta', '1958-11-23', 'Wanita', 'Islam', 'Wakil Kesiswaan', 4, '1991-07-02', 'jln. parangtritis', '-'),
('195912311985031093', 'Drs. M.Ikbal', 'Gunung KIdul', '1959-12-31', 'Pria', 'Islam', 'Guru', 2, '1985-03-01', 'saptosari Gk2', '8888'),
('196909211995031002', 'Habibul Fuadi, S.Pd, M.Si', 'semarang', '1969-09-21', 'Pria', 'Islam', 'Kepala Sekolah', 4, '1995-03-01', 'jln kabupaten sleman', '1234'),
('197103131993011001', 'Wiranda, S.Pd, M.Si ', 'Jakarta', '1971-03-13', 'Pria', 'Islam', 'Wakil Kurikulum', 6, '1993-01-01', 'darma kuningan jawabarat', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `Kd_jadwal` varchar(10) NOT NULL,
  `Thn_ajaran` varchar(10) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Id_kelas` int(11) NOT NULL,
  `Id_matapelajaran` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `Hari` varchar(10) NOT NULL,
  `Jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`Kd_jadwal`, `Thn_ajaran`, `Semester`, `Id_kelas`, `Id_matapelajaran`, `NIP`, `Hari`, `Jam`) VALUES
('2013/20145', '2013/2014', 'ganjil', 5, 4, '196909211995031002', 'Jumat', '11.50'),
('2013316666', '2013', 'ganjil', 5, 1, '195512301982121002', 'Kamis', '9:00'),
('201332123', '2013', 'ganjil', 5, 1, '195912311985031093', 'Kamis', '11:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `Id_kelas` int(11) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `Thn_ajaran` varchar(10) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `NIP_walikelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`Id_kelas`, `Kelas`, `Thn_ajaran`, `Semester`, `NIP_walikelas`) VALUES
(5, 'tdtl', '2013/2014', 'Ganjil', '195512301982121002'),
(6, 'tkj', '2013/2014', 'Ganjil', '195912311985031093');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `Id_matapelajaran` int(11) NOT NULL,
  `Kd_matapelajaran` varchar(5) NOT NULL,
  `Nama_matapelajaran` varchar(30) NOT NULL,
  `SKBM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`Id_matapelajaran`, `Kd_matapelajaran`, `Nama_matapelajaran`, `SKBM`) VALUES
(1, 'AGM', 'Agama', 73),
(2, 'PKN', 'Pendidikan Kewarganegaraan', 73),
(3, 'IND', 'B. Indonesia', 75),
(4, 'BIO', 'Biologi', 76),
(5, 'FIS', 'FISIKA', 74),
(6, 'KIM', 'Kimia', 73),
(7, 'EKO', 'Ekonomi', 74),
(8, 'GEO', 'Geografi', 76),
(9, 'SOS', 'Sosiologi', 73),
(10, 'ING', 'B. Inggris', 72),
(13, 'KES', 'Kesenian', 68),
(14, 'PEN', 'Penjaskes', 70),
(15, 'BEJ', 'Kejuruan', 69);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `Kd_nilai` int(11) NOT NULL,
  `Thn_ajaran` varchar(10) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `rata_rata` varchar(10) DEFAULT '0',
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`Kd_nilai`, `Thn_ajaran`, `Semester`, `NIS`, `rata_rata`, `NIP`) VALUES
(20, '2013/2014', 'Ganjil', '0001', '73.3888888', '195512301982121002'),
(23, '2013/2014', 'Ganjil', '0002', '81.5', '195512301982121002'),
(24, '2017', 'Ganjil', '0001', '66.6666666', '195512301982121002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_rinci`
--

CREATE TABLE `nilai_rinci` (
  `Id_nilai` int(11) NOT NULL,
  `Kd_nilai` int(11) NOT NULL,
  `Id_matapelajaran` int(11) NOT NULL,
  `Nilai_ulangan` int(11) NOT NULL,
  `Nilai_uts` int(11) NOT NULL,
  `Nilai_uas` int(11) NOT NULL,
  `Rata_rata` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_rinci`
--

INSERT INTO `nilai_rinci` (`Id_nilai`, `Kd_nilai`, `Id_matapelajaran`, `Nilai_ulangan`, `Nilai_uts`, `Nilai_uas`, `Rata_rata`) VALUES
(16, 20, 1, 50, 50, 50, '50'),
(18, 20, 2, 90, 50, 70, '70'),
(19, 20, 3, 80, 70, 90, '80'),
(20, 20, 4, 76, 50, 90, '72'),
(21, 20, 5, 50, 90, 90, '76.666666666667'),
(22, 20, 6, 85, 74, 70, '76.333333333333'),
(23, 20, 10, 76, 50, 85, '70.333333333333'),
(24, 20, 11, 76, 70, 50, '65.333333333333'),
(25, 20, 13, 80, 70, 90, '80'),
(26, 20, 14, 80, 70, 90, '80'),
(27, 20, 15, 80, 70, 90, '80'),
(28, 20, 16, 80, 70, 90, '80'),
(29, 23, 1, 80, 80, 80, '80'),
(30, 23, 2, 90, 74, 85, '83'),
(31, 24, 3, 70, 50, 80, '66.666666666667');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(10) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Tmpt_lahir` varchar(30) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `JK` varchar(10) NOT NULL,
  `Agama` varchar(10) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Nm_ayah` varchar(30) NOT NULL,
  `Nm_ibu` varchar(30) NOT NULL,
  `Pekerjaan_ayah` varchar(20) NOT NULL,
  `Pekerjaan_ibu` varchar(20) NOT NULL,
  `Id_kelas` int(11) NOT NULL,
  `Telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `Nama`, `Tmpt_lahir`, `Tgl_lahir`, `JK`, `Agama`, `Alamat`, `Nm_ayah`, `Nm_ibu`, `Pekerjaan_ayah`, `Pekerjaan_ibu`, `Id_kelas`, `Telp`) VALUES
('0001', 'Adela Harimartini Putri', 'bantul', '1999-07-01', 'Perempuan', 'Islam', 'jln solo km 01', 'Hariman Z', 'Trintiani', 'Swasta', 'Pegawai', 5, '-'),
('0002', 'Adytia Fajar Pratama', 'yogyakarta', '1998-08-23', 'Laki-Laki', 'Islam', 'pleret bantul', 'Musrizal', 'Afriyeni', 'Swasta', '-', 5, '-'),
('0003', 'Adzalia Fitri Annisa', 'Padang', '1980-11-02', 'Perempuan', 'Islam', 'jln pajajaran no 4', 'Alfurqan', 'Daswita', 'Guru', 'Guru', 5, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `Id_user` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`Id_user`, `Username`, `Password`, `Level`) VALUES
(0, 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru'),
(1, 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', 'tu'),
(2, '001', 'dc5c7986daef50c1e02ab09b442ee34f', 'kepsek'),
(3, '002', '93dd4de5cddba2c733c65f233097f05a', 'waku'),
(4, '003', 'e88a49bccde359f0cabb40db83ba6080', 'wasi'),
(5, '004', '11364907cf269dd2183b64287156072a', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD PRIMARY KEY (`Id_absen`);

--
-- Indeks untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`Id_absen`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Kd_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`Id_matapelajaran`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`Kd_nilai`);

--
-- Indeks untuk tabel `nilai_rinci`
--
ALTER TABLE `nilai_rinci`
  ADD PRIMARY KEY (`Id_nilai`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indeks untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_guru`
--
ALTER TABLE `absensi_guru`
  MODIFY `Id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `Id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `Id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `Id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `Kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilai_rinci`
--
ALTER TABLE `nilai_rinci`
  MODIFY `Id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
