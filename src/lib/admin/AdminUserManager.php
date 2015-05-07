<?php
require_once(__DIR__ . '../base.php');

class AdminUserManager extends PrismCilent
{
    /**
     * prism通过admin用户权限创建用户
     *
     * @params string email 新用户的邮箱，用户名将取邮箱@符前的内容，用于登陆prism前台
     * @params string password 新用户的密码，用于登陆prism前台
     * @params string password 新用户的备注信息
     *
     * @return domainid 用户的域
     * @return email 用户的email
     * @return id prism生成的用户id
     */
    public function create($params)
    {
        $result = $this->post( '/api/platform/manageuser/create', $params );
        $return = json_decode( $result, true );
        if( $return['error'] != null )
        {
            throw new ErrorException( $return['error']['message'], $return['error']['code'] );
        }
        return $return['result'];
    }
}

