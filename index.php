<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

define('CONFIG_DIR',__DIR__.'/config');
define('TEMPLATE_DIR',__DIR__.'/templates');
define('PAGE_DIR',__DIR__.'/pages');
define('INCLUDES_DIR', __DIR__.'/includes');

require_once __DIR__.'/includes.php';
