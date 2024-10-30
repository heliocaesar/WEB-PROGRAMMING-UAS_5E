-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2024 pada 16.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `author`
--

CREATE TABLE `author` (
  `ID_AUTHOR` int(11) NOT NULL,
  `NAMA_AUTHOR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `author`
--

INSERT INTO `author` (`ID_AUTHOR`, `NAMA_AUTHOR`) VALUES
(1, 'gga'),
(2, 'aa'),
(3, 'Bob Brown'),
(4, 'helio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `ID_PESAN` int(11) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `TOPIK` varchar(100) NOT NULL,
  `ISI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`ID_PESAN`, `NAMA`, `MAIL`, `TOPIK`, `ISI`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'Pertanyaan tentang produk', 'Saya ingin menanyakan tentang produk X.'),
(2, 'Jane Smith', 'jane.smith@example.com', 'Keluhan layanan', 'Saya mengalami masalah dengan layanan Y.'),
(3, 'Alice Johnson', 'alice.johnson@example.com', 'Saran', 'Saya memiliki beberapa saran untuk perbaikan.'),
(4, 'Bob Brown', 'bob.brown@example.com', 'Permintaan informasi', 'Bisa berikan informasi lebih lanjut tentang layanan Z?'),
(5, 'Charlie Black', 'charlie.black@example.com', 'Feedback', 'Sangat puas dengan layanan yang diberikan.'),
(6, 'asdsda', 'sadsa@djkfkjds.com', 'asdsadsd', 'asdsadasdfasd adv s earwaserf  awerft awerfds eafw feawewraf ae fwadf sawdf df sas'),
(7, 'felixxx', 'xxx@gmail.cod', 'sdfasdfsdf', 'sdfasdfasdfasdqsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `ID_POST` int(11) NOT NULL,
  `KATEGORI` varchar(50) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `GAMBAR` varchar(255) DEFAULT NULL,
  `ISI` text NOT NULL,
  `ID_AUTHOR` int(11) DEFAULT NULL,
  `BIDANG` varchar(50) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `DILIHAT` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`ID_POST`, `KATEGORI`, `JUDUL`, `GAMBAR`, `ISI`, `ID_AUTHOR`, `BIDANG`, `TANGGAL`, `DILIHAT`) VALUES
(1, 'Teknologi', 'Inovasi AI Terbaru aaaaaa', '1730271246_technology-law-lw.jpg', 'sdkljfhbiousaejlhfbiluweaubjfr wef weg faewrgaer grrdfwesagr awerg', 1, 'IT', '2024-10-30', 150),
(2, 'Teknologi', 'Tips Sehat di Era Digital', '1730271346_manipulasi - helio caesar.jpg', 'Panduan menjaga kesehatan mental dan fisik di era digital.', 2, 'Kesehatan', '2024-10-29', 200),
(3, 'Pendidikan', 'E-Learning: Masa Depan Pendidikan', '1730271332_website saya.png', 'Perkembangan dan manfaat e-learning dalam pendidikan.', 1, 'Pendidikan', '2024-10-28', 180),
(4, 'Pendidikan', 'asdfasdfsddf', '1730272952_cek.png', 'sdafsadg vdfsg baersd g rsedrgasergtrewagvrewsrfgsvawEDVvgsdrf fvg sDFV gswσδω ΣΔΦφωγδσφφωΣΔΦΨφδψσΣΔΨΦ', 2, 'wsdfesdfads', '2024-10-11', 0),
(5, 'Teknologi', 'AAAAAAAAAAAAAAAAAA', '1730291111_WhatsApp Image 2024-09-30 at 08.38.14.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem nam nobis nulla eaque aliquid enim? Facilis, aut dolor. Dicta sed, tenetur eos, earum nihil nostrum dolores ipsam error totam maiores soluta voluptas quaerat optio corporis enim molestiae ullam? Fugiat hic eius placeat mollitia amet nam beatae obcaecati laudantium quae in.', 1, 'FRFFFFF', '2024-10-09', 0),
(6, 'Teknologi', 'BASDFASDFWESFDAS', '1730291131_muka tangan1.png', 'ASDSASDASDASDAS', 3, 'DASSDASDASDA', '2024-10-16', 0),
(7, 'Pendidikan', 'ASASDAS', '1730291159_70DL_Render (2).png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem nam nobis nulla eaque aliquid enim? Facilis, aut dolor. Dicta sed, tenetur eos, earum nihil nostrum dolores ipsam error totam maiores soluta voluptas quaerat optio corporis enim molestiae ullam? Fugiat hic eius placeat mollitia amet nam beatae obcaecati laudantium quae in.', 4, 'ASDASDSSADASDASDASDASD', '2024-10-18', 0),
(8, 'Pendidikan', 'sdfsdfsdfsdf', '1730291182_tampil.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem nam nobis nulla eaque aliquid enim? Facilis, aut dolor. Dicta sed, tenetur eos, earum nihil nostrum dolores ipsam error totam maiores soluta voluptas quaerat optio corporis enim molestiae ullam? Fugiat hic eius placeat mollitia amet nam beatae obcaecati laudantium quae in.', 1, 'ASDDASASDASDASDASDDASASD', '2024-10-08', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID_AUTHOR`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`ID_PESAN`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `ID_AUTHOR` (`ID_AUTHOR`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `author`
--
ALTER TABLE `author`
  MODIFY `ID_AUTHOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `ID_PESAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`ID_AUTHOR`) REFERENCES `author` (`ID_AUTHOR`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
