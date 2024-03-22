<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$id_buku = $_GET['id_buku'];

$sql = "DELETE FROM buku WHERE id_buku = '$id_buku' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index_buku.php?hapus=berhasil");
}else{
    header("location:index_buku.php?hapus=gagal");
}


?>