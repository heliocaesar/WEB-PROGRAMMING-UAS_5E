<?php
// Menghubungkan ke database
include '../lib/koneksi.php';

// Memeriksa apakah ID postingan ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data postingan berdasarkan ID
    $sql = "SELECT * FROM postingan WHERE ID_POST = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah postingan ditemukan
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post tidak ditemukan.";
        exit();
    }
} else {
    echo "ID postingan tidak diberikan.";
    exit();
}

// Memeriksa apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $bidang = $_POST['bidang'];
    $tanggal = $_POST['tanggal'];

    // Mengelola gambar jika diunggah
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar'];
        $gambarName = time() . '_' . $gambar['name']; // Nama file gambar tanpa path
        $targetPath = "../assets/images/" . $gambarName;

        // Memindahkan gambar ke folder target
        if (move_uploaded_file($gambar['tmp_name'], $targetPath)) {
            // Mengupdate query dengan gambar (simpan nama file saja)
            $sql = "UPDATE postingan SET KATEGORI = ?, JUDUL = ?, GAMBAR = ?, ISI = ?, BIDANG = ?, TANGGAL = ? WHERE ID_POST = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssi", $kategori, $judul, $gambarName, $isi, $bidang, $tanggal, $id);
        } else {
            echo "Gagal mengunggah gambar.";
            exit();
        }
    } else {
        // Mengupdate query tanpa gambar
        $sql = "UPDATE postingan SET KATEGORI = ?, JUDUL = ?, ISI = ?, BIDANG = ?, TANGGAL = ? WHERE ID_POST = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $kategori, $judul, $isi, $bidang, $tanggal, $id);
    }

    // Mengeksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href = 'post.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Edit Post</title>
</head>

<body>
    <h2>Edit Postingan</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="<?= $post['KATEGORI']; ?>" required><br>

        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" value="<?= $post['JUDUL']; ?>" required><br>

        <label for="gambar">Gambar:</label>
        <input type="file" id="gambar" name="gambar"><br>
        <img src="<?= $post['GAMBAR']; ?>" alt="Gambar" width="100"><br>

        <label for="isi">Isi:</label>
        <textarea id="isi" name="isi" required><?= $post['ISI']; ?></textarea><br>

        <label for="bidang">Bidang:</label>
        <input type="text" id="bidang" name="bidang" value="<?= $post['BIDANG']; ?>" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?= $post['TANGGAL']; ?>" required><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
