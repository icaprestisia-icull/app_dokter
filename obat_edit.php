
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "sirms");
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// proses update kalau tombol "update" dipencet
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $kode_obat = $_POST["KodeObat"];
    $nama_obat = $_POST["NamaObat"];

    $query = mysqli_query($conn, "UPDATE obat SET kode_obat='$kode_obat', nama_obat='$nama_obat' WHERE id='$id'");

    if ($query) {
        header("location: obat_read.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($conn);
    }
}

// ambil data lama berdasarkan id dari link Edit di obat_read.php
if (!isset($_GET["id"])) {
    die("ID tidak ditemukan.");
}

$id = $_GET["id"];
$hasil = mysqli_query($conn, "SELECT * FROM obat WHERE id='$id'");
$data = mysqli_fetch_array($hasil);

if (!$data) {
    die("Data dengan id tersebut tidak ditemukan.");
}
?>

<html>
<head></head>
<body>
    <form method='POST' action='obat_edit.php'>
    <input type='hidden' name='id' value='<?php echo $data["id"]; ?>'>
    <table>
        <tr>
            <td colspan='2'>FORM EDIT OBAT</td>
        </tr>
        <tr>
            <td>Kode Obat</td>
            <td><input type='text' name='KodeObat' value='<?php echo $data["kode_obat"]; ?>'></td>
        </tr>
        <tr>
            <td>Nama Obat</td>
            <td><input type='text' name='NamaObat' value='<?php echo $data["nama_obat"]; ?>'></td>
        </tr>
        <tr>
            <td colspan='2'><input type='submit' name='update' value='Update'></td>
        </tr>
    </table>
    </form>
</body>
</html>
