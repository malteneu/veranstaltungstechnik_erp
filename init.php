<?php

$urlParts = parse_url($_SERVER['REQUEST_URI']);
$url = $urlParts['path'];
$baseUrl = '/';
$https = $_SERVER['REQUEST_SCHEME'] === 'https';
$site_name = getVariable("site_name");
$time_format = getVariable("time_format");
