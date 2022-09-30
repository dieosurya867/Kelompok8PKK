<?php
include '../function/config.php';
include '../function/function.php';

// Gita
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku= htmlspecialchars($_POST["id_buku"]);
    $penulis=$_POST['penulis'];
    $tahun=$_POST['tahun'];
    $judul=$_POST['judul'];
    $kota=$_POST['kota'];
    $penerbit=$_POST['penerbit'];
    $file = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    move_uploaded_file($tmp_name, "../foto/". $file);
    $sinopsis=$_POST['sinopsis'];
    $stok=$_POST['stok'];
    // var_dump($id_buku); die;
    $value = "penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', cover='$file', sinopsis='$sinopsis', stok='$stok'";

    $cekquery = update("buku", $value , "id_buku", "$id_buku");
   // var_dump($cekquery); die;
    
    if($cekquery) {
       // echo "<div class='alert alert-info'> Data berhasil diupdate.</div>";
       echo "<script>window.location.href='databuku.php'</script>";
    }
    else {
        echo "<div class='alert alert-danger'>Data Gagal diupdate !</div>";
    }
        }
?>