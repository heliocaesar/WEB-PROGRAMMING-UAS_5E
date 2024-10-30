<?php
include '../lib/koneksi.php';

$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$id_author = $_POST['id_author'];
$bidang = $_POST['bidang'];
$tanggal = $_POST['tanggal'];

// Mengelola unggahan gambar
if ($_FILES['gambar']['name']) {
    $gambar = $_FILES['gambar'];
    $gambarName = time() . '_' . $gambar['name'];
    $targetPath = "../assets/images/" . $gambarName;

    if (move_uploaded_file($gambar['tmp_name'], $targetPath)) {
        $sql = "INSERT INTO postingan (KATEGORI, JUDUL, GAMBAR, ISI, ID_AUTHOR, BIDANG, TANGGAL) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiss", $kategori, $judul, $gambarName, $isi, $id_author, $bidang, $tanggal);

        if ($stmt->execute()) {
            header("Location: post.php?success=true");
        } else {
            echo "Gagal menyimpan data: " . $conn->error;
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
} else {
    echo "Gambar wajib diunggah.";
}

$conn->close();
?>
