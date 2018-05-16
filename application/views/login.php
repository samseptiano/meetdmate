<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Login Akun</title>
  <?php include('include/css.php'); ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url()?>processlogin">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Masukkan Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Ingat Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" name="submit" type="submit" value="Login" >
        </form><br>
         <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('err_message');?></div>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url()?>register">Daftar Akun</a>
          <!-- <a class="d-block small" href="<?php echo base_url()?>forgot-password">Forgot Password?</a> -->
          <a class="d-block small" href="" data-toggle="modal" data-target="#forgetModal">Lupa Password</a>
          <br>
          <a class="d-block small" href="<?php echo base_url()?>">Halaman Utama</a>
        </div>
      </div>
    </div>
  </div>
 <?php include('include/js.php'); ?>

      <div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal2Label">Lupa Password</h5>
          </div>
          <form method="post" action="<?php echo base_url()?>forget-password">
          <div class="modal-body">
            <div class="row">
                  <div class="col-md-3">
                  Email Anda :
                  </div>
                  <div class="col-md-9">
                   <input type="text" name="oldemail" class="form-control">
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit" value="Recover">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  $("#exampleModal2").modal({"backdrop": "static"});
</script>
</body>

</html>
