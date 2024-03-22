<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php?pesan=logindlu");
}
include "koneksi.php";
$nis = $_GET['nis'];

$sql = "DELETE FROM siswa WHERE nis = '$nis' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index_siswa.php?hapus=berhasil");
}else{
    header("location:index_siswa.php?hapus=gagal");
}


?>