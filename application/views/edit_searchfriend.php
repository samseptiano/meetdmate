<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Edit Percarian</title>
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
        <li class="breadcrumb-item active">Edit Pencarian</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <div class="row">
          <div class="col-sm-12">            

          <form method="post" action='<?php echo base_url()?>ulala/savefilter'>
          <div class="row" style="border-style:double;margin:5px;"> 
              <div class="col-md-12" style="margin-top: 15px;">
                <h5>Pengaturan Pencarian Teman</h5><br>
              </div>
          <?php foreach($user as $u){ ?>
              <div class="col-md-6">
              <label for="gender">Jenis Kelamin</label>
              <select id="gender2" name="gender" class="form-control" required="required">
                        <option value="all">-Semua Gender-</option>
                          <option value='M'>Pria</option>
                          <option value='F'>Wanita</option>
                          <option value='O'>Lainnya</option>
              </select>
              <input type="hidden" id="myIdGender2" value="<?php echo $u->gender_filter ?>">
              <br>
              </div>

              <div class="col-md-6">
              <label for="religion">Agama</label>
              <select id="religion2" name="religion" class="form-control" required="required">
                      <option value="all">-Semua Agama-</option>
                      <option value='Kristen'>Kristen</option>
                      <option value='Katolik'>Katolik</option>
                    <option value='Islam'>Islam</option>
                    <option value='Buddha'>Buddha</option>
                    <option value='Hindu'>Hindu</option>
                    <option value='Lainnya'>Lainnya</option>
              </select>
             <input type="hidden" id="myIdReligion2" value="<?php echo $u->religion_filter ?>">
              <br>
              </div>

              <div class="col-md-6">
              <label for="height">Tinggi Badan</label>
              <section class="range-slider">
                <span class="rangeValues"></span>
                <input class="form-control" value="<?php echo explode('-', $u->height_filter)[0] ?>" min="130" max="200" step="1" type="range" name="heightmin">
                <input class="form-control" value="<?php echo explode('-', $u->height_filter)[1] ?>" min="130" max="200" step="1" type="range" name="heightmax">
              </section>
              </div>

              <div class="col-md-6">
              <label for="weight">Berat Badan</label>
              <section class="range-slider2">
                <span class="rangeValues"></span>
                <input  class="form-control" value="<?php echo explode('-', $u->weight_filter)[0] ?>" min="40" max="200" step="1" type="range" name="weightmin">
                <input  class="form-control" value="<?php echo explode('-', $u->weight_filter)[1] ?>" min="40" max="200" step="1" type="range" name="weightmax">
              </section>
              <br>
              </div>
              <div class="col-md-6">
              <label for="race">Suku</label>
                <select id="race2" name="race" class="form-control">
                    <option value='all'>-Semua Suku-</option>
                     <option value='Lainnya'>Lainnya</option>
                    <option value='Jawa'>Jawa</option>
                    <option value='Sunda'>Sunda</option>
                    <option value='Batak'>Batak</option>
                    <option value='Madura'>Madura</option>
                    <option value='Tionghoa'>Tionghoa</option>
                    <option value='Melayu'>Melayu</option>
                    <option value='Betawi'>Betawi</option>
                    <option value='Bugis'>Bugis</option>
                    <option value='Papua'>Papua</option>
                    <option value='Ambon'>Ambon</option>
                    <option value='Sasak'>Sasak</option>
                    <option value='Dayak'>Dayak</option>
                    <option value='India'>India</option>
                    <option value='Arab'>Arab</option>
                    <option value='Non-Indonesia'>Non-Indonesia</option>
                </select>
                <input type="hidden" id="myIdRace2" value="<?php echo $u->race_filter ?>"><br>
              </div>
              <div class="col-md-6">
              <label for="weight">Usia</label>
              <section class="range-slider3">
                <span class="rangeValues"></span>
                <input  class="form-control" value="<?php echo explode('-', $u->age_filter)[0] ?>" min="17" max="80" step="1" type="range" name="agemin">
                <input  class="form-control" value="<?php echo explode('-', $u->age_filter)[1] ?>" min="17" max="80" step="1" type="range" name="agemax">
              </section>
              <br>
              </div>
              <?php } ?>
              <div class="col-md-12" style="margin-bottom: 15px;">
                <input class="btn btn-theme" type="submit" name="submit" value="Simpan Filter">
              </div>
          </div>
          </form>

          </div>
          </div>
        </div>
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
  </div>
  <script type="text/javascript">
   $('#gender2').val($('#myIdGender2').val());
    $('#religion2').val($('#myIdReligion2').val());
    $('#race2').val($('#myIdRace2').val());
    $('#gender').val($('#myIdGender').val());
    $('#religion').val($('#myIdReligion').val());
   
     $('#race').val($('#myIdRace').val());
  </script>
  <script type="text/javascript">
    var res = $('#myIdInterest').val();
     for(i=0;i<9;i++){
        if(res.includes(document.getElementById('interest['+i+']').value) == true){
             $('input[name=interest'+i+']').attr('checked', true);
        }
     }
  </script>
  <script src="<?php base_url()?>asset/js/dropdownCityStoreValue.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBLrm4nIStqraZXo57Bkcg-T9Nz2g8g2M&callback=initMap"></script>
<script>

function getVals(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  var displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "" + slide1 + "cm - " + slide2 + "cm";
}

function getVals2(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  var displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "" + slide1 + "kg - " + slide2 + "kg";
}

function getVals3(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  var displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "" + slide1 + "Tahun - " + slide2 + "Tahun";
}


window.onload = function(){
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
      for( var x = 0; x < sliderSections.length; x++ ){
        var sliders = sliderSections[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }

      var sliderSections2 = document.getElementsByClassName("range-slider2");
      for( var x = 0; x < sliderSections2.length; x++ ){
        var sliders2 = sliderSections2[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders2[y].type ==="range" ){
            sliders2[y].oninput = getVals2;
            // Manually trigger event first time to display values
            sliders2[y].oninput();
          }
        }
      }

      var sliderSections3 = document.getElementsByClassName("range-slider3");
      for( var x = 0; x < sliderSections3.length; x++ ){
        var sliders3 = sliderSections3[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders3[y].type ==="range" ){
            sliders3[y].oninput = getVals3;
            // Manually trigger event first time to display values
            sliders3[y].oninput();
          }
        }
      }
}

</script>
</body>
</html>
