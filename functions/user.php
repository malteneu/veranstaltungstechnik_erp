<?php

function isLoggedIn():bool{
  return isset($_SESSION['user_id']);
}

function getUserData(string $user){
  $sql = "SELECT * FROM user
          WHERE user_name= :user_name OR user_email= :user_email
          LIMIT 1";

$statement = getDb()->prepare($sql);

$statement->execute([':user_name'=>$user, ':user_email'=>$user]);

return $statement->fetch();
}

function getUserDataById(string $userId){
  $sql = "SELECT *
          FROM user
          WHERE user_id=:user_id
          LIMIT 1";

$statement = getDb()->prepare($sql);

$statement->execute([':user_id'=>$userId]);

return $statement->fetch();
}

function getUserHistory(string $userId){
  $sql = "SELECT user_history_type, user_history_ip, user_history_timestamp
          FROM user_history
          WHERE user_id=:user_id
          ORDER BY user_history_timestamp DESC
          LIMIT 10";

$statement = getDb()->prepare($sql);

$statement->execute([':user_id'=>$userId]);

return $statement->fetchAll();
}

function setUserPassword($userId, string $newPassword){
  $sql = "UPDATE user SET user_password= :new_password WHERE  user_id= :user_id";

  $statement = getDB()->prepare($sql);
  $data = [
      ':user_id' => $userId,
      ':new_password' => $newPassword,
  ];

  setUserHistory($userId, 'user_password_updated');

  return $statement->execute($data);
}

function setUserLoginHistory($userId) {
  setUserHistory($userId, 'user_login');
}

function setUserHistory($userId, string $type) {

    $sql = "INSERT INTO user_history
            SET user_id=:user_id, user_history_type = :user_history_type, user_history_ip=:user_history_ip";

    $statement = getDB()->prepare($sql);
    $data = [
        ':user_id' => $userId,
        ':user_history_type' => $type,
        ':user_history_ip' => getUserIp()
    ];

    return $statement->execute($data);
}

function getUserIp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
