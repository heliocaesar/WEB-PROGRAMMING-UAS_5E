<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Link ke file CSS terpisah -->
    <title>Kontak</title>
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
            <h1>KOTAK PESAN</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID Pesan</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Subject</th>
                        <th>Isi Pesan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php include '../lib/pesan.php'; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>