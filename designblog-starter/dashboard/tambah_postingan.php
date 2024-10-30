<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Tambah Postingan</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Postingan</h1>
        <form action="simpan_postingan.php" method="post" enctype="multipart/form-data">
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required><br>

            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required><br>

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required><br>

            <label for="isi">Isi:</label>
            <textarea id="isi" name="isi" required></textarea><br>

            <label for="id_author">Author:</label>
            <select id="id_author" name="id_author" required>
                <?php
                include '../lib/koneksi.php';
                $sql = "SELECT ID_AUTHOR, NAMA_AUTHOR FROM author";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_AUTHOR'] . "'>" . $row['NAMA_AUTHOR'] . "</option>";
                }
                $conn->close();
                ?>
            </select><br>

            <label for="bidang">Bidang:</label>
            <input type="text" id="bidang" name="bidang" required><br>

            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required><br>

            <button type="submit">Simpan Postingan</button>
        </form>
    </div>
</body>

</html>