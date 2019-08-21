<?php

namespace App\Http\Requests;

class BaseRequest
{
    /**
     * 失败返回
     * @author fanzhen
     */
    public static function failed($code = 4000)
    {
        list($msg, $showMsg) = self::codeCheck($code);
        self::response($code, $msg, $showMsg);
    }

    /**
     * 抛出异常
     * @author fanzhen
     */
    public static function exception($code = 4000)
    {
        list($msg, $showMsg) = self::codeCheck($code);
        throw new \Exception($msg);
    }

    /**
     * code检查
     * @author fanzhen
     */
    private static function codeCheck($code)
    {
        $codeSet = config('error');
        if (!isset($codeSet[$code])) {
            $result = [
                'message' => 'unknown error',
                'code' => 5000,
                'seq'  => config('sequence'),
            ];
            header('Content-type: application/json');
            echo json_encode($result);
            die;
        }
        return [$codeSet[$code]['msg'], $codeSet[$code]['showMsg']];
    }

    /**
     * 统一响应
     * @author fanzhen
     */
    private static function response($code, $msg, $showMsg, $data = [])
    {
        $result = [
            'message' => $msg,
            'showMsg' => $showMsg,
            'code' => $code,
            'seq'  => config('sequence'),
        ];
        if (!empty($data)) {
            $result['data'] = $data;
        }
        header('Content-type: application/json');
        echo json_encode($result);
        die;
    }
}
