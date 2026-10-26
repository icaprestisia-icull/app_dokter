
<?php
error_reporting(0);

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "sirms");

$id = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM obat WHERE id='$id'");

if ($query) {
    header("location: obat_read.php");
    exit;
} else {
    echo "Gagal menghapus data";
}
?>
