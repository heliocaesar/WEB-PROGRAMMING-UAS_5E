<?php
// Menghubungkan ke database
include 'koneksi.php';

// Mengambil data dari tabel author
$sql = "SELECT * FROM author";
$result = $conn->query($sql);

// Memeriksa apakah ada hasil
if ($result->num_rows > 0) {
    // Menampilkan data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID_AUTHOR'] . "</td>";
        echo "<td>" . $row['NAMA_AUTHOR'] . "</td>";
        echo '<td>
                <a href="edit_author.php?id=' . $row['ID_AUTHOR'] . '" class="btn-edit">Edit</a>
                <a href="delete_author.php?id=' . $row['ID_AUTHOR'] . '" class="btn-delete">Hapus</a>
              </td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
}

// Menutup koneksi
$conn->close();
?>
