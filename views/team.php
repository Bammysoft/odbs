<?php require_once 'common/header.php'; ?>	

<style type="text/css">
	.image{
		border-radius: 50%;
		height: 300px;
		width: 100%;
	}
</style>
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Team <span>Member</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Pages</li>
					<li>Team</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
		<!-- Team Page Section -->
	<section class="team-page-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				
				<h2 style="color: #15144d;">Our Expert <span>Team</span></h2>
			</div>
			
			<div class="row clearfix">
				<?php if (count($members_teams) > 0): ?>
				<?php foreach ($members_teams as $member_team ): ?>
				<!--Team Block-->
				<div class="team-block-two style-two col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="#"><img class="imager" src="<?php echo HOME. $member_team['images']; ?>" alt="" title=""></a>
							<ul class="social-box">
								<li><a href="<?php echo $member_team['face']; ?>" class="fa fa-facebook"></a></li>
								<li><a href="<?php echo $member_team['tweet']; ?>" class="fa fa-twitter"></a></li>
								<li><a href="<?php echo $member_team['insta']; ?>" class="fa fa-instagram"></a></li>
								<li><a href="<?php echo $member_team['whatts']; ?>" class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="#"><?php echo $member_team['firstname']; ?> <?php echo $member_team['othername']; ?></a></h5>
							<div class="designation"><?php echo $member_team['designation']; ?></div>
						</div>
					</div>
				</div>
				
				
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
			
		</div>
	</section>
	<!-- End Team Page Section -->
	
	<?php require_once 'common/footer.php'; ?>