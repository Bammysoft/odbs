<?php 

require_once 'common/header.php';

 ?>
<!-- background-image: url(<?php //echo HOME; ?>images/odbs5.jpg); -->
<body style="background-color: #010041; background-repeat: no-repeat; background-size: cover; background-position: center;">
  <div class="text-center">
    <img style="width: 200px; height: 200px;" src="<?php echo HOME; ?>images/logo4.jpg">
    <h3 style="color: #fff;">...ODBS Technology</h3>
  </div>

  <div class="ctontainer">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="color: red;">Student Login to ODBS Admin</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="studentusername" placeholder="Username">
          </div>
          
          <div class="form-group">
            <input type="text"  class="form-control" name="studentpassword" placeholder="Password">
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
 
  <?php 
  require_once 'common/footer.php';
 ?> 
