<?php
class PrismLibDeveloperKeyManager extends PrismLibBase
{

    /**
     * 创建一个key
     * @params string app_id app的id
     * @params string desc 即将创建的key的说明
     * @params string expired_date 这个key的有效期可以到哪天
     * @params string meta
     *
     * @return key
     * @return secret
     */
    public function create($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['app_id'], 'app_id' );

        return $this->callPrismApi( '/api/platform/key/create', $params, 'post' );
    }

    /**
     * 删除指定key
     *
     * @param string key 要删除的key
     *
     * @return bool true
     */
    public function delete($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['key'], 'key' );

        return $this->callPrismApi( '/api/platform/key/delete', $params, 'post' );
    }

    /**
     * 查询某个key的数据
     *
     * @param key string 需要查询的key
     *
     * @return"ClientId": "rshps42",
     * @return"CreateTime": "2015-05-08T15:42:55.712+08:00",
     * @return"DomainId": "default",
     * @return"Expired": -6.21355968e+10,
     * @return"Guid": "default-o4reduxc",
     * @return"Key": "o4reduxc",
     * @return"Meta": {
     * @return    "": "true"
     * @return},
     * @return"Notes": "",
     * @return"NotifyPushUrl": "",
     * @return"Secret": "sdjm3bxz4pmnxmwuarsq"
     */
    public function info($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['key'], 'key' );

        return $this->callPrismApi( '/api/platform/key/info/'.$params['key'], $params, 'get' );
    }

    public function getList($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['app_id'], 'app_id' );

        return $this->callPrismApi( '/api/platform/key/list', $params, 'post' );
    }
}
