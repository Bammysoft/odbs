<?php

require_once 'common/header.php'; ?>
<script src="https://raw.githack.com/ekoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="studentaccount">ODBS STUDENT Admin</a>

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
        <a class="nav-link" href="<?php echo HOME; ?>studentaccount">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Student Account</span></a>
      </li>
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
          <li class="breadcrumb-item active"><h2 style="color: green;">WELLCOME <?php echo $_SESSION['studentusername']; ?></h2></li>
        </ol>

        <div class="card mb-3">
      
          <div class="card-body">
           

            <div class="container" style="color: #fff; background-color: green; padding-top: 30px; margin-bottom: 50px;">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-center">
                    <img style="width: 200px; height: 200px;" src="images/logo4.jpg">
                  <h5 class="text-center">ODBS Technology </h5>

                  </div>

                </div>
              </div>
            </div>
          <!-- Call To Action Section -->

          <section class="contact-page-section">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">
                  

                  <!-- Info Column -->
                  <!-- Request Form -->
             <?php if ($studentaccounts != false): ?>
              <?php 
              
                $images = $studentaccount['images']; 
                $id = $studentaccount['id']; 
                $date = date('d-m-Y');  ?>
                    <div class="info-column col-lg-8  col-md-6 col-md-12 col-sm-12">
                      <div class="contactform">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="firstname" value="<?php echo $studentaccount['firstname']; ?>" placeholder="First Name">
                          </div>

                           <div class="form-group">
                            <label>Other Name</label>
                            <input class="form-control" type="text" name="othername" value="<?php echo $studentaccount['othername']; ?>" placeholder="Other Name">
                          </div>
                          <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $studentaccount['email']; ?>" placeholder="Email Address">
                          </div>
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $studentaccount['phone']; ?>" placeholder="Phone Number">
                          </div>
                           <div class="form-group">
                              <label>Name of Course</label>
                              <input class="form-control" type="text" name="course_name" value="<?php echo $studentaccount['course_name']; ?>" placeholder="Name of Course">
                            </div>

                            <div class="form-group">
                              <label>Student Username</label>
                              <input class="form-control" type="text" name="studentusername" value="<?php echo $studentaccount['studentusername']; ?>" placeholder="Username">
                            </div>

                            <div class="form-group">
                              <label>Message</label>
                              <textarea class="form-control" name="message"  placeholder="Message us what you need.."><?php echo $studentaccount['message']; ?></textarea>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </form>
                    <?php endif; ?>

                    <!-- </div> -->
                  </div>

                </div>
              </div>
            </div>
          </section>


            <section class="call-back-section" style="background-color: gray; padding-top: 50px;">
              <div class="auto-container">
                  <div class="text-center">
                      <div class="card-body" id="printedForm">
                       <?php if ($studentaccounts != false): ?>
                        <?php 
                          $images = $studentaccount['images']; 
                          $id = $studentaccount['id']; 
                          $date = date('d-m-Y');  ?>
                        <form method="post" action="">
                             <?php echo "<td><img style='width: 500px; height: 500px;margin-bottom: 50px;' src='../".$images."' alt='images'></td>";  ?><br>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>
                <tr>
                  <td><a class="read-more btn btn-warning" id="printFor" onclick="printForm()" href="#">Print Now <span class="fa fa-angle-double-right"></span></a></td>
                </tr>
            </section>
            <hr>
         
          </div>

          <script>
      
        function printForm()
        {
          var element = document.getElementById('printedForm');
          html2pdf(element, {
            filename: 'student-profile.pdf'
          });
        }
    </script>
        </div>
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
