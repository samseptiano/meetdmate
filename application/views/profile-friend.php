<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Profil Teman</title>
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
        <li class="breadcrumb-item active">Profil Teman</li>
      </ol>
      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
      <div class="row">
        <div class="col-12">
        <div class="row">
        <?php foreach($user as $u){ ?>
          <div class="col-sm-5">
            <center><img class="img-thumbnail" src="<?php echo base_url().$u->photo_path ?>" alt="profile"></center>
          </div>
          <div class="col-sm-7" style="margin-top: 45px">          
            <h3>Hola, saya <?php echo utf8_decode($u->fname)." ".utf8_decode($u->lname) ?></h3><br>
            <h6>Saya tinggal di <span style="font-size: 26px"><?php echo $u->address?></span>,  
            <span>kota <span style="font-size: 26px"><?php echo $u->city.", ".$u->province ?></span></span>.  
            <span>Saya beragama <span style="font-size: 26px"><?php echo $u->religion ?></span></span>. 
            <span>Email saya adalah <span style="font-size: 26px"><?php echo $u->email ?></span></span>. 
            <span>Saya berasal dari suku <span style="font-size: 26px"><?php echo $u->race ?></span></span>. 
            <span>Tinggi badan <span style="font-size: 26px"><?php if($u->height !=0 ){ echo $u->height; } else{ echo "-"; } ?></span>cm dan Berat badan <span style="font-size: 26px"><?php if($u->weight !=0 ){ echo $u->weight; } else{ echo "-"; } ?></span>kg</span>.  
            <?php $a = date('Y')-explode('-',$u->date_birth)[0]; ?>
            Saya berumur <span style="font-size: 26px"><?php echo $a ?></span> tahun. 
            
            <span> Saya bergender <strong>
                <?php 
                if($u->gender == 'M'){
                  echo '<i class="fa fa-mars" style="font-size:28px"></i>';
                } 
                else if($u->gender == 'F'){
                  echo '<i class="fa fa-venus" style="font-size:28px"></i>';
                }
                else{
                  echo '<i class="fa fa-genderless" style="font-size:28px"></i>';
                }
                ?></strong>
            </span>.  
            <span>Saya interest dengan <span style="font-size: 26px"><?php echo rtrim($u->interest,", "); ?></span></span></h6><br>
            <!-- <?php 
                if($u->SQ == 0){
                  echo "<h5 style='color:red'>".$u->email." BELUM TES SQ!</h5>";
                }
                else{
                  echo "<h5>Skor SQ saya ".$u->SQ."</h5>";
                  echo "<h6>CET: ".$u->cet.", PMP: ".$u->pmp.", TA: ".$u->ta.", CSE: ".$u->cse."</h6>";
                  
                }
                if($u->EQ == 0){
                  echo "<h5 style='color:red'>".$u->email." BELUM TES EQ!</h5>";
                }
                else{
                  echo "<h5>Skor EQ saya ".$u->EQ."</h5>";
                  echo "<h6>EA: ".$u->ea.", EM: ".$u->em.", S/EA: ".$u->sea.", RM: ".$u->rm."</h6>";
                }
                  
            ?> -->
            <h6 class="fa fa-twitter-square" > <?php if ($u->twitter == ""){echo "tidak ada";}else{echo "<a target='_blank' href='http://twitter.com/".$u->twitter."'>".$u->twitter."</a>";} ?></h6>&nbsp;&nbsp;
            <h6 class="fa fa-instagram" > <?php if ($u->instagram == ""){echo "tidak ada";}else{echo "<a target='_blank' href='http://instagram.com/".$u->instagram."'>".$u->instagram."</a>";} ?></h6>
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
