<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Daftar Author</title>
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
            <h1>DAFTAR AUTHOR</h1>
            <a href="tambah_author.html" class="btn-tambah">Tambahkan Author</a>
            <br>

            <!-- Menampilkan alert jika berhasil -->
            <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
                <script>
                    alert("Data berhasil dimasukkan");
                </script>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>ID Author</th>
                        <th>Nama Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include '../lib/author.php'; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
