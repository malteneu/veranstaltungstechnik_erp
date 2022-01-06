<?php

function getDB(){
  static $db;

  if($db instanceof PDO){
    return $db;
  }
  require_once CONFIG_DIR.'/database.php';
  $dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", DB_HOST, DB_DATABASE, DB_CHARSET);
  $db = new PDO($dsn, DB_USER, DB_PASSWORD);

  return $db;

}

function getVariable(string $variable_name){
  $sql = "SELECT variable_content
          FROM variable
          WHERE variable_name=:variable_name
          LIMIT 1";

$statement = getDb()->prepare($sql);

$statement->execute([':variable_name'=>$variable_name]);

return $statement->fetch()["variable_content"];
}
