   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">PIlih "keluar" jika ingin menyudahi sesi ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?php echo base_url()?>logout">Keluar</a>
          </div>
        </div>
      </div>
    </div>

      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal2Label">Ubah Password</h5>
          </div>
          <form method="post" action="<?php echo base_url()?>password-edit">
          <div class="modal-body">
            <div class="row">
                  <div class="col-md-4">
                  Password Lama:
                  </div>
                  <div class="col-md-8">
                   <input type="password" id="oldpass" name="oldpass" class="form-control">
                  </div>
                  <span id="password-availability-status"></span>
            </div><br>
            <div class="row">
                  <div class="col-md-4">
                  Password Baru:
                  </div>
                  <div class="col-md-8">
                   <input type="password" name="newpass" class="form-control">
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit" value="Update">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  $("#exampleModal2").modal({"backdrop": "static"});
</script>