<?php
class PrismLibAdminApiManager extends PrismLibBase
{
     /**
     * 使某个Api上线（只有上线，才可以绑定app）
     *
     * @params string Id api的id
     *
     * @return bool true
     */
    public function online($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['Id'], 'Id' );

        return $this->callPrismApi( '/api/platform/manageapi/online', $params, 'post' );
    }

     /**
     * 使某个Api下线（禁止app访问）
     *
     * @params string Id api的id
     *
     * @return bool true
     */
    public function offline($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['Id'], 'Id' );

        return $this->callPrismApi( '/api/platform/manageapi/offline', $params, 'post' );
    }

     /**
     * 获取api列表
     * 无请求参数
     *
     * @return array api
     */
    public function getList($params)
    {
        return $this->callPrismApi( '/api/platform/manageapi/list', null, 'get' );
    }

     /**
     * 给api添加其它节点参数
     *
     * @params string node_id 节点id
     * @params string api api的path
     * @params string data json数据
     *
     * @return bool true
     */
    public function nodeAdd($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['node_id'], 'node_id' );
        PrismLibCheckUtil::checkNotNull( $params['api'], 'api' );
        PrismLibCheckUtil::checkNotNull( $params['data'], 'data' );

        return $this->callPrismApi( '/api/platform/manageapi/node/add', null, 'get' );
    }
}

