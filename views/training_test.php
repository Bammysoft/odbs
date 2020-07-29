<?php require_once 'common/header.php'; ?>

    <!--End Main Header -->
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/odbs4.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Training  <span>Test</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Contact Page Section -->

  
	<section class="contact-page-section">
		<div class="auto-container">
			<div class="inner-container">
				<h2>ODBS Trainning Questions</span></h2>
				<div class="row clearfix">
					<?php if (count($questionandanswer_displays) > 0): ?>
                 <?php foreach ($questionandanswer_displays as $questionandanswer_display): $id = $questionandanswer_display['id']; $date = date('d-m-Y'); ?>
				<div class="services-block-fifteen col-lg-12 col-md-12 col-sm-12">
		<!-- <div class="card mb-3"> -->
          <div class="card-header"></div>
          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full Name<input class="form-control" type="text" name="fulname" placeholder="Full Name"></th>
                      <th>Email<input class="form-control" type="text" name="email" placeholder="Email"></th>
                    </tr>
                  </thead>
           
                  <tbody>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 1 </h6><?php echo $questionandanswer_display['question1']; ?></td>
                      <td><textarea class="form-control" name="answerquestion1" placeholder="Answer Question1"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 2 </h6><?php echo $questionandanswer_display['question2']; ?></td>
                      <td><textarea class="form-control" name="answerquestion2" placeholder="Answer Question2"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 3 </h6><?php echo $questionandanswer_display['question3']; ?></td>
                      <td><textarea class="form-control" name="answerquestion3" placeholder="Answer Question3"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 4 </h6><?php echo $questionandanswer_display['question4']; ?></td>
                      <td><textarea class="form-control" name="answerquestion4" placeholder="Answer Question4"></textarea></td>
                    </tr>

                    <tr>
                      <td style="color: red;"><h6>QUESTION 5 </h6><?php echo $questionandanswer_display['question5']; ?></td>
                      <td><textarea class="form-control" name="answerquestion5" placeholder="Answer Question5"></textarea></td>
                    </tr>
                  
                  	<tr>
                      <td style="color: red;"><h6>QUESTION 6 </h6><?php echo $questionandanswer_display['question6']; ?></td>
                      
                      <td><textarea class="form-control" name="answerquestion6" placeholder="Answer Question6"></textarea></td>
                    </tr>

                    <tr>
                      <td style="color: red;"><h6>QUESTION 7 </h6><?php echo $questionandanswer_display['question7']; ?></td>
                      
                      <td><textarea class="form-control" name="answerquestion7" placeholder="Answer Question7"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 8 </h6><?php echo $questionandanswer_display['question8']; ?></td>
                    
                      <td><textarea class="form-control" name="answerquestion8" placeholder="Answer Question8"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 9 </h6><?php echo $questionandanswer_display['question9']; ?></td>
                      <td><textarea class="form-control" name="answerquestion9" placeholder="Answer Question9"></textarea></td>
                    </tr>
                    <tr>
                      <td style="color: red;"><h6>QUESTION 10 </h6><?php echo $questionandanswer_display['question8']; ?></td>
                      <td><textarea class="form-control" name="answerquestion10" placeholder="Answer Question10"></textarea></td>
                      <td><button class="btn btn-sucess" type="submit">Submit</button></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
<?php endforeach; ?>
<?php endif; ?>
      </div>
				</div>
			</div>
		</div>
	</div>
</section>
	<!-- End Team Page Section -->
	
	
	
	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>