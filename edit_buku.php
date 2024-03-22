<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$id_buku = $_GET['id_buku'];
$sql = "SELECT * FROM buku where id_buku='$id_buku'";
$query = mysqli_query($koneksi,$sql);
while($buku = mysqli_fetch_assoc($query)){ ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body><br>
<div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Edit Buku</h2>
    <form action="proses_edit_buku.php" method="post">
        <input type="hidden" name="id_buku" value="<?=$buku['id_buku']?>">
        <label for="judul" class="form-label">judul</label>
        <input type="text" name="judul" id="" class="form-control" value="<?=$buku['judul']?>"><br>

        <label for="penerbit" class="form-label">penerbit</label>
        <input type="text" name="penerbit" id="" class="form-control" value="<?=$buku['penerbit']?>"><br>

        <label for="stok" class="form-label">stok</label>
        <input type="number" name="stok" id="" class="form-control" value="<?=$buku['stok']?>"><br>
       <br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    </div>
    </div>
    </div>
</body>
</html>
<?php } ?>