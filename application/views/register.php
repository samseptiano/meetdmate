<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Registrasi Akun</title>
  <?php include('include/css.php'); ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrasi Akun</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url()?>processregister">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nama Depan</label>
                <input class="form-control" id="exampleInputName" name="fname" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Depan" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Nama Belakang</label>
                <input class="form-control" id="exampleInputLastName" name="lname" type="text" aria-describedby="nameHelp" placeholder="Masukkan nama belakang">
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="form-row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Alamat Email</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="text" onBlur="checkAvailabilityEmail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" aria-describedby="emailHelp" placeholder="Masukkan alamat email" required="required">
            <span id="email-availability-status"></span>
            <p><img src="<?php echo base_url(); ?>asset/img/default/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
            </div>
            <div class="col-md-6">
            <label for="gender1">Gender</label>
            <select id="gender1" name="gender" class="form-control" required="required">
                <option value="">-Pilih Gender-</option>
                <option value="M">Pria</option>
                <option value="F">Wanita</option>
                <option value="O">Lainnya</option>
              </select>
              </div>
          </div>
          </div>
          <div class="form-group">
            <label for="address1">Alamat Domisili</label>
            <div class="form-row">
              <div class="col-md-12">
                <textarea class="form-control" id="exampleInputAddress" name="address" onkeyup="fetchAddress()" aria-describedby="addressHelp" required="required" ></textarea><br>
              </div>
              <!-- <div class="col-md-2">
              <button type="button" id="addresButton" class="btn btn-primary btn-block" onclick="search_position_and_address()">Auto</button>
              </div> -->
              </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group" required="required">
                <label>Provinsi Domisili</label>
                <select name="province" id="provincesel" class="form-control" required="required">
                        <option value="">-Provinsi-</option>
                </select>
              </div>
              <div class="col-sm-6 form-group" required="required">
                <label>Kota Domisili</label>
                <select name="city" id="citysel" class="form-control" required="required">
                        <option value="">-Kota-</option>
                </select>
              </div>  
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <input class="form-control" name="lat" id="lat" type="hidden" required="required">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="lon" id="lon" type="hidden" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Tempat Lahir</label>
                <input class="form-control" name="place_birth" id="exampleInputPassword1" type="text" placeholder="Masukkan tempat lahir" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Tanggal Lahir <span style="color:red;font-size:14px">( <?php echo ((date('Y')-17) ." s/d ".(date('Y')-80)); ?> )</span></label>
                <input class="form-control" name="date_birth" id="exampleConfirmPassword" type="date" placeholder="Masukkan Tanggal Lahir" max="<?php echo(date('Y')-17) ?>-12-31" min="<?php echo(date('Y')-80) ?>-01-01" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Agama</label>
                <select id="religion1" name="religion" class="form-control" required="required">
                <option value="-">-Pilih Agama-</option>
                    <option value='Kristen'>Kristen</option>
                    <option value='Katolik'>Katolik</option>
                    <option value='Islam'>Islam</option>
                    <option value='Buddha'>Buddha</option>
                    <option value='Hindu'>Hindu</option>
                    <option value='Lainnya'>Lainnya</option>
              </select>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Suku</label>
                <select id="race1" name="race" class="form-control" required="required">
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
              </div>
           </div>
          </div>

          <div class="form-group">
          <div class="form-row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Tinggi Badan(cm)</label>
              <section class="range-slider3">
                <span class="rangeValues3" id="rangeValues3"></span>
                <input class="form-control" id="tinggi" min="130" max="200" step="1" type="range" name="height" required="required">
                </section>
            </div>
            <div class="col-md-6">
            <label for="gender1">Berat Badan(kg)</label>
                <section class="range-slider4">
                <span class="rangeValues4" id="rangeValues4"></span>
                <input class="form-control" id="berat" min="40" max="200" step="1" type="range" name="weight" required="required">
                </section>
              </div>
          </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1" >Password</label>
                <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Konfirm password</label>
                <input class="form-control" name="confirmpassword" id="exampleConfirmPassword" type="password" placeholder="Confirm password" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Interest <span style="color:red">(Pilih Min. 1)</span></label>
            <div class="form-row">
              <div class="col-md-6">
                <label class="form-check-label"><input class="form-check-input" name="interest[0]" id="interest" type="checkbox" value="Seni">Seni</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[1]" id="interest" type="checkbox" value="Travel">Travel</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[2]" id="interest" type="checkbox" value="Makanan">Makanan</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[3]" id="interest" type="checkbox" value="Musik">Musik</label><br>
              </div>
              <div class="col-md-6">
                <label class="form-check-label"><input class="form-check-input" name="interest[4]" id="interest" type="checkbox" value="Teknologi">Teknologi</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[5]" id="interest" type="checkbox" value="Fashion">Fashion</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[6]" id="interest" type="checkbox" value="Fotografi">Fotografi</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[7]" id="interest" type="checkbox" value="Olah Raga">Olah Raga</label><br>
                <label class="form-check-label"><input class="form-check-input" name="interest[8]" id="interest" type="checkbox" value="Lainnya">Lainnya</label><br>
              </div>
            </div>
          </div>
          <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
        </form>
        <br>
        <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url()?>login">Punya Akun? Login</a>
          <br>
          <a class="d-block small" href="<?php echo base_url()?>">Halaman Utama</a>
        </div>
      </div>
    </div>
  </div>
 <?php include('include/js.php'); ?>
<script type="text/javascript">
  function checkAvailabilityEmail() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "<?php echo base_url('checkemail'); ?>",
      data:'email='+$("#exampleInputEmail1").val(),
      type: "POST",
      success:function(data){
        $("#email-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
      });
    }
</script>
<script src="<?php base_url()?>asset/js/dropdownCity.js"></script>
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
        if(latitude != "" ){
        $('#lat').val(latitude);
        $('#lon').val(longitude);
        }
        else{
          alert("dsfsdf");
        }
      } 

    }); 
         
  }

  function search_position_and_address() {
    // we start the request, to ask the position of the client
    // we will pass geolocationReturnedCoordinates as the success callback
    navigator.geolocation.getCurrentPosition(geolocationReturnedCoordinates, null, null);
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
</script>
</body>
</html>
