<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Edit Profil</title>
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
        <li class="breadcrumb-item">
          <a href="<?php echo base_url()?>profile">Profil</a>
        </li>
        <li class="breadcrumb-item active">Edit Profil</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <div class="row">
          <?php foreach($user as $u){ ?>
          <div class="col-sm-5">
            <center>
            <img class="img-thumbnail" src="<?php echo base_url().$u->photo_path ?>" alt="profile">
            <h6 class="data">Max: 3500*3500 | 4MB | .jpg, .jpeg, .png, .gif</h6>
            <?php echo form_open_multipart(base_url().'upload-photo'); ?>
            <input type="file" name="userfile" size="20" class="text-center center-block well well-sm data">
            <input class="data btn btn-dark" type="submit" value="Upload" /><br><br>
            <?php if($u->photo_path != '/asset/img/default/man.jpg' && $u->photo_path != '/asset/img/default/woman.PNG' && $u->photo_path != '/asset/img/default/other.png'){ ?>
            <a href="<?php echo base_url()?>delete-photo/<?php echo $u->gender ?>" style="color:red" class="data">Hapus Foto</a>
            <?php } ?>
            </form>
            </center>

          </div>
          <div class="col-sm-7" style="margin-top: 15px">
          <form method="post" action="<?php echo base_url()?>process-edit-profile" style="border-style: double;padding:15px">

             <div class="col-md-12" style="margin-top: 5px;">
                <h5>Profil User</h5><br>
              </div>
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Nama Depan</label>
                <input class="form-control" id="exampleInputfname1" type="text" name="fname" aria-describedby="fnameHelp" value="<?php echo utf8_decode($u->fname) ?>" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Nama Belakang</label>
                <input class="form-control" id="exampleInputlname1" type="text" name="lname" aria-describedby="lnameHelp" value="<?php echo utf8_decode($u->lname) ?>" required="required">
              </div>
            </div><br>
            <div class="form-group">
            <label for="address1">Alamat</label>
            <div class="form-row">
              <div class="col-md-12">
                <textarea class="form-control" id="exampleInputAddress" onkeyup="fetchAddress()" name="address" type="text" aria-describedby="addressHelp" required="required"><?php echo $u->address ?></textarea><br>
              </div>
              <!-- <div class="col-md-2">
              <button type="button" id="addresButton" class="btn btn-primary btn-block" onclick="search_position_and_address()">Auto</button>
              </div> -->
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <input class="form-control" name="lat" id="lat" type="hidden" required="required" value="<?php echo $u->lat ?>">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="lon" id="lon" type="hidden" required="required" value="<?php echo $u->lon ?>">
              </div>
            </div>
          </div>
            <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group" required="required">
                <label>Provinsi</label>
                <select name="province" id="province" class="form-control" >
                        <option value="">-Provinsi-</option>
                </select>
              </div>
              <input type="hidden" id="myIdProvince" value="<?php echo $u->province ?>">
              <div class="col-sm-6 form-group" required="required">
                <label>Kota</label>
                <select name="city" id="city" class="form-control" >
                        <option value="">-Kota-</option>
                </select>
                <input type="hidden" id="myIdCity" value="<?php echo $u->city ?>">
              </div>  
            </div>
          </div>

            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputHeight1">Tinggi Badan (CM)</label>
                <section class="range-slider3">
                <span class="rangeValues3" id="rangeValues3"></span>
                <input class="form-control" id="tinggi" value="<?php echo $u->height ?>" min="130" max="200" step="1" type="range" name="height">
                </section>
              </div>
              <div class="col-md-6">
                <label for="exampleInput Weight1">Berat Badan (KG)</label>
                <section class="range-slider4">
                <span class="rangeValues4" id="rangeValues4"></span>
                <input class="form-control" id="berat" value="<?php echo $u->weight ?>" min="40" max="200" step="1" type="range" name="weight">
              </section>
              </div>
            </div>
          </div>

            <div class="form-group">
              <label for="gender1">Gender</label>
              <select id="gender" name="gender" class="form-control" required="required">
                  <option value="">-Pilih Gender-</option>
                <option value="M">Pria</option>
                <option value="F">Wanita</option>
                <option value="O">Lainnya</option>
                </select>
                <input type="hidden" id="myIdGender" value="<?php echo $u->gender ?>">
            </div>
            <div class="form-group">
              <label for="religion">Agama</label>
              <select id="religion" name="religion" class="form-control">
                  <option value="-">-Pilih Agama-</option>
                    <option value='Kristen'>Kristen</option>
                    <option value='Katolik'>Katolik</option>
                    <option value='Islam'>Islam</option>
                    <option value='Buddha'>Buddha</option>
                    <option value='Hindu'>Hindu</option>
                    <option value='Lainnya'>Lainnya</option>
                </select>
                <input type="hidden" id="myIdReligion" value="<?php echo $u->religion ?>">
            </div>
            <div class="form-group">
              <label for="race">Suku</label>
              <select id="race" name="race" class="form-control">
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
                <input type="hidden" id="myIdRace" value="<?php echo $u->race ?>">
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="place_birth" aria-describedby="emailHelp" value="<?php echo $u->place_birth ?>" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input class="form-control" id="exampleInputEmail1" type="date" name="date_birth" aria-describedby="emailHelp" value="<?php echo $u->date_birth ?>"  max="<?php echo(date('Y')-17) ?>-12-31" min="<?php echo(date('Y')-80) ?>-01-01" required="required">
              </div>
            </div>
            <div class="form-group">
            <label for="">Interest <span style="color:red">(Pilih Min. 1)</span></label>
            <div class="form-row">
              <div class="col-md-6">
                <label class="form-check-label"><input class="form-check-input" name="interest0" id="interest[0]" type="checkbox" value="Seni">Seni</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest1" id="interest[1]" type="checkbox" value="Travel">Travel</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest2" id="interest[2]" type="checkbox" value="Makanan">Makanan</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest3" id="interest[3]" type="checkbox" value="Musik">Musik</label><br>
              </div>
              <div class="col-md-6">
                <label class="form-check-label"><input class="form-check-input" name="interest4" id="interest[4]" type="checkbox" value="Teknologi">Teknologi</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest5" id="interest[5]" type="checkbox" value="Fashion">Fashion</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest6" id="interest[6]" type="checkbox" value="Fotografi">Fotografi</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest7" id="interest[7]" type="checkbox" value="Olah Raga">Olah Raga</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest8" id="interest[8]" type="checkbox" value="Lainnya">Lainnya</label><br>
              </div>
            </div>
            <input type="hidden" id="myIdInterest" value="<?php echo $u->interest ?>">
          </div>
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Akun Instagram</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="instagram" aria-describedby="instagramHelp" value="<?php echo $u->instagram ?>">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Akun Twitter</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="twitter" aria-describedby="twitterHelp" value="<?php echo $u->twitter ?>">
              </div>
            </div>
            <h3>SQ: <?php echo $u->SQ ?> <span style="margin-left:35px">EQ: <?php echo $u->EQ ?></span></h3>
            <?php } ?>
            <div class="form-row">
              <div class="col-md-6" style="margin-top: 25px">
                <span style="float: right"><a href="#">
                <input type="submit" name="submit" value="Save Changes" class="btn btn-dark"></button>
                <a href="<?php echo base_url()?>profile"><button type="button" class="btn btn-danger">Batal</button></a>
                </span>
              </div>
              <div class="col-md-6" style="margin-top: 25px">
                <span style="float: right">
                <a data-toggle="modal" data-target="#AdvModal">Advanced</a>
                </span>
              </div>
            </div><br>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
  <div class="modal fade" id="AdvModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pengaturan Advanced</h4>
        </div>
        <div class="modal-body">
          <p>Delete Akun Permanen<b> (Tidak Dapat di Batalkan)</b> : <a style="color: red" href="<?php echo base_url()?>delete_permanently"> YES </a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
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
  window.onload = search_position_and_address();
      function geolocationReturnedCoordinates(coordinates) {
    document.getElementById('lat').value = coordinates.coords.latitude;
    document.getElementById('lon').value = coordinates.coords.longitude;
      //'<br>accuracy: ' + coordinates.coords.accuracy;
    // Here would be a good place to call Reverse geocoding, since you have the coordinates here.
    GeoCode(new google.maps.LatLng(coordinates.coords.latitude, coordinates.coords.longitude));
  }

  // geocoder
  geocoder = new google.maps.Geocoder();
  function GeoCode(latlng) {
    // This is making the Geocode request
    geocoder.geocode({'location': latlng }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        var address = (results[0].formatted_address);
        //This is placing the returned address in the 'Address' field on the HTML form  
        document.getElementById('exampleInputAddress').value = results[0].formatted_address;
      }
    });
  }

    function fetchAddress(){
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById('exampleInputAddress').value;
    //alert('address ' + address);

    geocoder.geocode( { 'address': address}, function(results, status) {

      if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        //alert('latitude ' + latitude);
        $('#lat').val(latitude);
        $('#lon').val(longitude);
      } 

    }); 
         
  }

  function search_position_and_address() {
    // we start the request, to ask the position of the client
    // we will pass geolocationReturnedCoordinates as the success callback
    navigator.geolocation.getCurrentPosition(geolocationReturnedCoordinates, null, null);
  }

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

var slider = document.getElementById("tinggi");
var output = document.getElementById("rangeValues3");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

var slider2 = document.getElementById("berat");
var output2 = document.getElementById("rangeValues4");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
  output2.innerHTML = this.value;
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

      var sliderSections4 = document.getElementsByClassName("range-slider4");
      for( var x = 0; x < sliderSections4.length; x++ ){
        var sliders4 = sliderSections4[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders4[y].type ==="range" ){
            sliders4[y].oninput = getVals4;
            // Manually trigger event first time to display values
            sliders4[y].oninput();
          }
        }
      }
}

</script>
<style type="text/scss" media="screen">
    
</style>
</body>
</html>
