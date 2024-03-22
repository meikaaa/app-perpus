<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

// Kode untuk mengambil data peminjaman dari database
$sql = "SELECT p.*, s.nama, b.judul, s.kelas
        FROM peminjaman AS p
        INNER JOIN siswa AS s ON p.nis = s.nis
        INNER JOIN buku AS b ON p.id_buku = b.id_buku";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>
<body>
    <br>
    <div class="container">
    <div class="alert alert-dismissible alert-primary">
    <strong>Anda Login Sebagai : </strong> <a href="#" class="alert-link">@<?=$_SESSION['login']?></a>
</div>
        <div class="card">
            <div class="card-body">
                <h2>Data Peminjaman</h2>

                <a href="tambah.php"><button class="btn btn-primary">Tambah</button></a>
                <br><br>
                <table class="table table-striped table-hover text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Kelas</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Denda</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while ($peminjaman = mysqli_fetch_assoc($query)) {
                                         ?>
                        <tr>
                            <td><?= $peminjaman['id_pinjam'] ?></td>
                            <td><?= $peminjaman['nama'] ?></td>
                            <td><?= $peminjaman['kelas'] ?></td>
                            <td><?= $peminjaman['judul'] ?></td>
                            <td><?= $peminjaman['tgl_pinjam'] ?></td>
                            <td><?= $peminjaman['tgl_kembali'] ?></td>
                            <td><?= $peminjaman['denda'] ?></td>
                            <td>
                                <a href="edit.php?id_pinjam=<?= $peminjaman['id_pinjam'] ?>"
                                   class="btn btn-warning">Edit</a> |
                                <a href="hapus.php?id_pinjam=<?= $peminjaman['id_pinjam'] ?>"
                                   class="btn btn-danger">Hapus</a> |
                                   <a href="detail.php?id_pinjam=<?= $peminjaman['id_pinjam'] ?>"
                                    class="btn btn-success">Selesai</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
