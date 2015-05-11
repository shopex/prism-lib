<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'url' => 'http://localhost/prism-lib/tests/developer/api/after.json'
);
$adminUserManager = new PrismLibDeveloperApiManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->import($params);
print_r($return);



