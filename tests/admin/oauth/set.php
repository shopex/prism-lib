<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "tkhhgpfo";
$adminSecret = "47zwsqjtcj6d5svgpknq";
$params = array(
    'is_sandbox' => false,
    'config' => json_encode(array(
        ''
    )),
);
$adminUserManager = new PrismLibAdminOauthManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->set($params);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);



