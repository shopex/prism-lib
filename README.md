# prism-utils

## 简介
这个工具的作用是封装prism对外的接口调用。
后续会加入一些工具，比如初始化等。


## 使用方法
- 单个接口调用：
```
        $caller = new PrismLibAdminUserManager($prismHost, $key, $secret);
        return $caller->info($requestParams);
```

- 初始化脚本调用方法
```
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
```

如果有疑问可以看tests目录下的示例
