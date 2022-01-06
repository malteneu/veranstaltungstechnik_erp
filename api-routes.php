<?php
// Ajax requests ===============================================================

if(strpos($url, '/ajax/update-password') !== false){
  require INCLUDES_DIR.'/update-password.php';
  exit();
}
