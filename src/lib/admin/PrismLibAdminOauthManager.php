<?php
class PrismLibAdminOauthManager extends PrismLibBase
{

    /**
     * 获取Oauth配置
     *
     * @params bool is_sandbox 是否取沙箱环境设置
     * @params string config
     *
     * @return string CfgIdColumn 用户验证表的id项
     * @return string CheckAccountSQL 用来查看用户名密码是否正确的sql
     * @return string Database mysql的数据库
     * @return string FailedSQL 验证失败后带的sql查询结果
     * @return string Host mysql的host
     * @return string Password mysql的密码
     * @return string SuccessSQL 验证成功后oauth信息带有的sql查询结果
     * @return string User mysql的用户名
     */
    public function get($params)
    {
        return $this->callPrismApi( '/api/platform/manageoauth/config/get', $params, 'post' );
    }


    /**
     * 获取Oauth配置
     *
     * @params bool is_sandbox 是否取沙箱环境设置
     * @params string config 下列数据的json
     *
     * @json string CfgIdColumn 用户验证表的id项
     * @json string CheckAccountSQL 用来查看用户名密码是否正确的sql
     * @json string Database mysql的数据库
     * @json string FailedSQL 验证失败后带的sql查询结果
     * @json string Host mysql的host
     * @json string Password mysql的密码
     * @json string SuccessSQL 验证成功后oauth信息带有的sql查询结果
     * @json string User mysql的用户名
     *
     * @return bool true
     */
    public function set($params)
    {
        return $this->callPrismApi( '/api/platform/manageoauth/config/set', $params, 'post' );
    }
}

