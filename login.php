<?php
session_start();

require "db.php";

$olds = [];
$toast = 0;

if (isset($_POST['post_login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $selectUser = $conn->query("SELECT * FROM tbl_adm WHERE username = '$username'");
    $selectPass = $conn->query("SELECT * FROM tbl_adm WHERE username = '$username' AND password = '$password'");
    $selectAll = $conn->query("SELECT * FROM tbl_adm WHERE username = '$username' AND password = '$password'");

    if (empty($username) or empty($password)) {
        // header('location: login.php');
        $toast = 1;
        // echo '<script>
        // setInterval(function () {
        //     window.location.href="login.php"
        // }, 2000);
        // </script>';
        // echo "<script>location.replace('login.php')</script>";
    } else {
        if (mysqli_num_rows($selectUser) < 1) {
            $toast = 2;
            // echo '<script>
            // setInterval(function () {
            //     window.location.href="login.php"
            // }, 2000);
            // </script>';
        } else {
            if (mysqli_num_rows($selectPass) < 1) {
                $toast = 3;
                // $olds['username'] = $_POST['username'];
                // echo '<script>
                // setInterval(function () {
                //     window.location.href="login.php"
                // }, 2000);
                // </script>';
            } else {
                $_SESSION['admin'] = $selectAll->fetch_assoc();
                echo "<script>location.replace('index.php')</script>";
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- izitoast  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <!-- boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="mb-4">Login Session</h1>
                        <form action="" method="post">
                            <label for="">Username</label>
                            <input type="text" name="username" autocomplete="off" class="form-control mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" autocomplete="off" class="form-control">
                            <button type="submit" name="post_login" class="btn btn-primary w-100 mt-3 fw-semibold">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            icon: "",
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