<?php

include "koneksi.php";

$id_buku= $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$stok = $_POST['stok'];

$sql = "UPDATE buku SET judul='$judul' , penerbit='$penerbit', stok='$stok' WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:index_buku.php?simpan=berhasil");
} else {
    header("location:index_buku.php?simpan=gagal");
}
?>
