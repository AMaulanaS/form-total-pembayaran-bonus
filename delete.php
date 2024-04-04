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

// Hapus data pembayaran bonus dari database
$sql = "DELETE FROM bonus_payments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
