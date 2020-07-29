<?php require_once 'common/header.php'; ?>
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard">ODBS TECHNOLOGY</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
      </li>
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>ADMINISRATORS</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">ODBS STAFF NAMES:</h6>
          <a class="dropdown-item" href="<?php echo HOME; ?>team">Post Team</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>team_tables">Team Names</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>event">Post Event</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>event_tables">Event Details</a>

          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="<?php echo HOME; ?>blog">Blog Post</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>press_tables">Blog Details</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>trainingcourse">Post Training Course</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>training_tables">Training Course List </a>
          <a class="dropdown-item" href="<?php echo HOME; ?>staff">Add Staff </a>
          <a class="dropdown-item" href="<?php echo HOME; ?>staff_tables">All Staff Names </a>
          <a class="dropdown-item" href="<?php echo HOME; ?>uploadcertificate">Upload Certificate </a>
          <a class="dropdown-item" href="<?php echo HOME; ?>certificate_tables">Certificate Names </a>


        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>contact">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact Names</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo HOME; ?>consultation">
          <i class="fas fa-fw fa-table"></i>
          <span>Consultation Names</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo HOME; ?>sevices_tables">
          <i class="fas fa-fw fa-table"></i>
          <span>Services Names</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Contact Date</th>
                    <th>Delete</th>

                    
                  </tr>
                </thead>
                
                <tbody>
                  <?php 

                  if (count($services_tables) > 0) {
                  foreach ($services_tables as $services_table) {
                    $id = $services_table['id'];
                    $email = $services_table['email'];

                    $fulname = $services_table['fulname'];
                    $phone = $services_table['phone'];
                    $message = $services_table['message'];



                    $date = date('d-m-Y', strtotime($services_table['date']));
                    echo "<tr>";
                    
                    $email = $services_table['email'];

                    echo"<th>$fulname</th>";
                    echo"<th>$email</th>";
                    echo"<th>$phone</th>";
                    echo"<th>$message</th>";

                    echo"<th>$date</th>";
                    echo " <td><a href='delete_services?id={$id}'>Delete</a></td>";

                  }

                }
                   ?>

                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated  <?php $date = new  dateTime("now");  echo date_format($date, "d F Y h:i:s"); ?> </div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login">Logout</a>
        </div>
      </div>
    </div>
  </div>
<?php require_once 'common/footer.php'; ?>
