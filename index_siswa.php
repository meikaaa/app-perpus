<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";

// Kode untuk mengambil data siswa dari database
$sql = "SELECT * FROM siswa";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <br>
    <div class="container">
    <div class="alert alert-dismissible alert-primary">
    <strong>Anda Login Sebagai : </strong> <a href="#" class="alert-link">@<?=$_SESSION['login']?></a>
</div>
        <div class="card">
            <div class="card-body">
                <h2>Data Siswa</h2>

                <a href="tambah_siswa.php"><button class="btn btn-primary">Tambah</button></a>
                <br><br>

                <table class="table table-striped table-hover text-center">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenkel</th>
                        <th>Alamat</th>
                        <th>Action</th>
                        </tr>
                    <?php
                    while ($siswa = mysqli_fetch_assoc($query)) {
                                         ?>
                        <tr>
                            <td><?= $siswa['nis'] ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td><?= $siswa['kelas'] ?></td>
                            <td><?= $siswa['jk'] ?></td>
                            <td><?= $siswa['alamat'] ?></td>
                            <td>
                                <a href="edit_siswa.php?nis=<?= $siswa['nis'] ?>"
                                   class="btn btn-warning">Edit</a> |
                                <a href="hapus_siswa.php?nis=<?= $siswa['nis'] ?>"
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
