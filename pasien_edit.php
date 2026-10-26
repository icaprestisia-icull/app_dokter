<?php
error_reporting(0);

 //koneksi database
 $conn = mysqli_connect("localhost", "root", "", "app_dokter");

 //tampil data
 $id = $_GET['id'];
 $query = mysqli_query($conn, "SELECT * FROM pasien WHERE id=$id");
 $data = mysqli_fetch_array($query);

 //proses update data
 if (isset($_POST['edit'])) {
     $no_registrasi = $_POST['no_registrasi'];
     $nama_pasien = $_POST['nama_pasien'];
     $alamat = $_POST['alamat'];
     $tanggal_lahir = $_POST['tanggal_lahir'];

     $sql = mysqli_query($conn, "UPDATE pasien SET no_registrasi='$no_registrasi', nama_pasien='$nama_pasien', alamat='$alamat', tanggal_lahir='$tanggal_lahir' WHERE id=$id");

     header('Location: pasien_read.php');
 }
 ?>
 <html>
    <head></head>

    <body>
        <form method="POST" action='pasien_edit.php?id=<?php echo $id; ?>'>
            <table cellpadding="5" cellspacing="0" border="1">
                <tr>
                    <td>No. Registrasi</td>
                </tr>
                <tr>
                    <td><input type="text" name="no_registrasi" value="<?php echo $data['no_registrasi']; ?>"></td>
</tr>
<tr>
    <td>Nama Pasien</td>
</tr>
<tr>
    <td><input type="text" name="nama_pasien" value="<?php echo $data['nama_pasien']; ?>"></td>
</tr>
<tr>
    <td>Alamat</td>
</tr>
<tr>
    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
</tr>
<tr>
    <td>Tanggal Lahir</td>
</tr>
<tr>
    <td><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>"></td>
</tr>
<tr>
        <td><input type="submit" name="edit" value="Edit"></td>
    </tr>
</table>
</form>
</body>
</html>
