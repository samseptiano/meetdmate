<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - IQ Test</title>
  <?php include('include/css.php'); ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('include/header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          IQ Test
        </li>
      </ol>
      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
      <div class="row">
        <div class="col-12">
        <div class="row">
          <form action="<?php echo base_url()?>processIQ" method="post" accept-charset="utf-8">
            <?php foreach ($iq as $u) { ?>
              <div class="form-group">
                <div class="col-md-12">
                  <label for="exampleInputEmail1"><b><?php echo $u->id_question ?>.) Question</b></label>
                  <h5 class=""><?php echo $u->question?></h5>
                </div>
              <div class="col-md-6">
              <select id="answer" name="answer[<?php echo $u->id_question ?>]" class="form-control" >
                    <option value="">-Choose Answer-</option>
                    <option value="A"><?php echo $u->opt1 ?></option>
                    <option value='B'><?php echo $u->opt2 ?></option>
                    <option value='C'><?php echo $u->opt3 ?></option>
                    <option value='D'><?php echo $u->opt4 ?></option>
                    <option value='E'><?php echo $u->opt5 ?></option>
              </select>
              </div>
            </div>
              <?php } ?>
              <div class="row" style="margin-left:50%">
                <div class="col-md-12">
                 <input type="submit" name="submit" value="Save Changes" class="btn btn-dark"></button/>
                  <a href="<?php echo base_url()?>" class="btn btn-danger">Back to Home</a>
                  </div>  
              </div>
          </form><br>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('include/footer.php');?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include('include/logout_modal.php'); ?>
   <?php include('include/js.php'); ?>
  </div></div></div>
</body>

</html>
