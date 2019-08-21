<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * 注入用户模型
     * @author fanzhen
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * 登入
     * @author fanzhen
     */
    public function login(Request $request)
    {
        $uid = $this->model->attempt($request);
        if($uid){
            $customClaims = ['custom' => 'custom'];
            $token = $this->guard()->claims($customClaims)->tokenById($uid);
            $this->success($this->respondWithToken($token), 1000);
        }else{
            $this->failed(4001);
        } 
    }

    /**
     * 登出
     * @author fanzhen
     */
    public function logout()
    {
        $this->guard()->logout();
        $this->success();
    }

    /**
     * 刷新token
     * @author fanzhen
     */
    public function refresh()
    {
        $this->success(1000, $this->respondWithToken($this->guard()->refresh()));
    }

    /**
     * 鉴权接口示例
     * @author fanzhen
     */
    public function api()
    {
        list($uid, $custom) = $this->payload();
        $name = $this->me()->name;
        echo $name.'-'.$uid.'-'.$custom;
    }
}