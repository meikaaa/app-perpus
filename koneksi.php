<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_perpus";

$koneksi = mysqli_connect($server, $username, $password, $database);
$current_page = basename($_SERVER['PHP_SELF']);

// if($koneksi){
//     echo "berhasil terkoneksi";
// }else{
//     echo "gagal terkoneksi";
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP PERPUS</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PERPUS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item <?php echo ($current_page == 'index_siswa.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="index_siswa.php">Siswa</a>
        </li>
        <li class="nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="index.php">Peminjaman</a>
        </li>
        <li class="nav-item <?php echo ($current_page == 'index_buku.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="index_buku.php">Buku</a>
        </li>
        <li class="nav-item <?php echo ($current_page == 'index_detail.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="index_detail.php">Detail</a>
        </li>
      </ul>
      <form class="d-flex">
      <a href="logout.php" class="btn btn-outline-danger">logout</a> </form>
    </div>
  </div>
</nav>
</body>
</html>