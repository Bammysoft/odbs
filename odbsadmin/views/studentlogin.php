<?php 

require_once 'common/header.php';

 ?>

<body class="bg-dark">

  <div class="ctontainer">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Student Login to ODBS Admin</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="studentusername" value="" placeholder="Username">
          </div>
          
          <div class="form-group">
            <input type="text"  class="form-control" name="studentpassword" value="" placeholder="Password">
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
 
  <?php 
  require_once 'common/footer.php';
 ?> 
