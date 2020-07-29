<?php 

require 'common/header.php';



 ?>
	
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
 

  <section class="contact-page-section" style="background-color: #96908f;  padding-bottom: 50px; padding-top: 10px;">

    <div class="auto-container" >
      <div class="inner-container">
        <h2 style="margin-bottom: 50px; color: #15144d;"></h2>
            <form method="post" action="" enctype="">
              <div class="row clearfix">
                <div class="info-column col-lg-12 col-md-12 col-sm-12">
                  <div class="inner-column">
                      <img style="height: 550px;" src="<?php echo HOME.$download_certificates['images']; ?>" alt="" />
                  </div>

                  <div class="form-group">
                    <span><h4><?php echo $download_certificates['fulname']; ?></h4></span>
                  </div>

                  <div class="form-group">

                    <!-- <td><?php //echo $file['downloads']; ?></td> -->
                    <!-- <td><a href="uploads/image/?file_id=<?php// echo $file['id'] ?>">Download</a></td> -->
                    <a href='#'>Click here to download PDF</a><br>
                  </div>
                  <button class="btn-primary" style="margin-bottom: 50px;" onclick="print_current_page();">Print this page</button>


                  <
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>


<script type="text/javascript">
   function print_current_page(){
    window.print();
   
 </script>
 
  <?php 
  require_once 'common/footer.php';
 ?> 

	