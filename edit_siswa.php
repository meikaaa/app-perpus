<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$nis = $_GET['nis'];
$sql = "SELECT * FROM siswa where nis='$nis'";
$query = mysqli_query($koneksi,$sql);
while($siswa = mysqli_fetch_assoc($query)){ ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body><br>
<div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Edit Siswa</h2>
    <form action="proses_edit_siswa.php" method="post">
        <input type="hidden" name="nis" value="<?=$siswa['nis']?>">
        <label for="nama" class="form-label">nama</label>
        <input type="text" name="nama" id="" class="form-control" value="<?=$siswa['nama']?>"><br>

        <label for="kelas" class="form-label">kelas</label>
        <input type="text" name="kelas" id="" class="form-control" value="<?=$siswa['kelas']?>"><br>

        <label for="jk" class="form-label">jk</label>
        <input type="text" name="jk" id="" class="form-control" value="<?=$siswa['jk']?>"><br>

        <label for="alamat" class="form-label">alamat</label>
        <input type="text" name="alamat" id="" class="form-control" value="<?=$siswa['alamat']?>"><br>
       <br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    </div>
    </div>
    </div>
</body>
</html>
<?php } ?>