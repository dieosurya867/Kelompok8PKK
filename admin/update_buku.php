<?php
session_start();
include '../function/config.php';
include '../function/function.php';
$page = "book";

// back-end keamanan akses tampilan dieo
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['nis'])) {
    header('location: ../siswa/index.php');
}

// Gita Kartika
if (isset($_POST['submit'])) {
    $id_buku = htmlspecialchars($_POST["id_buku"]);
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $judul = $_POST['judul'];
    $kota = $_POST['kota'];
    $penerbit = $_POST['penerbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];
    $new_image = $_FILES['cover']['name'];
    $old_image = $_POST['cover_old'];

    // Gita 
    if ($new_image != '') {
        $update_filename = $_FILES['cover']['name'];
    } else {
        $update_filename = $old_image;
    }

    $value = "penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', cover='$update_filename', sinopsis='$sinopsis', stok='$stok'";
    $cekquery = update("buku", $value, "id_buku", "$id_buku");
    // var_dump($value); die;

    //  Gita

    if ($_FILES['cover']['name'] != '') {
        if (file_exists("../foto/" . $_FILES['cover']['name'])) {
            $filename = $_FILES['cover']['name'];
            $_SESSION['status'] = "Foto sudah ada " . $filename;
            echo "<script>window.location.href='databuku.php'</script>";
        }
    } else {

        if ($cekquery) {
            if ($_FILES['cover']['name'] != '') {
                move_uploaded_file($_FILES['cover']['tmp_name'], "foto/" . $_FILES['cover']['name']);
                unlink("foto/" . $old_image);
            }
            echo "<div class='alert alert-info'> Data berhasil diupdate.</div>";
            echo "<script>window.location.href='databuku.php'</script>";
        } else {
            echo "<div class='alert alert-danger'>Data Gagal diupdate !</div>";
            echo "<script>window.location.href='databuku.php'</script>";
        }
    }
}
