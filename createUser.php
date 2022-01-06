<?php

session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

define('CONFIG_DIR', __DIR__ . '/config');
require_once __DIR__ . '/functions/database.php';

$username = "Larmann";
$password = password_hash("1234", PASSWORD_DEFAULT);
$email = "l@rmann.de";

$sql = "INSERT INTO user SET
user_name='" . $username . "',
user_password='" . $password . "',
user_firstname='Adrian',
user_lastname='Larmann',
user_email='" . $email . "'";

$statement = getDb()->exec($sql);
if (!$statement) {
    echo printDBErrorMessage();
}
