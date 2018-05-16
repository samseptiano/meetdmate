<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meet D'Mate - Friends List</title>
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
          <a href="<?php echo base_url()?>home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Friends List</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Friends LIst</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Age</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td><center><img class="img-thumbnail" src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="profile" style="width: 23px"></center></td>
                  <td>Michael Bruce</td>
                  <td>Jakarta</td>
                  <td>29</td>
                </tr>
                <tr>
                <td><center><img class="img-thumbnail" src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="profile" style="width: 23px"></center></td>
                  <td>Donna Snider</td>
                  <td>New York</td>
                  <td>27</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

</html>
