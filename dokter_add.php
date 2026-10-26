<?php

if(isset($_POST["simpan"]))
    {
    $username=$_POST["username"];
    $password=$_POST["password"];
    $nama_dokter=$_POST["nama_dokter"];
    $alamat=$_POST["alamat"];
    $tanggal_lahir=$_POST["tanggal_lahir"];
    $jenis_kelamin=$_POST["jenis_kelamin"];
    $spesialis=$_POST["spesialis"];

    $koneksi=mysqli_connect("localhost", "root", "", "app_dokter");
    $sql_create=mysqli_query($koneksi, "insert into dokter (username,password,nama_dokter,alamat,tanggal_lahir,jenis,spesialis) values ('".$username."', '".$password."', '".$nama_dokter."',  '".$alamat."', '".$tanggal_lahir."', '".$jenis_kelamin."', '".$spesialis."')");
    if ($sql_create) {
        header("Location: dokter_read.php");
        exit;
    }

    die("Gagal menyimpan data: " . mysqli_error($koneksi));
    }
    ?>

<html>
    <head>
        <title>Form dokter</title>
    </head>
    <body>
        <h2>Form dokter</h2>
        <form action="dokter_add.php" method="post">

            Username<br>
            <input type="text" id="username" name="username" required><br><br>

            Password<br>
            <input type="text" id="password" name="password" required><br><br>

            Nama Dokter<br>
            <input type="text" id="nama_dokter" name="nama_dokter" required><br><br>

            Alamat<br>
            <textarea id="alamat" name="alamat" required></textarea><br><br>

            Tanggal Lahir<br>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

            Jenis Kelamin<br>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
        </select>
        <br><br>
        
            Spesialis<br>
            <select id="spesialis" name="spesialis" required>   
                <option value="">Pilih Spesialis</option>
                <option value="Dokter Umum">Dokter Umum</option>
                <option value="Dokter Anak">Dokter Anak</option>
                <option value="Dokter Gigi">Dokter Gigi</option>
                <option value="Dokter Kandungan">Dokter Kandungan</option>
                <option value="Dokter Spesialis Bedah">Dokter Spesialis Bedah</option>
                <option Value="Dokter Spesialis Tulang">Dokter Spesialis Tulang</option>
                <option Value="Dokter Spesialis Kulit">Dokter Spesialis Kulit</option>
                <option Value="Dokter Spesialis Mata">Dokter Spesialis Mata</option>
                <option Value="Dokter Spesialis Telinga">Dokter Spesialis Telinga</option>
                <option Value="Dokter Spesialis Saraf">Dokter Spesialis Saraf</option>
                <option Value="Dokter Spesialis Jantung">Dokter Spesialis Jantung</option>
                <option Value="Dokter Spesialis Paru">Dokter Spesialis Paru</option>
                <option Value="Dokter Spesialis Ginjal">Dokter Spesialis Ginjal</option>

        </select>
        <br><br>

            <input type="submit" value="Simpan" name='simpan'>
        </form>
    </body>
</html>