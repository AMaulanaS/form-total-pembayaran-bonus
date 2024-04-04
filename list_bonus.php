<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bonus";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mendapatkan data pembayaran bonus dari database
$sql = "SELECT * FROM bonus_payments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Daftar Pembayaran Bonus</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Total Bonus</th>
                <th>Nama Karyawan 1</th>
                <th>Percentage 1</th>
                <th>Nama Karyawan 2</th>
                <th>Percentage 2</th>
                <th>Nama Karyawan 3</th>
                <th>Percentage 3</th>
                <th>Bonus 1</th>
                <th>Bonus 2</th>
                <th>Bonus 3</th>
                <th>Aksi</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["total_bonus"] . "</td>
                <td>" . $row["employee1"] . "</td>
                <td>" . $row["percentage1"] . "</td>
                <td>" . $row["employee2"] . "</td>
                <td>" . $row["percentage2"] . "</td>
                <td>" . $row["employee3"] . "</td>
                <td>" . $row["percentage3"] . "</td>
                <td>" . $row["bonus1"] . "</td>
                <td>" . $row["bonus2"] . "</td>
                <td>" . $row["bonus3"] . "</td>
                <td>
                    <a href='view_detail.php?id=" . $row["id"] . "'>Lihat Detail</a>
                    <a href='modify.php?id=" . $row["id"] . "'>Ubah</a>
                    <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data pembayaran bonus.";
}
$conn->close();
?>
