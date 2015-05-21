<?php
class PrismLibDeveloperApiManager extends PrismLibBase
{

    /**
     *  获取api数据的
     *
     * @param string Id api的Id
     *
     * @return json array('key'=>'value') 用户api的设置
     */
    public function get($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['Id'], 'Id' );

        return $this->callPrismApi( '/api/platform/service/config/get', $params, 'post' );
    }

    /**
     * 设置api的自定义设置（每次只能配置一个设置项）
     *
     * @param string Id api的Id
     * @param string key 自定义的设置名称
     * @param string value 自定义的设置名称对应的值
     *
     * @return bool true
     */
    public function set($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['Id'], 'Id' );
        PrismLibCheckUtil::checkNotNull( $params['key'], 'key' );

        return $this->callPrismApi( '/api/platform/service/config/set', $params, 'post' );
    }

    /**
     * 导入api
     *
     * @param string url prism可以请求到的url，这个url返回一个prism标准的json
     *
     * @return bool true
     */
    public function import($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['url'], 'url' );

        return $this->callPrismApi( '/api/platform/service/import', $params, 'post' );
    }

    /**
     * 更新api
     *
     * @param string url prism可以请求到的url，这个url返回一个prism标准的json
     *
     * @return bool true
     */
    public function refresh($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['url'], 'url' );

        return $this->callPrismApi( '/api/platform/service/refresh', $params, 'post' );
    }
}
