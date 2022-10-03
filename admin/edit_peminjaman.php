<?php
include '../function/config.php';
include '../function/function.php';

// back-end keamanan akses tampilan dieo
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['nis'])) {
    header('location: ../siswa/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Data Peminjaman</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/7b36e01bb8.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Front End & Back End Gita Kartika Pariwara -->
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("sidebar.php") ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include("topbar.php") ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Peminjaman</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id_peminjaman'])) {
                                $id_peminjaman = $_GET["id_peminjaman"];
                                $ambil = mysqli_query($db, "SELECT * , peminjaman.id_peminjaman, siswa.nama as nama_siswa, petugas.nama as nama_petugas, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian  FROM peminjaman 
                                JOIN siswa ON peminjaman.id_siswa = siswa.nis JOIN petugas ON peminjaman.id_petugas = petugas.nip WHERE id_peminjaman=$id_peminjaman ");
                                $data = mysqli_fetch_assoc($ambil);
                                $tanggal_peminjaman=date_create($data['tanggal_peminjaman']);
                                $tanggal_pengembalian=date_create($data['tanggal_pengembalian']);
                                // echo date_format($date,"Y-m-d");
                            }
                          //  var_dump(date_format($tanggal_peminjaman,"d-m-Y"));


                            // Proses update data peminjaman // Gita Kartika
                            if (isset($_POST['update'])) {
                                $id_peminjaman = ($_POST["id_peminjaman"]);
                                $nama_siswa = $_POST['siswa'];
                                $nama_petugas = $_POST['petugass'];
                                $tgl_peminjaman = $_POST['tanggal_peminjaman'];
                                $tgl_pengembalian = $_POST['tanggal_pengembalian'];
                                

                                $value = "id_siswa='$nama_siswa', id_petugas='$nama_petugas',tanggal_peminjaman='$tgl_peminjaman', tanggal_pengembalian ='$tgl_pengembalian'";
                                $cekquery = update("peminjaman", $value, "id_peminjaman", $id_peminjaman);
                                //var_dump($_POST); die;

                                if ($cekquery) {
                                    echo "<div class='alert alert-info'> Data berhasil diupdate.</div>";
                                    echo "<script>window.location.href='pinjam.php'</script>";
                                } else {
                                    echo "<div class='alert alert-danger'>Data gagal diupdate</div>";
                                }
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Peminjaman</label>
                                    <input type="text" class="form-control" name="id_peminjaman"
                                        value="<?php echo $data['id_peminjaman'] ?>" readonly>
                                </div>
                              
                                <div class="mb-3">

                                    <label for="">Siswa</label>

                                    <select class="form-control" name="siswa">
                                    <?php
                                        echo "<option value =$data[nis]>$data[nama_siswa]</option>";
                                        $get_data = read('siswa', 'nis');
                                        while ($siswa = mysqli_fetch_array($get_data)) {
                                        ?>
                                        <option value="<?php echo $siswa['nis'];?>">
                                            <?php echo $siswa['nama'];?>
                                        </option>
                                        <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="mb-3">

                                    <label for="">Petugas</label>
                                           
                                    <select class="form-control" name="petugass">
                                    <?php
                                        echo "<option value =$data[nip]>$data[nama_petugas]</option>";
                                        $get_data = read('petugas', 'nip');
                                        while ($petugas = mysqli_fetch_array($get_data)) {
                                        ?>
                                        <option value="<?php echo $petugas['nip'];?>">
                                            <?php echo $petugas['nama'];?>
                                        </option>
                                        <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman" id=""
                                    value="<?= date_format($tanggal_peminjaman, 'Y-m-d')?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian" id=""
                                    value="<?= date_format($tanggal_pengembalian, 'Y-m-d')?>">
                                </div>

                        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                        </form>


                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



        <!-- Footer -->
        <?php include("footer.php") ?>
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