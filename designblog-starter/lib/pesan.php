<?php
// Menghubungkan ke database
include 'koneksi.php';

// Query untuk mengambil data dari tabel pesan
$sql = "SELECT * FROM pesan";
$result = $conn->query($sql);

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Menampilkan data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_PESAN"] . "</td>";
        echo "<td>" . $row["NAMA"] . "</td>";
        echo "<td>" . $row["MAIL"] . "</td>";
        echo "<td>" . $row["TOPIK"] . "</td>";
        echo "<td>" . $row["ISI"] . "</td>";
        echo "<td>

                <a href='delete_pesan.php?id=" . $row["ID_PESAN"] . "' class='btn-delete'>Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data ditemukan</td></tr>";
}

// Menutup koneksi
$conn->close();
?>
