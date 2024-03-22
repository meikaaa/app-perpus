<?php
session_start();
include "koneksi.php";

if(isset($_GET['id_pinjam'])){
    $id_pinjam = $_GET['id_pinjam'];

    // Ambil data peminjaman berdasarkan ID
    $sql = "SELECT * FROM peminjaman WHERE id_pinjam = $id_pinjam";
    $query = mysqli_query($koneksi, $sql);
    $peminjaman = mysqli_fetch_assoc($query);

    if ($peminjaman) {
        // Masukkan data ke tabel "detail"
        $nis = $peminjaman['nis'];
        $id_buku = $peminjaman['id_buku'];
        $tgl_pinjam = $peminjaman['tgl_pinjam'];
        $tgl_kembali = $peminjaman['tgl_kembali'];
        $denda = $peminjaman['denda'];

        $insert_detail_sql = "INSERT INTO detail (nis, id_buku, tgl_pinjam, tgl_kembali, denda) 
                              VALUES ('$nis', '$id_buku', '$tgl_pinjam', '$tgl_kembali', '$denda')";
        mysqli_query($koneksi, $insert_detail_sql);

        // Hapus data dari tabel "peminjaman"
        $delete_peminjaman_sql = "DELETE FROM peminjaman WHERE id_pinjam = $id_pinjam";
        mysqli_query($koneksi, $delete_peminjaman_sql);

        // Redirect ke halaman data peminjaman setelah selesai
        header("location:index.php");
    } else {
        // Handle jika data tidak ditemukan
        echo "Data peminjaman tidak ditemukan.";
    }
} else {
    // Handle jika ID tidak tersedia
    echo "ID peminjaman tidak valid.";
}
?>
