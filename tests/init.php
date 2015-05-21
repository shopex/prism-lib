<?php
require_once(__DIR__ . '/../vendor/autoload.php');

    /**
     * 调用这个方法，可以自动初始化所有数据
     *
     * @params string prismHost
     * @params string adminKey
     * @params string adminSecret
     * @params string userEmai
     * @params string userPassword
     * @params array app ['appName0'=>['name'=>'appName0', 'keyNum'=1], 'appName1'=>['name'=>'appName1', 'keyNum'=2]]
     * @params array api  ['apisName'=>['url'=>'http://localhost/aa.json', 'config'=>['aa'=>'aaa','bb'=>'bbb']]]
     * @params array bind  ['appName'=>['apiName1','apiName2']]
     *
     * @return array ['userInfo'=>[key,secret......], 'appInfo'=>[name=>[name,id,keys]], 'apiInfo'=>[ name=>[ name,id,url,info], name2=>[name2,id2,url2,info2] ] ]
     */

$params = [
    'prismHost'=>'http://localhost:8080',
    'adminKey' => "vznb4obr",
    'adminSecret' => "xf727z5qkwfr4edy6qab",
    'userEmail'    => 'test@test.com',
    'userPassword' => 'xinxin123',
    'app' => [
        'bbc' => ['name' => 'bbc', 'keyNum' => 2]
        ],
    'api' => [
        'aftersales'=>[
            'name' => 'aftersales',
            'url' => 'http://localhost/json/aftersales.json',
            'conf' => ['token'=>'']
            ]
        ],
    'bind' => ['bbc'=>['aftersales']]
    ];
$tool = new PrismLibInitTool;
$result = $tool->init($params);
print_r($result);



