<?php

require_once 'common/header.php'; ?>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="posts-tables">ODBS Admin</a>

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
        <a class="nav-link" href="<?php echo HOME; ?>contact">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact names</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>contultation">
          <i class="fas fa-fw fa-table"></i>
          <span>Consultation</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo HOME; ?>sevices_tables">
          <i class="fas fa-fw fa-table"></i>
          <span>Services Names</span></a>
      </li>
    </ul>
   
    </ul>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><h2>All EVENT/AWARD(S)</h2></li>
        </ol>

        <div class="card mb-3">
      
          <div class="card-body">
           

            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <h5 class="text-center">ODBS Technology </h5>

                </div>
              </div>
            </div>
          <section class="contact-page-section">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                      <div class="contactform">
                        <form method="post" action="" enctype="multipart/form-data">
                          <div class="form-group">
                            <h3>Course Title</h3>
                            <input class="form-control" type="text" name="course_title" placeholder="Course Title">
                          </div>
                          <div class="form-group">
                            <h3>Course Description</h3>
                            <textarea class="form-control" name="message" placeholder="Description.."></textarea>
                          </div>
                         
                            <button type="submit" class="btn btn-success">Post Course</button>
                        </div>
                      </div>

                    </form>
                  </div>

                </div>
              </div>
            </div>
          </section>


            <hr>
         
          </div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
 <?php

require_once 'common/footer.php';


 ?>
