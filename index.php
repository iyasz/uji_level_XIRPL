<?php

session_start();

require "db.php";

$toast = 0;

// if (empty($_SESSION['admin'])) {
//     echo "<script>location.replace('login.php')</script>";
// } else {
//     header('location: index.php');
// }

// var_dump($_SESSION['admin']);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- izitoast  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <!-- boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/custom.css">

</head>


<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">YASZ ADMIN!</span> </a>
                <div class="nav_list">
                    <a href="#" class="nav_link active"> <i class='bx bx-grid-alt active-icon nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="#" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span>
                    </a> <a href="#" class="nav_link"><i class='bx bx-package nav_icon'></i> <span class="nav_name">Barang</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Transaksi</span>
                    </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Detail Transaksi</span>
                    </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="height-100 main">
                    <h4>Your Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="main.js"></script>

    <?php

    if ($toast == 1) {
        echo '<script>
        iziToast.show({
            title: "error",
            message: "Masukan Username dan Password",
            position: "topCenter",
            drag: false,
            pauseOnHover: false,
            color: "red",
            iconUrl: null,
          });</script>';
    }

    if ($toast == 2) {
        echo '<script>
        iziToast.show({
            title: "error",
            message: "Username anda tidak terdaftar",
            position: "topCenter",
            drag: false,
            pauseOnHover: false,
            color: "red",
            iconUrl: null,
          });</script>';
    }

    if ($toast == 3) {
        echo '<script>
        iziToast.show({
            title: "error",
            message: "Password anda salah",
            position: "topCenter",
            drag: false,
            pauseOnHover: false,
            color: "red",
            iconUrl: null,
          });</script>';
    }

    ?>
</body>

</html>