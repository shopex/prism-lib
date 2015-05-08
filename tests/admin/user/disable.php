<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "tkhhgpfo";
$adminSecret = "47zwsqjtcj6d5svgpknq";
$params = array(
    'email'=>'ee@qq.com',
);
$adminUserManager = new PrismLibAdminUserManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->disable($params);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);



