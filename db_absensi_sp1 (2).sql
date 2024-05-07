-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2024 pada 09.42
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_sp1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_format_th`
--

CREATE TABLE `tb_format_th` (
  `id` int(1) NOT NULL,
  `format_th` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_format_th`
--

INSERT INTO `tb_format_th` (`id`, `format_th`) VALUES
(1, '2023/2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_generet_tgl`
--

CREATE TABLE `tb_generet_tgl` (
  `id_generet` int(10) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `waktu_proses` datetime NOT NULL,
  `id_rombel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_generet_tgl`
--

INSERT INTO `tb_generet_tgl` (`id_generet`, `tgl_awal`, `tgl_akhir`, `waktu_proses`, `id_rombel`) VALUES
(15, '2024-05-01', '2024-05-08', '2024-05-07 01:05:55', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_harian`
--

CREATE TABLE `tb_jurnal_harian` (
  `id_jurnal_harian` int(25) NOT NULL,
  `id_jurnal` varchar(15) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `hari_dantgl` date NOT NULL,
  `time_mulai` time NOT NULL,
  `kehadiran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurnal_harian`
--

INSERT INTO `tb_jurnal_harian` (`id_jurnal_harian`, `id_jurnal`, `id_siswa`, `hari_dantgl`, `time_mulai`, `kehadiran`) VALUES
(29, 'JRNL0000000013', 51, '2024-05-06', '07:00:00', 'hadir'),
(30, 'JRNL0000000013', 52, '2024-05-06', '07:00:00', 'hadir'),
(31, 'JRNL0000000013', 53, '2024-05-06', '07:00:00', 'hadir'),
(32, 'JRNL0000000013', 54, '2024-05-06', '07:00:00', 'hadir'),
(33, 'JRNL0000000013', 55, '2024-05-06', '07:00:00', 'hadir'),
(34, 'JRNL0000000013', 56, '2024-05-06', '07:00:00', 'hadir'),
(35, 'JRNL0000000013', 57, '2024-05-06', '07:00:00', 'hadir'),
(36, 'JRNL0000000013', 58, '2024-05-06', '07:00:00', 'hadir'),
(37, 'JRNL0000000013', 59, '2024-05-06', '07:00:00', 'hadir'),
(38, 'JRNL0000000013', 60, '2024-05-06', '07:00:00', 'hadir'),
(39, 'JRNL0000000013', 61, '2024-05-06', '07:00:00', 'hadir'),
(40, 'JRNL0000000013', 62, '2024-05-06', '07:00:00', 'hadir'),
(41, 'JRNL0000000013', 63, '2024-05-06', '07:00:00', 'hadir'),
(42, 'JRNL0000000013', 64, '2024-05-06', '07:00:00', 'hadir'),
(43, 'JRNL0000000013', 65, '2024-05-06', '07:00:00', 'hadir'),
(44, 'JRNL0000000013', 66, '2024-05-06', '07:00:00', 'hadir'),
(45, 'JRNL0000000013', 67, '2024-05-06', '07:00:00', 'hadir'),
(46, 'JRNL0000000013', 68, '2024-05-06', '07:00:00', 'hadir'),
(47, 'JRNL0000000013', 69, '2024-05-06', '07:00:00', 'hadir'),
(48, 'JRNL0000000013', 70, '2024-05-06', '07:00:00', 'hadir'),
(49, 'JRNL0000000013', 71, '2024-05-06', '07:00:00', 'hadir'),
(50, 'JRNL0000000013', 72, '2024-05-06', '07:00:00', 'hadir'),
(51, 'JRNL0000000013', 73, '2024-05-06', '07:00:00', 'hadir'),
(52, 'JRNL0000000013', 74, '2024-05-06', '07:00:00', 'hadir'),
(53, 'JRNL0000000013', 75, '2024-05-06', '07:00:00', 'hadir'),
(54, 'JRNL0000000013', 76, '2024-05-06', '07:00:00', 'hadir'),
(55, 'JRNL0000000013', 77, '2024-05-06', '07:00:00', 'hadir'),
(56, 'JRNL0000000013', 78, '2024-05-06', '07:00:00', 'hadir'),
(57, 'JRNL0000000015', 51, '2024-05-07', '07:00:00', 'hadir'),
(58, 'JRNL0000000015', 52, '2024-05-07', '07:00:00', 'hadir'),
(59, 'JRNL0000000015', 53, '2024-05-07', '07:00:00', 'hadir'),
(60, 'JRNL0000000015', 54, '2024-05-07', '07:00:00', 'hadir'),
(61, 'JRNL0000000015', 55, '2024-05-07', '07:00:00', 'hadir'),
(62, 'JRNL0000000015', 56, '2024-05-07', '07:00:00', 'hadir'),
(63, 'JRNL0000000015', 57, '2024-05-07', '07:00:00', 'hadir'),
(64, 'JRNL0000000015', 58, '2024-05-07', '07:00:00', 'hadir'),
(65, 'JRNL0000000015', 59, '2024-05-07', '07:00:00', 'hadir'),
(66, 'JRNL0000000015', 60, '2024-05-07', '07:00:00', 'hadir'),
(67, 'JRNL0000000015', 61, '2024-05-07', '07:00:00', 'hadir'),
(68, 'JRNL0000000015', 62, '2024-05-07', '07:00:00', 'hadir'),
(69, 'JRNL0000000015', 63, '2024-05-07', '07:00:00', 'hadir'),
(70, 'JRNL0000000015', 64, '2024-05-07', '07:00:00', 'hadir'),
(71, 'JRNL0000000015', 65, '2024-05-07', '07:00:00', 'hadir'),
(72, 'JRNL0000000015', 66, '2024-05-07', '07:00:00', 'hadir'),
(73, 'JRNL0000000015', 67, '2024-05-07', '07:00:00', 'hadir'),
(74, 'JRNL0000000015', 68, '2024-05-07', '07:00:00', 'hadir'),
(75, 'JRNL0000000015', 69, '2024-05-07', '07:00:00', 'hadir'),
(76, 'JRNL0000000015', 70, '2024-05-07', '07:00:00', 'hadir'),
(77, 'JRNL0000000015', 71, '2024-05-07', '07:00:00', 'hadir'),
(78, 'JRNL0000000015', 72, '2024-05-07', '07:00:00', 'hadir'),
(79, 'JRNL0000000015', 73, '2024-05-07', '07:00:00', 'hadir'),
(80, 'JRNL0000000015', 74, '2024-05-07', '07:00:00', 'hadir'),
(81, 'JRNL0000000015', 75, '2024-05-07', '07:00:00', 'ijin'),
(82, 'JRNL0000000015', 76, '2024-05-07', '07:00:00', 'alpa'),
(83, 'JRNL0000000015', 77, '2024-05-07', '07:00:00', 'alpa'),
(84, 'JRNL0000000015', 78, '2024-05-07', '07:00:00', 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_kelas`
--

CREATE TABLE `tb_jurnal_kelas` (
  `id_jurnal` varchar(15) NOT NULL,
  `id_rombel` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `hari_dantgl` date NOT NULL,
  `time_mulai` time NOT NULL,
  `time_akhir` time NOT NULL,
  `hadir` int(2) NOT NULL,
  `alpa` int(2) NOT NULL,
  `ijin` int(2) NOT NULL,
  `sakit` int(2) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurnal_kelas`
--

INSERT INTO `tb_jurnal_kelas` (`id_jurnal`, `id_rombel`, `id_user`, `kode_mapel`, `hari_dantgl`, `time_mulai`, `time_akhir`, `hadir`, `alpa`, `ijin`, `sakit`, `jumlah`) VALUES
('JRNL0000000001', 5, 91, 'iftk', '2024-03-01', '07:00:00', '09:15:00', 22, 1, 2, 3, 28),
('JRNL0000000002', 14, 91, 'kons_keahl', '2024-03-01', '07:00:00', '09:00:00', 27, 2, 1, 1, 31),
('JRNL0000000003', 14, 91, 'kons_keahl', '2024-03-05', '07:00:00', '09:00:00', 30, 1, 0, 0, 31),
('JRNL0000000004', 14, 73, 'b_indo', '2024-03-05', '09:15:00', '11:00:00', 31, 0, 0, 0, 31),
('JRNL0000000005', 14, 74, 'b_ing', '2024-03-05', '11:00:00', '11:45:00', 31, 0, 0, 0, 31),
('JRNL0000000006', 14, 75, 'Mtk', '2024-03-05', '12:00:00', '13:45:00', 31, 0, 0, 0, 31),
('JRNL0000000007', 14, 76, 'seni_b', '2024-03-05', '13:45:00', '15:15:00', 31, 0, 0, 0, 31),
('JRNL0000000008', 13, 91, 'kons_keahl', '2024-05-02', '07:00:00', '11:45:00', 15, 3, 1, 0, 19),
('JRNL0000000009', 5, 78, 'p_ipas', '2024-05-03', '07:00:00', '09:15:00', 24, 2, 1, 1, 28),
('JRNL0000000010', 5, 80, 'b_ing', '2024-05-03', '09:30:00', '11:45:00', 24, 2, 1, 1, 28),
('JRNL0000000011', 5, 79, 'pjok', '2024-05-03', '12:15:00', '14:30:00', 24, 2, 1, 1, 28),
('JRNL0000000012', 5, 81, 'seni_b', '2024-05-03', '14:30:00', '15:15:00', 24, 2, 1, 1, 28),
('JRNL0000000013', 5, 79, 'p_ipas', '2024-05-06', '07:00:00', '09:15:00', 28, 0, 0, 0, 28),
('JRNL0000000014', 5, 80, 'b_ing', '2024-05-06', '09:30:00', '23:45:00', 28, 0, 0, 0, 28),
('JRNL0000000015', 5, 80, 'b_ing', '2024-05-07', '07:00:00', '08:30:00', 25, 2, 1, 0, 28);

--
-- Trigger `tb_jurnal_kelas`
--
DELIMITER $$
CREATE TRIGGER `also delete tb_jurnal_siswa` AFTER DELETE ON `tb_jurnal_kelas` FOR EACH ROW BEGIN
	delete from tb_jurnal_siswa where id_jurnal = old.id_jurnal;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_siswa`
--

CREATE TABLE `tb_jurnal_siswa` (
  `id_jurnal_siswa` int(50) NOT NULL,
  `id_jurnal` varchar(15) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `kehadiran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurnal_siswa`
--

INSERT INTO `tb_jurnal_siswa` (`id_jurnal_siswa`, `id_jurnal`, `id_siswa`, `kehadiran`) VALUES
(1297, 'JRNL0000000001', 51, 'alpa'),
(1298, 'JRNL0000000001', 52, 'sakit'),
(1299, 'JRNL0000000001', 53, 'alpa'),
(1300, 'JRNL0000000001', 54, 'hadir'),
(1301, 'JRNL0000000001', 55, 'hadir'),
(1302, 'JRNL0000000001', 56, 'hadir'),
(1303, 'JRNL0000000001', 57, 'hadir'),
(1304, 'JRNL0000000001', 58, 'hadir'),
(1305, 'JRNL0000000001', 59, 'hadir'),
(1306, 'JRNL0000000001', 60, 'hadir'),
(1307, 'JRNL0000000001', 61, 'hadir'),
(1308, 'JRNL0000000001', 62, 'hadir'),
(1309, 'JRNL0000000001', 63, 'hadir'),
(1310, 'JRNL0000000001', 64, 'hadir'),
(1311, 'JRNL0000000001', 65, 'hadir'),
(1312, 'JRNL0000000001', 66, 'hadir'),
(1313, 'JRNL0000000001', 67, 'hadir'),
(1314, 'JRNL0000000001', 68, 'hadir'),
(1315, 'JRNL0000000001', 69, 'hadir'),
(1316, 'JRNL0000000001', 70, 'hadir'),
(1317, 'JRNL0000000001', 71, 'hadir'),
(1318, 'JRNL0000000001', 72, 'hadir'),
(1319, 'JRNL0000000001', 73, 'hadir'),
(1320, 'JRNL0000000001', 74, 'hadir'),
(1321, 'JRNL0000000001', 75, 'hadir'),
(1322, 'JRNL0000000001', 76, 'hadir'),
(1323, 'JRNL0000000001', 77, 'hadir'),
(1324, 'JRNL0000000001', 78, 'hadir'),
(1325, 'JRNL0000000002', 79, 'alpa'),
(1326, 'JRNL0000000002', 80, 'hadir'),
(1327, 'JRNL0000000002', 81, 'hadir'),
(1328, 'JRNL0000000002', 82, 'hadir'),
(1329, 'JRNL0000000002', 83, 'hadir'),
(1330, 'JRNL0000000002', 84, 'hadir'),
(1331, 'JRNL0000000002', 85, 'hadir'),
(1332, 'JRNL0000000002', 86, 'hadir'),
(1333, 'JRNL0000000002', 87, 'hadir'),
(1334, 'JRNL0000000002', 88, 'hadir'),
(1335, 'JRNL0000000002', 89, 'hadir'),
(1336, 'JRNL0000000002', 90, 'hadir'),
(1337, 'JRNL0000000002', 91, 'hadir'),
(1338, 'JRNL0000000002', 92, 'hadir'),
(1339, 'JRNL0000000002', 93, 'hadir'),
(1340, 'JRNL0000000002', 94, 'hadir'),
(1341, 'JRNL0000000002', 95, 'hadir'),
(1342, 'JRNL0000000002', 96, 'hadir'),
(1343, 'JRNL0000000002', 97, 'hadir'),
(1344, 'JRNL0000000002', 98, 'hadir'),
(1345, 'JRNL0000000002', 99, 'hadir'),
(1346, 'JRNL0000000002', 100, 'hadir'),
(1347, 'JRNL0000000002', 101, 'hadir'),
(1348, 'JRNL0000000002', 102, 'hadir'),
(1349, 'JRNL0000000002', 103, 'hadir'),
(1350, 'JRNL0000000002', 104, 'hadir'),
(1351, 'JRNL0000000002', 105, 'hadir'),
(1352, 'JRNL0000000002', 106, 'hadir'),
(1353, 'JRNL0000000002', 107, 'hadir'),
(1354, 'JRNL0000000002', 108, 'hadir'),
(1355, 'JRNL0000000003', 513, 'hadir'),
(1356, 'JRNL0000000003', 514, 'hadir'),
(1357, 'JRNL0000000003', 515, 'hadir'),
(1358, 'JRNL0000000003', 516, 'hadir'),
(1359, 'JRNL0000000003', 517, 'hadir'),
(1360, 'JRNL0000000003', 518, 'hadir'),
(1361, 'JRNL0000000003', 519, 'hadir'),
(1362, 'JRNL0000000003', 520, 'hadir'),
(1363, 'JRNL0000000003', 521, 'hadir'),
(1364, 'JRNL0000000003', 522, 'hadir'),
(1365, 'JRNL0000000003', 523, 'hadir'),
(1366, 'JRNL0000000003', 524, 'hadir'),
(1367, 'JRNL0000000003', 525, 'hadir'),
(1368, 'JRNL0000000003', 526, 'hadir'),
(1369, 'JRNL0000000003', 527, 'hadir'),
(1370, 'JRNL0000000003', 528, 'hadir'),
(1371, 'JRNL0000000003', 529, 'hadir'),
(1372, 'JRNL0000000003', 530, 'hadir'),
(1373, 'JRNL0000000003', 531, 'hadir'),
(1374, 'JRNL0000000003', 532, 'hadir'),
(1375, 'JRNL0000000003', 533, 'hadir'),
(1376, 'JRNL0000000003', 534, 'hadir'),
(1377, 'JRNL0000000003', 535, 'hadir'),
(1378, 'JRNL0000000003', 536, 'hadir'),
(1379, 'JRNL0000000003', 537, 'hadir'),
(1380, 'JRNL0000000003', 538, 'hadir'),
(1381, 'JRNL0000000003', 539, 'ijin'),
(1382, 'JRNL0000000003', 540, 'hadir'),
(1383, 'JRNL0000000003', 541, 'hadir'),
(1384, 'JRNL0000000003', 542, 'hadir'),
(1385, 'JRNL0000000003', 543, 'ijin'),
(1386, 'JRNL0000000003', 544, 'sakit'),
(1387, 'JRNL0000000003', 545, 'sakit'),
(1388, 'JRNL0000000001', 51, 'hadir'),
(1389, 'JRNL0000000001', 52, 'hadir'),
(1390, 'JRNL0000000001', 53, 'hadir'),
(1391, 'JRNL0000000001', 54, 'hadir'),
(1392, 'JRNL0000000001', 55, 'hadir'),
(1393, 'JRNL0000000001', 56, 'hadir'),
(1394, 'JRNL0000000001', 57, 'hadir'),
(1395, 'JRNL0000000001', 58, 'hadir'),
(1396, 'JRNL0000000001', 59, 'hadir'),
(1397, 'JRNL0000000001', 60, 'hadir'),
(1398, 'JRNL0000000001', 61, 'hadir'),
(1399, 'JRNL0000000001', 62, 'hadir'),
(1400, 'JRNL0000000001', 63, 'hadir'),
(1401, 'JRNL0000000001', 64, 'hadir'),
(1402, 'JRNL0000000001', 65, 'hadir'),
(1403, 'JRNL0000000001', 66, 'hadir'),
(1404, 'JRNL0000000001', 67, 'hadir'),
(1405, 'JRNL0000000001', 68, 'sakit'),
(1406, 'JRNL0000000001', 69, 'hadir'),
(1407, 'JRNL0000000001', 70, 'hadir'),
(1408, 'JRNL0000000001', 71, 'hadir'),
(1409, 'JRNL0000000001', 72, 'alpa'),
(1410, 'JRNL0000000001', 73, 'ijin'),
(1411, 'JRNL0000000001', 74, 'ijin'),
(1412, 'JRNL0000000001', 75, 'hadir'),
(1413, 'JRNL0000000001', 76, 'sakit'),
(1414, 'JRNL0000000001', 77, 'sakit'),
(1415, 'JRNL0000000001', 78, 'hadir'),
(1416, 'JRNL0000000002', 245, 'alpa'),
(1417, 'JRNL0000000002', 246, 'alpa'),
(1418, 'JRNL0000000002', 247, 'ijin'),
(1419, 'JRNL0000000002', 248, 'sakit'),
(1420, 'JRNL0000000002', 249, 'hadir'),
(1421, 'JRNL0000000002', 250, 'hadir'),
(1422, 'JRNL0000000002', 251, 'hadir'),
(1423, 'JRNL0000000002', 252, 'hadir'),
(1424, 'JRNL0000000002', 253, 'hadir'),
(1425, 'JRNL0000000002', 254, 'hadir'),
(1426, 'JRNL0000000002', 255, 'hadir'),
(1427, 'JRNL0000000002', 256, 'hadir'),
(1428, 'JRNL0000000002', 257, 'hadir'),
(1429, 'JRNL0000000002', 258, 'hadir'),
(1430, 'JRNL0000000002', 259, 'hadir'),
(1431, 'JRNL0000000002', 260, 'hadir'),
(1432, 'JRNL0000000002', 261, 'hadir'),
(1433, 'JRNL0000000002', 262, 'hadir'),
(1434, 'JRNL0000000002', 263, 'hadir'),
(1435, 'JRNL0000000002', 264, 'hadir'),
(1436, 'JRNL0000000002', 265, 'hadir'),
(1437, 'JRNL0000000002', 266, 'hadir'),
(1438, 'JRNL0000000002', 267, 'hadir'),
(1439, 'JRNL0000000002', 268, 'hadir'),
(1440, 'JRNL0000000002', 269, 'hadir'),
(1441, 'JRNL0000000002', 270, 'hadir'),
(1442, 'JRNL0000000002', 271, 'hadir'),
(1443, 'JRNL0000000002', 272, 'hadir'),
(1444, 'JRNL0000000002', 273, 'hadir'),
(1445, 'JRNL0000000002', 274, 'hadir'),
(1446, 'JRNL0000000002', 275, 'hadir'),
(1447, 'JRNL0000000003', 245, 'hadir'),
(1448, 'JRNL0000000003', 246, 'hadir'),
(1449, 'JRNL0000000003', 247, 'alpa'),
(1450, 'JRNL0000000003', 248, 'hadir'),
(1451, 'JRNL0000000003', 249, 'hadir'),
(1452, 'JRNL0000000003', 250, 'hadir'),
(1453, 'JRNL0000000003', 251, 'hadir'),
(1454, 'JRNL0000000003', 252, 'hadir'),
(1455, 'JRNL0000000003', 253, 'hadir'),
(1456, 'JRNL0000000003', 254, 'hadir'),
(1457, 'JRNL0000000003', 255, 'hadir'),
(1458, 'JRNL0000000003', 256, 'hadir'),
(1459, 'JRNL0000000003', 257, 'hadir'),
(1460, 'JRNL0000000003', 258, 'hadir'),
(1461, 'JRNL0000000003', 259, 'hadir'),
(1462, 'JRNL0000000003', 260, 'hadir'),
(1463, 'JRNL0000000003', 261, 'hadir'),
(1464, 'JRNL0000000003', 262, 'hadir'),
(1465, 'JRNL0000000003', 263, 'hadir'),
(1466, 'JRNL0000000003', 264, 'hadir'),
(1467, 'JRNL0000000003', 265, 'hadir'),
(1468, 'JRNL0000000003', 266, 'hadir'),
(1469, 'JRNL0000000003', 267, 'hadir'),
(1470, 'JRNL0000000003', 268, 'hadir'),
(1471, 'JRNL0000000003', 269, 'hadir'),
(1472, 'JRNL0000000003', 270, 'hadir'),
(1473, 'JRNL0000000003', 271, 'hadir'),
(1474, 'JRNL0000000003', 272, 'hadir'),
(1475, 'JRNL0000000003', 273, 'hadir'),
(1476, 'JRNL0000000003', 274, 'hadir'),
(1477, 'JRNL0000000003', 275, 'hadir'),
(1478, 'JRNL0000000004', 245, 'hadir'),
(1479, 'JRNL0000000004', 246, 'hadir'),
(1480, 'JRNL0000000004', 247, 'hadir'),
(1481, 'JRNL0000000004', 248, 'hadir'),
(1482, 'JRNL0000000004', 249, 'hadir'),
(1483, 'JRNL0000000004', 250, 'hadir'),
(1484, 'JRNL0000000004', 251, 'hadir'),
(1485, 'JRNL0000000004', 252, 'hadir'),
(1486, 'JRNL0000000004', 253, 'hadir'),
(1487, 'JRNL0000000004', 254, 'hadir'),
(1488, 'JRNL0000000004', 255, 'hadir'),
(1489, 'JRNL0000000004', 256, 'hadir'),
(1490, 'JRNL0000000004', 257, 'hadir'),
(1491, 'JRNL0000000004', 258, 'hadir'),
(1492, 'JRNL0000000004', 259, 'hadir'),
(1493, 'JRNL0000000004', 260, 'hadir'),
(1494, 'JRNL0000000004', 261, 'hadir'),
(1495, 'JRNL0000000004', 262, 'hadir'),
(1496, 'JRNL0000000004', 263, 'hadir'),
(1497, 'JRNL0000000004', 264, 'hadir'),
(1498, 'JRNL0000000004', 265, 'hadir'),
(1499, 'JRNL0000000004', 266, 'hadir'),
(1500, 'JRNL0000000004', 267, 'hadir'),
(1501, 'JRNL0000000004', 268, 'hadir'),
(1502, 'JRNL0000000004', 269, 'hadir'),
(1503, 'JRNL0000000004', 270, 'hadir'),
(1504, 'JRNL0000000004', 271, 'hadir'),
(1505, 'JRNL0000000004', 272, 'hadir'),
(1506, 'JRNL0000000004', 273, 'hadir'),
(1507, 'JRNL0000000004', 274, 'hadir'),
(1508, 'JRNL0000000004', 275, 'hadir'),
(1509, 'JRNL0000000005', 245, 'hadir'),
(1510, 'JRNL0000000005', 246, 'hadir'),
(1511, 'JRNL0000000005', 247, 'hadir'),
(1512, 'JRNL0000000005', 248, 'hadir'),
(1513, 'JRNL0000000005', 249, 'hadir'),
(1514, 'JRNL0000000005', 250, 'hadir'),
(1515, 'JRNL0000000005', 251, 'hadir'),
(1516, 'JRNL0000000005', 252, 'hadir'),
(1517, 'JRNL0000000005', 253, 'hadir'),
(1518, 'JRNL0000000005', 254, 'hadir'),
(1519, 'JRNL0000000005', 255, 'hadir'),
(1520, 'JRNL0000000005', 256, 'hadir'),
(1521, 'JRNL0000000005', 257, 'hadir'),
(1522, 'JRNL0000000005', 258, 'hadir'),
(1523, 'JRNL0000000005', 259, 'hadir'),
(1524, 'JRNL0000000005', 260, 'hadir'),
(1525, 'JRNL0000000005', 261, 'hadir'),
(1526, 'JRNL0000000005', 262, 'hadir'),
(1527, 'JRNL0000000005', 263, 'hadir'),
(1528, 'JRNL0000000005', 264, 'hadir'),
(1529, 'JRNL0000000005', 265, 'hadir'),
(1530, 'JRNL0000000005', 266, 'hadir'),
(1531, 'JRNL0000000005', 267, 'hadir'),
(1532, 'JRNL0000000005', 268, 'hadir'),
(1533, 'JRNL0000000005', 269, 'hadir'),
(1534, 'JRNL0000000005', 270, 'hadir'),
(1535, 'JRNL0000000005', 271, 'hadir'),
(1536, 'JRNL0000000005', 272, 'hadir'),
(1537, 'JRNL0000000005', 273, 'hadir'),
(1538, 'JRNL0000000005', 274, 'hadir'),
(1539, 'JRNL0000000005', 275, 'hadir'),
(1540, 'JRNL0000000006', 245, 'hadir'),
(1541, 'JRNL0000000006', 246, 'hadir'),
(1542, 'JRNL0000000006', 247, 'hadir'),
(1543, 'JRNL0000000006', 248, 'hadir'),
(1544, 'JRNL0000000006', 249, 'hadir'),
(1545, 'JRNL0000000006', 250, 'hadir'),
(1546, 'JRNL0000000006', 251, 'hadir'),
(1547, 'JRNL0000000006', 252, 'hadir'),
(1548, 'JRNL0000000006', 253, 'hadir'),
(1549, 'JRNL0000000006', 254, 'hadir'),
(1550, 'JRNL0000000006', 255, 'hadir'),
(1551, 'JRNL0000000006', 256, 'hadir'),
(1552, 'JRNL0000000006', 257, 'hadir'),
(1553, 'JRNL0000000006', 258, 'hadir'),
(1554, 'JRNL0000000006', 259, 'hadir'),
(1555, 'JRNL0000000006', 260, 'hadir'),
(1556, 'JRNL0000000006', 261, 'hadir'),
(1557, 'JRNL0000000006', 262, 'hadir'),
(1558, 'JRNL0000000006', 263, 'hadir'),
(1559, 'JRNL0000000006', 264, 'hadir'),
(1560, 'JRNL0000000006', 265, 'hadir'),
(1561, 'JRNL0000000006', 266, 'hadir'),
(1562, 'JRNL0000000006', 267, 'hadir'),
(1563, 'JRNL0000000006', 268, 'hadir'),
(1564, 'JRNL0000000006', 269, 'hadir'),
(1565, 'JRNL0000000006', 270, 'hadir'),
(1566, 'JRNL0000000006', 271, 'hadir'),
(1567, 'JRNL0000000006', 272, 'hadir'),
(1568, 'JRNL0000000006', 273, 'hadir'),
(1569, 'JRNL0000000006', 274, 'hadir'),
(1570, 'JRNL0000000006', 275, 'hadir'),
(1571, 'JRNL0000000007', 245, 'hadir'),
(1572, 'JRNL0000000007', 246, 'hadir'),
(1573, 'JRNL0000000007', 247, 'hadir'),
(1574, 'JRNL0000000007', 248, 'hadir'),
(1575, 'JRNL0000000007', 249, 'hadir'),
(1576, 'JRNL0000000007', 250, 'hadir'),
(1577, 'JRNL0000000007', 251, 'hadir'),
(1578, 'JRNL0000000007', 252, 'hadir'),
(1579, 'JRNL0000000007', 253, 'hadir'),
(1580, 'JRNL0000000007', 254, 'hadir'),
(1581, 'JRNL0000000007', 255, 'hadir'),
(1582, 'JRNL0000000007', 256, 'hadir'),
(1583, 'JRNL0000000007', 257, 'hadir'),
(1584, 'JRNL0000000007', 258, 'hadir'),
(1585, 'JRNL0000000007', 259, 'hadir'),
(1586, 'JRNL0000000007', 260, 'hadir'),
(1587, 'JRNL0000000007', 261, 'hadir'),
(1588, 'JRNL0000000007', 262, 'hadir'),
(1589, 'JRNL0000000007', 263, 'hadir'),
(1590, 'JRNL0000000007', 264, 'hadir'),
(1591, 'JRNL0000000007', 265, 'hadir'),
(1592, 'JRNL0000000007', 266, 'hadir'),
(1593, 'JRNL0000000007', 267, 'hadir'),
(1594, 'JRNL0000000007', 268, 'hadir'),
(1595, 'JRNL0000000007', 269, 'hadir'),
(1596, 'JRNL0000000007', 270, 'hadir'),
(1597, 'JRNL0000000007', 271, 'hadir'),
(1598, 'JRNL0000000007', 272, 'hadir'),
(1599, 'JRNL0000000007', 273, 'hadir'),
(1600, 'JRNL0000000007', 274, 'hadir'),
(1601, 'JRNL0000000007', 275, 'hadir'),
(1602, 'JRNL0000000008', 32, 'hadir'),
(1603, 'JRNL0000000008', 33, 'hadir'),
(1604, 'JRNL0000000008', 34, 'hadir'),
(1605, 'JRNL0000000008', 35, 'hadir'),
(1606, 'JRNL0000000008', 36, 'hadir'),
(1607, 'JRNL0000000008', 37, 'hadir'),
(1608, 'JRNL0000000008', 38, 'hadir'),
(1609, 'JRNL0000000008', 39, 'hadir'),
(1610, 'JRNL0000000008', 40, 'hadir'),
(1611, 'JRNL0000000008', 41, 'hadir'),
(1612, 'JRNL0000000008', 42, 'hadir'),
(1613, 'JRNL0000000008', 43, 'hadir'),
(1614, 'JRNL0000000008', 44, 'hadir'),
(1615, 'JRNL0000000008', 45, 'hadir'),
(1616, 'JRNL0000000008', 46, 'hadir'),
(1617, 'JRNL0000000008', 47, 'alpa'),
(1618, 'JRNL0000000008', 48, 'ijin'),
(1619, 'JRNL0000000008', 49, 'alpa'),
(1620, 'JRNL0000000008', 50, 'alpa'),
(1621, 'JRNL0000000009', 51, 'hadir'),
(1622, 'JRNL0000000009', 52, 'hadir'),
(1623, 'JRNL0000000009', 53, 'hadir'),
(1624, 'JRNL0000000009', 54, 'hadir'),
(1625, 'JRNL0000000009', 55, 'hadir'),
(1626, 'JRNL0000000009', 56, 'hadir'),
(1627, 'JRNL0000000009', 57, 'hadir'),
(1628, 'JRNL0000000009', 58, 'hadir'),
(1629, 'JRNL0000000009', 59, 'hadir'),
(1630, 'JRNL0000000009', 60, 'hadir'),
(1631, 'JRNL0000000009', 61, 'hadir'),
(1632, 'JRNL0000000009', 62, 'hadir'),
(1633, 'JRNL0000000009', 63, 'hadir'),
(1634, 'JRNL0000000009', 64, 'hadir'),
(1635, 'JRNL0000000009', 65, 'hadir'),
(1636, 'JRNL0000000009', 66, 'hadir'),
(1637, 'JRNL0000000009', 67, 'hadir'),
(1638, 'JRNL0000000009', 68, 'hadir'),
(1639, 'JRNL0000000009', 69, 'hadir'),
(1640, 'JRNL0000000009', 70, 'hadir'),
(1641, 'JRNL0000000009', 71, 'hadir'),
(1642, 'JRNL0000000009', 72, 'ijin'),
(1643, 'JRNL0000000009', 73, 'hadir'),
(1644, 'JRNL0000000009', 74, 'hadir'),
(1645, 'JRNL0000000009', 75, 'sakit'),
(1646, 'JRNL0000000009', 76, 'alpa'),
(1647, 'JRNL0000000009', 77, 'alpa'),
(1648, 'JRNL0000000009', 78, 'hadir'),
(1649, 'JRNL0000000010', 51, 'hadir'),
(1650, 'JRNL0000000010', 52, 'hadir'),
(1651, 'JRNL0000000010', 53, 'hadir'),
(1652, 'JRNL0000000010', 54, 'hadir'),
(1653, 'JRNL0000000010', 55, 'hadir'),
(1654, 'JRNL0000000010', 56, 'hadir'),
(1655, 'JRNL0000000010', 57, 'hadir'),
(1656, 'JRNL0000000010', 58, 'hadir'),
(1657, 'JRNL0000000010', 59, 'hadir'),
(1658, 'JRNL0000000010', 60, 'hadir'),
(1659, 'JRNL0000000010', 61, 'hadir'),
(1660, 'JRNL0000000010', 62, 'hadir'),
(1661, 'JRNL0000000010', 63, 'hadir'),
(1662, 'JRNL0000000010', 64, 'hadir'),
(1663, 'JRNL0000000010', 65, 'hadir'),
(1664, 'JRNL0000000010', 66, 'hadir'),
(1665, 'JRNL0000000010', 67, 'hadir'),
(1666, 'JRNL0000000010', 68, 'hadir'),
(1667, 'JRNL0000000010', 69, 'hadir'),
(1668, 'JRNL0000000010', 70, 'hadir'),
(1669, 'JRNL0000000010', 71, 'hadir'),
(1670, 'JRNL0000000010', 72, 'ijin'),
(1671, 'JRNL0000000010', 73, 'hadir'),
(1672, 'JRNL0000000010', 74, 'hadir'),
(1673, 'JRNL0000000010', 75, 'sakit'),
(1674, 'JRNL0000000010', 76, 'alpa'),
(1675, 'JRNL0000000010', 77, 'alpa'),
(1676, 'JRNL0000000010', 78, 'hadir'),
(1677, 'JRNL0000000011', 51, 'hadir'),
(1678, 'JRNL0000000011', 52, 'hadir'),
(1679, 'JRNL0000000011', 53, 'hadir'),
(1680, 'JRNL0000000011', 54, 'hadir'),
(1681, 'JRNL0000000011', 55, 'hadir'),
(1682, 'JRNL0000000011', 56, 'hadir'),
(1683, 'JRNL0000000011', 57, 'hadir'),
(1684, 'JRNL0000000011', 58, 'hadir'),
(1685, 'JRNL0000000011', 59, 'hadir'),
(1686, 'JRNL0000000011', 60, 'hadir'),
(1687, 'JRNL0000000011', 61, 'hadir'),
(1688, 'JRNL0000000011', 62, 'hadir'),
(1689, 'JRNL0000000011', 63, 'hadir'),
(1690, 'JRNL0000000011', 64, 'hadir'),
(1691, 'JRNL0000000011', 65, 'hadir'),
(1692, 'JRNL0000000011', 66, 'hadir'),
(1693, 'JRNL0000000011', 67, 'hadir'),
(1694, 'JRNL0000000011', 68, 'hadir'),
(1695, 'JRNL0000000011', 69, 'hadir'),
(1696, 'JRNL0000000011', 70, 'hadir'),
(1697, 'JRNL0000000011', 71, 'hadir'),
(1698, 'JRNL0000000011', 72, 'ijin'),
(1699, 'JRNL0000000011', 73, 'hadir'),
(1700, 'JRNL0000000011', 74, 'hadir'),
(1701, 'JRNL0000000011', 75, 'sakit'),
(1702, 'JRNL0000000011', 76, 'alpa'),
(1703, 'JRNL0000000011', 77, 'alpa'),
(1704, 'JRNL0000000011', 78, 'hadir'),
(1705, 'JRNL0000000012', 51, 'hadir'),
(1706, 'JRNL0000000012', 52, 'hadir'),
(1707, 'JRNL0000000012', 53, 'hadir'),
(1708, 'JRNL0000000012', 54, 'hadir'),
(1709, 'JRNL0000000012', 55, 'hadir'),
(1710, 'JRNL0000000012', 56, 'hadir'),
(1711, 'JRNL0000000012', 57, 'hadir'),
(1712, 'JRNL0000000012', 58, 'hadir'),
(1713, 'JRNL0000000012', 59, 'hadir'),
(1714, 'JRNL0000000012', 60, 'hadir'),
(1715, 'JRNL0000000012', 61, 'hadir'),
(1716, 'JRNL0000000012', 62, 'hadir'),
(1717, 'JRNL0000000012', 63, 'hadir'),
(1718, 'JRNL0000000012', 64, 'hadir'),
(1719, 'JRNL0000000012', 65, 'hadir'),
(1720, 'JRNL0000000012', 66, 'hadir'),
(1721, 'JRNL0000000012', 67, 'hadir'),
(1722, 'JRNL0000000012', 68, 'hadir'),
(1723, 'JRNL0000000012', 69, 'hadir'),
(1724, 'JRNL0000000012', 70, 'hadir'),
(1725, 'JRNL0000000012', 71, 'hadir'),
(1726, 'JRNL0000000012', 72, 'ijin'),
(1727, 'JRNL0000000012', 73, 'hadir'),
(1728, 'JRNL0000000012', 74, 'hadir'),
(1729, 'JRNL0000000012', 75, 'sakit'),
(1730, 'JRNL0000000012', 76, 'alpa'),
(1731, 'JRNL0000000012', 77, 'alpa'),
(1732, 'JRNL0000000012', 78, 'hadir'),
(1877, 'JRNL0000000013', 51, 'hadir'),
(1878, 'JRNL0000000013', 52, 'hadir'),
(1879, 'JRNL0000000013', 53, 'hadir'),
(1880, 'JRNL0000000013', 54, 'hadir'),
(1881, 'JRNL0000000013', 55, 'hadir'),
(1882, 'JRNL0000000013', 56, 'hadir'),
(1883, 'JRNL0000000013', 57, 'hadir'),
(1884, 'JRNL0000000013', 58, 'hadir'),
(1885, 'JRNL0000000013', 59, 'hadir'),
(1886, 'JRNL0000000013', 60, 'hadir'),
(1887, 'JRNL0000000013', 61, 'hadir'),
(1888, 'JRNL0000000013', 62, 'hadir'),
(1889, 'JRNL0000000013', 63, 'hadir'),
(1890, 'JRNL0000000013', 64, 'hadir'),
(1891, 'JRNL0000000013', 65, 'hadir'),
(1892, 'JRNL0000000013', 66, 'hadir'),
(1893, 'JRNL0000000013', 67, 'hadir'),
(1894, 'JRNL0000000013', 68, 'hadir'),
(1895, 'JRNL0000000013', 69, 'hadir'),
(1896, 'JRNL0000000013', 70, 'hadir'),
(1897, 'JRNL0000000013', 71, 'hadir'),
(1898, 'JRNL0000000013', 72, 'hadir'),
(1899, 'JRNL0000000013', 73, 'hadir'),
(1900, 'JRNL0000000013', 74, 'hadir'),
(1901, 'JRNL0000000013', 75, 'hadir'),
(1902, 'JRNL0000000013', 76, 'hadir'),
(1903, 'JRNL0000000013', 77, 'hadir'),
(1904, 'JRNL0000000013', 78, 'hadir'),
(1905, 'JRNL0000000014', 51, 'hadir'),
(1906, 'JRNL0000000014', 52, 'hadir'),
(1907, 'JRNL0000000014', 53, 'hadir'),
(1908, 'JRNL0000000014', 54, 'hadir'),
(1909, 'JRNL0000000014', 55, 'hadir'),
(1910, 'JRNL0000000014', 56, 'hadir'),
(1911, 'JRNL0000000014', 57, 'hadir'),
(1912, 'JRNL0000000014', 58, 'hadir'),
(1913, 'JRNL0000000014', 59, 'hadir'),
(1914, 'JRNL0000000014', 60, 'hadir'),
(1915, 'JRNL0000000014', 61, 'hadir'),
(1916, 'JRNL0000000014', 62, 'hadir'),
(1917, 'JRNL0000000014', 63, 'hadir'),
(1918, 'JRNL0000000014', 64, 'hadir'),
(1919, 'JRNL0000000014', 65, 'hadir'),
(1920, 'JRNL0000000014', 66, 'hadir'),
(1921, 'JRNL0000000014', 67, 'hadir'),
(1922, 'JRNL0000000014', 68, 'hadir'),
(1923, 'JRNL0000000014', 69, 'hadir'),
(1924, 'JRNL0000000014', 70, 'hadir'),
(1925, 'JRNL0000000014', 71, 'hadir'),
(1926, 'JRNL0000000014', 72, 'hadir'),
(1927, 'JRNL0000000014', 73, 'hadir'),
(1928, 'JRNL0000000014', 74, 'hadir'),
(1929, 'JRNL0000000014', 75, 'hadir'),
(1930, 'JRNL0000000014', 76, 'hadir'),
(1931, 'JRNL0000000014', 77, 'hadir'),
(1932, 'JRNL0000000014', 78, 'hadir'),
(1933, 'JRNL0000000015', 51, 'hadir'),
(1934, 'JRNL0000000015', 52, 'hadir'),
(1935, 'JRNL0000000015', 53, 'hadir'),
(1936, 'JRNL0000000015', 54, 'hadir'),
(1937, 'JRNL0000000015', 55, 'hadir'),
(1938, 'JRNL0000000015', 56, 'hadir'),
(1939, 'JRNL0000000015', 57, 'hadir'),
(1940, 'JRNL0000000015', 58, 'hadir'),
(1941, 'JRNL0000000015', 59, 'hadir'),
(1942, 'JRNL0000000015', 60, 'hadir'),
(1943, 'JRNL0000000015', 61, 'hadir'),
(1944, 'JRNL0000000015', 62, 'hadir'),
(1945, 'JRNL0000000015', 63, 'hadir'),
(1946, 'JRNL0000000015', 64, 'hadir'),
(1947, 'JRNL0000000015', 65, 'hadir'),
(1948, 'JRNL0000000015', 66, 'hadir'),
(1949, 'JRNL0000000015', 67, 'hadir'),
(1950, 'JRNL0000000015', 68, 'hadir'),
(1951, 'JRNL0000000015', 69, 'hadir'),
(1952, 'JRNL0000000015', 70, 'hadir'),
(1953, 'JRNL0000000015', 71, 'hadir'),
(1954, 'JRNL0000000015', 72, 'hadir'),
(1955, 'JRNL0000000015', 73, 'hadir'),
(1956, 'JRNL0000000015', 74, 'hadir'),
(1957, 'JRNL0000000015', 75, 'ijin'),
(1958, 'JRNL0000000015', 76, 'alpa'),
(1959, 'JRNL0000000015', 77, 'alpa'),
(1960, 'JRNL0000000015', 78, 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `name_jurusan` varchar(50) NOT NULL,
  `singkat_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `name_jurusan`, `singkat_jurusan`) VALUES
(1, 'Teknik Jaringan Komputer & Telekomunikasi', 'TJKT'),
(2, 'Desain Komunikasi Visual', 'DKV'),
(3, 'Akuntansi Keuangan Lembaga', 'AKL'),
(4, 'Multimedia', 'MM'),
(7, 'Teknik Elektronika', 'TE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(3) NOT NULL,
  `name_kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `name_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kel_jur_rombel`
--

CREATE TABLE `tb_kel_jur_rombel` (
  `id_rombel` int(10) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `id_th_pelajaran` int(10) NOT NULL,
  `rombel` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kel_jur_rombel`
--

INSERT INTO `tb_kel_jur_rombel` (`id_rombel`, `id_kelas`, `id_jurusan`, `id_th_pelajaran`, `rombel`) VALUES
(1, 1, 3, 1, '1'),
(2, 2, 3, 1, '1'),
(3, 2, 3, 1, '2'),
(4, 3, 3, 1, '1'),
(5, 1, 1, 1, '1'),
(6, 1, 1, 1, '2'),
(7, 1, 1, 1, '3'),
(8, 2, 1, 1, '1'),
(9, 2, 1, 1, '2'),
(10, 2, 1, 1, '3'),
(11, 3, 1, 1, '1'),
(12, 3, 1, 1, '2'),
(13, 1, 2, 1, '1'),
(14, 2, 2, 1, '1'),
(15, 3, 4, 1, '1'),
(35, 1, 1, 2, '1'),
(36, 1, 1, 2, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_leveluser`
--

CREATE TABLE `tb_leveluser` (
  `id_level` int(5) NOT NULL,
  `name_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_leveluser`
--

INSERT INTO `tb_leveluser` (`id_level`, `name_level`) VALUES
(1, 'admin'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(10) NOT NULL,
  `name_mapel` varchar(50) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `name_mapel`, `kode_mapel`) VALUES
(1, 'Bahasa indonesia', 'b_indo'),
(2, 'PKWU', 'p_kwu'),
(3, 'Pilihan', 'pilihan'),
(4, 'PAPJDM', 'p_apjdm'),
(5, 'PALIP', 'p_alip'),
(6, 'Konsentrasi Keahlian', 'kons_keahl'),
(7, 'DPK', 'dpk'),
(8, 'PKWU', 'p_kwu'),
(9, 'Administrasi Pajak', 'admin_paja'),
(10, 'PAI BP', 'pai'),
(11, 'Koordinator P5', 'p5'),
(12, 'Komputer Akutansi', 'komp_akunt'),
(13, 'Konsentrasi Keahlian', 'kons_keahl'),
(14, 'Akutansi Keuangan', 'Akun_keuan'),
(15, 'Matematika', 'Mtk'),
(16, 'PIPAS', 'p_ipas'),
(17, 'Bahasa inggris', 'b_ing'),
(18, 'PJOK', 'pjok'),
(19, 'Seni Budaya', 'seni_b'),
(20, 'BK', 'bk'),
(21, 'Informatika', 'iftk'),
(22, 'Sejarah', 'sejarah'),
(23, 'AIJ', 'aij'),
(24, 'TLJ', 'tlj'),
(25, 'TPAV', 'tpav'),
(26, 'DMI', 'dmi'),
(27, 'Bahasa Jawa', 'b_jawa'),
(28, 'Bahasa Arab', 'b_arab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rolsuser`
--

CREATE TABLE `tb_rolsuser` (
  `id_rols` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rolsuser`
--

INSERT INTO `tb_rolsuser` (`id_rols`, `id_user`, `id_level`) VALUES
(43, 70, 1),
(44, 72, 2),
(45, 73, 2),
(46, 74, 2),
(47, 75, 2),
(48, 76, 2),
(49, 77, 2),
(50, 78, 2),
(51, 79, 2),
(52, 80, 2),
(53, 81, 2),
(54, 82, 2),
(55, 83, 2),
(56, 84, 2),
(57, 85, 2),
(58, 86, 2),
(59, 87, 2),
(60, 88, 2),
(61, 89, 2),
(62, 90, 2),
(63, 91, 2),
(64, 92, 2),
(65, 93, 2),
(66, 94, 2),
(67, 95, 2),
(68, 96, 2),
(69, 97, 2),
(70, 98, 2),
(71, 99, 2),
(72, 100, 2),
(73, 101, 2),
(75, 103, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `name_siswa` varchar(50) NOT NULL,
  `id_rombel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `name_siswa`, `id_rombel`) VALUES
(32, '232035', '0085965789', 'Anjani Nawang sari', 13),
(33, '232036', '0079618654', 'BIMO ANANDA HERLAMBANG', 13),
(34, '232037', '0081967364', 'Bulan Malam', 13),
(35, '232038', '0075833162', 'CINDY RIYANI', 13),
(36, '232039', '0083042204', 'DELA SAFIRA', 13),
(37, '232040', '0078530464', 'Deswita Mutiara Cinta', 13),
(38, '232041', '0079277411', 'DEWI PUJI ASTUTI', 13),
(39, '232042', '0089393121', 'DINA AULIA', 13),
(40, '232043', '0088392084', 'FITRI ASMA\'UL KHASANAH', 13),
(41, '232044', '0071233304', 'ISMAIL NAUFAL WASHIF NABIGH', 13),
(42, '232046', '0099065949', 'Labibah Taqiyatul Fauziyah', 13),
(43, '232047', '0073740599', 'Lila Nuraeni', 13),
(44, '232048', '0087371814', 'LILYANA SHINTA DEWI', 13),
(45, '232049', '0075083804', 'Muhammad Ikhsan Sya\'bani', 13),
(46, '232050', '3066137299', 'NABILA AINUN FATIKHAH', 13),
(47, '232051', '0089187265', 'NAJWA NINDA AGUSTINA', 13),
(48, '232052', '0061487658', 'Rizal Aditya', 13),
(49, '232053', '0079846950', 'Siti Habsya Asita', 13),
(50, '232054', '0075520202', 'TATIA DWI FAJRI YULINSA', 13),
(51, '233055', '0077129259', 'Abie Taris Nugroho', 5),
(52, '233056', '0086893752', 'ADELINA OKTAVIANI', 5),
(53, '233057', '3079596430', 'AMELIA PUTRI', 5),
(54, '233058', '0083737860', 'ANISA FIRDAUS SARI', 5),
(55, '233059', '0097519934', 'Aulia Azahra', 5),
(56, '233060', '0084734231', 'Bima Vahri Zeftito', 5),
(57, '233061', '0081165002', 'Cika Esa Pratiwi', 5),
(58, '233062', '0083427829', 'Deva Apriliani', 5),
(59, '233063', '0091771618', 'DWI LARAS SUKMA AYU', 5),
(60, '233064', '0089457126', 'FERZA ADI PUTRA', 5),
(61, '233065', '0089628657', 'FITRI OKTA AULIA', 5),
(62, '233066', '0089929865', 'Harnum Sari', 5),
(63, '233067', '0091056257', 'Indri Asmarani', 5),
(64, '233068', '0086418405', 'KEVIN DIANSYAH', 5),
(65, '233069', '0082803008', 'KHOIRO MUNAFIFAH', 5),
(66, '233070', '0071527298', 'Lutfan Faqih', 5),
(67, '233071', '0075479026', 'MOHAMAD HIBATUL WAFIE', 5),
(68, '233072', '0077455446', 'MUHAMMAD ZIDAN AL FATHA', 5),
(69, '233073', '0096878899', 'NAVISAH HUMAEROH', 5),
(70, '233074', '0082590715', 'NISFI LAILATUL ZAHRO', 5),
(71, '233075', '0075791144', 'Raisya Nuzulul Ramadhani', 5),
(72, '233076', '0084123323', 'RIANA EKA YULIANTY', 5),
(73, '233077', '0085190478', 'Rizkayatul Nur Fadlilah', 5),
(74, '233078', '0084231617', 'Rizki Muslimatul Khasanah', 5),
(75, '233079', '0083059921', 'Rosa Tri Utami', 5),
(76, '233080', '0089961715', 'SAKTI RAMA SAPUTRA', 5),
(77, '233081', '0073783189', 'Sasi Agustin', 5),
(78, '233083', '0088250395', 'ZALSA CINTYA BELLA', 5),
(79, '233084', '0083123413', 'Aden Winangun', 6),
(80, '233085', '', 'Aldiansyah Putra Purnomo', 6),
(81, '233086', '0064827155', 'AWALINA RAMADHINI', 6),
(82, '233087', '0083775079', 'AYU NAWANG WULAN', 6),
(83, '233088', '0089795885', 'Desti Saskia Kasih', 6),
(84, '233089', '0079551519', 'DESY MURTI WULANDARI', 6),
(85, '233090', '0082395303', 'DIVAN FATUROCHMAN', 6),
(86, '233091', '0045892422', 'Farhan Abbas', 6),
(87, '233092', '0075764535', 'Gito Efendi', 6),
(88, '233093', '0088771686', 'Izzah Maulina Salma', 6),
(89, '233094', '0086573237', 'Kaesha Putri', 6),
(90, '233095', '0086010625', 'LULU SYARIFATUL HUSNA', 6),
(91, '233096', '0089355478', 'MUHAMMAD FAJAR RIZQI', 6),
(92, '233097', '0074009782', 'MUHAMMAD NABIL DHIYA ULHAQ', 6),
(93, '233098', '0086994478', 'Naysila Rahma Hisana', 6),
(94, '233099', '0083411411', 'Nazzila Aprilia', 6),
(95, '233100', '0071287726', 'Nervy Selviana', 6),
(96, '233101', '0088257429', 'NOVAL BAKHTIAR', 6),
(97, '233102', '0082927058', 'RAMA IKHFANUL MUHAIMIN', 6),
(98, '233103', '0081457417', 'RIFKA SYA\'BANIYAH AZIZAH', 6),
(99, '233104', '0085488443', 'SEKAR HANDAYANI', 6),
(100, '233105', '0085859821', 'SHOHBIROTIN AZALEA', 6),
(101, '233106', '0089925593', 'Tiara Aulia', 6),
(102, '233107', '0089264139', 'Tiara Dwi Barokah', 6),
(103, '233108', '0083916720', 'Ulili Maulidatur Rodiyani', 6),
(104, '233109', '0071152301', 'WAFI AWAL WAGINDRA', 6),
(105, '233110', '0084230997', 'WAFIQ AZIZAH', 6),
(106, '233111', '3077031229', 'WIDYANTI', 6),
(107, '233112', '0074910410', 'WIKA BANIAH SAPUTRI', 6),
(108, '233113', '0081884137', 'Zahrotu Zita Arifiani', 6),
(109, '233114', '0074771207', 'ANDIKA SAKTIAWAN', 7),
(110, '233115', '0082433952', 'CINDY DWI FATIKASARI', 7),
(111, '233116', '0077802949', 'DEFIAH ANDRIANI', 7),
(112, '233117', '0085320409', 'Devita Yuliana Safutri', 7),
(113, '233118', '0088948101', 'DEWI AMELIA', 7),
(114, '233119', '0084532581', 'Dewi Mawar Sari', 7),
(115, '233120', '0084443609', 'Diah Ayu Agustin', 7),
(116, '233121', '0091543164', 'DIANDRA JASMINE FERDITA', 7),
(117, '233122', '0082295995', 'Dwika Septi Ramdani', 7),
(118, '233123', '0085494410', 'EGI ARIF YULIANSYAH', 7),
(119, '233124', '0075491809', 'Fauzan Dwi Andhika', 7),
(120, '233125', '0083224785', 'Ghendis Kusuma Legowo', 7),
(121, '233126', '0087160338', 'HARMUKTI', 7),
(122, '233127', '0084425750', 'KHOERUL ANAM', 7),
(123, '233128', '0082914435', 'MEILAN NAYZILA', 7),
(124, '233129', '0083861040', 'MEISYA NATARAYA', 7),
(125, '233130', '0095348553', 'Muhammad Nur Arif Afiansyah', 7),
(126, '233131', '0099070622', 'Muhammad Syam Ghozi', 7),
(127, '233132', '0081929314', 'MUKHTAR MUNAZAT', 7),
(128, '233133', '0062813411', 'Nimas Soviarini', 7),
(129, '233134', '0081102973', 'Nurfita Amelia', 7),
(130, '233135', '0085690576', 'NURMILATI', 7),
(131, '233136', '0082997654', 'Pipit Dwi Aryani', 7),
(132, '233137', '0089801362', 'PUPUT RAHMAWATI', 7),
(133, '233138', '0086666394', 'Putri Mutiara', 7),
(134, '233139', '0074793333', 'Rara Lidiana Inda', 7),
(135, '233140', '0089190489', 'RESTI YULIANTI', 7),
(136, '233141', '0072148347', 'REVALDO HENDRA SAPUTRA', 7),
(137, '233142', '0086119933', 'SENIOR HINO HAFIL', 7),
(138, '233143', '0085799599', 'SRI YANI', 7),
(139, '233144', '0086446669', 'SYIFA AZZAHRA', 7),
(140, '233145', '0088621287', 'Tifani Clara Difia', 7),
(219, '221027', '0078562303', 'ANIS KAMELA AFIFAH', 3),
(220, '221028', '0074650811', 'AULIA NUR AFIFAH', 3),
(221, '221029', '0075014408', 'AYU DWI LESTARI', 3),
(222, '221030', '0064558253', 'Bunga Intan Setyogati', 3),
(223, '221031', '0075738817', 'Cahaya Sri Ayuning', 3),
(224, '221032', '0077732604', 'DEA ARYANTI', 3),
(225, '221033', '0079809246', 'DEVI MAHARANI', 3),
(226, '221034', '0083077238', 'Dewi Cornelya Agatha', 3),
(227, '221035', '0074927611', 'ELSA INDAH SELIYA', 3),
(228, '221036', '0071131594', 'Faiqotul Hikmah', 3),
(229, '221037', '0042693872', 'GUSTI LINTANG AMALIYA PUTRI', 3),
(230, '221038', '0066443011', 'ILMI AMALIA', 3),
(231, '221039', '', 'Indah Nur Nabila', 3),
(232, '221040', '0075327628', 'JIHAN AMILIA', 3),
(233, '221041', '0076461938', 'Linta Nuri Ahmad', 3),
(234, '221042', '0061325655', 'LIVIA RAMADANI', 3),
(235, '221043', '', 'Nazala Anindya Atmariani', 3),
(236, '221044', '0065793265', 'NIA RAMADHANI', 3),
(237, '221045', '0077579397', 'Nike Cahaya Putri Amelia', 3),
(238, '221046', '0064298423', 'NOVA PRIYANA', 3),
(239, '221047', '0077502262', 'RANI NAYLA PUTRI', 3),
(240, '221048', '0077373761', 'Rengganis Nuraini', 3),
(241, '221049', '0076065558', 'RESTY NUR AMAINAH', 3),
(242, '221050', '0068250472', 'SHINTA DEWI ASTUTI', 3),
(243, '221051', '0067230712', 'Shintia Ayu Diawati', 3),
(244, '221052', '0073472818', 'SRI DEWI LESTARI', 3),
(245, '222053', '0077860972', 'AISYAH NUR FEBRIYANTI', 14),
(246, '222054', '0075162481', 'Alfian Dwi Prasetyo', 14),
(247, '222055', '0072033388', 'BAROKAH FAUZIA', 14),
(248, '222056', '0077021814', 'DHINING PANGASTUTI', 14),
(249, '222057', '0078227239', 'EFI WULANDARI', 14),
(250, '222058', '0075096621', 'FANNIA MELANY', 14),
(251, '222059', '0076704738', 'Felia Afiyanti', 14),
(252, '222060', '0061743692', 'Firdaus Hasbi Arya Nugraha', 14),
(253, '222061', '0073007975', 'FITRI DIANITA', 14),
(254, '222062', '0075145000', 'Iif Fauziah Azzahro', 14),
(255, '222063', '0068871279', 'INTAN WULANDARI', 14),
(256, '222064', '0074080627', 'Ivan Sahbillal', 14),
(257, '222065', '0076765781', 'Krisna', 14),
(258, '222066', '0055834866', 'KURNIA DIYAH REHAYATI', 14),
(259, '222067', '0074370523', 'LARAS WATI', 14),
(260, '222068', '0065221910', 'Luthfi Ardiansyah', 14),
(261, '222069', '0074592674', 'MUHAMAD RIKI ALFA IDIN', 14),
(262, '222070', '3077815113', 'Muhammad Luthfi Maula Rizieq', 14),
(263, '222071', '0075574307', 'MUTIARA RAMADHANI', 14),
(264, '222072', '0071560039', 'PUTRI AMALIA SOLIKHAH', 14),
(265, '222073', '0071584735', 'Revalina Tistiyanti', 14),
(266, '222074', '0061833485', 'SALSAVA ARISTABELA', 14),
(267, '222075', '0078892340', 'Sela Amalia', 14),
(268, '222076', '0071637839', 'SELI RAHMA DEWI', 14),
(269, '222077', '0074154789', 'SRI MILASARI', 14),
(270, '222078', '0065880259', 'TIO ADI SEPTIAN', 14),
(271, '222079', '0073924319', 'YASMIN NAILA TSABITA', 14),
(272, '222080', '0077324819', 'YUNI AYU NAFISA', 14),
(273, '222081', '0079236253', 'Zahlul Shofi Mubarok', 14),
(274, '222082', '0071668083', 'Zain Nazala Syafi', 14),
(275, '222083', '0079009930', 'ZULFA AMBARA', 14),
(276, '223084', '0078106060', 'Ade Arya Prasetyo', 8),
(277, '223085', '0078194380', 'Aerien Aprilia Putri', 8),
(278, '223086', '0076398419', 'ALAEKA BADAWI', 8),
(279, '223087', '0072847777', 'ALIF FANI FEBRIANTI', 8),
(280, '223088', '0073756353', 'BIAND JOAH EXZANDY', 8),
(281, '223089', '0078073943', 'Cantika Alina Putri', 8),
(282, '223090', '0074918379', 'CHAIRIL AZMI', 8),
(283, '223091', '0072751562', 'Dimas Erlangga Firmansyah', 8),
(284, '223092', '0071993987', 'Dimas Maulana Malik Ibrahim', 8),
(285, '223093', '0056285862', 'ELSI ERVIKA', 8),
(286, '223094', '0067982628', 'ERIN SEPTRIANA LAYSAFIRNA', 8),
(287, '223095', '0073818463', 'EVA BILQIS RAMADHANI', 8),
(288, '223096', '0061659094', 'Fathan Fadhillah', 8),
(289, '223097', '0078556392', 'Giska Anelka', 8),
(290, '223098', '0062690203', 'Hendra Marsel', 8),
(291, '223099', '0077448602', 'HILDA KAYLA LOVINA ROSMAYA DEVI', 8),
(292, '223100', '0076756907', 'Lisa Amelia', 8),
(293, '223101', '0085982947', 'Maemanatul Izah', 8),
(294, '223102', '0073492449', 'MELICHA NOVA BRIANTY', 8),
(295, '223103', '0053400777', 'MOHAMMAD DENI SEFRIYAH', 8),
(296, '223104', '0074476955', 'Muhammad Wildhan', 8),
(297, '223105', '0067970848', 'MUSTAFIDAH', 8),
(298, '223106', '0078754769', 'Nindi Anggraeni', 8),
(299, '223107', '0072894033', 'NUR AMALIA NAELI IZAH', 8),
(300, '223108', '0055877298', 'Rayhan Afrizal Zulfi', 8),
(301, '223109', '0065100170', 'RENDI AL TESYA', 8),
(302, '223110', '0072691988', 'RISMA NATASYA ADINDA PUTRI', 8),
(303, '223111', '0068856911', 'Sakinatul Faizah', 8),
(304, '223112', '0073822361', 'Siswanto', 8),
(305, '223113', '0085023981', 'TITI WASTUTI', 8),
(306, '223114', '0072906961', 'WIWIN ROSALINDA', 8),
(307, '223115', '0075728259', 'YUYUN KARLINA', 8),
(308, '223116', '0072534434', 'ZAHWA AURA LEJAZ', 8),
(309, '223117', '0062891695', 'AFDAN RIFANSYAH', 9),
(310, '223118', '0077443117', 'Aisah Hadiyanti Ramadhoni', 9),
(311, '223119', '0079573658', 'AL ZACHARI WIBIKSONO', 9),
(312, '223120', '0076063586', 'Arya Suta Astamurti Adhipramana', 9),
(313, '223121', '0068724545', 'AUDY AHMAD RIFAI', 9),
(314, '223122', '0076267343', 'BAGUS KUMARA ESA', 9),
(315, '223123', '0071150996', 'DEA RISMA YUNIAR', 9),
(316, '223124', '0063512641', 'DIMAS AJI SAPUTRA', 9),
(317, '223125', '0078005647', 'Dimas Wahyu Hidayat', 9),
(318, '223126', '0077623376', 'ELVA ELMIZA', 9),
(319, '223127', '0074126029', 'FAHMA PRICILLA', 9),
(320, '223128', '0137666344', 'GHUFRON SUR RAMADHAN SAMA', 9),
(321, '223129', '0069679921', 'Karmilah', 9),
(322, '223130', '0074543812', 'KHOIRUL HIDAYAT', 9),
(323, '223131', '0065154218', 'Lia Novita sari', 9),
(324, '223132', '0074214763', 'MARSHA AMY SUKAHMAN', 9),
(325, '223133', '0072304554', 'MIFTA KHULJANAH', 9),
(326, '223134', '0066000640', 'MUHAMAD IDWAR ALDIYANSAH', 9),
(327, '223135', '0078267645', 'MUHAMMAD HAFIZD AINUL YAQIN', 9),
(328, '223136', '0066607260', 'NAILIL HADZIQOH', 9),
(329, '223137', '0066818124', 'Novita Nurul Aisyah', 9),
(330, '223138', '0066201407', 'Nur Azizah', 9),
(331, '223139', '0078011931', 'REFI MARISKA', 9),
(332, '223140', '0071179205', 'REVA ASIH', 9),
(333, '223141', '0076307540', 'REVANGGA AJI PERMANA', 9),
(334, '223142', '0085361677', 'RISALATUL MAGHFIROH', 9),
(335, '223143', '0065134904', 'SALMA KHOLIFATUL KHASANAH', 9),
(336, '223144', '0062543411', 'SITI ELINA', 9),
(337, '223145', '0076789121', 'TEGAR WIBOWO', 9),
(338, '223146', '0073344972', 'TIKA LAELATUS SAFITRI', 9),
(339, '223147', '0078216672', 'TIRTA HANDIKA', 9),
(340, '223148', '0074714290', 'TRI WINDI YULIANTI', 9),
(341, '223177', '0063564293', 'WISNU FADJARKHARIM', 9),
(342, '223149', '0071219052', 'AILA DWI APRILIANI', 10),
(343, '223149', '0054310779', 'Alya Nur Ramadhani', 10),
(344, '223150', '0069564172', 'ANDO WIDODO', 10),
(345, '223151', '0069276465', 'AVIKA MILA', 10),
(346, '223152', '0073650138', 'BAGAS DAFFA ADITYA', 10),
(347, '223153', '0072338020', 'BRIYAN PRASETYO', 10),
(348, '223154', '0061528350', 'CANDRA ANDIKA', 10),
(349, '223155', '0073363354', 'Dian Risobri', 10),
(350, '223156', '0061001045', 'EVI KURNIAWATI', 10),
(351, '223157', '0078233902', 'Faraghina Aurelia', 10),
(352, '223158', '0074716380', 'FATIH TEANA HAFIZ', 10),
(353, '223159', '0075190222', 'FATMAH LIA KINANTI', 10),
(354, '223160', '0079057865', 'GHAZIYAH SHAFARINA HANAN', 10),
(355, '223161', '0076770497', 'Ghofar Abdul Jabar', 10),
(356, '223163', '0062444378', 'HAFIZH NAUFAL AZZAM', 10),
(357, '223164', '0074023293', 'IKA SALSABILA PRAMESTI', 10),
(358, '223165', '0079513863', 'LOLITA FEBRIYANTI', 10),
(359, '223166', '0077654358', 'Mohamad Arif Rahman Hakim', 10),
(360, '223167', '0079810357', 'Muhammad Saiful Mizan', 10),
(361, '223168', '0077345588', 'Nabila Ati Fakriatun', 10),
(362, '223169', '0072125206', 'RAIHAN AFANDIKA', 10),
(363, '223170', '0072255051', 'RINDA SARI', 10),
(364, '223171', '0073000785', 'SALWA RAMADHANI', 10),
(365, '223172', '0055809215', 'SEPTA MUTHOHAROH', 10),
(366, '223173', '0064453129', 'SITI BELLA NAPSIAH', 10),
(367, '223174', '0089733817', 'Syahrul Mukarrom', 10),
(368, '223175', '0063925617', 'TYAS NUR HIDAYAH', 10),
(369, '223176', '0075364717', 'Vanny Nuraeny', 10),
(370, '223178', '0072811095', 'YESSI SETIA WATI', 10),
(371, '233146', '0077441529', 'Zirah Adillah Mutfakhrozi', 10),
(372, '2672', '0068071274', 'AIRIN FEBRIANI', 4),
(373, '2673', '0053417305', 'ASTRI NOVILA ANGGRAENI', 4),
(374, '2674', '0068813080', 'AURA DEVINTA CAHYA', 4),
(375, '2675', '0065466501', 'DELON ARYANT SAHRONI', 4),
(376, '2676', '0068204077', 'Desti Elasari', 4),
(377, '2677', '0062236634', 'ELIZIA SEFELYNE', 4),
(378, '2678', '0056201066', 'INDI AYU LESTARI', 4),
(379, '2679', '0067240776', 'KARINA AULIA RISANTI', 4),
(380, '2680', '0063002453', 'META ERINDA', 4),
(381, '2681', '0061211455', 'Mulia Khasanah', 4),
(382, '2682', '0062743661', 'NAELA TUSY AZAHRA', 4),
(383, '2683', '0072865948', 'Natasya Pebriyanti', 4),
(384, '2684', '0061051137', 'NIA FADHILAH', 4),
(385, '2685', '0052539515', 'PUTRI FELISKA', 4),
(386, '2686', '0064171385', 'SANDRA NALIATI', 4),
(387, '2687', '0078596782', 'Sheril Uzlifatil Janah', 4),
(388, '2688', '3067695680', 'Widya Meilani', 4),
(389, '2690', '0065267789', 'Anggela Vritza Pepriani', 4),
(390, '2691', '0069882550', 'Anisa Indriani', 4),
(391, '2692', '0056824979', 'AULIA MEIDIAN', 4),
(392, '2693', '0053289116', 'BINTANG AYU RAMADANI', 4),
(393, '2694', '0069775514', 'Desta Maharani', 4),
(394, '2695', '0054489771', 'DIAH AYU OKTAVIA', 4),
(395, '2696', '0069607640', 'Jihan Nayla Atikah', 4),
(396, '2697', '0069103591', 'LISA DINI RESTYANA', 4),
(397, '2698', '0061255966', 'MIFA KURNIASIH', 4),
(398, '2700', '0065922568', 'NAYLA MILLATINA ASKA', 4),
(399, '2701', '0053693339', 'Nia Puspitasari', 4),
(400, '2702', '3068374245', 'Nor Indah Wijayanti', 4),
(401, '2703', '0052388328', 'NOVA ADELIA SHIFA SALSABILA', 4),
(402, '2704', '0055444478', 'Renita Eka Auliana Rahmadiani', 4),
(403, '2705', '0062163083', 'Sharmila Ayu Kusuma dewi', 4),
(404, '2707', '0068302045', 'Virgiawan Puji Pertama', 4),
(405, '2708', '0079530652', 'ZAHLIKA GITA GUTANTI', 4),
(406, '2802', '0056391949', 'SILMI NURUL UMAMI', 4),
(407, '2709', '0063040851', 'AIS LAILA AYU', 15),
(408, '2710', '0052186125', 'ALDI PUTRA WINATA', 15),
(409, '2711', '0066637699', 'ALFIN DWI PAMUNGKAS', 15),
(410, '2712', '0072131652', 'Alvin Nur Rosyid', 15),
(411, '2713', '0068310271', 'Amirotun Khasanah', 15),
(412, '2714', '0066962841', 'CHELLI DESTI NILASARI', 15),
(413, '2715', '0067614961', 'DAHLIA PRAWITASARI', 15),
(414, '2716', '0058077350', 'Dewi Sartika Ramadhani', 15),
(415, '2717', '0064655553', 'Dian Puspitasari', 15),
(416, '2718', '0063800378', 'DINA SURYANTI', 15),
(417, '2719', '0067171634', 'FINA ANDINI', 15),
(418, '2720', '0067247858', 'Hasta Dwi Meisha Putri', 15),
(419, '2721', '0053155709', 'MUHAMMAD BAYU SAPUTRO', 15),
(420, '2722', '0065584593', 'MUSYA ARYADILA FITRA', 15),
(421, '2723', '0065203289', 'ROSINTA SEPTI', 15),
(422, '2724', '3053878046', 'Safitri Widia Sari', 15),
(423, '2725', '0053396286', 'Sari Martizza', 15),
(424, '2726', '0072064714', 'SIFAUL KHORIDAH', 15),
(425, '2727', '3062316090', 'Wulan Alifathu Sa\'diah', 15),
(426, '2728', '0066972607', 'YANI AGUSTINA', 15),
(427, '2729', '0064551822', 'ZALFA NAURA APRILIANTI', 15),
(428, '2730', '0066294807', 'Afellia Nilam Eriska', 11),
(429, '2731', '0044268153', 'ANGGA PRADIPTA UTAMA', 11),
(430, '2732', '0067652449', 'Arivah Wijayanti', 11),
(431, '2733', '0064624634', 'ARYA DWI KURNIAWAN', 11),
(432, '2734', '0064925091', 'BENING SETIAWATI', 11),
(433, '2735', '0063025074', 'DANI WIDEYANTO', 11),
(434, '2736', '0069970715', 'Della Tahta Pratiwi', 11),
(435, '2737', '3062207765', 'Dhea Nur Fadlilah', 11),
(436, '2738', '0065192132', 'FAHMI MUBAROK', 11),
(437, '2739', '0053417304', 'Faisal Candra Dinova', 11),
(438, '2740', '0053674835', 'Fauzal Ramadhani', 11),
(439, '2741', '0061242094', 'HAFIS ANINDA', 11),
(440, '2743', '0055478547', 'INE MUTIARA PUTRI', 11),
(441, '2744', '0035366340', 'JUNIAN PUSPITA SARI', 11),
(442, '2745', '0061941208', 'KEVIN ATSIS AGUSTINO', 11),
(443, '2746', '0064461034', 'KUSRIATUN', 11),
(444, '2747', '3063594556', 'Marseleno Ponco Saputra', 11),
(445, '2748', '0066987934', 'Mohammad Khusni Faqih', 11),
(446, '2749', '0061238235', 'MUHAMAD ARIFIN', 11),
(447, '2752', '0052428622', 'NOFA ULI FIYAH', 11),
(448, '2753', '0063951498', 'Nurul Karomah', 11),
(449, '2754', '0072593523', 'PEBRI RIZKI SAPUTRA', 11),
(450, '2755', '0066266196', 'RENITA INDRIYANI', 11),
(451, '2756', '0063252267', 'Sindi Nazalia', 11),
(452, '2757', '0052539536', 'SIYAMSARI', 11),
(453, '2758', '3063411332', 'Tatia Nurul Hikmah', 11),
(454, '2759', '3068492284', 'Ummi Sairotul Milati Ulfiah', 11),
(455, '2760', '0051654567', 'VIOLA ADE FRASTIKA', 11),
(456, '2761', '0061583474', 'Wahyu Tri gunarso', 11),
(457, '2762', '0052668954', 'ZASKIA MILANDA', 11),
(458, '2763', '0065622250', 'ADINDA SILVIANI', 12),
(459, '2764', '0052670272', 'AHMAD ARIFIN', 12),
(460, '2765', '0053095585', 'Anugrah Tegar Ardiansyah', 12),
(461, '2766', '0062928601', 'ARIEL ASHA ROSUL', 12),
(462, '2767', '0053827802', 'AYU SAFITRI', 12),
(463, '2768', '0053856437', 'CHOIROTUL MUKAROMAH', 12),
(464, '2769', '0061264584', 'DEA SEPTIANI', 12),
(465, '2772', '0069393110', 'DWI AGUSTIN', 12),
(466, '2773', '9013372046', 'Fadil Syah Muzakki', 12),
(467, '2774', '0065665361', 'FITRI AZIZAH', 12),
(468, '2775', '0088817654', 'HENDRIK RIFKI MAULANA', 12),
(469, '2776', '0065985296', 'INDRI SETIANI', 12),
(470, '2777', '0053417301', 'IRFAN SYA BAN MAULANA', 12),
(471, '2779', '0065506865', 'LESTARI PUJI ASTUTI', 12),
(472, '2780', '0069771382', 'MEI DWI USNUL KHOTIMAH', 12),
(473, '2781', '0052166604', 'MUHAMMAD SYAHRONI', 12),
(474, '2782', '0063415634', 'Nisa Khaerunnisa', 12),
(475, '2783', '0066682938', 'Novalda Nurul Hikmah', 12),
(476, '2785', '0054438829', 'PANGGIH MAY DIA', 12),
(477, '2786', '0069521824', 'RATNA DWI MUKTI', 12),
(478, '2788', '0066745190', 'RESICA RINDI FITRIANA ALI', 12),
(479, '2789', '0053373872', 'ROY DEWANTORO', 12),
(480, '2790', '0060198638', 'SALSA AYUNINGTYAS', 12),
(481, '2791', '0069093285', 'SALSYA NUR ASAKU', 12),
(482, '2792', '0065329734', 'SASKIA PUJI MEILANI', 12),
(483, '2793', '0074285634', 'Sayidina Hernan Salsadila', 12),
(484, '2795', '0063742740', 'SUKMA PRAMESTI', 12),
(485, '2796', '0068795091', 'ULUNG ZENSYA PRATAMA', 12),
(486, '2797', '0058355969', 'VINA SUKMA RAHMA DINI', 12),
(487, '2798', '0069478923', 'WAHYU PRATAMA', 12),
(488, '2799', '0062499517', 'WULAN DIAH PRIHASTARI', 12),
(489, '2801', '0060198636', 'NATHASYA MEC\'KA AULIA', 12),
(490, '221001', '0073421928', 'AGNI PUTRI AMELIA', 2),
(491, '221003', '0068201886', 'Ainun Nisa', 2),
(492, '221004', '0084418150', 'CHIRANA RESCHA CHIKA MENTARI', 2),
(493, '221005', '0075333803', 'Dinda Cantika Apsari', 2),
(494, '221006', '0053811494', 'DIVA RIVANA', 2),
(495, '221007', '0071682423', 'Dwi Septiani', 2),
(496, '221009', '0076644301', 'GITA CAHAYA NINGSIH', 2),
(497, '221010', '0074011544', 'ICHA APRILIANI', 2),
(498, '221011', '0076324689', 'IKE PURWANINGRUM', 2),
(499, '221012', '0066617105', 'Intan Permata Sari', 2),
(500, '221013', '0073505921', 'JUWITA EKA ARGYANTI', 2),
(501, '221015', '0073511597', 'Lutfiah Lailatul Faroh', 2),
(502, '221016', '0078443689', 'MILA SAFINATUNAJAH', 2),
(503, '221017', '0079538028', 'NAELA IZATUROHMAH', 2),
(504, '221018', '0064928895', 'Novel Adelia Putri', 2),
(505, '221019', '0074268403', 'Qeikan Austria Safiana Putri', 2),
(506, '221020', '0075457215', 'Ramadani Isnaeni', 2),
(507, '221021', '0073336488', 'REYSTA AZUAN NAFIA', 2),
(508, '221022', '0067040454', 'Reza Nurvianah', 2),
(509, '221023', '0071206262', 'RISMA WIDIYANI', 2),
(510, '221024', '0072171661', 'Saskia Ratna Dilla', 2),
(511, '221025', '0072992193', 'Sekar Mentari Handayani', 2),
(512, '221026', '0074472982', 'ZAHRA IFA AULIA', 2),
(513, '231001', '0073384996', 'Agista Putri Cantika', 1),
(514, '231002', '0086514493', 'Aisyah Adinda Putri', 1),
(515, '231003', '0085445280', 'ANASTASYA PUTRI', 1),
(516, '231004', '0084720596', 'ATHFINA ALINIOLA', 1),
(517, '231005', '0081927404', 'BUNGA CITRA AULIA', 1),
(518, '231006', '0089459104', 'Chika Yuliana Sari', 1),
(519, '231007', '0078144485', 'DAULAH FINA', 1),
(520, '231008', '0081573648', 'DEA MEI ERAWATI', 1),
(521, '231009', '0079140611', 'Defira Fatika Rahma', 1),
(522, '231010', '0083847689', 'DINDA AYU YULIANTI', 1),
(523, '231011', '0081388704', 'FALA ZAKIYA', 1),
(524, '231012', '0086966349', 'Fira Olivia Natasa', 1),
(525, '231014', '0077313610', 'IQNA KA\'ANNA LAYSA', 1),
(526, '231015', '0083657069', 'KARINA SAIFUL NATASYA', 1),
(527, '231016', '0078479391', 'Laila Anivatul Husna', 1),
(528, '231017', '0079768125', 'LAILA MUNIFAH', 1),
(529, '231018', '0083410254', 'LAURA DIFA PRAMESTI', 1),
(530, '231019', '0087541391', 'LUSI ANNAH SAFIRA', 1),
(531, '231020', '0085179787', 'MA\'ISAH CITRA NURKHASANAH', 1),
(532, '231021', '0098916343', 'MELINDA SEKAR SARI', 1),
(533, '231022', '0087718149', 'Mis Arum Widani', 1),
(534, '231023', '0081508754', 'Neysa Amelia', 1),
(535, '231024', '0088216529', 'Novi Amelia Sari', 1),
(536, '231025', '0088219612', 'NUR AISYAH', 1),
(537, '231026', '0085664627', 'Raras Juliana', 1),
(538, '231027', '0081161337', 'Reva Liana Wulandari', 1),
(539, '231028', '0076378743', 'Seri Norhidayah', 1),
(540, '231029', '0071107710', 'Sevia Meilani', 1),
(541, '231030', '0082539115', 'Silvi Eka Wulandari', 1),
(542, '231031', '0072185975', 'Susan Okta Fiani', 1),
(543, '231032', '0081308828', 'TRISNA LUTFIYANI', 1),
(544, '231033', '0071076470', 'Vindika Vera Agustiani', 1),
(545, '231034', '0083018466', 'ZASKIA ANANDA PUTRI AGATHA', 1),
(580, '1010', '1010', 'satu kosong', 35),
(582, '1010', '1010', 'Satu nol', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_th_pelajaran`
--

CREATE TABLE `tb_th_pelajaran` (
  `id_th_pelajaran` int(10) NOT NULL,
  `th_pelajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_th_pelajaran`
--

INSERT INTO `tb_th_pelajaran` (`id_th_pelajaran`, `th_pelajaran`) VALUES
(1, '2023/2024'),
(2, '2024/2025'),
(3, '2025/2026'),
(4, '2026/2027'),
(5, '2027/2028'),
(6, '2028/2029'),
(7, '2029/2030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nipy` varchar(20) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nipy`, `nama_depan`, `nama_lengkap`) VALUES
(70, 'admin123', 'admin123', '123', 'admin', 'ADMINISTRATOR'),
(72, '32120050027', '32120050027', '32120050027', 'Munasir', 'MUNASIR, S.Pd, M.T'),
(73, '31120050018', '31120050018', '31120050018', 'Nurlaeli', 'NURLAELI,SE'),
(74, '31120070036', '31120070036', '31120070036', 'Nasokhi', 'NASOKHI, S.Ag'),
(75, '31120050021', '31120050021', '31120050021', 'Aan', 'AAN ZULIANTI,S.IP'),
(76, '31120050022', '31120050022', '31120050022', 'Yudiyanti', 'YUDIYANTI KURNIA AKMALA, S.Pd'),
(77, '31120080050', '31120080050', '31120080050', 'Yakhya', 'YAKHYA EKA SAPUTRA,S.Pd'),
(78, '31120090070', '31120090070', '31120090070', 'Anita', 'ANITA LINDAWATI, S.Pd'),
(79, '31120110112', '31120110112', '31120110112', 'Firman', 'FIRMANSYAH, S.Si'),
(80, '31120130134', '31120130134', '31120130134', 'Heri', 'HERI PRAYITNO, S.Pd'),
(81, '31120150137', '31120150137', '31120150137', 'Eka', 'EKA DYA JUNITA, S.Pd'),
(82, '31120180139', '31120180139', '31120180139', 'Zahroh', 'AFIFATUZ ZAHROH, S.Pd'),
(83, '31120190140', '31120190140', '31120190140', 'Darmanto', 'DARMANTO, S.Kom'),
(84, '31120190142', '31120190142', '31120190142', 'Nurul', 'NURUL FAIQOH, S.Pd'),
(85, '31120210143', '31120210143', '31120210143', 'Bagus', 'BAGUS ESTI WALUYO, S.Pd'),
(86, '31120220145', '31120220145', '31120220145', 'Chandra', 'CHANDRA DWI WIDYANTORO, S.Pd'),
(87, '31120220146', '31120220146', '31120220146', 'Adi', 'ADI YUNI CANDRA, S.Kom'),
(88, '31120220147', '31120220147', '31120220147', 'Esti', 'ESTI RAHAYU, S.Pd'),
(89, '31120230149', '31120230149', '31120230149', 'Fitria', 'FITRIA ANA FADILAH,S.Pd'),
(90, '31120230148', '31120230148', '31120230148', 'Mifthafani', 'MITHAFANI GRANIETA, S.Pd'),
(91, '31120230150', '31120230150', '31120230150', 'Trisma', 'TRISMA FATKHIRIZQI, S.Kom'),
(92, '31120240151', '31120240151', '31120240151', 'Afifah', 'AFIFAH SUKMA LESTARI, S.Kom'),
(93, '31120240152', '31120240152', '31120240152', 'Riskon', 'MUHAMMAD RISKON HIDAYATULLAH, S.Kom'),
(94, '31220050024', '31220050024', '31220050024', 'Fadhilah', 'AHMAD FADHILAH'),
(95, '31220060035', '31220060035', '31220060035', 'Kalsum', 'KALSUM'),
(96, '31219990011', '31219990011', '31219990011', 'Ciswandi', 'CISWANDI'),
(97, '31220060033', '31220060033', '31220060033', 'Solecha', 'SOLECHA'),
(98, '31220060034', '31220060034', '31220060034', 'Eli', 'ELI SUCIANI'),
(99, '31220170138', '31220170138', '31220170138', 'Purnomo', 'PURNOMO'),
(100, '31220190141', '31220190141', '31220190141', 'Adi', 'ADI RIYANTO'),
(101, '31220210144', '31220210144', '31220210144', 'Failsal', 'Faisal Dwi Prasetyo'),
(103, 'admin12', 'admin12', '12', 'admin12', 'admin12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_format_th`
--
ALTER TABLE `tb_format_th`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_generet_tgl`
--
ALTER TABLE `tb_generet_tgl`
  ADD PRIMARY KEY (`id_generet`);

--
-- Indeks untuk tabel `tb_jurnal_harian`
--
ALTER TABLE `tb_jurnal_harian`
  ADD PRIMARY KEY (`id_jurnal_harian`),
  ADD KEY `id_jurnal` (`id_jurnal`);

--
-- Indeks untuk tabel `tb_jurnal_kelas`
--
ALTER TABLE `tb_jurnal_kelas`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_rombel` (`id_rombel`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_jurnal_siswa`
--
ALTER TABLE `tb_jurnal_siswa`
  ADD PRIMARY KEY (`id_jurnal_siswa`),
  ADD KEY `id_jurnal` (`id_jurnal`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kel_jur_rombel`
--
ALTER TABLE `tb_kel_jur_rombel`
  ADD PRIMARY KEY (`id_rombel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_th_pelajaran` (`id_th_pelajaran`);

--
-- Indeks untuk tabel `tb_leveluser`
--
ALTER TABLE `tb_leveluser`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `tb_rolsuser`
--
ALTER TABLE `tb_rolsuser`
  ADD PRIMARY KEY (`id_rols`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_rombel` (`id_rombel`);

--
-- Indeks untuk tabel `tb_th_pelajaran`
--
ALTER TABLE `tb_th_pelajaran`
  ADD PRIMARY KEY (`id_th_pelajaran`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_format_th`
--
ALTER TABLE `tb_format_th`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_generet_tgl`
--
ALTER TABLE `tb_generet_tgl`
  MODIFY `id_generet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal_harian`
--
ALTER TABLE `tb_jurnal_harian`
  MODIFY `id_jurnal_harian` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal_siswa`
--
ALTER TABLE `tb_jurnal_siswa`
  MODIFY `id_jurnal_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1961;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kel_jur_rombel`
--
ALTER TABLE `tb_kel_jur_rombel`
  MODIFY `id_rombel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_leveluser`
--
ALTER TABLE `tb_leveluser`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_rolsuser`
--
ALTER TABLE `tb_rolsuser`
  MODIFY `id_rols` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;

--
-- AUTO_INCREMENT untuk tabel `tb_th_pelajaran`
--
ALTER TABLE `tb_th_pelajaran`
  MODIFY `id_th_pelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jurnal_harian`
--
ALTER TABLE `tb_jurnal_harian`
  ADD CONSTRAINT `tb_jurnal_harian_ibfk_1` FOREIGN KEY (`id_jurnal`) REFERENCES `tb_jurnal_kelas` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jurnal_kelas`
--
ALTER TABLE `tb_jurnal_kelas`
  ADD CONSTRAINT `tb_jurnal_kelas_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tb_kel_jur_rombel` (`id_rombel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jurnal_kelas_ibfk_3` FOREIGN KEY (`kode_mapel`) REFERENCES `tb_mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jurnal_kelas_ibfk_4` FOREIGN KEY (`id_jurnal`) REFERENCES `tb_jurnal_siswa` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jurnal_kelas_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kel_jur_rombel`
--
ALTER TABLE `tb_kel_jur_rombel`
  ADD CONSTRAINT `tb_kel_jur_rombel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kel_jur_rombel_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kel_jur_rombel_ibfk_3` FOREIGN KEY (`id_th_pelajaran`) REFERENCES `tb_th_pelajaran` (`id_th_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rolsuser`
--
ALTER TABLE `tb_rolsuser`
  ADD CONSTRAINT `tb_rolsuser_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tb_leveluser` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rolsuser_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tb_kel_jur_rombel` (`id_rombel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
