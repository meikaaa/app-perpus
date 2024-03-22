<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$sql = "SELECT * FROM siswa";
$query = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM buku";
$query1 = mysqli_query($koneksi, $sql1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Tambah Transaksi</h2>
    <form action="proses_tambah.php" method="post">
        <label for="nama" class="form-label">nama</label>
        <select name="nis" id="" class="form-control">
            <?php while ($siswa = mysqli_fetch_assoc($query)){
            $nis = $siswa['nis'];
            $nama = $siswa['nama'];

            echo "<option value = '$nis'> $nama </option>";

            }?>
        </select><br>

        <label for="judul" class="form-label">judul</label>
        <select name="id_buku" id="" class="form-control">
            <?php while ($buku = mysqli_fetch_assoc($query1)){
            $id_buku = $buku['id_buku'];
            $judul = $buku['judul'];

            echo "<option value = '$id_buku'> $judul </option>";

            }?>
        </select><br>

        <label for="tgl_pinjam" class="form-label">tgl pinjam</label><br>
        <input type="date" name="tgl_pinjam" id="" class="form-control"><br>

        
        <label for="tgl_pinjam" class="form-label">tgl kembali</label><br>
        <input type="date" name="tgl_kembali" id="" class="form-control"><br>

       <br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    </div>
    </div>
    </div>
</body>
</html>