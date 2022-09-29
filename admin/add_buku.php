<?php
include '../function/config.php';
include '../function/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Buku</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Front End & Back End Gita Kartika Pariwara -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Buku</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Buku Perpus</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Buku</label>
                                    <input type="text" class="form-control" name="id_buku" id=""
                                        placeholder="Masukkan ID Buku">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id=""
                                        placeholder="Masukkan nama penulis...">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" name="tahun" id=""
                                        placeholder="Masukkan tahun buku...">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" id=""
                                        placeholder="Masukkan judul buku...">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kota</label>
                                    <input type="text" class="form-control" name="kota" id="" placeholder="">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id=""
                                        placeholder="Masukkan nama penerbit buku...">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cover</label>
                                    <input type="text" class="form-control" name="cover" id="" placeholder="">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Sinopsis</label>
                                    <input type="text" class="form-control" name="sinopsis" id=""
                                        placeholder="Masukkan sinopsis buku...">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" id="">
                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>

           
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gita Kartika - Dieo Surya Kelompok 8</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gita -->

    <?php
         if (isset($_POST['submit'])) {
                    $id_buku=$_POST['id_buku'];
                    $penulis=$_POST['penulis'];
                    $tahun=$_POST['tahun'];
                    $judul=$_POST['judul'];
                    $kota=$_POST['kota'];
                    $cover=$_POST['cover'];
                    $sinopsis=$_POST['sinopsis'];
                    $stok=$_POST['stok'];

                    $add=create("buku", "id_buku, penulis, tahun, judul, kota, cover, sinopsis, stok","'$id_buku','$penulis','$tahun', '$judul', '$kota', '$cover', '$sinopsis', '$stok'");
                    
                    if($add) {
                        echo "<div class='alert alert-info'>Data berhasil ditambahkan</div>";
                        header("Location:databuku.php");
                    }else {
                        echo "<div class='alert alert-danger'>Data gagal ditambahkan</div>";
                    }
                }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>