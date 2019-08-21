<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引用参数验证器,不一定与控制器一一对应
use App\Http\Requests\DemoRequest;
//引用需要的服务
use App\Services\DemoService;

class DemoController extends Controller
{
    protected $demo;

    public function __construct(DemoService $demo)
    {
        //构造中将需要的服务注入进来
        $this->demo = $demo;
    }

    /**
     * 成功返回示例
     * @author fanzhen
     * 所有函数请注明功能描述和作者，author为初始作者，修改者不要更改(仅在demo里提示，不要复制)
     */
    public function demoSuccess(Request $request)
    {
        //参数验证
        DemoRequest::demo($request);
        //调用服务，组装数据
        $this->demo->demo();
        //返回结果
        $this->success([]);
    }

    /**
     * 失败返回示例
     * @author fanzhen
     */
    public function demoError(Request $request)
    {
        //返回错误提示
        $this->failed();
    }

    /**
     * 异常示例
     * @author fanzhen
     */
    public function demoException(Request $request)
    {
        //抛出异常
        $this->exception();
    }

    /**
     * 错误码查询
     * @author fanzhen
     */
    public function errorCode()
    {
        return view('error', ['data' => config('error')]);
    }
}
