<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Siswa</title>
</head>
<body>
    <h2>Input Data Siswa</h2>

    <?php
    // Tahap 1: Form jumlah siswa
    if (!isset($_POST['lanjut']) && !isset($_POST['simpan'])) {
        ?>
        <form method="post">
            <label>Masukkan jumlah siswa:</label><br>
            <input type="number" name="jumlah" min="1" required>
            <br><br>
            <input type="submit" name="lanjut" value="Lanjut">
        </form>
        <?php
    }

    // Tahap 2: Tampilkan form input siswa
    if (isset($_POST['lanjut'])) {
        $jumlah = (int) $_POST['jumlah'];
        ?>
        <form method="post">
            <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Panggilan</th>
                    <th>Nama Lengkap</th>
                    <th>Umur</th>
                </tr>
                <?php
                for ($i = 1; $i <= $jumlah; $i++) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td><input type='text' name='panggilan[]' required></td>";
                    echo "<td><input type='text' name='lengkap[]' required></td>";
                    echo "<td><input type='number' name='umur[]' min='1' required></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <br>
            <input type="submit" name="simpan" value="Simpan Data">
        </form>
        <?php
    }

    // Tahap 3: Tampilkan hasil input
    if (isset($_POST['simpan'])) {
        $jumlah = (int) $_POST['jumlah'];
        $panggilan = $_POST['panggilan'];
        $lengkap = $_POST['lengkap'];
        $umur = $_POST['umur'];

        echo "<h3>Data Siswa yang Disimpan</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>No</th><th>Nama Panggilan</th><th>Nama Lengkap</th><th>Umur</th></tr>";

        for ($i = 0; $i < $jumlah; $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . htmlspecialchars($panggilan[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($lengkap[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($umur[$i]) . " tahun</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>