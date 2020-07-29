
<?php
session_start();

// define("HOME", 'http://'.$_SERVER['HTTP_HOST'].pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME).'/');
define("HOME", 'http://'.$_SERVER['HTTP_HOST'].pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME).'/');
define("ASSETS", HOME.'assets/');

define("CSS", HOME.'css/');
define("JS", HOME.'js/');
define("IMAGES", HOME.'images/');

define("FONTS", HOME.'fonts/');

$page = isset($_GET['page'])?$_GET['page']:'';

$page = rtrim($page, '/');

require_once '../include/database.php';

require_once 'include/functions.php';

if(check_notification()){
  notify();
}


if($page == ''  || $page == 'studentaccount'){
//redirect_no_login();
  $studentaccounts = $conn->prepare("SELECT id, firstname, othername, email, phone, course_name, message, studentusername, images FROM  student WHERE studentusername = :studentusername");
  $studentaccounts->bindParam(':studentusername', $_SESSION['studentusername']);
  $studentaccounts->execute();
  $studentaccount = $studentaccounts->fetch(PDO::FETCH_ASSOC);
  require 'views/studentaccount.php';

}elseif ($page == 'login') {
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['studentusername']) && $_POST['studentusername'] != '' && isset($_POST['studentpassword']) && $_POST['studentpassword'] != ''){

      $users = $conn->prepare("SELECT * FROM student WHERE studentusername = :studentusername");
      $users->bindParam(':studentusername', $_POST['studentusername']);
      $users->execute();
      $users = $users->fetch(PDO::FETCH_ASSOC);

      if($users != false){
        if(password_verify($_POST['studentpassword'], $users['studentpassword'])){
          $_SESSION['studentusername'] = $_POST['studentusername'];
        
          header('location:'.HOME.'studentaccount');
        }else{
          create_notification("studentPassword is incorrect", 'error');
        }
      }else{
        create_notification("studentUsername does not exist", 'error');
      }
    }else{
      create_notification("Please fill all fields", 'error');
    }
  }
  require 'views/login.php';

}elseif ($page == 'logout') {
  logout();
  require 'views/logout.php';
}else{
  require 'views/404.php';
}