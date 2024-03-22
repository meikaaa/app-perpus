<?php
include "koneksi.php";

$id_pinjam = $_POST['id_pinjam'];
$nis = $_POST['nis'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

// Menghitung selisih hari antara tgl pinjam dan tgl kembali yang baru
$diff = date_diff(date_create($tgl_pinjam), date_create($tgl_kembali));
$hari = $diff->format("%a");

// Menghitung denda jika melebihi 7 hari
if ($hari > 6) {
    $denda = ($hari - 6) * 1000;
} else {
    $denda = 0; // Tidak ada denda jika tidak melebihi 7 hari
}

// Query SQL untuk menyimpan data peminjaman yang diperbarui
$sql = "UPDATE peminjaman SET nis='$nis', id_buku='$id_buku', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', denda='$denda' WHERE id_pinjam='$id_pinjam'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:index.php?simpan=berhasil");
} else {
    header("location:index.php?simpan=gagal");
}

?>
