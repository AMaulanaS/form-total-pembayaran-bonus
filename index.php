<!DOCTYPE html>
<html>
<head>
    <title>Form Pembayaran Bonus</title>
    <link rel="stylesheet" type="text/css" href="vanila1.css">
</head>
<body>
    <h2>Form Total Pembayaran Bonus</h2>
    <form method="post" action="" id="bonusForm">
    <label for="total_bonus">Total Pembayaran Bonus (Rupiah):</label>
    <input type="number" id="total_bonus" name="total_bonus" step="0.01" required><br><br>
    
    <label for="employee1">Nama Karyawan 1:</label>
    <input type="text" id="employee1" name="employee1" required><br>
    <label for="percentage1">Persentase Bonus (%) Karyawan 1:</label>
    <input type="number" id="percentage1" name="percentage1" min="0" max="100" step="0.01" required><br><br>
    
    <label for="employee2">Nama Karyawan 2:</label>
    <input type="text" id="employee2" name="employee2" required><br>
    <label for="percentage2">Persentase Bonus (%) Karyawan 2:</label>
    <input type="number" id="percentage2" name="percentage2" min="0" max="100" step="0.01" required><br><br>
    
    <label for="employee3">Nama Karyawan 3:</label>
    <input type="text" id="employee3" name="employee3" required><br>
    <label for="percentage3">Persentase Bonus (%) Karyawan 3:</label>
    <input type="number" id="percentage3" name="percentage3" min="0" max="100" step="0.01" required><br><br>
    
    <input type="submit" value="Hitung Bonus" name="hitung_bonus" onclick="validatePercentage()">
</form>


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

    // Include file untuk operasi CRUD
    include 'crud_operations.php';

    // Menjalankan operasi CRUD jika form disubmit
    /*if (isset($_POST['hitung_bonus'])) {
        $total_bonus = $_POST['total_bonus'];
        $percentage1 = $_POST['percentage1'] / 100;
        $percentage2 = $_POST['percentage2'] / 100;
        $percentage3 = $_POST['percentage3'] / 100;

        $total_percentage = $percentage1 + $percentage2 + $percentage3;

        if ($total_percentage != 1) {
            echo "<script>alert('Pembagian bonus masih salah. Total persentase harus 100%.');</script>";
        } else {
            $bonus1 = $total_bonus * $percentage1;
            $bonus2 = $total_bonus * $percentage2;
            $bonus3 = $total_bonus * $percentage3;

            // Memanggil fungsi untuk menyimpan data pembayaran bonus
            saveBonusData($conn, $total_bonus, $_POST['employee1'], $percentage1, $_POST['employee2'], $percentage2, $_POST['employee3'], $percentage3, $bonus1, $bonus2, $bonus3);
        }
    }*/
    if (isset($_POST['hitung_bonus'])) {
        $total_bonus = floatval($_POST['total_bonus']);
        $percentage1 = floatval($_POST['percentage1']) / 100;
        $percentage2 = floatval($_POST['percentage2']) / 100;
        $percentage3 = floatval($_POST['percentage3']) / 100;
    
        $total_percentage = $percentage1 + $percentage2 + $percentage3;
    
        if ($total_percentage != 1) {
            echo "<script>alert('Pembagian bonus masih salah. Total persentase harus 100%.');</script>";
        } else {
            $bonus1 = $total_bonus * $percentage1;
            $bonus2 = $total_bonus * $percentage2;
            $bonus3 = $total_bonus * $percentage3;
    
            // Menampilkan hasil pembagian bonus
            echo "<h3>Hasil Pembagian Bonus:</h3>";
            echo "Nama Karyawan 1: " . $_POST['employee1'] . " - Bonus: Rp " . number_format($bonus1, 2) . "<br>";
            echo "Nama Karyawan 2: " . $_POST['employee2'] . " - Bonus: Rp " . number_format($bonus2, 2) . "<br>";
            echo "Nama Karyawan 3: " . $_POST['employee3'] . " - Bonus: Rp " . number_format($bonus3, 2) . "<br>";
    
            // Simpan data ke database
            // Panggil fungsi saveBonusData di sini
            saveBonusData($conn, $total_bonus, $_POST['employee1'], $percentage1, $_POST['employee2'], $percentage2, $_POST['employee3'], $percentage3, $bonus1, $bonus2, $bonus3);
        }
    }
    

    // Menampilkan daftar pembayaran bonus
    displayBonusData($conn);

    $conn->close();
    ?>

    <script>
        function validatePercentage() {
            var percentage1 = parseInt(document.getElementById('percentage1').value);
            var percentage2 = parseInt(document.getElementById('percentage2').value);
            var percentage3 = parseInt(document.getElementById('percentage3').value);
            var totalPercentage = percentage1 + percentage2 + percentage3;
            
            if (totalPercentage !== 100) {
                alert('Pembagian bonus masih salah. Total persentase harus 100%.');
                event.preventDefault(); // Mencegah form dikirim jika validasi gagal
            }
        }
    </script>
</body>
</html>
