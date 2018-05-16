<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Kotak Masuk</title>
  <?php include('include/css.php'); ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('include/header.php'); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        setInterval(function(){
        $(".asolole").load('<?php echo base_url()?>Ulala/inbox_fragment')
        }, 2000);
        });
      </script>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url()?>home">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Kotak Masuk</li>
      </ol>
      <div class="row asolole">
                  <div class="col-lg-12 main-chart">      
          <div class="row ">
          <br><br><br>
        <div class="col-md-12"  style="overflow: hidden;height:450px"><br>
            <?php
            foreach ($chat as $u) {
              if($u->visitor != $this->session->userdata('id')){

                foreach ($chat2 as $a){
                            if($a->sender == $u->visitor){
                            echo "<span class='badge-notif' data-badge='".$a->message."'></span>";
                            }
                  }

                echo "<a href=".base_url()."message/".$u->visitor."><button class='btn btn-dark btn-lg' style='width:80%;margin-bottom:5px' id ='emaill1' >".$u->visitor_email." </button></a>&nbsp;&nbsp;<a data-toggle='modal' data-id='".$u->visitor."' data-toggle='modal' title='Hapus Pesan' class='open-AddBookDialog btn btn-danger' href='#addBookDialog'>X</a> <br>";
              }

              if($u->home != $this->session->userdata('id')){

                 foreach ($chat2 as $a){
                            if($a->sender == $u->home){
                            echo "<span class='badge-notif' data-badge='".$a->message."'></span>";

                            }
                  }

                echo "<a href=".base_url()."message/".$u->home."><button class='btn btn-dark btn-lg' style='width:80%;margin-bottom:5px' id ='emaill2' >".$u->home_email." </button></a>&nbsp;&nbsp;<a data-toggle='modal' data-id='".$u->home."' data-toggle='modal' title='Hapus Pesan' class='open-AddBookDialog btn btn-danger' href='#addBookDialog'>X</a><br>";

              }
               
              }
            ?>
        </div>
    </div><br>                          <!-- END PROFILE SECTION -->
                  </div>
              </div>

<script type="text/javascript">
  $("#exampleModal2").modal({"backdrop": "static"});
</script>
              <!-- MODAL HAPUS PESAN -->


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
    <?php include('include/del_message_modal.php'); ?>
   <?php include('include/js.php'); ?>
  </div>


</body>
<script type="text/javascript">
    $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     // $(".modal-body #bookId").val( myBookId );
     $(".modal-footer #hapus").attr( 'href',"delete-message/"+myBookId );
    $('#addBookDialog').modal('show');
});
</script>
<style>
  .badge-notif {
          position:relative;
  }

  .badge-notif[data-badge]:after {
          content:attr(data-badge);
          position:absolute;
          top:-10px;
          right:-10px;
          font-size:.7em;
          background:#e53935;
          color:white;
          width:18px;
          height:18px;
          text-align:center;
          line-height:18px;
          border-radius: 50%;
  }
  @media screen and (max-width: 400px) {
    #emaill1,#emaill2{
      font-size: 13px;
    }
}
</style>
</html>
