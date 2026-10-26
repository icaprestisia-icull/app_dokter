<?php
error_reporting(0);

 //koneksi database
 $conn = mysqli_connect("localhost", "root", "", "app_dokter");

 //tampil data
 $id = $_GET['id'];
 $query = mysqli_query($conn, "SELECT * FROM dokter WHERE id=$id");
 $data = mysqli_fetch_array($query);

 //proses update data
 if (isset($_POST['edit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $nama_dokter = $_POST['nama_dokter'];
     $alamat = $_POST['alamat'];
     $tanggal_lahir = $_POST['tanggal_lahir'];
     $jenis_kelamin = $_POST['jenis_kelamin'];
     $spesialis = $_POST['spesialis'];

     $sql = mysqli_query($conn, "UPDATE dokter SET username='$username', password='$password', nama_dokter='$nama_dokter', alamat='$alamat', tanggal_lahir='$tanggal_lahir', jenis='$jenis_kelamin', spesialis='$spesialis' WHERE id=$id");

     header('Location: dokter_read.php');
 }
 ?>
 <html>
    <head></head>

    <body>
        <form method="POST" action='dokter_edit.php?id=<?php echo $id; ?>'>
            <table cellpadding="5" cellspacing="0" border="1">
                <tr>
                    <td>Username</td>
                </tr>
                <tr>
                    <td><input type="text" name="username" value="<?php echo $data['username']; ?>"></td>
</tr>
<tr>
    <td>Password</td>
</tr>
<tr>
    <td><input type="text" name="password" value="<?php echo $data['password']; ?>"></td>
</tr>
<tr>
    <td>Nama Dokter</td>
</tr>
<tr>
    <td><input type="text" name="nama_dokter" value="<?php echo $data['password']; ?>"></td>
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
    <td>Jenis Kelamin</td>
</tr>
<tr>
    <td><input type="text" name="jenis_kelamin" value="<?php echo $data['jenis']; ?>"></td>
</tr>
<tr>
    <td>Spesialis</td>
</tr>
<tr>
    <td><input type="text" name="spesialis" value="<?php echo $data['spesialis']; ?>"></td>
</tr>
        <td><input type="submit" name="edit" value="Edit"></td>
    </tr>
</table>
</form>
</body>
</html>
