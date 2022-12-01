<?php

require "db.php";
session_start();

$olds = [];
$toast = 0;

if (isset($_POST['post_login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $selectUser = $conn->query("SELECT * FROM tabel_admin WHERE username_adm = '$username'");
    $selectPass = $conn->query("SELECT * FROM tabel_admin WHERE username_adm = '$username' AND password_adm = '$password'");
    $selectAll = $conn->query("SELECT * FROM tabel_admin WHERE username_adm = '$username' AND password_adm = '$password'")->fetch_assoc();

    if (empty($username) or empty($password)) {
        // header('location: login.php');
        // echo '<script>
        // setInterval(function () {
        //     window.location.href="login.php"
        // }, 2000);
        // </script>';
        $toast = 1;
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
                // $_SESSION['admin'] = $row['username'];
                $_SESSION["admin"] = $selectAll;
                header("location: index.php");
                // echo "<script>location.replace('index.php')</script>";
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

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <div class="card shadow-sm mt-5">
                    <div class="card-body">
                        <h1 class="mb-4">Login </h1>
                        <form action="" method="post">
                            <label for=""> Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                                <input autocomplete="off" type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                <input autocomplete="off" type="password" id="inputPassword" name="password" placeholder="Password" class="form-control" aria-label="Amount (to the nearest dollar)">
                            </div>
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
       
            message: "Masukan Username dan Password",
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
         
              message: "Username anda tidak terdaftar",
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

    if ($toast == 3) {
        echo '<script>
        iziToast.show({
            message: "Password anda salah",
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

    ?>

    <script>

    </script>
</body>

</html>