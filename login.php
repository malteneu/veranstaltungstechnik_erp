<?php

if(!isLoggedIn()) {
  if($url != '/')
  {
    $redirect_url = urlencode($_SERVER['REQUEST_URI']);
    header('Location: /?location='.$redirect_url);
    exit;
  }

  $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
  $redirect_url = filter_input(INPUT_GET, 'location');
  $errors = [];

  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'){

    $password = filter_input(INPUT_POST, 'password');

    $userData = getUserData($user);

    if($userData && password_verify($password, $userData["user_password"])){
      $_SESSION["user_id"] = $userData["user_id"];
      setUserLoginHistory($_SESSION["user_id"]);


      if($redirect_url){
        header("Location: ".urldecode($redirect_url));
      } else {
        header("Location: /");
      }
      exit();
    } else {
      $errors[] = "Benutzername oder Passwort falsch!";
    }
  }
  require PAGE_DIR.'/login.php';
  exit();
}

$userData = getUserDataById($_SESSION["user_id"]);

if($userData){
  $_SESSION["user_id"] = $userData["user_id"];
  $_SESSION["user_name"] = $userData["user_name"];
  $_SESSION["user_firstname"] = $userData["user_firstname"];
  $_SESSION["user_lastname"] = $userData["user_lastname"];
  $_SESSION["user_email"] = $userData["user_email"];
  $_SESSION["user_displayname"] = $userData["user_displayname"];
}
