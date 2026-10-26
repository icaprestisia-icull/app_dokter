<?php
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "root", "", "app_dokter");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM dokter ORDER BY id DESC");

if (!$query) {
    die("Query gagal: " . mysqli_error($conn));
}

$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Dokter</title>
</head>

<body>

<h2>Data Dokter</h2>

<a href="dokter_add.php">Tambah Data</a>

<br><br>

<table cellpadding="5" cellspacing="0" border="1">

<tr>
    <th>No.</th>
    <th>Username</th>
    <th>Password</th>
    <th>Nama_Dokter</th>
    <th>Alamat</th>
    <th>Tanggal_Lahir</th>
    <th>Jenis_Kelamin</th>
    <th>Spesialis</th>
    <th>Action</th>
</tr>

<?php
while ($data = mysqli_fetch_array($query)) {

    $no++;
?>

<tr>
    <td><?php echo $no; ?></td>

    <td>
        <?php echo $data["username"]; ?>
    </td>

    <td>
        <?php echo $data["password"]; ?>
    </td>

    <td>
        <?php echo $data["nama_dokter"]; ?>
    </td>

    <td>
        <?php echo $data["alamat"]; ?>
    </td>

    <td>
        <?php echo $data["tanggal_lahir"]; ?>
    </td>

    <td>
        <?php echo $data["jenis"]; ?>
    </td>

    <td>
        <?php echo $data["spesialis"]; ?>
    </td>

    <td>
        <a href="dokter_edit.php?id=<?php echo $data["id"]; ?>">
            Edit
        </a>

        |

        <a href="dokter_hapus.php?id=<?php echo $data["id"]; ?>"
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