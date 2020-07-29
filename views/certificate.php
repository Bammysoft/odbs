<?php require_once 'common/header.php'; ?>	<!--Page Title-->
    

    <section class="page-title" style="background-image:url(<?php echo  HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Our <span>Certificate</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Certificate</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Contact Page Section -->
	<?php if (count($display_certificates) > 0): ?>
	<?php foreach ($display_certificates as $display_certificate ): ?>
	<section class="contact-page-section" style="background-color: #15144c;  padding-bottom: 50px; padding-top: 10px;">

		<div class="auto-container" >
			<div class="inner-container">
				<h2 style="margin-bottom: 50px; color: #15144d;"><?php echo $display_certificate['fulname']; ?> <span style="color: red;">Download your Certificate</span> <span>Congratulations</span></h2>
				<form method="post" action="" enctype="">
				<div class="row clearfix">
					<div class="info-column col-lg-12 col-md-12 col-sm-12">
						<div class="inner-column">
							<a href="<?php echo HOME; ?>downloads/view?id=<?php echo $display_certificate['id'] ?>">
                    		<img src="<?php echo HOME.$display_certificate['images']; ?>" alt=""></a></h2></span>

                    		<a href="downloads/view?id=<?php echo $display_certificate['id'] ?>" class='btn btn-success'style="margin-top:15px;">Download Certificate</a>
						</div>

						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>
<?php endif; ?>

	<!-- End Team Page Section -->

	
<?php require_once 'common/footer.php'; ?>