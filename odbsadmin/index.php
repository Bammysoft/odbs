
<?php
session_start();

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

if($page == ''  || $page == 'login'){

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != ''){

      $users = $conn->prepare("SELECT * FROM users WHERE username = :username");
      $users->bindParam(':username', $_POST['username']);
      $users->execute();
      $users = $users->fetch(PDO::FETCH_ASSOC);

      if($users != false){
        if(password_verify($_POST['password'], $users['password'])){
          $_SESSION['username'] = $_POST['username'];
        
          header('location:'.HOME.'contact');
        }else{
          create_notification("Password is incorrect", 'error');
        }
      }else{
        create_notification("Username does not exist", 'error');
      }
    }else{
      create_notification("Please fill all fields", 'error');
    }
  }

	require 'views/login.php';

//IF PAGE IS THE CONTACT PAGE

}elseif ($page == 'dashboard') {
redirect_no_login();
$odbscontacts = $conn->prepare("SELECT * FROM odbscontact");
  $odbscontacts->execute();
  $odbscontacts = $odbscontacts->fetchAll(PDO::FETCH_ASSOC);



   $consultations = $conn->prepare("SELECT * FROM consultation");
  $consultations->execute();
  $consultations = $consultations->fetchAll(PDO::FETCH_ASSOC);
  require 'views/dashboard.php';
}elseif($page == 'contact'){
 redirect_no_login();

  $odbscontacts = $conn->prepare("SELECT * FROM odbscontact");
  $odbscontacts->execute();
  $odbscontacts = $odbscontacts->fetchAll(PDO::FETCH_ASSOC);
require 'views/contact.php';
}elseif ($page == 'delete_odbscontact') {
redirect_no_login();

 $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_odbscontacts = $conn->prepare("SELECT * FROM odbscontact WHERE id = :id");
    $delete_odbscontacts->bindParam(':id', $id);
    $delete_odbscontacts->execute();
    $delete_odbscontacts = $delete_odbscontacts->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_odbscontacts == false){
      create_notification("The Contact '".$_POST['name']."' was not edited.", 'error');
      header('location:'.HOME.'contact');
      die();
    }

    $delete_odbscontacts = $conn->prepare("DELETE FROM odbscontact WHERE id = :id");
    $delete_odbscontacts->bindParam(':id', $id);

    $delete_odbscontacts->execute();
      create_notification("The contact '".$_POST['name']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'contact');

  
  require 'views/delete_odbscontact.php';

}elseif ($page == 'consultation') {
 redirect_no_login();
  $consultations = $conn->prepare("SELECT * FROM consultation");
  $consultations->execute();
  $consultations = $consultations->fetchAll(PDO::FETCH_ASSOC);
  require 'views/consultation.php';
}elseif ($page == 'delete_consultation') {
 redirect_no_login();
   $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_consultations = $conn->prepare("SELECT * FROM consultation WHERE id = :id");
    $delete_consultations->bindParam(':id', $id);
    $delete_consultations->execute();
    $delete_consultations = $delete_consultations->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_consultations == false){
      create_notification("The Contact '".$_POST['fulname']."' was not edited.", 'error');
      header('location:'.HOME.'consultation');
      die();
    }

    $delete_consultations = $conn->prepare("DELETE FROM consultation WHERE id = :id");
    $delete_consultations->bindParam(':id', $id);

    $delete_consultations->execute();
      create_notification("The contact '".$_POST['fulname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'consultation');
  require 'views/delete_consultation.php';

}elseif($page == 'sevices_tables'){
 redirect_no_login();
  $services_tables = $conn->prepare("SELECT * FROM services_table");
  $services_tables->execute();
  $services_tables = $services_tables->fetchAll(PDO::FETCH_ASSOC);
  require 'views/sevices_tables.php';
}elseif($page == 'delete_services'){
 
redirect_no_login();

 $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_services = $conn->prepare("SELECT * FROM services_table WHERE id = :id");
    $delete_services->bindParam(':id', $id);
    $delete_services->execute();
    $delete_services = $delete_services->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_services == false){
      create_notification("The Contact '".$_POST['fulname']."' was not edited.", 'error');
      header('location:'.HOME.'sevices_tables');
      die();
    }

    $delete_services = $conn->prepare("DELETE FROM services_table WHERE id = :id");
    $delete_services->bindParam(':id', $id);

    $delete_services->execute();
      create_notification("The contact '".$_POST['fulname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'sevices_tables');

  require 'views/delete_services.php';

}elseif ($page == 'team') {
 redirect_no_login();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts'])) {

      $new_team = $conn->prepare("INSERT INTO team(firstname, othername, face, tweet, email, designation, images, insta, whatts) VALUES(:firstname, :othername, :face, :tweet,  :email, :designation, :images, :insta, :whatts)");

      $new_team->bindParam(':firstname', $_POST['firstname']);
      $new_team->bindParam(':othername', $_POST['othername']);
      $new_team->bindParam(':face', $_POST['face']);
      $new_team->bindParam(':tweet', $_POST['tweet']);
      $new_team->bindParam(':insta', $_POST['insta']);
      $new_team->bindParam(':whatts', $_POST['whatts']);
      $new_team->bindParam(':email', $_POST['email']);

      $new_team->bindParam(':designation', $_POST['designation']);
      
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

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $new_team->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      
      $new_team->execute();
      if ($new_team->rowCount() > 0) {
        create_notification("Welcome ".$_POST['firstname'].", the new member has been registered successfully ", 'success');
          
      }else{

       create_notification("Welcome ".$_POST['firstname'].", the new member has not been registered successfully ", 'error');

      }
      
    }
  }

  require 'views/team.php';
}elseif ($page == 'team_tables') {
 redirect_no_login();
    $team_members = $conn->prepare("SELECT * FROM team");
    $team_members->execute();
    $team_members = $team_members->fetchAll(PDO::FETCH_ASSOC);
  require_once 'views/team_tables.php';

}elseif ($page == 'edit_team') {
 redirect_no_login();

   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts'])) {

        $edit_team = $conn->prepare("UPDATE team SET firstname = :firstname, othername = :othername, face = :face, tweet = :tweet, insta = :insta, whatts = :whatts, email = :email, designation = :designation, images = :images WHERE id = :id");

        $edit_team->bindParam(':firstname', $_POST['firstname']);
        $edit_team->bindParam(':othername', $_POST['othername']);
        $edit_team->bindParam(':face', $_POST['face']);
        $edit_team->bindParam(':tweet', $_POST['tweet']);
        $edit_team->bindParam(':insta', $_POST['insta']);
        $edit_team->bindParam(':whatts', $_POST['whatts']);
        $edit_team->bindParam(':email', $_POST['email']);
        $edit_team->bindParam(':designation', $_POST['designation']);
        
        $edit_team->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_team->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_team->execute()) {
          $edit_teams = $_POST;
          $edit_teams['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['firstname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['firstname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_teams = $conn->prepare("SELECT * FROM team WHERE id = :id");
    $edit_teams->bindParam(':id', $id);
    $edit_teams->execute();
    $edit_teams = $edit_teams->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_teams == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/edit_team.php';
}elseif ($page == 'view_team') {
 redirect_no_login();

  $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts'])) {

        $view_team = $conn->prepare("UPDATE team SET firstname = :firstname, othername = :othername, face = :face, tweet = :tweet, insta = :insta, whatts = :whatts, email = :email, designation = :designation, images = :images WHERE id = :id");

        $view_team->bindParam(':firstname', $_POST['firstname']);
        $view_team->bindParam(':othername', $_POST['othername']);
        $view_team->bindParam(':face', $_POST['face']);
        $view_team->bindParam(':tweet', $_POST['tweet']);
        $view_team->bindParam(':insta', $_POST['insta']);
        $view_team->bindParam(':whatts', $_POST['whatts']);
        $view_team->bindParam(':email', $_POST['email']);
        $view_team->bindParam(':designation', $_POST['designation']);
        
        $view_team->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $view_team->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($view_team->execute()) {
          $view_teams = $_POST;
          $view_teams['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['firstname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['firstname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $view_teams = $conn->prepare("SELECT * FROM team WHERE id = :id");
    $view_teams->bindParam(':id', $id);
    $view_teams->execute();
    $view_teams = $view_teams->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_teams == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/view_team.php';
}elseif ($page == 'delete_team') {
 redirect_no_login();

  $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_services = $conn->prepare("SELECT * FROM team WHERE id = :id");
    $delete_services->bindParam(':id', $id);
    $delete_services->execute();
    $delete_services = $delete_services->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_services == false){
      create_notification("The Contact '".$_POST['fulname']."' was not edited.", 'error');
      header('location:'.HOME.'team_tables');
      die();
    }

    $delete_services = $conn->prepare("DELETE FROM team WHERE id = :id");
    $delete_services->bindParam(':id', $id);

    $delete_services->execute();
      create_notification("The contact '".$_POST['fulname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'team_tables');
  require 'views/delete_team.php';
}elseif ($page == 'event') {
 redirect_no_login();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['message']) && !empty($_POST['topic']) && !empty($_FILES['fileToUpload'])) {

      $new_postevent = $conn->prepare("INSERT INTO event(message, images, topic) VALUES(:message, :images, :topic)");

      $new_postevent->bindParam(':message', $_POST['message']);
      $new_postevent->bindParam(':topic', $_POST['topic']);

      
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
        if ($_FILES["fileToUpload"]["size"] > 800000000) {
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

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $new_postevent->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      
      $new_postevent->execute();
      if ($new_postevent->rowCount() > 0) {
        create_notification("Welcome, you have post event successfully ", 'success');
          
      }else{

       create_notification("Sorry, you have not post event successfully successfully ", 'error');

      }
      
    }
  }

  require 'views/event.php';
}elseif ($page == 'event_tables') {
 redirect_no_login();
  $post_events_tables = $conn->prepare("SELECT * FROM event");
  $post_events_tables->execute();
  $post_events_tables = $post_events_tables->fetchAll(PDO::FETCH_ASSOC);
  require 'views/event_tables.php';
}elseif ($page == 'edit_event') {
 redirect_no_login();
  $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['message']) && !empty($_POST['topic']) && !empty($_FILES['fileToUpload'])) {

        $edit_event = $conn->prepare("UPDATE event SET message = :message, images = :images, topic = :topic WHERE id = :id");

        $edit_event->bindParam(':message', $_POST['message']);
      $new_postevent->bindParam(':topic', $_POST['topic']);

        
        $edit_event->bindParam(':id', $id);
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
        if ($_FILES["fileToUpload"]["size"] > 800000000) {
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
          create_notification("The Passport  has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_event->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_event->execute()) {
          $edit_events = $_POST;
          $edit_events['id'] = $id;
        }else{
        create_notification("Your event has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your event has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }

    //CHECK THAT THE NOTE EXISTS

    $edit_events = $conn->prepare("SELECT * FROM event WHERE id = :id");
    $edit_events->bindParam(':id', $id);
    $edit_events->execute();
    $edit_events = $edit_events->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_events == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'event_tables');
      //die();
    }
  }

  require 'views/edit_event.php';
}elseif ($page == 'view_event') {
 redirect_no_login();
  $id = @$_GET['id'];
  
  if ($id != '') {

    //CHECK IF FORM IS SUBMITTED
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      //CHECK THAT THE FIELDS ARE NOT EMPTY
    
     if (!empty($_POST['message']) && !empty($_FILES['fileToUpload'])) {

        $view_event = $conn->prepare("SELECT * FROM event WHERE id = :id");

        $view_event->bindParam(':message', $_POST['message']);
        }else{
          ////set_status('success', 'The note "'.$view_post['topic'].'" by '.$view_post['name'].' was deleted successfully.');
        }

      }else{
        ////set_status('error', 'Please fill all fields.');
      }
    }

    //CHECK THAT THE NOTE EXISTS

    $view_events = $conn->prepare("SELECT * FROM event WHERE id = :id");
    $view_events->bindParam(':id', $id);
    $view_events->execute();
    $view_events = $view_events->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_events == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'event_tables');
      //die();
    }
  require 'views/view_event.php';
}elseif ($page == 'delete_event') {
 redirect_no_login();
     $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_events = $conn->prepare("SELECT * FROM event WHERE id = :id");
    $delete_events->bindParam(':id', $id);
    $delete_events->execute();
    $delete_events = $delete_events->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_events == false){
      create_notification("The event was not edited.", 'error');
      header('location:'.HOME.'event_tables');
      
    }

    $delete_events = $conn->prepare("DELETE FROM event WHERE id = :id");

    $delete_events->bindParam(':id', $id);

    $delete_events->execute();
      create_notification("The event has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'event_tables');
  require 'views/delete_event.php';
}elseif ($page == 'blog') {
 redirect_no_login();
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['topic']) && !empty($_POST['admin']) && !empty($_POST['message']) && !empty($_FILES['fileToUpload'])) {

      $press = $conn->prepare("INSERT INTO press(topic, images, admin, message) VALUES(:topic, :images, :admin, :message)");

      $press->bindParam(':topic', $_POST['topic']);
      $press->bindParam(':message', $_POST['message']);
      $press->bindParam(':admin', $_POST['admin']);
      
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

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $press->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      
      $press->execute();
      if ($press->rowCount() > 0) {
        create_notification("Welcome ".$_POST['topic'].", the new member has been registered successfully ", 'success');
          
      }else{

       create_notification("Welcome ".$_POST['topic'].", the new member has not been registered successfully ", 'error');

      }
      
    }
  }
  require 'views/blog.php';
}elseif ($page == 'press_tables') {
 redirect_no_login();
    $press_releases = $conn->prepare("SELECT * FROM press");
    $press_releases->execute();
    $press_releases = $press_releases->fetchAll(PDO::FETCH_ASSOC);
  require 'views/press_tables.php';
}elseif ($page == 'edit_press') {
 redirect_no_login();
   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['topic']) && !empty($_POST['admin']) && !empty($_POST['message']) && !empty($_FILES['fileToUpload'])) {

        $edit_pres = $conn->prepare("UPDATE press SET topic = :topic, admin = :admin, message = :message, images = :images WHERE id = :id");

        $edit_pres->bindParam(':topic', $_POST['topic']);
        $edit_pres->bindParam(':admin', $_POST['admin']);
        $edit_pres->bindParam(':message', $_POST['message']);
        
        $edit_pres->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['topic']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_pres->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_pres->execute()) {
          $edit_press = $_POST;
          $edit_press['id'] = $id;
        }else{
        create_notification("Your press '".$_POST['topic']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your press '".$_POST['topic']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }

    //CHECK THAT THE NOTE EXISTS

    $edit_press = $conn->prepare("SELECT * FROM press WHERE id = :id");
    $edit_press->bindParam(':id', $id);
    $edit_press->execute();
    $edit_press = $edit_press->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_press == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'press_tables');
      //die();
    }
  }
  require 'views/edit_press.php';
}elseif ($page == 'view_press') {
 redirect_no_login();
  $id = @$_GET['id'];
  
  if ($id != '') {

    //CHECK IF FORM IS SUBMITTED
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //CHECK THAT THE FIELDS ARE NOT EMPTY
      if (!empty($_POST['topic']) && !empty($_POST['admin']) && !empty($_POST['message']) && !empty($_FILES['fileToUpload'])) {

        $view_press = $conn->prepare("SELECT * FROM press WHERE id = :id");

        $view_press->bindParam(':topic', $_POST['topic']);
        $view_press->bindParam(':admin', $_POST['admin']);
        $view_press->bindParam(':message', $_POST['message']);
        

        $view_press->bindParam(':id', $id);
      
        if ($view_press->execute()) {
          $view_press = $_POST;
          $view_press['id'] = $id;
        }else{
          ////set_status('success', 'The note "'.$view_post['topic'].'" by '.$view_post['name'].' was deleted successfully.');
        }

      }else{
        ////set_status('error', 'Please fill all fields.');
      }
    }

    //CHECK THAT THE NOTE EXISTS

    $view_press = $conn->prepare("SELECT * FROM press WHERE id = :id");
    $view_press->bindParam(':id', $id);
    $view_press->execute();
    $view_press = $view_press->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_press == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/view_press.php';
}elseif ($page == 'delete_press') {
 redirect_no_login();
 $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_press = $conn->prepare("SELECT * FROM press WHERE id = :id");
    $delete_press->bindParam(':id', $id);
    $delete_press->execute();
    $delete_press = $delete_press->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_press == false){
      create_notification("The team member '".$_POST['topic']."' has not been successfully deleted.", 'error');
      
      header('location:'.HOME.'press_tables');
      die();
    }

    $delete_press = $conn->prepare("DELETE FROM press WHERE id = :id");
    $delete_press->bindParam(':id', $id);

    $delete_press->execute();
      create_notification("The press '".$_POST['topic']."' has been successfully deleted.", 'success');
  }
  header('location:'.HOME.'press_tables');
 require 'views/delete_press.php';
}elseif ($page == 'trainingcourse') {
redirect_no_login();
 

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['course_title']) && !empty($_POST['message'])) {
      $insertraining = $conn->prepare("INSERT INTO training(course_title, message) VALUES(:course_title, :message)");
      $insertraining->bindParam(':course_title', $_POST['course_title']);
      $insertraining->bindParam(':message', $_POST['message']);
      
      $insertraining->execute();
      if ($insertraining->rowcount() > 0) {
        // echo "<div style='text-align: center; font-type: tahoma; color: green;'>Your message has been send successfully</div>";
          create_notification("The course '".$_POST['course_title']."' has been successfully added.", 'success');

      }else{
      create_notification("The course '".$_POST['course_title']."' has not been successfully added.", 'error');
        
      }
    }else{
      create_notification("The course '".$_POST['course_title']."' fill all field.", 'error');
     //echo "<div style='text-align: center; font-type: tahoma; color: green;'>fill all field</div>";
    }
  }

 
  require 'views/trainingcourse.php';
}elseif ($page == 'training_tables') {
 redirect_no_login();
    $trainingcourse_tables = $conn->prepare("SELECT * FROM training");
    $trainingcourse_tables->execute();
    $trainingcourse_tables = $trainingcourse_tables->fetchAll(PDO::FETCH_ASSOC);

  require 'views/training_tables.php';
}elseif ($page == 'edit_training') {
 redirect_no_login();
  $id = @$_GET['id'];
  
  if ($id != '') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!empty($_POST['course_title']) && !empty($_POST['message'])) {
      
        $edit_training = $conn->prepare("UPDATE training SET course_title = :course_title, message = :message WHERE id = :id");

        $edit_training->bindParam(':course_title', $_POST['course_title']);
        $edit_training->bindParam(':message', $_POST['message']);
        $edit_training->bindParam(':id', $id);
        
        if ($edit_training->execute()) {
          $edit_trainings = $_POST;
          $edit_trainings['id'] = $id;
        }else{
        create_notification("Your training '".$_POST['course_title']."' has  been successfully edited.", 'success');
        }

      }else{
      create_notification("Your training '".$_POST['course_title']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_trainings = $conn->prepare("SELECT * FROM training WHERE id = :id");
    $edit_trainings->bindParam(':id', $id);
    $edit_trainings->execute();
    $edit_trainings = $edit_trainings->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_trainings == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'training_tables');
      //die();
    }
  }
  require 'views/edit_training.php';
}elseif ($page == 'view_training') {
 redirect_no_login();
    $id = @$_GET['id'];
  
  if ($id != '') {

    $view_trainings = $conn->prepare("SELECT * FROM training WHERE id = :id");
    $view_trainings->bindParam(':id', $id);
    $view_trainings->execute();
    $view_trainings = $view_trainings->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_trainings == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'training_tables');
      //die();
    }
  }
  require 'views/view_training.php';
}elseif ($page == 'delete_training') {
redirect_no_login();
 $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_training = $conn->prepare("SELECT * FROM training WHERE id = :id");
    $delete_training->bindParam(':id', $id);
    $delete_training->execute();
    $delete_training = $delete_training->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_training == false){
      create_notification("The training '".$_POST['course_title']."' has not been successfully deleted.", 'error');
      
      header('location:'.HOME.'training_tables');
      die();
    }

    $delete_training = $conn->prepare("DELETE FROM training WHERE id = :id");
    $delete_training->bindParam(':id', $id);

    $delete_training->execute();
      create_notification("The press '".$_POST['topic']."' has been successfully deleted.", 'success');
  }
  header('location:'.HOME.'training_tables');
 require 'views/delete_training.php';
}elseif ($page == 'contact') {
  redirect_no_login();
  require 'views/contact.php';
}elseif ($page == 'staff') {
redirect_no_login();
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

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
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

 require 'views/staff.php';
}elseif ($page == 'staff_tables') {
redirect_no_login();
    $staffs = $conn->prepare("SELECT * FROM staff");
    $staffs->execute();
    $staffs = $staffs->fetchAll(PDO::FETCH_ASSOC);
  require 'views/staff_tables.php';
}elseif ($page == 'edit_staff') {
redirect_no_login();
   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_POST['account']) && !empty($_POST['bankname'])) {

        $edit_staff = $conn->prepare("UPDATE staff SET firstname = :firstname, othername = :othername, face = :face, tweet = :tweet, insta = :insta, whatts = :whatts, email = :email, designation = :designation, account = :account, bankname = :bankname, images = :images WHERE id = :id");

        $edit_staff->bindParam(':firstname', $_POST['firstname']);
        $edit_staff->bindParam(':othername', $_POST['othername']);
        $edit_staff->bindParam(':face', $_POST['face']);
        $edit_staff->bindParam(':tweet', $_POST['tweet']);
        $edit_staff->bindParam(':insta', $_POST['insta']);
        $edit_staff->bindParam(':whatts', $_POST['whatts']);
        $edit_staff->bindParam(':email', $_POST['email']);
        $edit_staff->bindParam(':designation', $_POST['designation']);
        $edit_staff->bindParam(':account', $_POST['account']);
        $edit_staff->bindParam(':bankname', $_POST['bankname']);

        $edit_staff->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_staff->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_staff->execute()) {
          $edit_staffs = $_POST;
          $edit_staffs['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['firstname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['firstname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_staffs = $conn->prepare("SELECT * FROM staff WHERE id = :id");
    $edit_staffs->bindParam(':id', $id);
    $edit_staffs->execute();
    $edit_staffs = $edit_staffs->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_staffs == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/edit_staff.php';
}elseif ($page == 'view_staff') {
redirect_no_login();
   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['firstname']) && !empty($_POST['othername']) && !empty($_POST['face']) && !empty($_POST['tweet']) && !empty($_POST['email']) && !empty($_POST['designation']) && !empty($_FILES['fileToUpload']) && !empty($_POST['insta']) && !empty($_POST['whatts'])) {

        $view_team = $conn->prepare("UPDATE staff SET firstname = :firstname, othername = :othername, face = :face, tweet = :tweet, insta = :insta, whatts = :whatts, email = :email, designation = :designation, images = :images WHERE id = :id");

        $view_team->bindParam(':firstname', $_POST['firstname']);
        $view_team->bindParam(':othername', $_POST['othername']);
        $view_team->bindParam(':face', $_POST['face']);
        $view_team->bindParam(':tweet', $_POST['tweet']);
        $view_team->bindParam(':insta', $_POST['insta']);
        $view_team->bindParam(':whatts', $_POST['whatts']);
        $view_team->bindParam(':email', $_POST['email']);
        $view_team->bindParam(':designation', $_POST['designation']);
        
        $view_team->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $view_team->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($view_team->execute()) {
          $view_staffs = $_POST;
          $view_staffs['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['firstname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['firstname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $view_staffs = $conn->prepare("SELECT * FROM staff WHERE id = :id");
    $view_staffs->bindParam(':id', $id);
    $view_staffs->execute();
    $view_staffs = $view_staffs->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_staffs == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/view_staff.php';
}elseif ($page == 'delete_staff') {
redirect_no_login();
  $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_staff = $conn->prepare("SELECT * FROM staff WHERE id = :id");
    $delete_staff->bindParam(':id', $id);
    $delete_staff->execute();
    $delete_staff = $delete_staff->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_staff == false){
      create_notification("The staff '".$_POST['firstname']."' was not edited.", 'error');
      header('location:'.HOME.'staff_tables');
      die();
    }

    $delete_staff = $conn->prepare("DELETE FROM staff WHERE id = :id");
    $delete_staff->bindParam(':id', $id);

    $delete_staff->execute();
      create_notification("The staff '".$_POST['firstname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'staff_tables');

  require 'views/delete_staff.php';
}elseif ($page == 'studentservices') {
redirect_no_login();
  $students = $conn->prepare("SELECT * FROM student");
  $students->execute();
  $students = $students->fetchAll(PDO::FETCH_ASSOC);
  require 'views/studentservices.php';
}elseif ($page == 'delete_student') {
 redirect_no_login();
 $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_student = $conn->prepare("SELECT * FROM student WHERE id = :id");
    $delete_student->bindParam(':id', $id);
    $delete_student->execute();
    $delete_student = $delete_student->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_student == false){
      create_notification("The student '".$_POST['firstname']."' was not edited.", 'error');
      header('location:'.HOME.'studentservices');
      die();
    }

    $delete_student = $conn->prepare("DELETE FROM student WHERE id = :id");
    $delete_student->bindParam(':id', $id);

    $delete_student->execute();
      create_notification("The student '".$_POST['firstname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'studentservices');

  require 'views/delete_student.php';
}elseif ($page == 'uploadcertificate') {
redirect_no_login();
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['fulname']) && !empty($_FILES['fileToUpload'])) {

      $new_certificate = $conn->prepare("INSERT INTO certificate(fulname, images) VALUES(:fulname, :images)");

      $new_certificate->bindParam(':fulname', $_POST['fulname']);

      
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
        if ($_FILES["fileToUpload"]["size"] > 800000000) {
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

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $new_certificate->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      $new_certificate->execute();
      if ($new_certificate->rowCount() > 0) {
        create_notification("Welcome, you have post event successfully ", 'success');
          
      }else{

       create_notification("Sorry, you have not post event successfully successfully ", 'error');

      }
      
    }
  }
 require 'views/uploadcertificate.php';
}elseif ($page == 'certificate_tables') {
redirect_no_login();
  $student_certificates = $conn->prepare("SELECT * FROM certificate");
  $student_certificates->execute();
  $student_certificates = $student_certificates->fetchAll(PDO::FETCH_ASSOC);
  
  require 'views/certificate_tables.php';
}elseif ($page == 'delete_certificate') {
redirect_no_login();
   $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_certificates = $conn->prepare("SELECT * FROM certificate WHERE id = :id");
    $delete_certificates->bindParam(':id', $id);
    $delete_certificates->execute();
    $delete_certificates = $delete_certificates->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_certificates == false){
      create_notification("The event was not edited.", 'error');
      header('location:'.HOME.'certificate_tables');
      die();
    }

    $delete_certificates = $conn->prepare("DELETE FROM certificate WHERE id = :id");
    $delete_certificates->bindParam(':id', $id);

    $delete_certificates->execute();
      create_notification("The event has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'certificate_tables');
  require 'views/delete_certificate.php';
}elseif ($page == 'edit_certificate') {
redirect_no_login();

   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['fulname']) && !empty($_FILES['fileToUpload'])) {

        $edit_certificate = $conn->prepare("UPDATE certificate SET fulname = :fulname, images = :images WHERE id = :id");

        $edit_certificate->bindParam(':fulname', $_POST['fulname']);
        $edit_certificate->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_certificate->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_certificate->execute()) {
          $edit_certificates = $_POST;
          $edit_certificates['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['fulname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['fulname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_certificates = $conn->prepare("SELECT * FROM certificate WHERE id = :id");
    $edit_certificates->bindParam(':id', $id);
    $edit_certificates->execute();
    $edit_certificates = $edit_certificates->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_certificates == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/edit_certificate.php';
}elseif ($page == 'application_tables') {
redirect_no_login();
  $application_tables = $conn->prepare("SELECT * FROM application");
  $application_tables->execute();
  $application_tables = $application_tables->fetchAll(PDO::FETCH_ASSOC);
  
 require 'views/application_tables.php';
}elseif ($page == 'delete_applicant') {
redirect_no_login();
    $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_applicant = $conn->prepare("SELECT * FROM application WHERE id = :id");
    $delete_applicant->bindParam(':id', $id);
    $delete_applicant->execute();
    $delete_applicant = $delete_applicant->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_applicant == false){
      create_notification("The event was not edited.", 'error');
      header('location:'.HOME.'application_tables');
      die();
    }

    $delete_applicant = $conn->prepare("DELETE FROM application WHERE id = :id");
    $delete_applicant->bindParam(':id', $id);

    $delete_applicant->execute();
      create_notification("The event has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'application_tables');
  require 'views/delete_applicant.php';
}elseif ($page == 'assessment') {
redirect_no_login();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fulname']) && !empty($_POST['phonenumber']) && !empty($_POST['email'])  && !empty($_POST['question1']) && !empty($_POST['question2']) && !empty($_POST['question3']) && !empty($_POST['question4']) && !empty($_POST['question5']) && !empty($_POST['question6']) && !empty($_POST['question7']) && !empty($_POST['question8']) && !empty($_POST['question9']) && !empty($_POST['question10']) && !empty($_POST['answerquestion1']) && !empty($_POST['answerquestion2']) && !empty($_POST['answerquestion3']) && !empty($_POST['answerquestion4']) && !empty($_POST['answerquestion5']) && !empty($_POST['answerquestion6'])  && !empty($_POST['answerquestion7']) && !empty($_POST['answerquestion8']) && !empty($_POST['answerquestion9']) && !empty($_POST['answerquestion10'])) {
// 
      $questionandanswers = $conn->prepare("INSERT INTO questionandanswer(fulname, phonenumber, email, question1, question2, question3, question4, question5, question6, question7, question8, question9, question10, answerquestion1, answerquestion2, answerquestion3, answerquestion4, answerquestion5, answerquestion6, answerquestion7, answerquestion8, answerquestion9, answerquestion10) VALUES(:fulname, :phonenumber, :email, :question1, :question2, :question3, :question4, :question5, :question6, :question7, :question8, :question9, :question10, :answerquestion1, :answerquestion2, :answerquestion3, :answerquestion4, :answerquestion5, :answerquestion6, :answerquestion7, :answerquestion8, :answerquestion9, :answerquestion10)");

      $questionandanswers->bindParam(':fulname', $_POST['fulname']);
      $questionandanswers->bindParam(':phonenumber', $_POST['phonenumber']);
      $questionandanswers->bindParam(':email', $_POST['email']);
      $questionandanswers->bindParam(':question1', $_POST['question1']);
      $questionandanswers->bindParam(':question2', $_POST['question2']);
      $questionandanswers->bindParam(':question3', $_POST['question3']);
      $questionandanswers->bindParam(':question4', $_POST['question4']);
      $questionandanswers->bindParam(':question5', $_POST['question5']);
      $questionandanswers->bindParam(':question6', $_POST['question6']);
      $questionandanswers->bindParam(':question7', $_POST['question7']);
      $questionandanswers->bindParam(':question8', $_POST['question8']);
      $questionandanswers->bindParam(':question9', $_POST['question9']);
      $questionandanswers->bindParam(':question10', $_POST['question10']);
      $questionandanswers->bindParam(':answerquestion1', $_POST['answerquestion1']);
      $questionandanswers->bindParam(':answerquestion2', $_POST['answerquestion2']);
      $questionandanswers->bindParam(':answerquestion3', $_POST['answerquestion3']);
      $questionandanswers->bindParam(':answerquestion4', $_POST['answerquestion4']);
      $questionandanswers->bindParam(':answerquestion5', $_POST['answerquestion5']);
      $questionandanswers->bindParam(':answerquestion6', $_POST['answerquestion6']);
      $questionandanswers->bindParam(':answerquestion7', $_POST['answerquestion7']);
      $questionandanswers->bindParam(':answerquestion8', $_POST['answerquestion8']);
      $questionandanswers->bindParam(':answerquestion9', $_POST['answerquestion9']);
      $questionandanswers->bindParam(':answerquestion10', $_POST['answerquestion10']);
     
      $questionandanswers->execute();
      if ($questionandanswers->rowCount() > 0) {
        create_notification("Welcome ".$_POST['fulname'].", the new question has been registered successfully ", 'success');
          
      }else{

       create_notification("Welcome ".$_POST['fulname'].", the new question has not been registered successfully ", 'error');

      }
      
    }
  }

  require 'views/assessment.php';
}elseif ($page == 'assessmentquestions') {
  redirect_no_login();
  $assessmentquestions_tests = $conn->prepare("SELECT * FROM questionandanswer");
  $assessmentquestions_tests->execute();
  $assessmentquestions_tests = $assessmentquestions_tests->fetchAll(PDO::FETCH_ASSOC);
  require 'views/assessmentquestions.php';
}elseif ($page == 'edit_questionandanswer') {
  redirect_no_login();
   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['fulname']) && !empty($_POST['phonenumber']) && !empty($_POST['email'])  && !empty($_POST['question1']) && !empty($_POST['question2']) && !empty($_POST['question3']) && !empty($_POST['question4']) && !empty($_POST['question5']) && !empty($_POST['question6']) && !empty($_POST['question7']) && !empty($_POST['question8']) && !empty($_POST['question9']) && !empty($_POST['question10']) && !empty($_POST['answerquestion1']) && !empty($_POST['answerquestion2']) && !empty($_POST['answerquestion3']) && !empty($_POST['answerquestion4']) && !empty($_POST['answerquestion5']) && !empty($_POST['answerquestion6'])  && !empty($_POST['answerquestion7']) && !empty($_POST['answerquestion8']) && !empty($_POST['answerquestion9']) && !empty($_POST['answerquestion10'])) {

        $edit_questionandanswer = $conn->prepare("UPDATE questionandanswer SET fulname = :fulname, phonenumber = :phonenumber, email = :email, question1 = :question1, question2 = :question2, question3 = :question3, question4 = :question4, question5 = :question5, question6 = :question6, question7 = :question7, question8 = :question8, question9 = :question9, question10 = :question10, answerquestion1 = :answerquestion1, answerquestion2 = :answerquestion2, answerquestion3 = :answerquestion3, answerquestion4 = :answerquestion4, answerquestion5 = :answerquestion5, answerquestion6 = :answerquestion6, answerquestion7 = :answerquestion7, answerquestion8 = :answerquestion8, answerquestion9 = :answerquestion9, answerquestion10 = :answerquestion10 WHERE id = :id");

      $edit_questionandanswer->bindParam(':fulname', $_POST['fulname']);
      $edit_questionandanswer->bindParam(':phonenumber', $_POST['phonenumber']);
      $edit_questionandanswer->bindParam(':email', $_POST['email']);
      $edit_questionandanswer->bindParam(':question1', $_POST['question1']);
      $edit_questionandanswer->bindParam(':question2', $_POST['question2']);
      $edit_questionandanswer->bindParam(':question3', $_POST['question3']);
      $edit_questionandanswer->bindParam(':question4', $_POST['question4']);
      $edit_questionandanswer->bindParam(':question5', $_POST['question5']);
      $edit_questionandanswer->bindParam(':question6', $_POST['question6']);
      $edit_questionandanswer->bindParam(':question7', $_POST['question7']);
      $edit_questionandanswer->bindParam(':question8', $_POST['question8']);
      $edit_questionandanswer->bindParam(':question9', $_POST['question9']);
      $edit_questionandanswer->bindParam(':question10', $_POST['question10']);
      $edit_questionandanswer->bindParam(':answerquestion1', $_POST['answerquestion1']);
      $edit_questionandanswer->bindParam(':answerquestion2', $_POST['answerquestion2']);
      $edit_questionandanswer->bindParam(':answerquestion3', $_POST['answerquestion3']);
      $edit_questionandanswer->bindParam(':answerquestion4', $_POST['answerquestion4']);
      $edit_questionandanswer->bindParam(':answerquestion5', $_POST['answerquestion5']);
      $edit_questionandanswer->bindParam(':answerquestion6', $_POST['answerquestion6']);
      $edit_questionandanswer->bindParam(':answerquestion7', $_POST['answerquestion7']);
      $edit_questionandanswer->bindParam(':answerquestion8', $_POST['answerquestion8']);
      $edit_questionandanswer->bindParam(':answerquestion9', $_POST['answerquestion9']);
      $edit_questionandanswer->bindParam(':answerquestion10', $_POST['answerquestion10']);
        
        $edit_questionandanswer->bindParam(':id', $id);
        
      
        if ($edit_questionandanswer->execute()) {
          $edit_questionandanswers = $_POST;
          $edit_questionandanswers['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['fulname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['fulname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_questionandanswers = $conn->prepare("SELECT * FROM questionandanswer WHERE id = :id");
    $edit_questionandanswers->bindParam(':id', $id);
    $edit_questionandanswers->execute();
    $edit_questionandanswers = $edit_questionandanswers->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_questionandanswers == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'assessmentquestions');
      //die();
    }
  }
require 'views/edit_questionandanswer.php';
}elseif ($page == 'view_questionandanswer') {
redirect_no_login();
   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_POST['fulname']) && !empty($_POST['phonenumber']) && !empty($_POST['email'])  && !empty($_POST['question1']) && !empty($_POST['question2']) && !empty($_POST['question3']) && !empty($_POST['question4']) && !empty($_POST['question5']) && !empty($_POST['question6']) && !empty($_POST['question7']) && !empty($_POST['question8']) && !empty($_POST['question9']) && !empty($_POST['question10']) && !empty($_POST['answerquestion1']) && !empty($_POST['answerquestion2']) && !empty($_POST['answerquestion3']) && !empty($_POST['answerquestion4']) && !empty($_POST['answerquestion5']) && !empty($_POST['answerquestion6'])  && !empty($_POST['answerquestion7']) && !empty($_POST['answerquestion8']) && !empty($_POST['answerquestion9']) && !empty($_POST['answerquestion10'])) {

        $view_questionandanswer = $conn->prepare("UPDATE questionandanswer SET fulname = :fulname, phonenumber = :phonenumber, email = :email, question1 = :question1, question2 = :question2, question3 = :question3, question4 = :question4, question5 = :question5, question6 = :question6, question7 = :question7, question8 = :question8, question9 = :question9, question10 = :question10, answerquestion1 = :answerquestion1, answerquestion2 = :answerquestion2, answerquestion3 = :answerquestion3, answerquestion4 = :answerquestion4, answerquestion5 = :answerquestion5, answerquestion6 = :answerquestion6, answerquestion7 = :answerquestion7, answerquestion8 = :answerquestion8, answerquestion9 = :answerquestion9, answerquestion10 = :answerquestion10 WHERE id = :id");

      $view_questionandanswer->bindParam(':fulname', $_POST['fulname']);
      $view_questionandanswer->bindParam(':phonenumber', $_POST['phonenumber']);
      $view_questionandanswer->bindParam(':email', $_POST['email']);
      $view_questionandanswer->bindParam(':question1', $_POST['question1']);
      $view_questionandanswer->bindParam(':question2', $_POST['question2']);
      $view_questionandanswer->bindParam(':question3', $_POST['question3']);
      $view_questionandanswer->bindParam(':question4', $_POST['question4']);
      $view_questionandanswer->bindParam(':question5', $_POST['question5']);
      $view_questionandanswer->bindParam(':question6', $_POST['question6']);
      $view_questionandanswer->bindParam(':question7', $_POST['question7']);
      $view_questionandanswer->bindParam(':question8', $_POST['question8']);
      $view_questionandanswer->bindParam(':question9', $_POST['question9']);
      $view_questionandanswer->bindParam(':question10', $_POST['question10']);
      $view_questionandanswer->bindParam(':answerquestion1', $_POST['answerquestion1']);
      $view_questionandanswer->bindParam(':answerquestion2', $_POST['answerquestion2']);
      $view_questionandanswer->bindParam(':answerquestion3', $_POST['answerquestion3']);
      $view_questionandanswer->bindParam(':answerquestion4', $_POST['answerquestion4']);
      $view_questionandanswer->bindParam(':answerquestion5', $_POST['answerquestion5']);
      $view_questionandanswer->bindParam(':answerquestion6', $_POST['answerquestion6']);
      $view_questionandanswer->bindParam(':answerquestion7', $_POST['answerquestion7']);
      $view_questionandanswer->bindParam(':answerquestion8', $_POST['answerquestion8']);
      $view_questionandanswer->bindParam(':answerquestion9', $_POST['answerquestion9']);
      $view_questionandanswer->bindParam(':answerquestion10', $_POST['answerquestion10']);
        
        $view_questionandanswer->bindParam(':id', $id);
        
      
        if ($view_questionandanswer->execute()) {
          $view_questionandanswers = $_POST;
          $view_questionandanswers['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['fulname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['fulname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $view_questionandanswers = $conn->prepare("SELECT * FROM questionandanswer WHERE id = :id");
    $view_questionandanswers->bindParam(':id', $id);
    $view_questionandanswers->execute();
    $view_questionandanswers = $view_questionandanswers->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($view_questionandanswers == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'assessmentquestions');
      //die();
    }
  }
  require 'views/view_questionandanswer.php';
}elseif ($page == 'delete_questionandanswer') {
  redirect_no_login();
  $id = @$_GET['id'];

  if ($id != '') {
    //CHECK THAT THE NOTE EXISTS
    $delete_questionandanswers = $conn->prepare("SELECT * FROM questionandanswer WHERE id = :id");
    $delete_questionandanswers->bindParam(':id', $id);
    $delete_questionandanswers->execute();
    $delete_questionandanswers = $delete_questionandanswers->fetch(PDO::FETCH_ASSOC);


    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($delete_questionandanswers == false){
      create_notification("The Contact '".$_POST['fulname']."' was not edited.", 'error');
      header('location:'.HOME.'assessmentquestions');
      die();
    }

    $delete_questionandanswers = $conn->prepare("DELETE FROM questionandanswer WHERE id = :id");
    $delete_questionandanswers->bindParam(':id', $id);

    $delete_questionandanswers->execute();
      create_notification("The contact '".$_POST['fulname']."' has  been successfully deleted.", 'success');
  }
  header('location:'.HOME.'assessmentquestions');
  require 'views/delete_questionandanswer.php';
}elseif ($page == 'assessmentstudentname') {
redirect_no_login();
  $answerstoquestions = $conn->prepare("SELECT * FROM answertest");
  $answerstoquestions->execute();
  $answerstoquestions = $answerstoquestions->fetchAll(PDO::FETCH_ASSOC);
  require 'views/assessmentstudentname.php';
}elseif ($page == 'training_tables') {
  redirect_no_login();
  
  require 'views/training_tables.php';

}elseif ($page == 'studentaccount') {
  redirect_no_login();
  $studentaccounts = $conn->prepare("SELECT id, firstname, othername, email, phone, course_name, message, studentusername FROM  student WHERE studentusername = :studentusername");
  $studentaccounts->bindParam(':studentusername', $_SESSION['studentusername']);
  $studentaccounts->execute();
  $studentaccount = $studentaccounts->fetch(PDO::FETCH_ASSOC);
  require 'views/studentaccount.php';

}elseif ($page == 'studentlogin') {
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

  require 'views/studentlogin.php';
}elseif ($page == 'useradmin') {
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != ''){

      $adbsadmin = $conn->prepare("SELECT * FROM users WHERE username = :username");
      $adbsadmin->bindParam(':username', $_POST['username']);
      $adbsadmin->execute();
      $adbsadmin = $adbsadmin->fetch(PDO::FETCH_ASSOC);

      if($adbsadmin == false){
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $new_user = $conn->prepare("INSERT INTO  users(username, password) VALUES (:username, :password)");
        $new_user->bindParam(':username', $_POST['username']);
        $new_user->bindParam(':password', $_POST['password']);
        $new_user->execute();
        if($new_user->rowCount() > 0){
          create_notification("Welcome ".$_POST['username'].", to ODBS TECHNOLOGY APP", 'success');
          $_SESSION['username'] = $_POST['username'];
          header('location:'.HOME.'dashboard');
       
        }else{
          create_notification("An error occured. Please try again", 'error');
        }
      }else{
        create_notification("username already exists, please choose another one", 'error');
      }
    }else{
      create_notification("Please fill all fields", 'error');
    }
  }
  require 'views/useradmin.php';
}elseif ($page == 'updatecertificate') {
  redirect_no_login();

   $id = @$_GET['id'];
  
  if ($id != '') {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if (!empty($_FILES['fileToUpload'])) {

        $edit_certificate = $conn->prepare("UPDATE student SET images = :images WHERE id = :id");

        $edit_certificate->bindParam(':id', $id);
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
          create_notification("The Passport '".$_POST['firstname']."' has not been successfully uploaded, please upload.", 'error');
         
        } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../'.$target_file)) {
            $edit_certificate->bindParam(':images', $target_file);
           
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

      
        if ($edit_certificate->execute()) {
          $edit_certificates = $_POST;
          $edit_certificates['id'] = $id;
        }else{
        create_notification("Your team '".$_POST['fulname']."' has  been successfully edited.", 'success');
         
        }

      }else{
      create_notification("Your team '".$_POST['fulname']."' has not been successfully edited.", 'error');
        ////set_status('error', 'Please fill all fields.');
      }
    }
    //CHECK THAT THE NOTE EXISTS
    $edit_certificates = $conn->prepare("SELECT * FROM student WHERE id = :id");
    $edit_certificates->bindParam(':id', $id);
    $edit_certificates->execute();
    $edit_certificates = $edit_certificates->fetch(PDO::FETCH_ASSOC);

    //IF NOTE DOES NOT EXITS, REDIRECT TO APP HOME
    if($edit_certificates == false){
      //set_status('error', 'The note you wanted to edit does not exist.');
      header('location:'.HOME.'team_tables');
      //die();
    }
  }
  require 'views/updatecertificate.php';
}elseif ($page == 'logout') {
  logout();
  require 'views/logout.php';
}else{
	require 'views/404.php';
}
