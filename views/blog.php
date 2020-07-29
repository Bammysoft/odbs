<?php require_once 'common/header.php'; ?>	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Our Latest <span>Blog</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Blog grid</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Blog Grid Section -->
	<section class="blog-grid-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">News grid</div>
				<h2>We update with information with <span>experience</span></h2>
			</div>
			<div class="row clearfix">
			<?php if (count($press_release) > 0): ?>
            <?php foreach ($press_release as $press_releases): $id = $press_releases['id']; $images = $press_releases['images']; $date = date('d-m-Y'); ?>
                  <!-- Info Column -->
				<!-- News Block Three -->
				<div class="news-block-three col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>">
                    		<img style="width: 1000px; height: 200px;" src="<?php echo HOME.$press_releases['images']; ?>" alt=""></a></h2></span>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li><span class="fa fa-calendar"></span><?php echo $date; ?></li>
								<li><span class="fa fa-user"></span><?php echo $press_releases['admin']; ?></li>
							</ul>
							<h4><a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>"><?php echo $press_releases['topic']; ?></a></h4>
						</div>
					</div>
				</div>

				<?php endforeach; ?>
				<?php endif; ?>
			
			</div>		
			
		</div>
	</section>
	<!-- End Blog Grid Section -->
	
	<?php require_once 'common/footer.php'; ?>