<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Temukan Soulmate mu</title>
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
        <li class="breadcrumb-item active">Beranda Saya </li>
      </ol>
      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
      <!-- Icon Cards-->
      <div class="row">
      </div>
      <!-- Area Chart Example-->
      <div class="row">
      <div class="col-md-12">
      <h5>Halo, <?php echo $this->session->userdata('email');?></h5>
          <?php foreach($user as $u)
        if($u->religion == "-" || $u->photo_path == '/asset/img/default/man.jpg' || $u->photo_path == '/asset/img/default/woman.PNG' || $u->photo_path == '/asset/img/default/other.png' || $u->city == "" || $u->province == "" || $u->date_birth == "" || $u->place_birth == "" || $u->interest == "" || $u->height == 0 || $u->weight == 0 ){
          echo "<p style='color:red'>( Profil anda belum lengkap! )</p>";
        }
        if($u->test_eq == 'undone'){
          echo "<p style='color:red'>( Anda Belum Tes EQ! )</p>";
        }
        if($u->test_sq == 'undone'){
          echo "<p style='color:red'>( Anda Belum Tes SQ! )</p>";
        }
      ?>
      </div>
      <div class="col-md-12">
      <a href="<?php base_url()?>eq-test"><button type="button" class="btn btn-theme">Tes EQ!</button></a>
      <a href="<?php base_url()?>sq-test"><button type="button" class="btn btn-theme">Tes SQ!</button></a>
      </div><br><br>
      <?php if($this->session->userdata('sq') != 0){?>
      <?php foreach($user as $p){ ?>
        <div class="form-group" style="margin-left: 35px;margin-top: 35px;width: 100%">
        <h4>Kecerdasan Spiritual</h4>
        <?php if($this->session->userdata('sq')<=52){?>
          <p>(skor SQ anda dibawah rata-rata atau sama dengan 52. anda disarankan untuk lebih meningkatkan kecerdasan spiritual anda.)</p>
          <?php } ?>
            <div class="form-row">
              <div class="col-md-3">
              <p style="font-size: 11px">Critical Existential Thinking (CET)</p>
                <div class="demo-1" data-percent="<?php echo(($p->cet/$this->session->userdata('sq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Personal Managing Production (PMP)</p>
                <div class="demo-2" data-percent="<?php echo(($p->pmp/$this->session->userdata('sq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Transedental Awareness (TA)</p>
                <div class="demo-3" data-percent="<?php echo(($p->ta/$this->session->userdata('sq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Conscious State Expansion (CSE)</p>
                <div class="demo-4" data-percent="<?php echo(($p->cse/$this->session->userdata('sq'))*100) ?>"></div>
              </div>
            </div>
          </div>
          <?php } }?>
          <?php if($this->session->userdata('eq') != 0){?>
          <?php foreach($user as $p){ ?>
        <div class="form-group" style="margin-left: 35px;margin-top:35px;width: 100%">
        <h4>Kecerdasan Emosional</h4>
        <?php if($this->session->userdata('eq')<110){?>
          <p>(skor EQ anda dibawah rata-rata atau sama dengan 110. anda disarankan untuk lebih meningkatkan kecerdasan emosional anda.)</p>
          <?php } ?>
            <div class="form-row">
              <div class="col-md-3">
              <p style="font-size: 11px">Emotional Awareness</p>
                <div class="demo-1" data-percent="<?php echo(($p->ea/$this->session->userdata('eq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Emotional Management</p>
                <div class="demo-2" data-percent="<?php echo(($p->em/$this->session->userdata('eq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Social/Emotional Awereness</p>
                <div class="demo-3" data-percent="<?php echo(($p->sea/$this->session->userdata('eq'))*100) ?>"></div>
              </div>
              <div class="col-md-3">
              <p style="font-size: 11px">Relationship Management</p>
                <div class="demo-4" data-percent="<?php echo(($p->rm/$this->session->userdata('eq'))*100) ?>"></div>
              </div>
            </div>
          </div>
          <?php }} ?>
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
    <?php include('include/tutorial_modal.php'); ?>
    <?php include('include/js.php'); ?>
        <script src="<?php echo base_url()?>asset/js/jquery.circlechart.js"></script>
  </div>
  </div>
<script>
    $('.demo-1').percentcircle();

    $('.demo-2').percentcircle({
    animate : true,
    diameter : 100,
    guage: 3,
    coverBg: '#fff',
    bgColor: '#efefef',
    fillColor: '#E95546',
    percentSize: '15px',
    percentWeight: 'normal'
    });

    $('.demo-3').percentcircle({
    animate : true,
    diameter : 100,
    guage: 3,
    coverBg: '#fff',
    bgColor: '#efefef',
    fillColor: '#DA4453',
    percentSize: '18px',
    percentWeight: 'normal'
    });
    $('.demo-4').percentcircle({
    animate : true,
    diameter : 100,
    guage: 3,
    coverBg: '#fff',
    bgColor: '#efefef',
    fillColor: '#46CFB0',
    percentSize: '18px',
    percentWeight: 'normal'
    });      

</script>

</body>

</html>
