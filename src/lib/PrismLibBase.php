<?php

class PrismLibBase
{
    private $client;

    public function __construct($host, $key, $secret)
    {
        $this->client = new PrismClient($host, $key, $secret);
    }

    public function getPrismClient()
    {
        return $this->client;
    }

    public function callPrismApi($path, $params, $method_type='get')
    {
        if( in_array($method_type, array('get', 'post', 'delete', 'put')) )
            $result = call_user_func_array(array($this->client, $method_type), array($path, $params));
        $result = json_decode($result, true);
        echo "========================================";
        echo "\n";
        echo $path;
        echo "\n";
        echo "params:";
        echo "\n";
        print_r($params);
        echo "\n";
        echo "result:";
        echo "\n";
        echo $result;
        echo "\n";
        if( $result['error'] != null )
        {
            throw new RuntimeException( $result['error']['code'] . ':' . $result['error']['message'], $result['error']['code'] );
        }
        return $result['result'];
    }
}

