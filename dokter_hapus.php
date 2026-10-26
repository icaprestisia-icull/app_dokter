<?php
error_reporting(0); 
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "app_dokter");

// proses hapus data siswa
$id = $_GET['id'];

// Query untuk menghapus data siswa
$sql = "DELETE FROM dokter WHERE id=$id";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

header('Location: dokter_read.php');
?>