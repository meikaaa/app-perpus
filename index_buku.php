<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

// Kode untuk mengambil data buku dari database
$sql = "SELECT * FROM buku";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data buku</title>
</head>
<body>
    <br>
    <div class="container">
    <div class="alert alert-dismissible alert-primary">
    <strong>Anda Login Sebagai : </strong> <a href="#" class="alert-link">@<?=$_SESSION['login']?></a>
</div>
        <div class="card">
            <div class="card-body">
                <h2>Data buku</h2>

                <a href="tambah_buku.php"><button class="btn btn-primary">Tambah</button></a>
                <br><br>

                <table class="table table-striped table-hover text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Action</th>
                        </tr>
                    <?php
                    while ($buku = mysqli_fetch_assoc($query)) {
                                         ?>
                        <tr>
                            <td><?= $buku['id_buku'] ?></td>
                            <td><?= $buku['judul'] ?></td>
                            <td><?= $buku['penerbit'] ?></td>
                            <td><?= $buku['stok'] ?></td>
                            <td><img src="gambar/<?= $buku['gambar'] ?>" alt="" width="100px"></td>
                           
                            <td>
                                <a href="edit_buku.php?id_buku=<?= $buku['id_buku'] ?>"
                                   class="btn btn-warning">Edit</a> |
                                <a href="hapus_buku.php?id_buku=<?= $buku['id_buku'] ?>"
                                   class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
