
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "sirms");
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<html>
    <head></head>
    <body>
        <a href = 'obat_add.php'>Tambah Data</a>
        <table cellpadding='5' cellspacing='0' border='1'>
            <tr>
                <td>No.</td>
                <td>Kode Obat</td>
                <td>Nama Obat</td>
                <td>Action</td>
            </tr>
<?php
$query = mysqli_query($conn, "SELECT * FROM obat order by id desc");

if (!$query) {
    echo "<tr><td colspan='4'>Query gagal: " . mysqli_error($conn) . "</td></tr>";
} else {
    $no = 0;
    while ($data = mysqli_fetch_array($query))
    {
        $no++;
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data["kode_obat"]; ?></td>
        <td><?php echo $data["nama_obat"]; ?></td>
        <td><a href = 'obat_edit.php?id=<?php echo $data["id"]; ?>'>Edit</a> | <a href = 'obat_hapus.php?id=<?php echo $data["id"]; ?>'>Hapus</a></td>
        </tr>
        <?php
    }
}
?>
        </table>
    </body>
</html>
