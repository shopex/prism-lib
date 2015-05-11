<?php
class PrismLibDeveloperAppManager extends PrismLibBase
{
    /**
     * 新建app
     *
     * @param string id 指定app的id。如果不填，则有prism自动生成
     * @param string name app的名称
     * @param string desc app的详细说明
     *
     * @return "ApiJsonUrl": "",
     * @return "AuthGroup": "",
     * @return "Author": "",
     * @return "AuthorUrl": "",
     * @return "CreateTime": "2015-05-08T15:27:51.368482262+08:00",
     * @return "DomainId": "default",
     * @return "Guid": "default-vt6kk6p",
     * @return "Id": "vt6kk6p",
     * @return "KeysNum": 0,
     * @return "Logo": "",
     * @return "MaxKeysLimit": 500,
     * @return "MemberId": "g3tearm2",
     * @return "Meta": {},
     * @return "Name": "cc",
     * @return "NotifyListen": null,
     * @return "NotifyPublish": null,
     * @return "SelfBinding": false,
     * @return "Status": "",
     * @return "Summary": ""
     */
    public function create($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['name'], 'name' );

        return $this->callPrismApi( '/api/platform/app/create', $params, 'post' );
    }

    /**
     * 删除app
     *
     * @param string app_id 要删除的app id
     *
     * @return bool true
     */
    public function delete($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['app_id'], 'app_id' );

        return $this->callPrismApi( '/api/platform/app/delete', $params, 'post' );
    }

     /**
     * 查询app的信息
     *
     * @param string app_id 要查询的app id
     *
     * @return "ApiJsonUrl": "",
     * @return "AuthGroup": "",
     * @return "Author": "",
     * @return "AuthorUrl": "",
     * @return "CreateTime": "2015-05-08T15:27:51.368482262+08:00",
     * @return "DomainId": "default",
     * @return "Guid": "default-vt6kk6p",
     * @return "Id": "vt6kk6p",
     * @return "KeysNum": 0,
     * @return "Logo": "",
     * @return "MaxKeysLimit": 500,
     * @return "MemberId": "g3tearm2",
     * @return "Meta": {},
     * @return "Name": "cc",
     * @return "NotifyListen": null,
     * @return "NotifyPublish": null,
     * @return "SelfBinding": false,
     * @return "Status": "",
     * @return "Summary": ""
     */
    public function info($params)
    {
        PrismLibCheckUtil::checkNotNull( $params['app_id'], 'app_id' );

        return $this->callPrismApi( '/api/platform/app/info/' . $params['app_id'], $params, 'get' );
    }

    /**
     * 获取app的列表
     * 无请求参数
     *
     */
    public function getList($params = null)
    {
        return $this->callPrismApi( '/api/platform/app/list', $params, 'post' );
    }
}
