<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

// Kode untuk mengambil data detail dari database
$sql = "SELECT p.*, s.nama, b.judul, s.kelas
        FROM detail AS p
        INNER JOIN siswa AS s ON p.nis = s.nis
        INNER JOIN buku AS b ON p.id_buku = b.id_buku";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman</title>
</head>
<body>
    <br>
    <div class="container">
    <div class="alert alert-dismissible alert-primary">
    <strong>Anda Login Sebagai : </strong> <a href="#" class="alert-link">@<?=$_SESSION['login']?></a>
</div>
        <div class="card">
            <div class="card-body">
                <h2>Detail Peminjaman</h2>

                <a href="tambah.php"><button class="btn btn-primary">Tambah</button></a>
                <a target="_blank" href="cetak.php" class="btn btn-success">Cetak</a><br><br>
                <table class="table table-striped table-hover text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Kelas</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Denda</th>
                        </tr>
                    <?php
                    while ($detail = mysqli_fetch_assoc($query)) {
                                         ?>
                        <tr>
                            <td><?= $detail['nis'] ?></td>
                            <td><?= $detail['nama'] ?></td>
                            <td><?= $detail['kelas'] ?></td>
                            <td><?= $detail['judul'] ?></td>
                            <td><?= $detail['tgl_pinjam'] ?></td>
                            <td><?= $detail['tgl_kembali'] ?></td>
                            <td><?= $detail['denda'] ?></td>
                            
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
