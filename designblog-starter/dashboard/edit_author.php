<?php
// Menghubungkan ke database
include '../lib/koneksi.php';

// Memeriksa apakah ada ID yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data author berdasarkan ID
    $sql = "SELECT * FROM author WHERE ID_AUTHOR = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Author</title>
</head>

<body>

    <nav class="navbar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="author.php">Daftar Author</a></li>
            <li><a href="post.php">Daftar Postingan</a></li>
            <li><a href="kontak.php">Kotak Pesan</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="content">
            <h1>Edit Author</h1>
            <form action="../lib/update_author.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['ID_AUTHOR']; ?>">
                <label for="nama">Nama Author:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $row['NAMA_AUTHOR']; ?>" required>
                <button type="submit">Simpan</button>
                <a href="author.php">Batal</a>
            </form>
        </div>
    </div>

</body>
</html>
