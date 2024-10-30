<?php
// Menghubungkan ke database
include 'koneksi.php';

// Query untuk mengambil data dari tabel postingan dengan join ke tabel author
$sql = "
    SELECT 
        p.ID_POST, 
        p.KATEGORI, 
        p.JUDUL, 
        p.GAMBAR, 
        p.ISI, 
        a.NAMA_AUTHOR,  
        p.BIDANG, 
        p.TANGGAL, 
        p.DILIHAT 
    FROM 
        postingan p 
    JOIN 
        author a ON p.ID_AUTHOR = a.ID_AUTHOR
";

$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result === false) {
    // Tampilkan pesan kesalahan
    echo "Error: " . $conn->error;
} else {
    // Memeriksa apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        // Menampilkan data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_POST"] . "</td>";
            echo "<td>" . $row["KATEGORI"] . "</td>";
            echo "<td>" . $row["JUDUL"] . "</td>";
            echo "<td><img src='../assets/images/" . $row["GAMBAR"] . "' alt='Gambar' width='100'></td>";
            echo "<td>" . $row["ISI"] . "</td>";
            echo "<td>" . $row["NAMA_AUTHOR"] . "</td>";
            echo "<td>" . $row["BIDANG"] . "</td>";
            echo "<td>" . $row["TANGGAL"] . "</td>";
            echo "<td>" . $row["DILIHAT"] . "</td>";
            echo "<td>
                    <a href='edit_post.php?id=" . $row["ID_POST"] . "' class='btn-edit'>Edit</a>
                    <a href='delete_post.php?id=" . $row["ID_POST"] . "' class='btn-delete'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Tidak ada data ditemukan</td></tr>";
    }
}

// Menutup koneksi
$conn->close();
?>
