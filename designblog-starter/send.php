<?php
// Menghubungkan ke database
include './lib/koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama = $_POST['w3lName'];
    $mail = $_POST['w3lSender'];
    $topik = $_POST['w3lSubect'];
    $isi = $_POST['w3lMessage'];

    // Query untuk menyimpan data ke tabel pesan
    $sql = "INSERT INTO pesan (nama, mail, topik, isi) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $mail, $topik, $isi);

    // Mengeksekusi query dan memeriksa apakah berhasil
    if ($stmt->execute()) {
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href = 'contact.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
