<?php require_once 'common/header.php'; ?>	<!--Page Title-->
    

    <section class="page-title" style="background-image:url(<?php echo  HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>APPLICATION <span> FORM </span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>WORK WITH US </li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Contact Page Section -->
	<section class="contact-page-section" style="margin-bottom: 50px;">

		<div class="auto-container" >
			<div class="inner-container">
				<h2 style="margin-bottom: 50px; color: #15144d;">Register <span>with Us</span></h2>
				<div class="row clearfix">
              <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                <div class="contactform">
                  <form method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                      <h3>Fulname</h3>
                      <input class="form-control" type="text" name="fulname"  placeholder="Fulname">
                    </div>

                     <div class="form-group">
                        <h3>Email</h3>
                        <input class="form-control" type="text" name="email" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <h3>Facebook Link</h3>
                        <input class="form-control" type="text" name="face"  placeholder="Facebook">
                      </div>

                      <div class="form-group">
                         <h3>Address</h3>
                        <input class="form-control" type="text" name="address" placeholder="Address">
                      </div>
                      <div class="form-group">
                         <h3>Phone Number</h3>
                        <input class="form-control" type="text" name="phonenumber"  placeholder="Phone Number">
                      </div>

                      <button class="btn btn-success" type="submit" name="submitform">Submit now <span class="icon fa fa-angle-right"></span></button>

                    </div>
                  </div>
                <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                  <div class="contactform">
                    
                      <div class="form-group">
                         <h3>Position</h3>
                        <input class="form-control" type="text" name="position"  placeholder="Position">
                      </div>
                      <div class="form-group">
                        <h3>Quarantor's Name</h3>
                        <input class="form-control" type="text" name="quarantorname"  placeholder="Quarantor Name">
                      </div>

                     <div class="form-group">
                        <h3>Quarantor's Phone Number</h3>
                        <input class="form-control" type="text" name="quarantorphone" placeholder="Quarantor Phone Number">
                      </div>

                       <div class="form-group">
                        <h3>Quarantor's Address</h3>
                        <input class="form-control" type="text" name="quarantoradd" placeholder="Quarantor Address">
                      </div>
                       
                      <div class="form-group">
                        <h3>Staff Picture</h3>
                        <input type="file" name="fileToUpload">
                      </div>
                  </div>
                </div>  
                </div>
              </form>
              <!-- </div> -->
            </div>

					
				</div>
			</div>
		</div>
	</section>


	<!-- End Team Page Section -->
	
	
<?php require_once 'common/footer.php'; ?>