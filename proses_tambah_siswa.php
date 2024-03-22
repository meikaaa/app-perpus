<?php
include "koneksi.php";

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];


$sql = "INSERT INTO siswa(nama, kelas, jk, alamat) VALUES ('$nama','$kelas','$jk','$alamat')";
$query = mysqli_query($koneksi, $sql);


if($query){
    header("location:index_siswa.php?simpan=berhasil");
}else{
    header("locaation:index_siswa.php?simpan=gagal");
}





?>