<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

$id_pinjam = $_GET['id_pinjam'];
$sql = "SELECT * FROM peminjaman where id_pinjam = '$id_pinjam'";
$query = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM siswa";
$query1 = mysqli_query($koneksi, $sql1);

$sql2 = "SELECT * FROM buku";
$query2 = mysqli_query($koneksi, $sql2);

while($peminjaman = mysqli_fetch_assoc($query)){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
</head>
<body>
<br>
    <div class="container">
        <div class="card">
            <div class="card-body">
    <h2>Edit Transaksi</h2>
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id_pinjam" value = "<?=$peminjaman['id_pinjam']?>">
        
        <label for="nama" class="form-label">nama</label>
        <select name="nis" id="" class="form-control">
            <?php 
            while ($siswa = mysqli_fetch_assoc($query1)){
            $nis = $siswa['nis'];
            $nama = $siswa['nama'];
            $id_pinjam_siswa = $peminjaman['nis'];


            echo "<option value = '$nis'";
            if($nis == $id_pinjam_siswa){
            echo "selected";
            }
            echo "> $nama </option>";
            }?>
        </select><br>

        <label for="judul" class="form-label">judul</label>
        <select name="id_buku" id="" class="form-control">
        <?php 
            while ($buku = mysqli_fetch_assoc($query2)){
            $id_buku = $buku['id_buku'];
            $judul = $buku['judul'];
            $id_pinjam_buku = $peminjaman['id_buku'];


            echo "<option value = '$id_buku'";
            if($id_buku == $id_pinjam_buku){
            echo " selected";
            }
            echo "> $judul </option>";
            }?>
        </select><br>

        <label for="tgl_pinjam" class="form-label">tgl pinjam</label><br>
        <input type="date" name="tgl_pinjam" id="" value = "<?=$peminjaman['tgl_pinjam']?>" class="form-control"><br>

        
        <label for="tgl_pinjam" class="form-label">tgl kembali</label><br>
        <input type="date" name="tgl_kembali" id="" value = "<?=$peminjaman['tgl_kembali']?>" class="form-control"><br>

        <input type="submit" value="Edit" class="btn btn-primary">
    </form>
    </form>
    </div>
    </div>
    </div>
</body>
</html>


<?php }

