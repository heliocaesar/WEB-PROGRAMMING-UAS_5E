<?php
// Menghubungkan ke database
include '../lib/koneksi.php';

// Memeriksa apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    // Query untuk menambahkan data ke tabel author
    $sql = "INSERT INTO author (NAMA_AUTHOR) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke halaman daftar author dengan pesan sukses
        header("Location: author.php?success=true");
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup koneksi
    $stmt->close();
    $conn->close();
}
?>
