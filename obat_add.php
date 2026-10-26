
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["simpan"]))
{
    $koneksi = mysqli_connect('localhost', 'root', '', 'sirms');

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $kode_obat = $_POST["KodeObat"];
    $nama_obat = $_POST["NamaObat"];

    $sql_create = mysqli_query($koneksi, "insert into obat (kode_obat, nama_obat) values('".$kode_obat."', '".$nama_obat."')");

    if ($sql_create) {
        header("location: obat_read.php");
        exit;
    } else {
        echo "Gagal simpan data: " . mysqli_error($koneksi);
    }
}
?>

<html>
<head></head>
<body>
    <form method='POST' action='obat_add.php'>
    <table>
        <tr>
            <td colspan='2'>FORM TAMBAH OBAT</td>
        </tr>
        <tr>
            <td>Kode Obat</td>
            <td><input type='text' name='KodeObat'></td>
        </tr>
        <tr>
            <td>Nama Obat</td>
            <td><input type='text' name='NamaObat'></td>
        </tr>
        <tr>
            <td colspan='2'><input type='submit' name='simpan' value='Simpan'></td>
        </tr>
    </table>
    </form>
</body>
</html>
