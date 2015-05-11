<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'app_id'=>'rshps42',
);
$adminUserManager = new PrismLibDeveloperAppManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->info($params);
print_r($return);


