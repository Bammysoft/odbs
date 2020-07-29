<?php

require_once 'common/header.php'; ?>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="posts-tables">ODBS STUDENT Admin</a>

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
        <a class="nav-link" href="<?php echo HOME; ?>contact">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact names</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>contultation">
          <i class="fas fa-fw fa-table"></i>
          <span>Consultation</span></a>
      </li>

    </ul>
   
    </ul>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="studentaccount">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><h2>WELLCOME <?php echo $_SESSION['studentusername']; ?></h2></li>
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
          <!-- Call To Action Section -->
  <section class="call-back-section">
    <div class="auto-container">
      <div class="row clearfix">
        <!-- Form Column -->
        <div class="form-column col-lg-8 col-md-12 col-sm-12">
          <div class="inner-column">

            <!-- Request Form -->
             <?php if ($studentaccounts != false): ?>
              <?php 
                $id = $studentaccount['id']; 
                //$images = $studentaccount['images']; 
                $date = date('d-m-Y');  ?>
            <div class="requestform">
              <!--Request Form-->
              <form method="post" action="">
                <div class="row clearfix">
                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="firstname" value="<?php echo $studentaccount['firstname']; ?>" placeholder="First Name">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Other Name</label>
                    <input class="form-control" type="text" name="othername" value="<?php echo $studentaccount['othername']; ?>" placeholder="Other Name">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Email Address</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $studentaccount['email']; ?>" placeholder="Email Address">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Phone Number</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $studentaccount['phone']; ?>" placeholder="Phone Number">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Name of Course</label>
                    <input class="form-control" type="text" name="course_name" value="<?php echo $studentaccount['course_name']; ?>" placeholder="Name of Course">
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Student Username</label>
                    <input class="form-control" type="text" name="studentusername" value="<?php echo $studentaccount['studentusername']; ?>" placeholder="Username">
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label>Message</label>
                    <textarea class="form-control" name="message"  placeholder="Message us what you need.."><?php echo $studentaccount['message']; ?></textarea>
                  </div>
                </div>
              </form>
            <?php endif; ?>
            </div>
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
