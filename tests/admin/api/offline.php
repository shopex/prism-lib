<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "tkhhgpfo";
$adminSecret = "47zwsqjtcj6d5svgpknq";
$params = array(
    'Id'=>'jxj2pzxz',
);
$adminUserManager = new PrismLibAdminApiManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->offline($params);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);



