<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'key' => 'd2ejn5jj'
);
$adminUserManager = new PrismLibDeveloperKeyManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->delete($params);
print_r($return);



//Array
//(
//    [Guid] => default-d2ejn5jj
//    [Key] => d2ejn5jj
//    [Secret] => bzz6evnv67ewlnc34nya
//    [ClientId] => qbdlu2p
//    [Notes] => testtest
//    [DomainId] => default
//    [Meta] => Array
//    (
//        [] => true
//    )
//
//    [CreateTime] => 2015-05-11T11:24:10.979+08:00
//    [Expired] => -62135596800
//    [NotifyPushUrl] =>
//)
