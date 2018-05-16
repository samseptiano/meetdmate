<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Pesan</title>
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
        <li class="breadcrumb-item active">Pesan</li>
        <?php foreach ($chat as $u) { ?>
        <li class="" style="float: right"><a href="<?php echo base_url()?>profile-friend/<?php echo $u->id_user ?>"><i class="fa fa-user-circle-o" style="font-size:30px;"></i></a></li>
        <?php } ?>
      </ol>
      <div class="row">
      <div class="col-lg-12 main-chart" id="fragments">      
          
          <div class="row" style="margin:0 5px 0 5px" >
        <div class="col-md-12"> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script> 
    var time = 0;
  
    var updateTime = function (cb) {
      $.getJSON("<?php echo base_url(); ?>/Ulala/time", function (data) {
          cb(~~data);
      });
    };
    
    var sendChat = function (message,sender,receiver,s,v, cb) {
      $.getJSON("<?php echo base_url(); ?>/Ulala/insert_chat?message=" + message+"&sender=" + sender+"&receiver=" + receiver+"&s="+s+"&v="+v, function (data){
        cb();
      });
    }
    
    var addDataToReceived = function (arrayOfData) {
      arrayOfData.forEach(function (data) {
       var sender = $("#sender").val();
        var receiver = $("#receiver").val();
        var s = $("#s").val();
        var v = $("#v").val();
        var idteman = $('#receiver').val();

        var theDate = new Date(data[2] * 1000);
        //alert(theDate);
        //dateString = theDate.toString("Y-m-d h:s:a");
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        dateString = theDate.getDate()+"/"+months[theDate.getMonth()]+"/"+theDate.getFullYear()+" "+theDate.getHours()+":"+theDate.getMinutes()+":"+theDate.getSeconds();


        if(data[0]== sender){
                  $("#received").html($("#received").html() + '<div class="row msg_container base_receive"><div class="col-md-2 col-xs-2 avatar"><!--<img src="#" class=" img-responsive ">--></div><div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>'+data[1]+'</p><time datetime="'+dateString+'">Saya • '+dateString+'</time></div>');
        }
        else if(data[0]== receiver){
                <?php foreach($chat as $u){?>
                $("#received").html($("#received").html() + '<div class="row msg_container base_sent"><div class="col-md-10 col-xs-10"><div class="messages msg_sent"><p>'+data[1]+'</p><time datetime="'+dateString+'">Teman • '+dateString+'</time></div></div><div class="col-md-2 col-xs-2 avatar"><!--<img src="#" class=" img-responsive ">--></div></div>');
                <?php } ?>
        }
      });
    }
    
    var getNewChats = function (sender,receiver) {
      $.getJSON("<?php echo base_url(); ?>Ulala/get_chats?time=" + time+"&sender=" + sender +"&receiver=" + receiver, function (data){
        addDataToReceived(data);
        // reset scroll height
        setTimeout(function(){
           $('#received').scrollTop($('#received')[0].scrollHeight);
        }, 0);
        time = data[data.length-1][2];
      });      
    }
  
    // using JQUERY's ready method to know when all dom elements are rendered
    $( document ).ready ( function () {
      // set an on click on the button
      $("form").submit(function (evt) {
        evt.preventDefault();
        var data = $("#text").val();
        var sender = $("#sender").val();
        var receiver = $("#receiver").val();
        var s = $("#s").val();
        var v = $("#v").val();
        $("#text").val('');
        // get the time if clicked via a ajax get queury
        sendChat(data,sender,receiver,s,v, function (){
          alert("Success!");
        });
      });
      setInterval(function (){
        var sender = $("#sender").val();
         var receiver = $("#receiver").val();
        getNewChats(sender,receiver);
      },1500);
    });
    
  </script>
<div class="col-sm-6 form-group">
  <input id="sender" type="hidden" name="sender"  value="<?php echo $this->session->userdata("id"); ?>" class="form-control">
  <input id="s" type="hidden" name="s"  value="<?php echo $this->session->userdata("email"); ?>" class="form-control">
          <?php foreach ($chat as $u) { ?>
          <input name="receiver" id="receiver" class="form-control" value="<?php echo $u->id_user ?>" type="hidden">
           <input name="v" id="v" class="form-control" value="<?php echo $u->email ?>" type="hidden">
          <?php } ?>

</div>
  </div>
<div class="col-sm-12 form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;overflow-x: auto;padding:10px">
        <div class="panel-body msg_container_base" style="height:320px" id="received">
      </div>
  </div>
  <div class="col-sm-12 form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding: 5px;">
  <form>
  <div class="form-row">
    <div class="col-sm-10 form-group">
      <input id="text" type="text" name="user" class="form-control data" required>
    </div>
    <div class="col-sm-2 form-group">
    <input type="submit" value="Send" class="btn btn-success col-sm-12">
    </div>
    </div>
  </form>
  </div>
        </div>
    </div><br>
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
</body>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
  <script type="text/javascript">
                setInterval(function()
                  { 
                    var a = document.getElementById("receiver").value;
                      $.ajax({
                        url:"<?php echo base_url(); ?>"+"Ulala/keep_read",
                        async: false,
                        type:"post",
                        dataType: "json",
                        data: {sender: a},
                        cache: false,
                        success:function(res)
                        {
                            if(res){
                              console.log(a+ "sukses");
                            }
                            else{
                              console.log(a+ 'gagal');
                            }
                        }
                      });
                      e.preventDefault();
                   }, 2000);//time in milliseconds 
    </script>
  <link href="<?php echo base_url();?>asset/css/chatbox.css" rel="stylesheet">
</html>
