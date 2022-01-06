<?php

if($url === '/'){
  require PAGE_DIR.'/main.php';
  exit();
}

if(strpos($url, '/user/logout') !== false){
  session_regenerate_id(true);
  session_destroy();
  header("Location: /");
  exit();
}

if(strpos($url, '/user') !== false){
  require PAGE_DIR.'/user-settings.php';
  exit();
}
