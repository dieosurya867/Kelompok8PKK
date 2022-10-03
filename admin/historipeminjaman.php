<?php
include '../function/config.php';
include '../function/function.php';

session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['nis'])) {
    header('location: ../siswa/index.php');
}

// Gita 
//hapus data
if (isset($_GET['id_detail_peminjaman'])) {
    $id_detailpeminjaman = $_GET['id_detail_peminjaman'];
    $query = delete("detail_peminjaman", "id_detail-peminjaman", "$id_detailpeminjaman");

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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.css" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

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
                    <p class="mb-4">Berikut ini adalah data detail peminjaman buku perpustakaan</p>

                    <!-- DataTales Example Gita-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Detail Peminjaman</th>
                                            <th>Cover</th>
                                            <th>Judul Buku</th>
                                            <th>Kuantitas</th>
                                            <th>ID Peminjaman</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Detail Peminjaman</th>
                                            <th>Cover</th>
                                            <th>Judul Buku</th>
                                            <th>Kuantitas</th>
                                            <th>ID Peminjaman</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- Gita -->
                                        <?php
                                        //$condition = 'peminjaman.id_siswa = siswa.nis, peminjaman.id_petugas = petugas.nip';
                                        // $ambil = read_join('peminjaman, siswa, petugas','peminjaman.id_siswa = siswa.nis','peminjaman.id_petugas = petugas.nip' , 'id_peminjaman');
                                        $ambil = mysqli_query($db, "SELECT *, id_detail_peminjaman, buku.cover as cover_buku, buku.judul as judul_buku, kuantitas, detail_peminjaman.id_peminjaman FROM detail_peminjaman JOIN buku ON detail_peminjaman.id_buku = buku.id_buku JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman ORDER BY id_detail_peminjaman DESC");
                                        //var_dump($condition); die;
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambil)) {
                                        ?>
                                            <tr>
                                                <td><?= $no;
                                                    $no++ ?></td>
                                                <td><?= $data['id_detail_peminjaman'] ?></td>
                                                <td>
                                                    <img class="img-thumbnail" src="../foto/<?= $data['cover_buku'] ?>" alt="foto" style="width:175px">
                                                </td>
                                                <td><?= $data['judul_buku'] ?></td>
                                                <td><?= $data['kuantitas'] ?></td>
                                                <td><?= $data['id_peminjaman'] ?></td>
                                                <td>
                                                      
                                                <?php if ($data['status'] == 'dipinjam' ) { ?>
                                                    <span class="badge text-bg-success">Dipinjam</span>
                                                <?php } elseif  ($data['status'] == 'dikembalikan' ) { ?>
                                                    <span class="badge text-bg-warning">Dikembalikan</span>
                                                <?php } elseif  ($data['status'] == 'belumkembali' ) { ?>
                                                    <span class="badge text-bg-danger">Belum Dikembalikan</span>
                                                <?php } ?>
                                                </td>
                                                <td colspan="">
                                                    <a href='edit_detailpeminjaman.php?id_detail_peminjaman=<?php echo htmlspecialchars($data['id_detail_peminjaman']); ?>' class="fa-solid fa-pen-to-square fa-xs btn btn-sm btn-primary" role="button"></a>
                                                    <a href='cetakpeminjaman.php?id_detail_peminjaman=<?php echo htmlspecialchars($data['id_detail_peminjaman']); ?>' class="fa-solid fa-pen-to-square fa-xs btn btn-sm btn-warning" role="button"></a>
                                                   
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