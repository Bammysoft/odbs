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
      <li class="nav-item active">
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
        <a class="nav-link" href="<?php echo HOME; ?>studentservices">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Student names</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>contact">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact names</span></a>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Others</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">WORKERS:</h6>
          <a class="dropdown-item" href="<?php echo HOME; ?>assessment">Assessment</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>assessmentquestions">Assessment Questions</a>
          <a class="dropdown-item" href="<?php echo HOME; ?>assessmentstudentname">Names of Assessment</a>

          <a class="dropdown-item" href="<?php echo HOME; ?>application_tables">Application Names</a>
         
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>consultation">
          <i class="fas fa-fw fa-table"></i>
          <span>Consultation</span></a>
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
            POST TEAM MEMBER</div>
          <div class="card-body">
            <!-- <div class="table-responsive"> -->
          <?php if (count($staffs) > 0): ?>

            <?php foreach ($staffs as $staff): $id = $staff['id']; $images = $staff['images'];  $date = date('d-m-Y'); ?>

                  <h3 style="text-align: center; margin-bottom: 50px; margin-top: 50px;">ODBS Technology Members</h3>
                  <div class="form-group">
                              <?php  echo "<td><img style='width: 200px; height: 150px;' src='../".$images."' alt='images'></td>"; ?>
                            </div>

          <section class="contact-page-section">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-4  col-md-6 col-md-12 col-sm-12">

                      <div class="contactform">

                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group">
                            <h3>Firstname</h3>
                            <input class="form-control" type="text" name="firstname" value="<?php echo $staff['firstname']; ?>" placeholder="Firstname">
                          </div>

                            <div class="form-group">
                              <h3>Othername</h3>
                              <input class="form-control" type="text" name="othername" value="<?php echo $staff['othername']; ?>" placeholder="Othername">
                            </div>

                            <div class="form-group">
                              <h3>Facebook Link</h3>
                              <input class="form-control" type="text" name="face" value="<?php echo $staff['face']; ?>"  placeholder="Facebook">
                            </div>

                            <div class="form-group">
                               <h3>Tweeter Link</h3>
                              <input class="form-control" type="text" name="tweet" value="<?php echo $staff['tweet']; ?>" placeholder="Tweeter">
                            </div>
                            <div class="form-group">
                              <h3>Bank Name</h3>
                              <input class="form-control" type="text" name="bankname" value="<?php echo $staff['bankname']; ?>" placeholder="Bank name">
                            </div>
                          </div>
                        </div>
                      <div class="info-column col-lg-4  col-md-6 col-md-12 col-sm-12">
                        <div class="contactform">
                          <div class="form-group">
                               <h3>Instagram Link</h3>
                              <input class="form-control" type="text" name="insta" value="<?php echo $staff['insta']; ?>" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                               <h3>Whatsapp Link</h3>
                              <input class="form-control" type="text" name="whatts" value="<?php echo $staff['whatts']; ?>" placeholder="Whatsapp">
                            </div>
                            <div class="form-group">
                              <h3>Email</h3>
                              <input class="form-control" type="text" name="email" value="<?php echo $staff['email']; ?>"  placeholder="Email">
                            </div>

                            <div class="form-group">
                              <h3>Designation</h3>
                              <input class="form-control" type="text" name="designation" value="<?php echo $staff['designation']; ?>" placeholder="Designation">
                            </div>

                            <div class="form-group">
                              <h3>Account Number</h3>
                              <input class="form-control" type="text" name="account" value="<?php echo $staff['account']; ?>" placeholder="Account Number">
                            </div>

                            
                        </div>
                      </div> 

                      <div class="info-column col-lg-4  col-md-6 col-md-12 col-sm-12">
                        <div class="contactform">
                          <div class="form-group">
                            <?php  echo "<td><a href='edit_staff?id={$id}'>Edit Staff</a></td>"; ?><br>
                            <?php  echo "<td><a href='view_staff?id={$id}'>View Staff</a></td>"; ?><br>
                            <?php  echo "<td><a href='delete_staff?id={$id}'>Delete Staff</a></td>"; ?><br>
                              
                            </div>
                           
                        </div>
                      </div> 
                      </div>
                    </form>
                    <!-- </div> -->
                  </div>
                  <?php endforeach; ?>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </section>
        
            </div>
          </div>
          
        </div>

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
