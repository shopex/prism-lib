<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$prismUrl = 'http://localhost:8080';
$adminKey = "wvaxmnjm";
$adminSecret = "5med5cp5o5gyvv4plg5x";
$params = array(
    'url' => 'http://localhost/prism-lib/tests/developer/api/a.json'
);
$adminUserManager = new PrismLibDeveloperApiManager($prismUrl, $adminKey, $adminSecret);
$return = $adminUserManager->import($params);
print_r($return);
/*
Array
(
    [apis] => Array
    (
        [0] => Array
        (
            [Id] => vxyrtvmj
            [Guid] => default-vxyrtvmj
            [LinkedResId] =>
            [Url] => http://localhost/prism-lib/tests/developer/api/a.json
            [BackendUrl] =>
            [DomainId] => default
            [MemberId] => g3tearm2
            [LastMemberId] =>
            [Path] =>
            [Online] =>
            [Appling] =>
            [ApplingResult] =>
            [IsLocal] =>
            [IsLinked] =>
            [TodayCount] => 0
            [ConfigValues] =>
            [ResCache] =>
            [AccessRole] =>
            [NodeNum] => 0
        )

    )

    [found] => 1
    [id] => vxyrtvmj
    [message] => Fetching [http://localhost/prism-lib/tests/developer/api/a.json]... [200 OK]
    Detecting content-type... %!(EXTRA []interface {}=[])apijson
    %!(EXTRA []interface {}=[])  Api: [ecstore %!s(int=1)](%!d(MISSING)) added.

)

 */
