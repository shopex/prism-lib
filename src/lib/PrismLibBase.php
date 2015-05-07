<?php

class PrismLibBase extends PrismClient
{
    public function callPrismApi($path, $params, $method_type='get')
    {
        if( in_array($method_type, array('get', 'post', 'delete', 'put')) )
            $result = call_user_func_array(array($this, $method_type), array($path, $params));
        $result = json_decode($result, true);
        if( $result['error'] != null )
        {
            throw new ErrorException( $return['error']['message'], $return['error']['code'] );
        }
        return $result['result'];
    }
}

