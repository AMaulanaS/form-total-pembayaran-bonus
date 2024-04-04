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

// Mengambil data pembayaran bonus berdasarkan ID
$sql = "SELECT * FROM bonus_payments WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Form untuk mengubah data
    echo "<h2>Ubah Data Pembayaran Bonus</h2>";
    echo "<form method='post' action='process_modify.php'>";
    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    echo "Total Pembayaran Bonus (Rupiah): <input type='text' name='total_bonus' value='" . $row["total_bonus"] . "' required><br><br>";
    echo "Nama Karyawan 1: <input type='text' name='employee1' value='" . $row["employee1"] . "' required><br>";
    echo "Persentase Bonus (%) Karyawan 1: <input type='number' name='percentage1' min='0' max='100' value='" . $row["percentage1"] . "' required><br><br>";
    echo "Nama Karyawan 2: <input type='text' name='employee2' value='" . $row["employee2"] . "' required><br>";
    echo "Persentase Bonus (%) Karyawan 2: <input type='number' name='percentage2' min='0' max='100' value='" . $row["percentage2"] . "' required><br><br>";
    echo "Nama Karyawan 3: <input type='text' name='employee3' value='" . $row["employee3"] . "' required><br>";
    echo "Persentase Bonus (%) Karyawan 3: <input type='number' name='percentage3' min='0' max='100' value='" . $row["percentage3"] . "' required><br><br>";
    echo "<input type='submit' value='Simpan Perubahan' name='modify_bonus'>";
    echo "</form>";
} else {
    echo "Data pembayaran bonus tidak ditemukan.";
}
$conn->close();
?>
