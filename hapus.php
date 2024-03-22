<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$id_pinjam = $_GET['id_pinjam'];

$sql = "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?hapus=berhasil");
}else{
    header("location:index.php?hapus=gagal");
}


?>