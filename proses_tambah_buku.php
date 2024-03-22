<?php
include "koneksi.php";

$target_dir = "gambar/";
$target_file = $target_dir . basename($_FILES['gambar']['name']);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image";
        $uploadOk = 0;
    }
}

// file exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists";
    $uploadOk = 0;
}

// limit file size
if ($_FILES["gambar"]["size"] > 5000000) {
    echo "Sorry, your file is too large";
    $uploadOk = 0;
}

// limit file type
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded";
    header("location:index_buku.php?pesan=typenotallowed_existed_notupload");
} else {
    $gambar = basename($_FILES["gambar"]["name"]);
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $stok = $_POST['stok'];
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO buku (judul, penerbit, stok, gambar) VALUES ('$judul','$penerbit','$stok','$gambar')";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "The file " . htmlspecialchars(basename($_FILES['gambar']['name'])) . " has been uploaded";
            header("location:index_buku.php?pesan=berhasil");
        } else {
            echo "Sorry, try to upload again";
            header("location:index_buku.php?pesan=tryagain");
        }
        
    } else {
        echo "Sorry, there was an error uploading your file";
        header("location:index_buku.php?pesan=errorupload");
    }
}

?>