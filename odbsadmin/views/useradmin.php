<?php 

require_once 'common/header.php';

 ?>

<body style="background-image: url(images/logo4.jpg);background-position: center; background-repeat: no-repeat; background-size: cover; " >
  <div class="text-center" style="padding-top: 50px;">
      <img class="img-responsive">
      <h2 style="color: #000141; padding-bottom: 20px;"> WELCOME TO ODBS TECHNOLOGY <br>PORTALS</h2>
  </div>
  <div class="ctontainer">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="color: red">Register to ODBS Admin</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="username" value="" placeholder="Username">
          </div>
          
          <div class="form-group">
            <input type="password"  class="form-control" name="password" value="" placeholder="Password">
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
 
  <?php 
  require_once 'common/footer.php';
 ?> 
