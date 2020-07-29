<?php require_once 'common/header.php'; ?>	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>BLOG <span>Details</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Blog Details</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img style="height: 550px;" src="<?php echo HOME.$press_single_release['images']; $date = new  dateTime("now"); ?>" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="fa fa-calendar"></span><?php echo date_format($date, "d F Y h:i:s a"); ?></li>
									<li><span class="fa fa-user"></span><?php echo $press_single_release['admin']; ?></li>
								</ul>
								<h4><?php echo $press_single_release['topic']; ?></h4>
								<div class="text">
									<p><?php echo $press_single_release['message']; ?></p>
								</div>
							</div>
						</div>
						
						<!--Comments Area-->
						
						
						<!-- Comment Form -->
						<div class="comment-form" style="margin-top: 50px;">
							<div class="group-title">
								<h6>Post A Comment</h6>
							</div>
							<!--Comment Form-->
							<form method="post" action="">
								<div class="row clearfix">
									<h6 style="color: blue; margin-bottom: 20px;">Posts Topic</h6>
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<select class="form-control" name="topic">
											<option><?php echo $press_single_release['topic']; ?></option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="comment" placeholder="Your comment"></textarea>
									</div>
								
									<div class="col-lg-4 col-md-4 col-sm-12 form-group">
										<button class="theme-btn submit-btn" type="submit" name="submit-form">Post Comment</button>
									</div>
									
								</div>
							</form>
								
						</div>
						<!--End Comment Form -->
						<?php if (count($press_comments) > 0): ?>
            			<?php foreach ($press_comments as $press_comment): $id = $press_comment['id'];  ?>
						<div class="comments-area">
							<div class="group-title">
								<h6>Comments</h6>
							</div>
							<!--Comment Box-->
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="images/resource/author-8.jpg" alt=""></div>
									<div class="comment-inner clearfix">
										<div class="comment-info clearfix"><strong><?php echo $press_comment['topic']; $date = new  dateTime("now"); ?> </strong><div class="comment-time"> <?php echo date_format($date, "d F Y h:i:s a"); ?> </div></div>
										<div class="col-lg-12 col-md-12 col-sm-12 form-group">
											<p style="color: red;"><?php echo $press_comment['comment']; ?></p>
										</div>
										
									</div>
								</div>
							</div>

						</div>
						<!--End Comments Area-->

						<?php endforeach; ?>
					<?php endif; ?>
					</div>
				</div>
				
				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar default-sidebar">
						
						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="post" action="">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter Your Keyword..." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
					
						<!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title-two">
                                <h4>Categories</h4>
                            </div>
                            <ul class="blog-cat-two">
                                <li><a href="<?php echo HOME; ?>blog"><?php echo $press_single_release['topic'];  $date = date('d-m-Y'); ?> <span><?php echo $date; ?></span></a></li>
                                
                            </ul>
                        </div>
						
						<!-- Popular Post Widget-->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title-two">
                                <h4>Current Press</h4>
                            </div>
							
							<article class="post">
								<figure class="post-thumb"><img src="<?php echo HOME. $press_single_release['images'] ?>" alt=""><a href="blog" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="<?php echo HOME; ?>blog"><?php echo $press_single_release['topic']; ?></a></div>
								<div class="post-info"><?php echo $date; ?></div>
							</article>
							
							<article class="post">
								<figure class="post-thumb"><img src="<?php echo HOME. $press_single_release['images'] ?>" alt=""><a href="blog" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="<?php echo HOME; ?>blog"><?php echo $press_single_release['topic']; ?></a></div>
								<div class="post-info"><?php echo $date; ?></div>
							</article>
							
							<article class="post">
								<figure class="post-thumb"><img src="<?php echo HOME. $press_single_release['images'] ?>" alt=""><a href="blog" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="<?php echo HOME; ?>blog"><?php echo $press_single_release['topic']; ?></a></div>
								<div class="post-info"><?php echo $date; ?></div>
							</article>
							
						</div>
						
						
						<!--Gallery Widget-->
                        <div class="sidebar-widget instagram-widget">
                            <div class="sidebar-title-two">
                                <h4>Gallery</h4>
                            </div>
							<div class="images-outer clearfix">
                                <!--Image Box-->
                                <figure class="image-box"><a href="<?php echo HOME.$press_single_release['images']; ?>" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
                                <img src="<?php echo HOME.$press_single_release['images']; ?>" alt=""></figure>
                                
                            </div>
						</div>
					</aside>
				</div>
				
			</div>
		</div>
	</div>
	<!--End Sidebar Page Container-->
	
	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>