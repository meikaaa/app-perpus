<!DOCTYPE html>
<html>
<head>
 <title>Cetak Pdf</title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style><br><br>
        <h2 class='tengah'>Laporan Peminjaman </h2>

 <table>
 <tr>
 <th>NIS</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Judul Buku</th>
 <th>Tgl Pinjam</th>
 <th>Tgl Kembali</th>
 <th>Denda</th>
 </tr>
 <?php
 // koneksi database
 // menampilkan data pegawai
 // Kode untuk mengambil data detail dari database
$koneksi = mysqli_connect("localhost","root","","db_perpus");
$sql = "SELECT p.*, s.nama, b.judul, s.kelas
FROM detail AS p
INNER JOIN siswa AS s ON p.nis = s.nis
INNER JOIN buku AS b ON p.id_buku = b.id_buku";
$query = mysqli_query($koneksi, $sql);
 while($d = mysqli_fetch_array($query)){
 ?>
 <tr>
 <td><?=$d['nis']?></td>
 <td><?=$d['nama']?></td>
 <td><?=$d['kelas']?></td>
 <td><?=$d['judul']?></td>
 <td><?=$d['tgl_pinjam']?></td>
 <td><?=$d['tgl_kembali']?></td>
 <td><?=$d['denda']?></td>
 </tr>
 <?php
 }
 ?>
 </table>
 <script>
 window.print();
 </script>
</body>
</html>