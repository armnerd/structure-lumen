<?php
namespace App\Services;

use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Auth;

class BaseService
{
    use ApiResponse;
    
    /**
     * 生成model
     * author: fanzhen
     */
    public static function model($tableName)
    {
        return new $tableName;
    }

    /**
     * 返回登入用户信息
     * @author fanzhen
     */
    public function me()
    {
        return $this->guard()->user();
    }

    /**
     * 获取token负载
     * @author fanzhen
     */
    public function payload()
    {
        $payload = $this->guard()->payload()->toArray();
        return [$payload['sub'], $payload['custom']];
    }

    /**
     * 返回守护器
     * @author fanzhen
     */
    public function guard()
    {
        return Auth::guard();
    }
}
