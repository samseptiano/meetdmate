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

                echo "<a href=".base_url()."message/".$u->visitor."><button class='btn btn-dark btn-lg' style='width:80%;margin-bottom:5px' id ='emaill1' >".$u->visitor_email." </button></a>&nbsp;&nbsp;<a data-toggle='modal' data-id='".$u->visitor."' data-toggle='modal' title='Hapus Pesan' class='open-AddBookDialog btn btn-danger' href='#addBookDialog'>X</a><br>";
                
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

