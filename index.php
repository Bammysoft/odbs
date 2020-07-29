
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

require_once 'include/database.php';

require_once 'include/functions.php';

if(check_notification()){
  notify();
}


if($page == ''  || $page == 'home'){

  $questionandanswer_displays = $conn->prepare("SELECT id, question1, question2, question3, question3, question4, question5, question6, question7, question8, question9, question10 FROM questionandanswer LIMIT 1");
  $questionandanswer_displays->execute();
  $questionandanswer_displays = $questionandanswer_displays->fetchAll(PDO::FETCH_ASSOC);

  $download_certificates = $conn->prepare("SELECT id, fulname, images FROM certificate WHERE id = :id");
  $download_certificates->bindParam(':id', $_GET['id']);
  $download_certificates->execute();
  $download_certificates = $download_certificates->fetch(PDO::FETCH_ASSOC);


  $press_single_release = $conn->prepare("SELECT id, topic, message, admin, images FROM press WHERE id = :id");
  $press_single_release->bindParam(':id', $_GET['id']);
  $press_single_release->execute();
  $press_single_release = $press_single_release->fetch(PDO::FETCH_ASSOC);


    $press_release = $conn->prepare("SELECT id, topic, message, admin, images FROM press LIMIT 12");
    $press_release->execute();
    $press_release = $press_release->fetchAll(PDO::FETCH_ASSOC);



    $display_certificates = $conn->prepare("SELECT id, fulname, images FROM certificate LIMIT 1");
    $display_certificates->execute();
    $display_certificates = $display_certificates->fetchAll(PDO::FETCH_ASSOC);



    $members_teams = $conn->prepare("SELECT id, firstname, othername, email, face, tweet, images, insta, whatts, designation FROM team LIMIT 6");
    $members_teams->execute();
    $members_teams = $members_teams->fetchAll(PDO::FETCH_ASSOC);

    $eventsliders = $conn->prepare("SELECT id, message, images, topic FROM event LIMIT 90");
    $eventsliders->execute();
    $eventsliders = $eventsliders->fetchAll(PDO::FETCH_ASSOC);

    $training_reflect = $conn->prepare("SELECT id, course_title, message FROM training LIMIT 90");
    $training_reflect->execute();
    $training_reflect = $training_reflect->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fulname']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
      $consultations = $conn->prepare("INSERT INTO consultation(email, fulname, phone) VALUES(:email, :fulname, :phone)");
      $consultations->bindParam(':fulname', $_POST['fulname']);
      $consultations->bindParam(':email', $_POST['email']);
      $consultations->bindParam(':phone', $_POST['phone']);
      
      $consultations->execute();
      if ($consultations->rowcount() > 0) {
        // echo "<div style='text-align: center; font-type: tahoma; color: green;'>Your message has been send successfully</div>";
          create_notification("The contact '".$_POST['fulname']."' has been successfully added.", 'success');

      }else{
      create_notification("The Contact '".$_POST['fulname']."' has not been successfully added.", 'error');
        
      }
    }else{
      create_notification("The Contact '".$_POST['fulname']."' fill all field.", 'error');
     //echo "<div style='text-align: center; font-type: tahoma; color: green;'>fill all field</div>";
    }
  }



	require 'views/home.php';

//IF PAGE IS THE CONTACT PAGE

}elseif($page == 'about'){

require 'views/about.php';
}elseif($page == 'services'){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fulname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
      $odbsservices = $conn->prepare("INSERT INTO services_table(email, fulname, phone, message) VALUES(:email, :fulname, :phone, :message)");
      $odbsservices->bindParam(':email', $_POST['email']);

      $odbsservices->bindParam(':fulname', $_POST['fulname']);
      $odbsservices->bindParam(':phone', $_POST['phone']);
      $odbsservices->bindParam(':message', $_POST['message']);

      
      $odbsservices->execute();
      if ($odbsservices->rowcount() > 0) {
        // echo "<div style='text-align: center; font-type: tahoma; color: green;'>Your message has been send successfully</div>";
          create_notification("The contact '".$_POST['fulname']."' has been successfully added.", 'success');

      }else{
      create_notification("The Contact '".$_POST['fulname']."' has not been successfully added.", 'error');
        
      }
    }else{
      create_notification("The Contact '".$_POST['fulname']."' fill all field.", 'error');
     //echo "<div style='text-align: center; font-type: tahoma; color: green;'>fill all field</div>";
    }
  }
require 'views/services.php';
}elseif($page == 'team/team'){
   $members_teams = $conn->prepare("SELECT id, firstname, othername, email, face, tweet, images, insta, whatts, designation FROM team LIMIT 6");
    $members_teams->execute();
    $members_teams = $members_teams->fetchAll(PDO::FETCH_ASSOC);

require 'views/team.php';

}elseif ($page == 'careers/careers') {
  require 'views/careers.php';
}elseif ($page == 'blog') {

  $press_release = $conn->prepare("SELECT id, topic, message, admin, images FROM press LIMIT 12");
    $press_release->execute();
    $press_release = $press_release->fetchAll(PDO::FETCH_ASSOC);
  
  require_once 'views/blog.php';
}elseif ($page == 'press_single/view') {
  if(@$_GET['id'] == ''){
    header('location:'.HOME);
  }

  $press_single_release = $conn->prepare("SELECT id, id, topic, message, admin, images FROM press WHERE id = :id");
  $press_single_release->bindParam(':id', $_GET['id']);
  $press_single_release->execute();
  $press_single_release = $press_single_release->fetch(PDO::FETCH_ASSOC);

  if($press_single_release == false){
    header('location:'.HOME.'404');
  }
    $press_comments = $conn->prepare("SELECT * FROM press_comment");
    $press_comments->execute();
    $press_comments = $press_comments->fetchAll(PDO::FETCH_ASSOC);
  


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if (!empty($_POST['topic']) && !empty($_POST['comment'])) {
        $comment = $conn->prepare("INSERT INTO press_comment(topic, comment) VALUES(:topic, :comment)");
        $comment->bindParam(':topic', $_POST['topic']);
        $comment->bindParam(':comment', $_POST['comment']);
        $comment->execute();
        if ($comment->execute() > 0) {
        create_notification("Thanks ".$_POST['topic'].", for comment on  BRIXTTON  SCHOOL post ", 'success');
          
        }
      }
    }
 


  require 'views/press_single.php';
}elseif ($page == 'contact') {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fulname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
      $insertcontacts = $conn->prepare("INSERT INTO odbscontact(fulname, email, phone, message) VALUES(:fulname, :email, :phone, :message)");
      $insertcontacts->bindParam(':fulname', $_POST['fulname']);
      $insertcontacts->bindParam(':email', $_POST['email']);
      $insertcontacts->bindParam(':phone', $_POST['phone']);
      $insertcontacts->bindParam(':message', $_POST['message']);
      
      $insertcontacts->execute();
      if ($insertcontacts->rowcount() > 0) {
        // echo "<div style='text-align: center; font-type: tahoma; color: green;'>Your message has been send successfully</div>";
          create_notification("The contact '".$_POST['fulname']."' has been successfully added.", 'success');

      }else{
      create_notification("The Contact '".$_POST['fulname']."' has not been successfully added.", 'error');
        
      }
    }else{
      create_notification("The Contact '".$_POST['fulname']."' fill all field.", 'error');
     //echo "<div style='text-align: center; font-type: tahoma; color: green;'>fill all field</div>";
    }
  }
  require 'views/contact.php';
}elseif ($page == 'training/training') {
  $training_reflect = $conn->prepare("SELECT id, course_title, message FROM training LIMIT 90");
    $training_reflect->execute();
    $training_reflect = $training_reflect->fetchAll(PDO::FETCH_ASSOC);
  require 'views/training.php';
}elseif ($page == 'trainingform') {
  
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['firstname']) && $_POST['firstname'] != '' && isset($_POST['othername']) && $_POST['othername'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['phone']) && $_POST['phone'] != '' && isset($_POST['course_name']) && $_POST['course_name'] != '' && isset($_POST['message']) && $_POST['message'] != '' && isset($_POST['studentusername']) && $_POST['studentusername'] != '' && isset($_POST['studentpassword']) && $_POST['studentpassword'] != '') {

      $studentlogin = $conn->prepare("SELECT * FROM student WHERE studentusername = :studentusername");
      $studentlogin->bindParam(':studentusername', $_POST['studentusername']);
      $studentlogin->execute();
      $studentlogin = $studentlogin->fetch(PDO::FETCH_ASSOC);

      if($studentlogin == false){
        $_POST['studentpassword'] = password_hash($_POST['studentpassword'], PASSWORD_DEFAULT);

      $insertstudents = $conn->prepare("INSERT INTO student(firstname, othername, email, phone, course_name, message, studentusername, studentpassword) VALUES(:firstname, :othername, :email, :phone, :course_name, :message, :studentusername, :studentpassword)");
      $insertstudents->bindParam(':firstname', $_POST['firstname']);
      $insertstudents->bindParam(':othername', $_POST['othername']);

      $insertstudents->bindParam(':email', $_POST['email']);
      $insertstudents->bindParam(':phone', $_POST['phone']);
      $insertstudents->bindParam(':course_name', $_POST['course_name']);

      $insertstudents->bindParam(':message', $_POST['message']);
      $insertstudents->bindParam(':studentusername', $_POST['studentusername']);
      $insertstudents->bindParam(':studentpassword', $_POST['studentpassword']);

      $insertstudents->execute();
      if($insertstudents->rowCount() > 0){
          create_notification("Welcome ".$_POST['firstname'].", to ODBS TECHNOLOGY app ", 'success');
          $_SESSION['studentusername'] = $_POST['studentusername'];
        

          header('location:'.HOME.'studentadmin/login');

          
        }else{
          create_notification("An error occured. Please try again", 'error');
        }
      }else{
        create_notification("studentusername already exists, please choose another one", 'error');
      }
    }else{
      create_notification("Please fill all fields", 'error');
    }
  }

 require 'views/trainingform.php';
}elseif ($page == 'delete_students') {
    $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_staff = $conn->prepare("SELECT * FROM student WHERE id = :id");
    $delete_staff->bindParam(':id', $id);
    $delete_staff->execute();
    $delete_staff = $delete_staff->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_staff == false){
      create_notification("The staff '".$_POST['firstname']."' was not edited.", 'error');
      header('location:'.HOME.'studentservices');
      die();
    }

    $delete_staff = $conn->prepare("DELETE FROM student WHERE id = :id");
    $delete_staff->bindParam(':id', $id);

    $delete_staff->execute();
      create_notification("The staff '".$_POST['firstname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'studentservices');
  require 'views/delete_students.php';
}elseif ($page == 'certificate') {
    $display_certificates = $conn->prepare("SELECT id, fulname, images FROM certificate LIMIT 1");
    $display_certificates->execute();
    $display_certificates = $display_certificates->fetchAll(PDO::FETCH_ASSOC);
  require 'views/certificate.php';

}elseif ($page == 'downloads/view') {



    if(@$_GET['id'] == ''){
    header('location:'.HOME);
  }


  $download_certificates = $conn->prepare("SELECT id, fulname, images FROM certificate WHERE id = :id");
  $download_certificates->bindParam(':id', $_GET['id']);
  $download_certificates->execute();
  $download_certificates = $download_certificates->fetch(PDO::FETCH_ASSOC);

 

  if($download_certificates == false){
    header('location:'.HOME.'404');
  }
  require 'views/downloads.php';
}elseif ($page == 'staff/addstaff') {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_POST['account']) && !empty($_POST['bankname'])) {

      $new_staff = $conn->prepare("INSERT INTO staff(firstname,  othername, face, tweet, insta, whatts, email, designation, account, images, bankname) VALUES(:firstname, :othername, :face, :tweet, :insta, :whatts, :email, :designation, :account, :images, :bankname)");

      $new_staff->bindParam(':firstname', $_POST['firstname']);
      $new_staff->bindParam(':othername', $_POST['othername']);
      $new_staff->bindParam(':face', $_POST['face']);
      $new_staff->bindParam(':tweet', $_POST['tweet']);
      $new_staff->bindParam(':insta', $_POST['insta']);
      $new_staff->bindParam(':whatts', $_POST['whatts']);
      $new_staff->bindParam(':email', $_POST['email']);
      $new_staff->bindParam(':designation', $_POST['designation']);
      $new_staff->bindParam(':account', $_POST['account']);
      $new_staff->bindParam(':bankname', $_POST['bankname']);
      $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $target_dir = "uploads/image/";
        $new_image_name = date('Y-m-d-H-i-s') . '_' . uniqid();
        $target_file = $target_dir . $new_image_name . '.' . $imageFileType;
        $uploadOk = 1;
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            //echo "File is not an image.";
            $uploadOk = 0;
          }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 80000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ''.$target_file)) {
            $new_staff->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      $new_staff->execute();
      if ($new_staff->rowCount() > 0) {
        create_notification("Welcome ".$_POST['firstname'].", the new member has been registered successfully ", 'success');
          
      }else{

       create_notification("Welcome ".$_POST['firstname'].", the new member has not been registered successfully ", 'error');
      }
    }
  }
  require 'views/addstaff.php';
}elseif ($page == 'application') {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['fulname']) && !empty($_POST['email']) && !empty($_POST['face']) && !empty($_POST['address']) && !empty($_FILES['fileToUpload']) && !empty($_POST['phonenumber']) && !empty($_POST['position']) && !empty($_POST['quarantorname']) && !empty($_POST['quarantorphone']) && !empty($_POST['quarantoradd'])) {

      $application = $conn->prepare("INSERT INTO application(fulname, email, face, address, images, phonenumber, position, quarantorname, quarantorphone, quarantoradd) VALUES(:fulname, :email, :face, :address, :images, :phonenumber, :position, :quarantorname, :quarantorphone, :quarantoradd)");

      $application->bindParam(':fulname', $_POST['fulname']);
      $application->bindParam(':email', $_POST['email']);
      $application->bindParam(':face', $_POST['face']);
      $application->bindParam(':address', $_POST['address']);
      $application->bindParam(':phonenumber', $_POST['phonenumber']);
      $application->bindParam(':position', $_POST['position']);
      $application->bindParam(':quarantorname', $_POST['quarantorname']);
      $application->bindParam(':quarantorphone', $_POST['quarantorphone']);
      $application->bindParam(':quarantoradd', $_POST['quarantoradd']);
      $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $target_dir = "uploads/image/";
        $new_image_name = date('Y-m-d-H-i-s') . '_' . uniqid();
        $target_file = $target_dir . $new_image_name . '.' . $imageFileType;
        $uploadOk = 1;
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            //echo "File is not an image.";
            $uploadOk = 0;
          }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 80000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ''.$target_file)) {
            $application->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      $application->execute();
      if ($application->rowCount() > 0) {
        create_notification("Welcome ".$_POST['fulname'].", the new member has been registered successfully ", 'success');
          
      }else{

       	create_notification("Welcome ".$_POST['fulname'].", the new member has not been registered successfully ", 'error');
      }
    }
  }
  require 'views/application.php';
}elseif ($page == 'training_test') {
	
	$questionandanswer_displays = $conn->prepare("SELECT id, question1, question2, question3, question3, question4, question5, question6, question7, question8, question9, question10 FROM questionandanswer LIMIT 1");
  $questionandanswer_displays->execute();
  $questionandanswer_displays = $questionandanswer_displays->fetchAll(PDO::FETCH_ASSOC);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fulname']) && !empty($_POST['email']) && !empty($_POST['answerquestion1']) && !empty($_POST['answerquestion2']) && !empty($_POST['answerquestion3']) && !empty($_POST['answerquestion4']) && !empty($_POST['answerquestion5']) && !empty($_POST['answerquestion6']) && !empty($_POST['answerquestion7']) && !empty($_POST['answerquestion8']) && !empty($_POST['answerquestion9']) && !empty($_POST['answerquestion10'])) {
      $consultations = $conn->prepare("INSERT INTO answertest(email, fulname, answerquestion1, answerquestion2, answerquestion3, answerquestion4, answerquestion5, answerquestion6, answerquestion7, answerquestion8, answerquestion9, answerquestion10) VALUES(:email, :fulname, :answerquestion1, :answerquestion2, :answerquestion3, :answerquestion4, :answerquestion5, :answerquestion6, :answerquestion7, :answerquestion8, :answerquestion9, :answerquestion10)");
      $consultations->bindParam(':fulname', $_POST['fulname']);
      $consultations->bindParam(':email', $_POST['email']);
      $consultations->bindParam(':answerquestion1', $_POST['answerquestion1']);
      $consultations->bindParam(':answerquestion2', $_POST['answerquestion2']);
      $consultations->bindParam(':answerquestion3', $_POST['answerquestion3']);
      $consultations->bindParam(':answerquestion4', $_POST['answerquestion4']);
      $consultations->bindParam(':answerquestion5', $_POST['answerquestion5']);
      $consultations->bindParam(':answerquestion6', $_POST['answerquestion6']);
      $consultations->bindParam(':answerquestion7', $_POST['answerquestion7']);
      $consultations->bindParam(':answerquestion8', $_POST['answerquestion8']);
      $consultations->bindParam(':answerquestion9', $_POST['answerquestion9']);
      $consultations->bindParam(':answerquestion10', $_POST['answerquestion10']);
      $consultations->execute();
      if ($consultations->rowcount() > 0) {
        // echo "<div style='text-align: center; font-type: tahoma; color: green;'>Your message has been send successfully</div>";
          create_notification("The contact '".$_POST['fulname']."' has been successfully added.", 'success');

      }else{
      create_notification("The Contact '".$_POST['fulname']."' has not been successfully added.", 'error');
        
      }
    }else{
      create_notification("The Contact '".$_POST['fulname']."' fill all field.", 'error');
     //echo "<div style='text-align: center; font-type: tahoma; color: green;'>fill all field</div>";
    }
  }
	require 'views/training_test.php';
}elseif ($page == 'addstaff') {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_POST['account']) && !empty($_POST['bankname'])) {

      $new_staff = $conn->prepare("INSERT INTO staff(firstname,  othername, face, tweet, insta, whatts, email, designation, account, images, bankname) VALUES(:firstname, :othername, :face, :tweet, :insta, :whatts, :email, :designation, :account, :images, :bankname)");

      $new_staff->bindParam(':firstname', $_POST['firstname']);
      $new_staff->bindParam(':othername', $_POST['othername']);
      $new_staff->bindParam(':face', $_POST['face']);
      $new_staff->bindParam(':tweet', $_POST['tweet']);
      $new_staff->bindParam(':insta', $_POST['insta']);
      $new_staff->bindParam(':whatts', $_POST['whatts']);
      $new_staff->bindParam(':email', $_POST['email']);

      $new_staff->bindParam(':designation', $_POST['designation']);
      $new_staff->bindParam(':account', $_POST['account']);
      $new_staff->bindParam(':bankname', $_POST['bankname']);

      $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        
        $target_dir = "uploads/image/";
        $new_image_name = date('Y-m-d-H-i-s') . '_' . uniqid();
        $target_file = $target_dir . $new_image_name . '.' . $imageFileType;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
      
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            //echo "File is not an image.";
            $uploadOk = 0;
          }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 80000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ''.$target_file)) {
            $new_staff->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      
      $new_staff->execute();
      if ($new_staff->rowCount() > 0) {
        create_notification("Welcome ".$_POST['firstname'].", the new member has been registered successfully ", 'success');
          
      }else{

       create_notification("Welcome ".$_POST['firstname'].", the new member has not been registered successfully ", 'error');

      }
      
    }
  }

  require 'views/addstaff.php';
}elseif ($page == 'disclaimer') {
 
 require 'views/disclaimer.php';
}
else{
	require 'views/404.php';
}