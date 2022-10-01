<?php

include "function/config.php";
include "function/function.php";
session_start();

// back-end login dieo
if (isset($_POST['loginAdmin'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $ambil = loginPetugas("petugas", "nama", $nama);
    $data = mysqli_fetch_assoc($ambil);


    if ($data) {
        //jika username terdaftar
        //cek password sesuai atau tidak
        if ($password == $data['password']) {
            //jika password sesuai
            //buat session

            $_SESSION['nama'] = $data['nama'];
            echo "<script>alert('Selamat Datang Admin')</script>";
            echo "<script>window.location.href='admin/databuku.php'</script>";
        } else {
            echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='login.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='login.php'</script>";
    }
}

if (isset($_POST['loginSNIS'])) {
    $nis = $_POST['nis'];

    $ambil = loginPetugas("siswa", "nis", $nis);
    $data = mysqli_fetch_assoc($ambil);

    // var_dump($data);
    if ($data) {

        $_SESSION['nama'] = $data['nama'];
        echo "<script>alert('Selamat Datang Adek!!')</script>";
        echo "<script>window.location.href='admin/databuku.php'</script>";
    } else {
        echo "<script>alert('Maaf, Login Gagal, SNIS anda tidak terdaftar!');document.location='login.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css" />
    <title>Petugas & Siswa Login Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-in-form">
                    <h2 class="title">Petugas</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="nama" type="text" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" placeholder="Password" />
                    </div>
                    <input type="submit" name="loginAdmin" value="Login" class="btn solid" />
                </form>
                <form action="" method="POST" class="sign-up-form">
                    <h2 class="title">Siswa</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="nis" type="text" placeholder="NIS" />
                    </div>
                    <input type="submit" name="loginSNIS" class="btn" value="Login" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <button class="btn transparent" style="margin-right: 175px; margin-bottom: 5px" id="sign-up-btn">
                        Siswa
                    </button>
                </div>
                <img src="img/login.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <button class="btn transparent" style="margin-top: 10px" id="sign-in-btn">
                        Petugas
                    </button>
                </div>
                <img src="img/singup.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="/js/login.js"></script>
</body>

</html>