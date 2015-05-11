<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'app_id'=>'qbdlu2p',
    'desc'=>'testtest',
    'expired_date'=>time()+360000,
    'meta'=> null
);
$adminUserManager = new PrismLibDeveloperKeyManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->create($params);
print_r($return);
