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
// Gita 
//hapus data
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $query = delete("siswa", "nis", "$nis");

    if ($query) {
        echo "<div class='alert alert-info'> Data berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

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

                    <div class="row">
                        <!-- Page Heading  Gita-->
                        <!-- Back End Count Data Gita Kartika -->
                        <!-- Data Anggota Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 mr-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Siswa
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $query = read('siswa', 'nis');
                                                $row = mysqli_num_rows($query);

                                                echo "<h1> " . $row . "</h1>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-users-between-lines fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example Gita-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="add_siswa.php" class="btn btn-primary">
                                    Tambah Anggota
                                </a> <br><br>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <!-- Gita -->
                                        <?php

                                        $ambil = read_join('siswa, kelas', 'siswa.id_kelas = kelas.id_kelas ', 'nis');
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambil)) {
                                        ?>
                                            <tr>
                                                <td><?= $no;
                                                    $no++ ?></td>
                                                <td><?= $data['nis'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['jenis_kelamin'] ?></td>
                                                <td><?= $data['alamat'] ?></td>
                                                <td><?= $data['nama_kelas'] ?></td>
                                                <td colspan="2">
                                                    <a href='edit_siswa.php?nis=<?php echo htmlspecialchars($data['nis']); ?>' class="fa-solid fa-pen-to-square fa-xs btn btn-sm btn-primary" role="button"></a>
                                                    <a href='datasiswa.php?nis=<?php echo htmlspecialchars($data['nis']); ?>' class="fa-solid fa-trash-can btn btn-sm btn-danger" role="button" onclick="return confirm('Are you sure want to delete this?')"></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <?php include("footer.php"); ?>
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

</body>

</html>