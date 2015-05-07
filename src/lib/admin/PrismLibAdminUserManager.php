<?php
class PrismLibAdminUserManager extends PrismLibBase
{
    /**
     * prism通过admin用户权限创建用户
     *
     * @params string email 新用户的邮箱，用户名将取邮箱@符前的内容，用于登陆prism前台
     * @params string password 新用户的密码，用于登陆prism前台
     * @params string summary 新用户的备注信息
     *
     * @return domainid 用户的域
     * @return email 用户的email
     * @return id prism生成的用户id
     */
    public function create($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['email'], 'email' );
        PrismLibCheckUtil::checkNotNull( $params['password'], 'password' );

        return $this->callPrismApi( '/api/platform/manageuser/create', $params, 'post' );
    }

    /**
     * 将用户等级提升为开发者
     *
     * @params string email 用户的邮箱
     *
     * @return true
     */
    public function active($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['email'], 'email' );

        return $this->callPrismApi( '/api/platform/manageuser/active', $params, 'post' );
    }

    /**
     * 将用户等级提升为API提供者
     *
     * @params string email 用户的邮箱
     *
     * @return true
     */
    public function apiprovider($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['email'], 'email' );

        return $this->callPrismApi( '/api/platform/manageuser/apiprovider', $params, 'post' );
    }

    /**
     * 将用户等级重置为未激活用户
     *
     * @params string email 用户的邮箱
     *
     * @return true
     */
    public function disable($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['email'], 'email' );

        return $this->callPrismApi( '/api/platform/manageuser/disable', $params, 'post' );
    }

    /**
     * 查询用户资料
     *
     * @params string email 用户的邮箱
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
    public function info($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['email'], 'email' );

        return $this->callPrismApi( '/api/platform/manageuser/info/'.$params['email'], $params, 'get' );
    }
}

