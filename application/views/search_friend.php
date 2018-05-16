<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Cari Teman</title>
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
        <li class="breadcrumb-item active">Cari Teman</li>
      </ol>
        
      <div class="row">
      <div class="container">
          <div class="row"> 
          <?php foreach($user as $u){ ?>
              <input type="hidden" id="gender1" value="<?php echo $u->gender_filter ?>">
              <input type="hidden" id="religion1" value="<?php echo $u->religion_filter ?>">
              <input type="hidden" id="height1" value="<?php echo $u->height_filter ?>">
              <input type="hidden" id="weight1" value="<?php echo $u->weight_filter ?>">
              <input type="hidden" id="age1" value="<?php echo $u->age_filter ?>">
              <input type="hidden" id="race1" value="<?php echo $u->race_filter ?>">
              <?php } ?>
          </div>
      <!-- ?php foreach($user as $u){?>
        <div class="column">
          <div class="card">
            <center><img src="<?php echo base_url().$u->photo_path ?>" class="img-thumbnail" style="width:50%"></center>
            <div class="container">
              <center><h5><?php echo $u->fname." ".$u->lname ?></h5></center>
              <center><p class="title"><?php echo $u->city.", ".$u->province ?></p></center>
              <?php
                  $Emotional =abs($this->session->userdata('eq')-$u->EQ);
                  $Intellegence = abs($this->session->userdata('sq')-$u->SQ);
                  $Intellegencemax = (200-$Intellegence)/200;
                  $Intellegencemin = ($Intellegence-0)/200;

                  $Emotionalmax = (165-$Emotional)/165;
                  $Emotionalmin = ($Emotional-0)/165;

                  $cond1 = min($Intellegencemin,$Emotionalmax);
                    $z0 = ($cond1*(100-0))+0;
                  $cond2 = min($Intellegencemin,$Emotionalmin);
                    $z1 = (100-($cond2*(100-0)));
                  $cond3 = min($Intellegencemax,$Emotionalmax);
                    $z2 = ($cond3*(100-0))+0;
                  $cond4 = min($Intellegencemax,$Emotionalmin);
                    $z3 = ($cond4*(100-0))+0;

                  $zt = (($cond1*$z0) + ($cond2*$z1) + ($cond3*$z2) + ($cond4*$z3))/($cond1+$cond2+$cond3+$cond4);
              ?>
              <center><p>You got <?php echo round($zt,3) ?>% Match!</p></center>
              <p><a class="button" href="<?php echo base_url()?>message/<?php echo $u->id_user ?>">Message</a></p>
            </div>
          </div>
        </div>
      <?php //}?> -->
          <div class="row">
            <div id="ajax_table"></div>
            <div class="container lazyload" style="text-align: center"><button class="btn" id="load_more" data-val = "0">Load More... <img style="display: none" id="loader" src="<?php echo str_replace('index.php','',base_url()) ?>asset/img/giphy.gif"> </button></div>
          </div><br>
      <!-- </div>
      <center><a href="#" id="loadMore">Load More</a></center>
      </div> -->
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
  </div>
  <script type="text/javascript">
        $(window).scroll(function () {
    //set scroll position in session storage
    sessionStorage.scrollPos = $(window).scrollTop();
});
var init = function () {
    //get scroll position in session storage
    $(window).scrollTop(sessionStorage.scrollPos || 0)
};
window.onload = init;  
  </script>
  <style>

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>
</body>
  
  <script>
  $(document).ready(function(){

    $('#gender').val($('#gender1').val());
    $('#religion').val($('#religion1').val());
    $('#height').val($('#height1').val());
    $('#weight').val($('#weight1').val());
    $('#race').val($('#race1').val());
    $('#age').val($('#age1').val());


  getfriends(0,$('#gender1').val(),$('#religion1').val(),$('#height1').val(),$('#weight1').val(),$('#race1').val(),$('#age1').val());

  $("#load_more").click(function(e){
  e.preventDefault();
  var page = $(this).data('val');
  getfriends(page,$('#gender1').val(),$('#religion1').val(),$('#height1').val(),$('#weight1').val(), $('#race1').val(), $('#age1').val());
  });

  });

  var getfriends = function(page,gender,religion,height,weight, race, age){
  $("#loader").show();

     var genders = gender;
     var religions = religion;
     var heights = height;
     var weights = weight;
     var races = race;
     var ages = age;

   $.ajax({
  url:"<?php echo base_url() ?>Ulala/getfriends/"+genders+"/"+religions+"/"+heights+"/"+weights+"/"+races+"/"+ages,
  type:'GET',
  data: {page:page}
  }).done(function(response){
    if(response == ""){
      $(".lazyload").hide();
      alert('All User Displayed');
    }
    else{
      $("#ajax_table").append(response);
      $("#loader").hide();
      $('#load_more').data('val', ($('#load_more').data('val')+1));
      scroll();
    }

  });
  };
  var scroll  = function(){
  $('html, body').animate({
  scrollTop: $('#load_more').offset().top
  }, 1000);
  };
</script>

</html>
