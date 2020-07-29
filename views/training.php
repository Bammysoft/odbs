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
	
	<!-- Services Section Eight -->
	<section class="services-section-eight">
		<div class="auto-container">
			<!-- Sec Title Two -->
			<div class="sec-title-two brown">
				<div class="sec-title centered">
				<div class="title" style="color: #15144d;">Service</esdiv>
				<h2 style="color: #15144d;">We are ICT leaders <br> with so<span> Much to offer</span></h2>
				<h4 style="color: #15144d;">Become a software developer <br> in one of the following<span> Courses</span></h4>

			</div>
			</div>
			<div class="row clearfix">
			<!-- Content Column -->
			<div class="content-column col-lg-12 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="row clearfix">
						<?php if (count($training_reflect) > 0): ?>
				<?php foreach ($training_reflect as $training_reflects ): ?>
						<!-- Services Block Eleven -->
						<div class="services-block-eleven col-lg-4 col-md-6 col-sm-12">
							<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="border-one"></div>
								<div class="border-two"></div>
								<div class="content">
									<div class="icon-box">
										<span class="icon fa fa-bullhorn"></span>
									</div>
									<h6><a href="<?php echo HOME; ?>trainingform"><?php echo $training_reflects['course_title']; ?></a></h6>
									<div class="text" style="color: red;"><?php echo $training_reflects['message']; ?></div>
									 <span><a href="<?php echo HOME; ?>trainingform" class="theme-btn btn-style-ten">Register Now</a></span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- End Services Section Eight -->
	
	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>