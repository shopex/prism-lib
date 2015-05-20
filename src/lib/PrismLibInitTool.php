<?php

class PrismLibInitTool
{
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
    public function init($initInfo)
    {
        $adminConn = [
            'host'   => $initInfo['prismHost'],
            'key'    => $initInfo['adminKey'],
            'secret' => $initInfo['adminSecret'],
              ];

        //初始化用户
        $userInfo = [
            'email' => $initInfo['userEmail'],
            'password' => $initInfo['userPassword'],
            ];
        $return['userInfo'] = $this->initUser($userInfo, $adminConn);

        $userConn = [
            'host'   => $initInfo['prismHost'],
            'key'    => $return['userInfo']['Key'],
            'secret' => $return['userInfo']['Secret'],
            ];

        //初始API
        $apiInfos = $initInfo['api'];
        $apiReturnInfo = [];
        foreach($apiInfos as $apiName => $apiInfo)
        {
            $apiRes = $this->initApi($apiInfo, $adminConn, $userConn);
            $apiReturnInfo[$apiName]['url'] = $apiInfo['url'];
            $apiReturnInfo[$apiName]['name'] = $apiName;
            $apiReturnInfo[$apiName]['id'] = $apiRes['id'];
            $apiReturnInfo[$apiName]['info'] = $apiRes;
        }
        $return['apiInfo'] = $apiReturnInfo;

        //初始化app
        $appInfos = $initInfo['app'];
        $appRes = $this->initApp($appInfos, $userConn);
        $return['appInfo'] = $appRes;

        //初始化绑定信息
        $bindInfos = $initInfo['bind'];
        foreach( $bindInfos as $appName=>$bindApis )
        {
            foreach($bindApis as $apiName)
            {
                $bindParams = [
                    'app_id' => $return['appInfo'][$appName]['id'],
                    'api_id' => $return['apiInfo'][$apiName]['id'],
                    ];
                $this->bindAppApi($bindParams, $adminConn);
            }
        }

        return $return;
    }

    public function bindAppApi($bindInfo, $conn)
    {
        $prismHost = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'app_id' => $bindInfo['app_id'],
            'api_id' => $bindInfo['api_id'],
            'path'   => '*',
            ];

        $caller = new PrismLibAdminAppManager($prismHost, $key, $secret);
        return $caller->bind($requestParams);
    }

    public function initApp($appInfo, $userConn)
    {
        $result = [];
        foreach($appInfo as $appName=>$app)
        {
            $appCreateInfo = [
                    'name' => $appName,
                ];
            $appRes = $this->_createApp($appCreateInfo, $userConn);

            $result[$appName]['name'] = $appName;
            $result[$appName]['id'] = $appRes['Id'];
            $result[$appName]['info'] = $appRes;

            for( $i = 0; $i < $app['keyNum']; $i++ )
            {
                $createAppParams = [
                        'app_id' =>$appRes['Id']
                    ];
                $keyRes = $this->_createAppKey($createParams, $userConn);
                $result[$appName]['keys'][] = $keyRes;
            }
        }

        return $result;
    }

    /**
     * 初始化用户
     *
     * @param array userInfo ['email'=>'aa@bb.cc', 'password'=>'password']
     *
     * @return array userinfo
     *
     */
    public function initUser($userInfo, $adminConn)
    {
        // 创建用户
        $createParams = [
                'email' => $userInfo['email'],
                'password' => $userInfo['password'],
            ];
        $this->_createUser($createParams, $adminConn);

        // 用户提升权限为开发者
        $activeParams = [
                'email' => $userInfo['email'],
            ];
        $this->_activeUser($activeParams, $adminConn);

        // 用户提升权限为API提供者
        $apiProviderParams = [
                'email' => $userInfo['email'],
            ];
        $this->_apiProviderUser($apiProviderParams, $adminConn);

        // 获取用户的管理Key和Secret
        $queryUserInfoParams = [
                'email' => $userInfo['email'],
            ];
        $userInfo = $this->_getUserInfo($queryUserInfoParams, $adminConn);
        // return 用户的信息，包括key和secret
        return $userInfo;
    }

    public function initApi($apiInfo, $adminConn, $userConn)
    {

        //导入api
        $importApiParams = [
            'url' => $apiInfo['url']
            ];
        $result = $this->_importApi($importApiParams, $userConn);
        echo "---------";
        print_r($result);
        echo "---------";
        //设置api的参数
        $confs = $apiInfo['conf'];
        if( count($confs) > 0 )
        {
            foreach($confs as $key=>$value)
            {
                $setApiConfParams = [
                    'Id' => $result['id'],
                    'key' => $key,
                    'value' => $value,
                    ];
                $this->_setApiConf($conf, $userConn);
            }
        }
        //api上线
        $apiOnlineParams = [
                'Id' => $result['id'],
            ];
        echo "---------";
        print_r($apiOnlineParams);
        echo "---------";

        $this->_setApiOnline($apiOnlineParams, $adminConn);

        return $result;
    }

    private function _createApp($appInfo, $conn)
    {
        $host      = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'name' => $appInfo['name']
            ];

        $caller = new PrismLibDeveloperAppManager($host, $key, $secret);

        return $caller->create($requestParams);
    }

    private function _setApiOnline($apiInfo, $conn)
    {
        $host      = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'Id'    => $apiInfo['Id'],
            ];

        $caller = new PrismLibAdminApiManager($host, $key, $secret);
        return $caller->online($requestParams);
    }

    private function _setApiConf($conf, $conn)
    {
        $host      = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'Id'    => $conf['Id'],
            'key'   => $conf['key'],
            'value' => $conf['value'],
            ];

        $caller = new PrismLibDeveloperApiManager($host, $key, $secret);
        return $caller->set($requestParams);
    }

    private function _importApi($apiInfo, $conn)
    {
        $host      = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
                'url' => $apiInfo['url']
            ];

        $caller = new PrismLibDeveloperApiManager($host, $key, $secret);
        return $caller->import($requestParams);

    }

    /**
     * 创建一个用户
     * 因为email是主键，所以不再返回任何数据
     * 如需对用户进行操作，用email即可
     *
     * @params userinfo array('email'=>'')
     * @params conn array('host'=>'', 'key'=>'', 'secret'=>'')
     *
     * @return null
     */
    private function _createUser($userInfo, $conn)
    {
        $prismHost = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'email'    => $userInfo['email'],
            'password' => $userInfo['password'],
            ];

        $caller = new PrismLibAdminUserManager($prismHost, $key, $secret);
        return $caller->create($requestParams);
    }

    /**
     * 激活用户，激活的用户可以创建app了
     *
     * @params userinfo array('email'=>'', 'password'=>'')
     * @params conn array('host'=>'', 'key'=>'', 'secret'=>'')
     *
     * @return null
     */
    private function _activeUser($userInfo, $conn)
    {
        $prismHost = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'email'    => $userInfo['email'],
            ];

        $caller = new PrismLibAdminUserManager($prismHost, $key, $secret);
        return $caller->active($requestParams);
    }

    /**
     * 激活用户，激活的用户可以创建app了
     *
     * @params userinfo array('email'=>'')
     * @params conn array('host'=>'', 'key'=>'', 'secret'=>'')
     *
     * @return null
     */
    private function _apiProviderUser($userInfo, $conn)
    {
        $prismHost = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'email'    => $userInfo['email'],
            ];

        $caller = new PrismLibAdminUserManager($prismHost, $key, $secret);
        return $caller->apiprovider($requestParams);
    }

    /**
     * 激活用户，激活的用户可以创建app了
     *
     * @params userinfo array('email'=>'')
     * @params conn array('host'=>'', 'key'=>'', 'secret'=>'')
     *
     * @return Guid
     * @return Key
     * @return Secret
     * @return ClientID
     * @return Notes
     * @return DomainID
     * @return Meta
     * @return CreateTime
     * @return Expired
     * @return NotifyPushUrl
     */
    private function _getUserInfo($userInfo, $conn)
    {
        $prismHost = $conn['host'];
        $key       = $conn['key'];
        $secret    = $conn['secret'];

        $requestParams = [
            'email'    => $userInfo['email'],
            ];

        $caller = new PrismLibAdminUserManager($prismHost, $key, $secret);
        return $caller->info($requestParams);
    }

}

