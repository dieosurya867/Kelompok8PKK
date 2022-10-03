<?php
include '../function/config.php';
include '../function/function.php';
$page = "murid";
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

    <title>Tambah Data Siswa</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/7b36e01bb8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Anggota</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Anggota</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="form-label">NIS</label>
                                    <input type="text" class="form-control" name="nis" id="" placeholder="Masukkan NIS siswa">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_siswa" id="" placeholder="Masukkan Nama Siswa">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kelamin</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio1" value="L">
                                        <label class="form-check-label" for="inlineRadio1">Laki - laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio2" value="P">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>


                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat">
                                </div>
                                <div class="mb-3">

                                    <label for="pilihkelas">Kelas</label>

                                    <select class="form-control" name="kelas">
                                        <option value="">--Pilih Kelas--</option>
                                        <?php
                                        $get_data = read('kelas', 'id_kelas');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['id_kelas']; ?>">
                                                <?php echo $data['nama_kelas']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>


                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include("footer.php") ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        $nis = $_POST['nis'];
        $nama = $_POST['nama_siswa'];
        $jeniskelamin = $_POST['jeniskelamin'];
        $alamat = $_POST['alamat'];
        $kelas = $_POST['kelas'];

        $add = create("siswa", "nis, nama, jenis_kelamin, alamat, id_kelas", "'$nis','$nama','$jeniskelamin', '$alamat', '$kelas'");

        if ($add) {
            echo "<div class='alert alert-info'>Data berhasil ditambahkan</div>";
            echo "<script>window.location.href='datasiswa.php'</script>";
        } else {
            echo "<div class='alert alert-danger'>Data gagal ditambahkan</div>";
        }
    } ?>

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

    <!-- Link Icon Ionic-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>