<?php

session_start();
require "../db.php";

$toast = 0;
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

$selectAdm = $conn->query("SELECT * FROM tabel_admin");
$nama_adm = $_SESSION['admin']['nama_adm'];

if (isset($_POST['post_tambah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    if (empty($nama) or empty($email) or empty($username) or empty($password) or empty($telepon) or empty($alamat)) {
        $toast = 1;
    } else {

        $simpan = $conn->query("INSERT INTO tabel_admin VALUES (NULL, '$nama', '$email', '$username', '$password', '$telepon', '$alamat')");

        if ($simpan == TRUE) {
            $toast = 2;
            echo '<script> setInterval(function () {
                window.location.href="index.php"
            }, 2000);</script>';
        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $deleteRow = $conn->query("DELETE FROM tabel_admin WHERE id_admin = '$id'");
    if ($deleteRow == TRUE) {
        $toast = 3;
        echo '<script> setInterval(function () {
            window.location.href="index.php"
        }, 2000);</script>';
    }
}






?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yasz - Admin</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- izitoast  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <!-- boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />

    <!-- css style  -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/crud.css">

</head>


<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="../" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">I'M <?= strtoupper($nama_adm)  ?> !</span> </a>
                <div class="nav_list">
                    <a href="../" class="nav_link "> <i class='bx bx-grid-alt  nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="/" class="nav_link active"> <i class='bx bx-user active-icon nav_icon'></i> <span class="nav_name">Admin</span>
                    </a> <a href="../barang/" class="nav_link"><i class='bx bx-package nav_icon'></i> <span class="nav_name">Barang</span> </a>
                    <a href="../transaksi/" class="nav_link"> <i class='bx bx-clipboard nav_icon'></i> <span class="nav_name">Transaksi</span>
                    </a> <a href="../stats/" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            <hr class="mx-3 hr-nav mb-0">
            <div class="mb-5 mt-0">
                <a href="" class="nav_link mb-2"><i class='bx bx-cog nav_icon'></i> <span class="nav_name">Settings</span></a>
                <a href="../logout.php" class="nav_link "><i class='bx bx-log-out nav_icon icon-bot'></i> <span class="nav_name name-bot">Log Out</span> </a>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" main">
                    <h4>Admin's Room</h4>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="mb-1" for="">Nama</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Email</label>
                                <input type="text" class="form-control" name="email" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Username</label>
                                <input type="text" class="form-control" name="username" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="mb-1" for="">Password</label>
                                <input type="text" class="form-control" name="password" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Telepon</label>
                                <input type="text" class="form-control" name="telepon" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" autocomplete="off">
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn_crud mt-3" name="post_tambah">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row table-content">
            <div class="col-lg-12">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($selectAdm as $select) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $select['nama_adm'] ?></td>
                                <td><?= $select['email_adm'] ?></td>
                                <td><?= $select['username_adm'] ?></td>
                                <td><?= $select['password_adm'] ?></td>
                                <td><?= $select['telepon_adm'] ?></td>
                                <td><?= $select['alamat_adm'] ?></td>
                                <td class="gap-1 d-flex justify-content-center">
                                    <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $select['id_admin'] ?>"><i class='bx bxs-pencil'></i></a>
                                    <div class="">
                                        <form action="" method="post">
                                            <input type="hidden" value="<?= $select['id_admin'] ?>" name="id">
                                            <button name="delete" class="btn btn-danger btn-sm" type="submit"><i class='bx bx-trash'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Container Main end-->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="../assets/js/main.js"></script>

    <?php

    if ($toast == 1) {
        echo '<script>
    iziToast.show({
        message: "Masukan Data Dengan Lengkap",
        messageColor: "#f4f4f4",
        messageSize: "13",
        position: "topCenter",
        drag: false,
        pauseOnHover: false,
        backgroundColor: "#e15353",
        icon: "fa-regular fa-circle-xmark",
        iconColor: "#f4f4f4",
      });</script>';
    }

    if ($toast == 2) {
        echo '<script>
        iziToast.show({
            icon: "fa-regular fa-circle-check",
            message: "Data Berhasil Disimpan!",
            position: "topCenter",
            drag: false,
            pauseOnHover: false,
            color: "green",
            iconUrl: null,
            timeout: 2000,
          });</script>';
    }

    if ($toast == 3) {
        echo '<script>
        iziToast.show({
            icon: "fa-regular fa-circle-check",
            message: "Data Berhasil Dihapus!",
            position: "topCenter",
            drag: false,
            pauseOnHover: false,
            color: "green",
            iconUrl: null,
            timeout: 2000,
          });</script>';
    }

    ?>

</body>

</html>