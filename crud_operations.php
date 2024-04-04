<?php
function saveBonusData($conn, $total_bonus, $employee1, $percentage1, $employee2, $percentage2, $employee3, $percentage3, $bonus1, $bonus2, $bonus3) {
    $sql = "INSERT INTO bonus_payments (total_bonus, employee1, percentage1, employee2, percentage2, employee3, percentage3, bonus1, bonus2, bonus3) 
            VALUES ('$total_bonus', '$employee1', '$percentage1', '$employee2', '$percentage2', '$employee3', '$percentage3', '$bonus1', '$bonus2', '$bonus3')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function displayBonusData($conn) {
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
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data pembayaran bonus.";
    }
}
?>
