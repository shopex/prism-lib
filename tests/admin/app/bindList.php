<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "tkhhgpfo";
$adminSecret = "47zwsqjtcj6d5svgpknq";
$params = array(
    'app_id' => 'rshps42',
  //'api_id'=>'jxj2pzxz',
  //'path'=>'*',
  //'limit_count'=>1001,
  //'limit_seconds'=>61,
);
$adminUserManager = new PrismLibAdminAppManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->bindlist($params);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);



