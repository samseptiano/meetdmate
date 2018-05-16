<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <?php include('include/css.php'); ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Lupa password?</h4>
          <p>Masukan email anda yang terdaftar pada aplikasi ini</p>
        </div>
        <form>
          <div class="form-group">
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
          </div>
          <a class="btn btn-primary btn-block" href="login.html">Reset Password</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url()?>register">Registrasi Akun</a>
          <a class="d-block small" href="<?php echo base_url()?>login">Login</a>
        </div>
      </div>
    </div>
  </div>
  <?php include('include/js.php'); ?>
</body>

</html>
