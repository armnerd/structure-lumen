<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponse;
    
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

    /**
     * 返回token
     * @author fanzhen
     */
    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $this->guard()->factory()->getTTL() * 60
        ];
        return $data;
    }
}
