<?php
include '../function/config.php';
include '../function/function.php';
$page = "nyeleh";
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['nis'])) {
    header('location: ../siswa/index.php');
}

// Gita 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman</title>

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
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("sidebar.php") ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include("topbar.php") ?>
            <!-- Main Content -->
            <div id="content">
                <!-- Back End Gita Kartika Pariwara -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading  Gita-->
                    <h1 class="h3 mb-2 text-gray-800">Detail Peminjaman Buku</h1>
                    <p class="mb-4"></p>

                   <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Detail Peminjaman</label>
                                    <input type="text" class="form-control" name="id_detailpeminjaman" id="" placeholder="Masukkan ID Detail Peminjaman">
                                </div>

                                <div class="mb-3">

                                    <label for="pilihkelas">Buku</label>

                                    <select class="form-control" name="buku">
                                        <option value="">--Pilih Buku--</option>
                                        <?php
                                        $get_data = read('buku', 'id_buku');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['id_buku']; ?>">
                                                <?php echo $data['judul']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">

                                    <label for="pilihkelas">ID Peminjaman</label>

                                    <select class="form-control" name="id_peminjaman">
                                        <option value="">--Pilih ID Peminjaman--</option>
                                        <?php
                                        $get_data = read('peminjaman', 'id_peminjaman');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['id_peminjaman']; ?>">
                                                <?php echo $data['id_peminjaman']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kuantitas</label>
                                    <input type="number" class="form-control" name="kuantitas" id="" placeholder="Masukkan jumlah peminjaman">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                                
                            <?php
                                if (isset($_POST['submit'])) {
                                    $id_detailpeminjaman = $_POST['id_detailpeminjaman'];
                                    $id_buku = $_POST['buku'];
                                    $id_peminjaman = $_POST['id_peminjaman'];
                                    $kuantitas = $_POST['kuantitas'];
                                    $status = 'Dipinjam';
                                   
                                    $add = create("detail_peminjaman", "id_detail_peminjaman, id_buku, id_peminjaman, kuantitas, status", "'$id_detailpeminjaman','$id_buku','$id_peminjaman', '$kuantitas', '$status'");

                                    if ($add) {
                                        echo "<div class='alert alert-info'>Data berhasil ditambahkan</div>";
                                        echo "<script>window.location.href='historipeminjaman.php'</script>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Data gagal ditambahkan</div>";
                                    }
                                } ?>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <?php include("footer.php") ?>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->


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