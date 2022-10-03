<?php
include '../function/config.php';
include '../function/function.php';

// Gita 
//hapus data
if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $query = delete("peminjaman", "id_peminjaman", "$id_peminjaman");

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
    <title>Data Peminjaman</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Peminjaman Buku</h1>
                    <p class="mb-4">Berikut ini adalah data peminjaman buku perpustakaan</p>

                    <!-- DataTales Example Gita-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="add_peminjaman.php" class="btn btn-primary">
                                    Tambah Peminjaman
                                </a> <br><br>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Peminjaman</th>
                                            <th>Nama Siswa</th>
                                            <th>Petugas</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Peminjaman</th>
                                            <th>Nama Siswa</th>
                                            <th>Petugas</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- Gita -->
                                        <?php
                                    //$condition = 'peminjaman.id_siswa = siswa.nis, peminjaman.id_petugas = petugas.nip';
                                    $ambil = read_join('peminjaman, siswa, petugas','peminjaman.id_siswa = siswa.nis','peminjaman.id_petugas = petugas.nip' , 'id_peminjaman');
                                   // $query = "SELECT FROM peminjaman JOIN siswa ON peminjaman.id_siswa = siswa.nis JOIN petugas ON peminjaman.id_petugas = petugas.nip ORDER BY id_peminjaman DESC";
                                    //var_dump($condition); die;
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambil)) {
                                    ?>
                                        <tr>
                                            <td><?= $no;
                                                $no++ ?></td>
                                            <td><?= $data['id_peminjaman'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['tanggal_peminjaman'] ?></td>
                                            <td><?= $data['tanggal_pengembalian'] ?></td>
                                            <td colspan="2">
                                                <a href='edit_peminjaman.php?id_peminjaman=<?php echo htmlspecialchars($data['id_peminjaman']); ?>'
                                                    class="fa-solid fa-pen-to-square fa-xs btn btn-sm btn-primary"
                                                    role="button"></a>
                                                <a href='pinjam.php?id_peminjaman=<?php echo htmlspecialchars($data['id_peminjaman']); ?>'
                                                    class="fa-solid fa-trash-can btn btn-sm btn-danger" role="button"
                                                    onclick="return confirm('Are you sure want to delete this?')"></a>
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