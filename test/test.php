<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "tkhhgpfo";
$adminSecret = "47zwsqjtcj6d5svgpknq";
$newProvider = array(
    'email'=>'ee@qq.com',
    'password'=>'xinxin123',
    'summary'=>'测试测试'
);
$adminUserManager = new PrismLibAdminUserManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->create($newProvider);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);



