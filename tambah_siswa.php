<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Tambah Siswa</h2>
    <form action="proses_tambah_siswa.php" method="post">
        <label for="nama" class="form-label">nama</label>
        <input type="text" name="nama" id="" class="form-control"><br>

        <label for="kelas" class="form-label">kelas</label>
        <input type="text" name="kelas" id="" class="form-control"><br>

        <label for="jk" class="form-label">jk</label>
        <input type="text" name="jk" id="" class="form-control"><br>

        <label for="alamat" class="form-label">alamat</label>
        <input type="text" name="alamat" id="" class="form-control"><br>
       <br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    </div>
    </div>
    </div>
</body>
</html>