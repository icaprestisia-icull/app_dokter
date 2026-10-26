<?php

if(isset($_POST["simpan"]))
    {
    $no_registrasi=$_POST["no_registrasi"];
    $nama_pasien=$_POST["nama_pasien"];
    $alamat=$_POST["alamat"];
    $tanggal_lahir=$_POST["tanggal_lahir"];

    $koneksi=mysqli_connect("localhost", "root", "", "app_dokter");
    $sql_create=mysqli_query($koneksi, "insert into pasien (no_registrasi,nama_pasien,alamat,tanggal_lahir) values ('".$no_registrasi."', '".$nama_pasien."',  '".$alamat."', '".$tanggal_lahir."')");
    if ($sql_create) {
        header("Location: pasien_read.php");
        exit;
    }

    die("Gagal menyimpan data: " . mysqli_error($koneksi));
    }
    ?>

<html>
    <head>
        <title>Form pasien</title>
    </head>
    <body>
        <h2>Form pasien</h2>
        <form action="pasien_add.php" method="post">

            No. Registrasi<br>
            <input type="text" id="no_registrasi" name="no_registrasi" required><br><br>

            Nama Pasien<br>
            <input type="text" id="nama_pasien" name="nama_pasien" required><br><br>

            Alamat<br>
            <textarea id="alamat" name="alamat" required></textarea><br><br>

            Tanggal Lahir<br>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

            <input type="submit" value="Simpan" name='simpan'>
        </form>
    </body>
</html>