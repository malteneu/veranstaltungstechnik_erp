<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["user_id"]){

  $success = false;
  $message = "Unbekannter fehler!";

  $password = filter_input(INPUT_POST, 'oldPassword');
  $newPassword = filter_input(INPUT_POST, 'newPassword');
  $newPasswordRepeated = filter_input(INPUT_POST, 'newPassword_repeated');

  $userData = getUserDatabyId($_SESSION["user_id"]);

  if($password === $newPassword){
    $message = "Das neue Passwort muss sich vom akutellen unterscheiden!";
  } else if ($newPassword !== $newPasswordRepeated){
    $message = "Neues Passwort stimmt mit dem wiedereholten nicht überein!";
  } else if ($userData && password_verify($password, $userData["user_password"])){
      setUserPassword($_SESSION["user_id"], password_hash($newPassword, PASSWORD_DEFAULT));
      $success = true;
      $message = "Passwort erfolgreich geändert!";
  } else {
    $message = "Aktuelles Passwort falsch!";
  }

  echo json_encode(array(
      "success" => $success,
      "message" => $message
    )
  );
}
