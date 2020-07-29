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
            POST TEAM MEMBER</div>
          <div class="card-body">
       

                  <h3 style="text-align: center; margin-bottom: 50px; margin-top: 50px;">ODBS Technology Members</h3>
                  <div class="form-group">
                              <?php // echo "<td><img style='width: 200px; height: 150px;' src='../".$images."' alt='images'></td>"; ?>
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
                            <h3>Fulname</h3>
                            <input class="form-control" type="text" name="fulname" value="<?php echo $edit_questionandanswers['fulname']; ?>"  placeholder="Full name">
                          </div>

                            <div class="form-group">
                              <h3>Phone Number</h3>
                              <input class="form-control" type="text" name="phonenumber" value="<?php echo $edit_questionandanswers['phonenumber']; ?>" placeholder="Phonenumber">
                            </div>

                            <div class="form-group">
                              <h3>Email</h3>
                              <input class="form-control" type="text" name="email" value="<?php echo $edit_questionandanswers['email']; ?>" placeholder="Email">
                            </div>

                            <div class="form-group">
                               <h3>question 1</h3>
                              <input class="form-control" type="text" name="question1" value="<?php echo $edit_questionandanswers['question1']; ?>" placeholder="question 1">
                            </div>
                              <div class="form-group">
                              <h3>question 2</h3>
                              <input class="form-control" type="text" name="question2" value="<?php echo $edit_questionandanswers['question2']; ?>" placeholder="question 2">
                            </div>
                            <div class="form-group">
                              <h3>question 3</h3>
                              <input class="form-control" type="text" name="question3" value="<?php echo $edit_questionandanswers['question3']; ?>" placeholder="question 3">
                            </div>
                             <div class="form-group">
                              <h3>question 4</h3>
                              <input class="form-control" type="text" name="question4" value="<?php echo $edit_questionandanswers['question4']; ?>" placeholder="question 4">
                            </div>
                            <div class="form-group">
                              <h3>question 5</h3>
                              <input class="form-control" type="text" name="question5" value="<?php echo $edit_questionandanswers['question5']; ?>" placeholder="question 3">
                            </div>
                          </div>
                        </div>
                      <div class="info-column col-lg-4  col-md-6 col-md-12 col-sm-12">
                        <div class="contactform">  
                            <div class="form-group">
                              <h3>question 6</h3>
                              <input class="form-control" type="text" name="question6" value="<?php echo $edit_questionandanswers['question6']; ?>" placeholder="question 6">
                            </div>

                            <div class="form-group">
                              <h3>question 7</h3>
                              <input class="form-control" type="text" name="question7" value="<?php echo $edit_questionandanswers['question7']; ?>" placeholder="question 7">
                            </div>

                            <div class="form-group">
                              <h3>question 8</h3>
                              <input class="form-control" type="text" name="question8" value="<?php echo $edit_questionandanswers['question8']; ?>" placeholder="question 8">
                            </div>

                             <div class="form-group">
                              <h3>question 9</h3>
                              <input class="form-control" type="text" name="question9" value="<?php echo $edit_questionandanswers['question9']; ?>" placeholder="question 9">
                            </div>
                            <div class="form-group">
                              <h3>question 10</h3>
                              <input class="form-control" type="text" name="question10" value="<?php echo $edit_questionandanswers['question10']; ?>" placeholder="question 10">
                            </div>
                            <div class="form-group">
                            <h3>Answer to question 1</h3>
                            <input class="form-control" type="text" name="answerquestion1" value="<?php echo $edit_questionandanswers['answerquestion1']; ?>" placeholder=" Answer to question 1">
                          </div>
                          <div class="form-group">
                            <h3>Answer to question 2</h3>
                            <input class="form-control" type="text" name="answerquestion2" value="<?php echo $edit_questionandanswers['answerquestion2']; ?>" placeholder=" Answer to question 2">
                          </div>
                            <div class="form-group">
                            <h3>Answer to question 3</h3>
                            <input class="form-control" type="text" name="answerquestion3" value="<?php echo $edit_questionandanswers['answerquestion3']; ?>" placeholder=" Answer to question 3">
                          </div>
                        </div>
                      </div> 

                      <div class="info-column col-lg-4  col-md-6 col-md-12 col-sm-12">
                        <div class="contactform">
                         
                          
                          <div class="form-group">
                            <h3>Answer to question 4</h3>
                            <input class="form-control" type="text" name="answerquestion4" value="<?php echo $edit_questionandanswers['answerquestion4']; ?>" placeholder=" Answer to question 4">
                          </div>
                          <div class="form-group">
                            <h3>Answer to question 5</h3>
                            <input class="form-control" type="text" name="answerquestion5" value="<?php echo $edit_questionandanswers['answerquestion5']; ?>" placeholder=" Answer to question 5">
                          </div>
                         <div class="form-group">
                            <h3>Answer to question 6</h3>
                            <input class="form-control" type="text" name="answerquestion6" value="<?php echo $edit_questionandanswers['answerquestion6']; ?>" placeholder=" Answer to question 6">
                          </div>

                          <div class="form-group">
                            <h3>Answer to question 7</h3>
                            <input class="form-control" type="text" name="answerquestion7" value="<?php echo $edit_questionandanswers['answerquestion7']; ?>" placeholder=" Answer to question 7">
                          </div>
                           <div class="form-group">
                            <h3>Answer to question 8</h3>
                            <input class="form-control" type="text" name="answerquestion8" value="<?php echo $edit_questionandanswers['answerquestion8']; ?>" placeholder=" Answer to question 8">
                          </div>
                           <div class="form-group">
                            <h3>Answer to question 9</h3>
                            <input class="form-control" type="text" name="answerquestion9" value="<?php echo $edit_questionandanswers['answerquestion9']; ?>"  placeholder=" Answer to question 9">
                          </div>
                           <div class="form-group">
                            <h3>Answer to question 10</h3>
                            <input class="form-control" type="text" name="answerquestion10" value="<?php echo $edit_questionandanswers['answerquestion10']; ?>"  placeholder="Answer toquestion 10">
                          </div> 
                           <div class="form-group">
                            
                            <button name='edit_post' type='submit' class="btn btn-success' href='<?php echo $edit_questionandanswers['id']; ?>
                         ">Update</a></button>
                           
                          </div>

                        </div>
                      </div> 
                      </div>
                    </form>
                    
                  </div>
                 
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
