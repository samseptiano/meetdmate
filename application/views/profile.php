<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Profil</title>
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
          <a href="<?php echo base_url()?>home">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
      <div class="row">
        <div class="col-12">
        <div class="row">
          <?php foreach($user as $u){ ?>
          <div class="col-sm-5">
            <center><img class="img-thumbnail" src="<?php echo base_url().$u->photo_path ?>"></center>
          </div>
          <div class="col-sm-7" style="margin-top: 45px">
          <div style="float: right;margin-bottom: 145px"><a href="<?php echo base_url()?>profile-edit"><i class="fa fa-pencil" style="font-size:24px"></i></a></div>

            <h3>Hola, saya <?php echo utf8_decode($u->fname)." ".utf8_decode($u->lname) ?></h3>
            <h6>Saya tinggal di <?php echo $u->address?></h6>
            <h6>Kota <?php echo $u->city.", ".$u->province ?></h6>
            <h6>Saya beragama <?php echo $u->religion ?></h6>
            <h6>Email saya adalah <?php echo $u->email ?></h6>
            <h6>Saya berasal dari suku <?php echo $u->race ?></h6>
            <h6>Tinggi badan <?php if($u->height !=0 ){ echo $u->height; } else{ echo "-"; } ?> cm dan berat badan <?php if($u->weight !=0 ){ echo $u->weight; } else{ echo "-"; } ?> kg</h6>
            <?php $a = explode('-', $u->date_birth) ?>
            <h6>Saya lahir di <?php echo $u->place_birth.", ".$a[2]."/ ".$a[1]."/ ".$a[0] ?></h6>
            <h6> Saya bergender  
                <?php 
                if($u->gender == 'M'){
                  echo '<i class="fa fa-mars" style="font-size:24px"></i>';
                } 
                else if($u->gender == 'F'){
                  echo '<i class="fa fa-venus" style="font-size:24px"></i>';
                }
                else{
                  echo '<i class="fa fa-genderless" style="font-size:24px"></i>';
                }
                ?> 
            </h6>
            <h6>Saya interest dengan <?php echo rtrim($u->interest,", "); ?></h6>
            <?php 
                if($u->SQ == 0){
                  echo "<h5 style='color:red'>ANDA BELUM TES SQ!</h5>";
                }
                else{
                  echo "<h5>Skor SQ saya ".$u->SQ."<span style='font-size:14px'>/96</span></h5>";
                  echo "<h6>CET: ".$u->cet.", PMP: ".$u->pmp.", TA: ".$u->ta.", CSE: ".$u->cse."</h6>";
                }
                if($u->EQ == 0){
                  echo "<h5 style='color:red'>ANDA BELUM TES EQ!</h5>";
                }
                else{
                  echo "<h5>Skor EQ saya ".$u->EQ."<span style='font-size:14px'>/160</span></h5>";
                   echo "<h6>EA: ".$u->ea.", EM: ".$u->em.", S/EA: ".$u->sea.", RM: ".$u->rm."</h6>";
                }
            ?>
            <h6 class="fa fa-twitter-square" > <?php if ($u->twitter == ""){echo "belum diset";}else{echo "<a target='_blank' href='http://twitter.com/".$u->twitter."'>".$u->twitter."</a>";} ?></h6>&nbsp;&nbsp;
            <h6 class="fa fa-instagram" > <?php if ($u->instagram == ""){echo "belum diset";}else{echo "<a target='_blank' href='http://instagram.com/".$u->instagram."'>".$u->instagram."</a>";} ?></h6>
            <?php } ?>
          </div>
          </div>
        </div>
      </div>
    </div><br>
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
  </div>
</body>

</html>
