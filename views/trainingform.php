<?php require_once 'common/header.php'; ?>    <!--End Main Header -->
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Services <span>produce</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Services</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	
	
	<!-- Call To Action Section -->
	<section class="call-back-section" style="background-image:url(<?php echo HOME; ?>images/background/6.jpg); margin-bottom: 50px; margin-top: 50px;">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Form Column -->
				<div class="form-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">

						<!-- Request Form -->
						<div class="requestform">
							<!--Request Form-->
							<form method="post" action="">
								<div class="row clearfix">
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>First Name</label>
										<input class="form-control" type="text" name="firstname" placeholder="First Name">
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Other Name</label>
										<input class="form-control" type="text" name="othername" placeholder="Other Name">
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Email Address</label>
										<input class="form-control" type="text" name="email" placeholder="Email Address">
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Phone Number</label>
										<input class="form-control" type="text" name="phone" placeholder="Phone Number">
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Name of Course</label>
										<input class="form-control" type="text" name="course_name" placeholder="Name of Course">
									</div>

									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Student Username</label>
										<input class="form-control" type="text" name="studentusername" placeholder="Username">
									</div>

									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Student Password</label>
										<input class="form-control" type="text" name="studentpassword" placeholder="Password">
									</div>
									
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Message</label>
										<textarea class="form-control" name="message" placeholder="Message us what you need.."></textarea>
									</div>

									<div class="form-group col-lg-6 col-md-6 col-sm-12">

										<button class="btn btn-success" type="submit" name="submitform">Submit now <span class="icon fa fa-angle-right"></span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Title Column -->
				<div class="title-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Reqister for Our Services both Online and Offline</h2>
						<div class="text"><a href="#">Join Online Class</a></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>