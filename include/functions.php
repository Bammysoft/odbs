<?php

function create_notification($message, $type){
	$_SESSION['status']['type'] = $type;
	$_SESSION['status']['message'] = $message;
	return;
}


function notify(){
	$type = $_SESSION['status']['type'];
	$message = $_SESSION['status']['message'];
	if ($type == 'success') {
		echo "<div style='color:green;background:lemon;padding:20px;font-size:18px;text-align:center;'>{$message}</div>";
	}else{
		echo "<div style='color:red;background:yellow;padding:20px;font-size:18px;text-align:center;'>{$message}</div>";
	}
	remove_notification();
	return;
}

function check_notification(){
	if(isset($_SESSION['status'])){
		return true;
	}else{
		return false;
	}
}

function remove_notification(){
	unset($_SESSION['status']);
	return;
}

function check_login(){
	if(isset($_SESSION['username'])){
		return true;
	}
	return false;
}

function redirect_no_login(){
	if(!check_login()){
			header('location:'.HOME.'login');
		}
}

function logout(){
	$_SESSION = array();
	session_unset();
	session_destroy();
	redirect_no_login();
}
