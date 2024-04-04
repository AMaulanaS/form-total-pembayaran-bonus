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

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mendapatkan data pembayaran bonus berdasarkan ID
$sql = "SELECT * FROM bonus_payments WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Detail Pembayaran Bonus</h2>";
    echo "<p>ID: " . $row["id"] . "</p>";
    echo "<p>Total Bonus: " . $row["total_bonus"] . "</p>";
    echo "<p>Nama Karyawan 1: " . $row["employee1"] . "</p>";
    echo "<p>Percentage 1: " . $row["percentage1"] . "</p>";
    echo "<p>Nama Karyawan 2: " . $row["employee2"] . "</p>";
    echo "<p>Percentage 2: " . $row["percentage2"] . "</p>";
    echo "<p>Nama Karyawan 3: " . $row["employee3"] . "</p>";
    echo "<p>Percentage 3: " . $row["percentage3"] . "</p>";
    echo "<p>Bonus 1: " . $row["bonus1"] . "</p>";
    echo "<p>Bonus 2: " . $row["bonus2"] . "</p>";
    echo "<p>Bonus 3: " . $row["bonus3"] . "</p>";
} else {
    echo "Data pembayaran bonus tidak ditemukan.";
}
$conn->close();
?>
