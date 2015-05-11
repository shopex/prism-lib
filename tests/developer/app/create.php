<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'id'=>null,
    'name'=>'cc',
    'desc'=>'cccc'
);
$adminUserManager = new PrismLibDeveloperAppManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->create($params);
print_r($return);


//$client = new PrismClient('http://localhost:8080', 'key', 'secret');
//print_r($client);


/**
 * return info:
 * ➜  app git:(master) ✗ php create.php
 * Array
 * (
 *     [Id] => qmc4d5y
 *     [Guid] => default-qmc4d5y
 *     [AuthGroup] =>
 *     [DomainId] => default
 *     [SelfBinding] =>
 *     [Name] => cc
 *     [Author] =>
 *     [AuthorUrl] =>
 *     [Logo] =>
 *     [ApiJsonUrl] =>
 *     [NotifyListen] =>
 *     [NotifyPublish] =>
 *     [MemberId] => g3tearm2
 *     [Summary] => cccc
 *     [KeysNum] => 0
 *     [MaxKeysLimit] => 500
 *     [Meta] => Array
 *     (
 *     )

 *     [CreateTime] => 2015-05-11T10:53:06.31450628+08:00
 *     [Status] =>
 * )
 */
