<?php
class PrismLibAdminOauthManager extends PrismLibBase
{

    /**
     * 获取Oauth配置
     *
     *
     * @params string email 新用户的邮箱，用户名将取邮箱@符前的内容，用于登陆prism前台
     * @params string password 新用户的密码，用于登陆prism前台
     * @params string summary 新用户的备注信息
     *
     * @return domainid 用户的域
     * @return email 用户的email
     * @return id prism生成的用户id
     */
    public function get($params)
    {
        return $this->callPrismApi( '/api/platform/manageoauth/config/get', $params, 'post' );
    }

    public function set($params)
    {

    }
}

