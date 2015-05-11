<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$adminUserManager = new PrismLibDeveloperAppManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->getList();
print_r($return);


