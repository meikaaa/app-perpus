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
    <title>Tambah Buku</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Tambah Buku</h2>
    <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
        <label for="judul" class="form-label">judul</label>
        <input type="text" name="judul" id="" class="form-control"><br>

        <label for="penerbit" class="form-label">penerbit</label>
        <input type="text" name="penerbit" id="" class="form-control"><br>

        <label for="stok" class="form-label">stok</label>
        <input type="number" name="stok" id="" class="form-control">
        
        
        <label for="stok" class="form-label">gambar</label>
        <input type="file" name="gambar" id="" class="form-control"><br>
       <br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    </div>
    </div>
    </div>
</body>
</html>