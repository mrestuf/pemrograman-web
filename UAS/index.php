<?php
session_start();
include('lib/template.php');
include('lib/koneksi.php');

if(isset($_SESSION['login'])){
    header("Location:/10519100/UAS/admin/admin.php");
}
if(isset($_POST['submit'])){
    $loginQuery = "SELECT * FROM user WHERE username = '". $_POST['username'] ."' AND password = '". $_POST['password'] ."'";
    $loginData = mysqli_query($koneksi, $loginQuery);

    if($loginData->num_rows > 0){
        $_SESSION['login'] = true;
        header("Location:/10519100/UAS/admin/admin.php");
    }
    else{
        echo "<script>alert('Maaf Anda Tidak Bisa Login')</script>";
    }
}

?>



<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <title> Jajan Kuy </title>
  <link rel="icon" href="logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <section class="vh-100 gradient-custom">
    <form action="" method="post">
      <div class="bg-image" style="background-image: url('bg.jpg'); height: 100vh; ">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-3">
                    <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                    <p class="text-white-50 mb-5">Please enter your username and password</p>
                    <div class="form-outline form-white mb-4">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" />
                      <label class="form-label" for="username">Username</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
                    <div>
                      <p class="mt-4 mb-0">Not an Admin? <a href="meja.php" class="text-white-50 fw-bold">Login as
                          Customer</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</body>

</html>