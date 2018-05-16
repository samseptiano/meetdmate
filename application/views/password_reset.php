<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <title>MeetD'Mate | Reset Password</title>
      <link href="<?php echo base_url(); ?>assets/elearning/css/passwordLenCheck.css" rel="stylesheet">
      <?php include("include/css.php");?>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      
  <section id="container" >
      <section id="main-content">
          <section class="wrapper">
              <div class="col-md-12" style='margin-top: 35px'>
                <center><h2 class="page-header">Ubah Password</h2></center>
                </div><br><br>
              <center><div class="col-md-12"> 
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
                      <!-- edit form column -->
                      <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                        <form class="form-horizontal" id="register" style="height:350px" method="post" action="<?php echo base_url()?>ulalaLogin/updatepassword">
                            <input name="token" type="hidden" value="<?php echo $this->uri->segment(2) ?>" required>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Password Baru:</label>
                            <div class="col-lg-8">
                              <input type="password" name="password" id="password"  class="form-control" required>
                              <span id="result"> </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                              <input class="btn btn-success" value="Simpan" type="submit" name="submit">
                            </div>
                          </div>
                        </form>
                      </div>
                  </div></center>
         </section>
      </section>
  </body>
</html>
