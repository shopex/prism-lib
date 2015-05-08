<?php
class PrismLibAdminAppManager extends PrismLibBase
{

    /**
     * 绑定app和api的关系
     *
     * @params string app_id 要添加绑定的app
     * @params string api_id 要添加绑定关系的api
     * @params string path 要绑定api中的哪个path
     * @params string limit_count 允许一定时间访问多少次，默认是1000
     * @params string limit_seconds 上一条中的“一定时间”
     *
     * @return bool true
     */
    public function bind($params)
    {
        PrismLibCheckUtil::checknotnull( $params['app_id'], 'app_id' );
        PrismLibCheckUtil::checknotnull( $params['api_id'], 'api_id' );
        PrismLibCheckUtil::checknotnull( $params['path'], 'path' );

        return $this->callPrismApi( '/api/platform/manageapp/bind', $params, 'post' );
    }
    /**
     * 查看某个app的绑定关系
     *
     * @params string app_id 要添加绑定的app
     *
     * @return api_id 绑定的api的id
     * @return api_name api的名称
     * @return app_id app的id(理论上与请求参数相同)
     * @return limit_count 允许一定时间访问多少次，默认是1000
     * @return limit_seconds 上一条中的“一定时间”
     */
    public function bindlist($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['app_id'], 'app_id' );

        return $this->callPrismApi( '/api/platform/manageapp/bindlist', $params, 'post' );
    }

     /**
     * 查看系统中所有的app
     * 无请求参数
     *
     * @return id app的id
     * @return name app的name
     * @return summary app的备
     */
    public function getList($params)
    {
        return $this->callPrismApi( '/api/platform/manageapp/list', null, 'get' );
    }

}
