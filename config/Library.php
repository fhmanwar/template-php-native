<?php 

namespace Config;

class Library
{
    public static function jsonRes($bool=false, $msg='error', $data=[null]) {
        $data = [
            'statusCode' => $bool,
            'msg' => $msg,
            'data' => $data,
        ];
        return json_encode($data);
    }
};
