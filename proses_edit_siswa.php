<?php
include "koneksi.php";

$nis= $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];

$sql = "UPDATE siswa SET nama='$nama' , kelas='$kelas', jk='$jk', alamat='$alamat' WHERE nis='$nis'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:index_siswa.php?simpan=berhasil");
} else {
    header("location:index_siswa.php?simpan=gagal");
}
?>
