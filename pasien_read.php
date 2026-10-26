<?php
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "root", "", "app_dokter");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id DESC");

if (!$query) {
    die("Query gagal: " . mysqli_error($conn));
}

$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
</head>

<body>

<h2>Data Pasien</h2>

<a href="pasien_add.php">Tambah Data</a>

<br><br>

<table cellpadding="5" cellspacing="0" border="1">

<tr>
    <th>No.</th>
    <th>No. Registrasi</th>
    <th>Nama Pasien</th>
    <th>Alamat</th>
    <th>Tanggal_Lahir</th>
    <th>Action</th>
</tr>

<?php
while ($data = mysqli_fetch_array($query)) {

    $no++;
?>

<tr>
    <td><?php echo $no; ?></td>

    <td>
        <?php echo $data["no_registrasi"]; ?>
    </td>

    <td>
        <?php echo $data["nama_pasien"]; ?>
    </td>

    <td>
        <?php echo $data["alamat"]; ?>
    </td>

    <td>
        <?php echo $data["tanggal_lahir"]; ?>
    </td>

    <td>
        <a href="pasien_edit.php?id=<?php echo $data["id"]; ?>">
            Edit
        </a>

        |

        <a href="pasien_hapus.php?id=<?php echo $data["id"]; ?>"
           onclick="return confirm('Yakin ingin menghapus data ini?');">
            Hapus
        </a>
    </td>
</tr>

<?php
}
?>
</table>

</body>
</html>